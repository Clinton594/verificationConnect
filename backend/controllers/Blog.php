<?php
require_once "Messenger.php";

class Blog extends Generic{
  public function __construct($backend="", $usesDB = true) {
    $this->backend = $backend;
    parent::__construct($usesDB);
	}

	function get_content($id, $get_author = false, $get_related = false){
		$id = intval($id);
		$content = [];
		if($id && is_numeric($id)){
			$sql = "SELECT * FROM content WHERE id='$id' AND status = '1'";
			$query = self::$mydb->query($sql) or die(self::$mydb->error);
			if($row = $query->fetch_assoc()){
				$row = (object) utf8ize($row);
				$row->image = json_decode($row->image);
				$row->product_desc = json_decode($row->product_desc);
				if($get_author === true){
					$sql_a = "SELECT first_name, last_name, picture_ref, email, phone, bio, website FROM users WHERE id='{$row->author}'";
					$query = self::$mydb->query($sql_a) or die(self::$mydb->error);
					if($query->num_rows){
						if($row_a = $query->fetch_assoc()){;
							$row_a = (object) $row_a;
							$row_a->picture_ref = empty($row_a->picture_ref) ? "rear/images/default.png" : $row_a->picture_ref;
							$row->the_author = (object) $row_a;
						}
					}
				}
				if($get_related === true){
					$sort = NO_OF_VIEWS_ASC;
					$sql_r = "SELECT id, title, image, no_of_views FROM content WHERE category = '{$row->category}' AND category !='0' AND status='1' AND id!='{$row->id}' ORDER BY $sort LIMIT 5";
					$query = self::$mydb->query($sql_r) or die(self::$mydb->error);
					if($query->num_rows){
						if($row_r = $query->fetch_assoc()){
							$row->related[] = (object) $row_r;
						}
					}
				}
				$content = $row;
			}
		}
		return($content);
	}

  function get_contentType($filter = '', $limit = '', $sort = ID_DESC){
    $content = [];
		$l = intval($limit);
		$sortOrder = $sort; $where= "";
		$filter = !empty( $filter) ?  $filter : "";
		$limit = (empty($l) || !is_numeric($l)) ? "" : "LIMIT 0, $limit";
    if(!empty($filter)){
      $where = parent::filterQuery($filter, "content")." AND";
    }

		$sql = "SELECT * FROM content WHERE $where status = '1' ORDER BY $sortOrder $limit";
		$query = self::$mydb->query($sql) or die(self::$mydb->error."($sql)");
		while($row = $query->fetch_assoc()){
			$row = (object) utf8ize($row);
			$row->category_name = null;
			if($row->category){
				$q = self::$mydb->query("SELECT title FROM content WHERE id={$row->category}") or die(self::$mydb->error);
				$r = $q->fetch_assoc();
				$row->category_name = $r['title'];
			}else $row->category = 0;
			$row->image = json_decode($row->image);
			$row->product_desc = json_decode($row->product_desc);
			$content[] = $row;
		}
		return(json_decode(json_encode($content)));
	}

	public function get_gallery(){
		$gar = "asset/picture/gallery/";
		if(!is_dir($gar)){
			mkdir($gar,true,0777);
		}
		$_images =  scandir($gar); $image =""; $images = [];

		foreach($_images as $k => $file){
			if($file!== '.' || $file !== '..' || is_dir($file)){
				$images[] = $gar.$file;
			}
		}
		return($images);
	}


}
?>
