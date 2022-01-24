<?php
require_once ("../functions/fileserver.php");
require_once ("../functions/html_functions.php");

$datatypes = $paramControl->load_sources("datatypes");

// see($post);
switch ($post->case) {
	// Upload Base64 Files to server
	case 'base64Upload': // [folder,base64] optional [ filename, mobile]
		if(is_base64_string($post->base64) || strlen($post->base64) > 200){
			if(empty($post->folder))$post->folder = "{$uri->site}assets/picture/";
			if(!empty($post->mobile))$post->folder = "{$post->folder}mobile/";
			if(empty($post->filename))$post->filename = random(9);
			if(is_http_url($post->folder))$post->folder = absolute_filepath($post->folder);
			$post->filename = renameIfExists($post->folder.$post->filename);
			$response->src = save_base64_file($post->base64, $post->filename);
			$response->src = http_filepath($response->src);
			$response->name = basename($response->src);
			$response->status = 1;
		}else $response->message = "This isn't a valid base64 file";
	break;
	// Upload Local Files to server
	case 'fileUpload':
		if(!empty($_FILES)) {
			$response = new stdClass;
			$files 	= [];
			// If THIS folder path is a http path, change to absolute file path of THIS server
			if(is_http_url($post->folder))$post->folder = absolute_filepath($post->folder);
			// Check if THIS upload folder does not exist to auto create it
			if(!is_dir($post->folder)){
				if(!mkdir($post->folder,0755,true)){
					$response->error = "Can not create THIS folder";
				}
			}

			// If everything is okay, loop through THIS files and upload THISm
			if(empty($response->error)){
				foreach ($_FILES as $file_key => $thisfile) {
					// crete a temporal file object
					$file = new stdClass;

					// This file's name
					$filename =str_replace(' ', '_', $thisfile["name"]);

					// This file's extension
					$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

					// Check if file is within THIS accepted file size
					if($thisfile["size"] < 100045766666666){
						// Check if file matches THIS requestes file type
						if(isset($post->getype)){
							if(!isset($datatypes->{$post->getype})){
								$file->error = "Unknown filetype";
							}else{
								if(array_search($ext, $datatypes->{$post->getype}) === false){
									$file->error = "Unrecognized {$post->getype} format";
								}
							}
						}else{
							$post->getype = getdataType($datatypes, $ext);
							if($post->getype === false){
								$file->error = "Unknown filetype";
							}
						}
						// If file has passed all neccessary checks
						if(empty($file->error)){
							// Check if file name already exists in THIS folder and reassing a new filename to it
							$filepath = renameIfExists($post->folder.$filename);
							$filename = basename($filepath);
							$post->folder   = dirname($filepath);
							// see($filepath);
							if(move_uploaded_file($thisfile["tmp_name"], $filepath)){
								// Run some special operations for picture files like [Creating thumbnails and reducing file sizes]
								if(checkPictureFormat($filename)){

									list($orig_width, $orig_height) = getimagesize($filepath);

									$icon = returnIcon($filename, $post->folder);
									if($orig_width > 200 or $orig_height > 200){

										if(checkPictureFormat($filename)){
											if(!is_dir("{$post->folder}/tbn")){
												mkdir("{$post->folder}/tbn", 0755);
											}

											$icon = "{$post->folder}/tbn/{$filename}";
											if(!is_file($icon)){
												resizePicture($filepath, $icon, 128, 128);
												$icon="{$post->folder}/tbn/{$filename}";
											}
										}
									}
									$width = empty($width) ? 1500 : $width;
									$height = empty($height) ? 1500 : $width;
									if(checkPictureFormat($filename))resizePicture($filepath, $filepath, $width, $height);
									$file->size = [$orig_width, $orig_height];
									$file->icon = http_filepath($icon);
								}elseif ($post->type == "picture") {
									$file->icon = http_filepath($filepath);
								}
								$file->src       = http_filepath($filepath);
								$file->name      = basename($filename);
								$file->extension = $ext;
							} else $file->error = "Could not upload ".basename($filename);
						}
					}
					else $file->error = "File size is too much";
					$files[$file_key] = $file;
				}
			}
			if(isset($old_img) && file_exists($old_img)){
				unlink($old_img);
				unlink(dirname($old_img)."tbn/".basename($old_img));
			}
			// Return response as object for file_upload keys or as array for none file_upload keys
			// This is because it's not only upload dialog that uses this upload function;
			$response = !empty($response->error)?
				$response :
				((count($files) == 1) && (isset($files["file_upload"]))?
					reset($files) :
					$files
				);
		}else $response->message = "No files to upload";
	break;
	// load Files from URL
	case 'urlFiles':
	break;
	// update no of views
	case "noOfViews":
		$response = $generic->writeViews($post->folder_name, $post->id);
	break;
	// load Files from URL
	case 'loadFiles':
		if (is_http_url($post->folder)) $post->folder = absolute_filepath($post->folder);
		if(!is_dir($post->folder)){
			mkdir($post->folder, 0755, true);
		}
		$ar=getLocalFiles($post->folder, $post->type);
		if(isset($post->getype) and !empty($post->getype)){
			$search = $ar;
			$response = [];
			$arrtype = $datatypes->{$post->getype};
			foreach($search as $c => $item){
				$extx = strtolower(trim($item['extension']));
				if(array_search($extx, $arrtype) === false && $extx != '-1'){
					continue;
				}
				$response[] = $item;
			}
			//$ar[] = ['../'.$post->folder,'Back','..','-1'];
		}
		rsort($response);
	break;
	// Move files into folders or rename folder
	case 'moveFolder':
		$new_name= $post->dropFolder."/".basename($post->moveFolder);
		if(rename($post->moveFolder, $new_name)){
			$response = [
				'newfile' => $new_name,
				'oldfile' => $post->moveFolder,
			];
		}else $response->message = "No files to upload";
	break;
	//Delete files or folders in upload dialogue
	case 'deleteFiles':
		if ($post->type == 1){
			if(is_http_url($post->delPath))$post->delPath = absolute_filepath($post->delPath);
			if(file_exists($post->delPath)){
				$post->delPath = str_replace("tbn/", "", $post->delPath);
				$dir = dirname($post->delPath);
				$tbn = "{$dir}/tbn/";
				$tbn = str_replace($dir, $tbn, $post->delPath);
				if(file_exists($tbn))unlink($tbn);
				$response->status =  unlink($post->delPath);
			}
		}else{
			 $response->status =  delete_files($post->delPath);
		}
	break;
	//Create new folder in upload dialogue
	case 'newFolder':
		$count=0;
		if(is_http_url($post->ucPath))$post->ucPath = absolute_filepath($post->ucPath);
		$post->folderName = strtolower(str_replace(' ', '_', $post->folderName));
		if (mkdir($post->ucPath . $post->folderName, 0755, true)) {
			$response->status  = 1;
		}
		$response->src  			= $post->ucPath . $post->folderName;
		$response->name 			= basename($post->folderName);
		$response->isFolder  	= -1;
		$response->extension 	= -1;
	break;
	// Rename file from uploadDialog
	case 'renameFile':
		if(is_http_url($post->newPath))$newPath = absolute_filepath($post->newPath);
		if(is_http_url($post->oldPath))$oldPath = absolute_filepath($post->oldPath);
		if(file_exists($oldPath))$response->status = rename($oldPath, $newPath);
		else $response->message = "File does not exist";
	break;
	// Delete Selected files from generic_dp
	case 'deleteFile':
		if(gettype($post->unlink) == 'array'){
			$count = count($post->unlink);
			foreach($post->unlink as $file){
				if(is_http_url($file))$file = absolute_filepath($file);
				if(file_exists($file))if(unlink($file))$count--;
				$tbn = dirname($file)."/tbn/".basename($file);
				if(file_exists($tbn))unlink($tbn);
			}
			if($count < count($post->unlink)){
				$response->status = 1;
				$response->message = "Images Cleared";
			}
		}else $response->status = 'No Files to delete';
	break;
	//Crop pictures from generic_dp
	case 'cropImage':
		if(is_base64_string($post->image_source)){
			$generated_name = random(9);
			$post->image_source = save_base64_file($post->image_source, $post->img_dir.$generated_name);
		}
		$image_source = is_http_url($post->image_source) ? absolute_filepath($post->image_source) : $post->image_source;
		$img_dir 			= is_http_url($post->img_dir) ? absolute_filepath($post->img_dir) : $post->img_dir;
		if(file_exists($image_source)){
			$file =  realpath($image_source);
			list($orig_width, $orig_height) = getimagesize($file);
			$new_width = ($post->resizable_width * $orig_width)/$post->img_width;
			$new_height = ($post->resizable_height * $orig_height)/$post->img_height;
			$x_cord = ($orig_width * $post->resizable_left)/$post->img_width;
			$y_cord = ($orig_height * $post->resizable_top)/$post->img_height;
			$param = [
				'x' => $x_cord,
				'y' => $y_cord,
				'width' => $new_width,
				'height' => $new_height
			];
			$filename = pathinfo($file, PATHINFO_FILENAME);
			$new_dp = $img_dir.random(9).".png";
			$im = imagecreatefrompicture($file);
			//echo ; die();
			if(gettype($im) !== 'resource'){die(50);}
			$im2 = image_crop($im, $param);
			if ($im2 !== FALSE) {
				imagepng($im2, $new_dp);
				if(file_exists($new_dp)){
					$icon = dirname($new_dp)."/tbn/".basename($new_dp);
					resizePicture($new_dp, $icon, 128, 128);
					list($new_w, $new_h)  = getimagesize($new_dp);
					$new_dp = http_filepath($new_dp);
					$icon 	= http_filepath($icon);
					$response = array('src'=>$new_dp, 'size'=>[$new_w, $new_h], 'name'=>basename($new_dp), "icon"=>$icon, "status"=>1);
					if(file_exists($image_source))unlink($image_source);
					if(file_exists(dirname($image_source)."/tbn/".basename($image_source)))unlink(dirname($image_source)."/tbn/".basename($image_source));
					if(!empty($post->unlink) && gettype($post->unlink) == "array"){
						foreach($post->unlink as $file){
							if(is_http_url($file))$file = absolute_filepath($file);
							if(file_exists($file))if(unlink($file));
							$tbn = dirname($file)."/tbn/".basename($file);
							if(file_exists($tbn))unlink($tbn);
						}
					}
				}
			}else $response->message = "This image file can't be cropped";
		}else $response->message = "File does not exist";
	break;
	default:
		$response->message = "Unrecognized Process Upload Case";
	break;
}
?>
