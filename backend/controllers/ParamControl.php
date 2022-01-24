<?php
	class ParamControl{
		public static $front;
		public static $roles;
		public static $param;
		public static $loaded;
		public static $actions;
		public static $sources;
		public static $generic;
		public static $reports;
		public static $link_biz;

		function __construct(Generic $generic){
			self::$generic = $generic;
			$uri = $generic->getURIdata();
			$param_files 	= [
				"sources" => "param_sources",
				"front"  =>  "param_frontend",
				"param"  =>  "param_generic",
				"actions" => "param_actions",
				"roles"  =>  "param_roles",
				"link_biz"=> "param_transactions",
				"reports" => "param_reports"
			];
			self::$loaded = array_keys($param_files);
			foreach ($param_files as $param_key => $param_name) {
				$param_file = __DIR__."/../backendProject/parameters/{$param_name}.php";
				
				if(file_exists($param_file)){require_once($param_file);}
				if(isset(${$param_key})){
					$parameter = ${$param_key};
					$parameter = object(utf8ize($parameter));
					self::${$param_key} = json_decode(json_encode($parameter));
				}
			}
		}

		//Get all params within a page
		public function get_page_param($param_page){
			$response 	= null;
			if(!empty(self::${$param_page})){
				$response = self::${$param_page};
			}
			return $response;
		}

		//Get all pages params merged together or one param from any param page within the array below
		public function get_params($pageType = ""){
			$loads 	= self::$loaded;
			$merged	= [];
			foreach ($loads as $key => $array) {
				if(!empty(self::${$array})){
					$array_data = self::${$array};
					$array_data	= json_decode(json_encode($array_data), true);
					$merged			= array_merge($merged, $array_data);
				}
			}
			if(!empty($pageType)){
				if(isset($merged[$pageType])){
					$merged = $merged[$pageType];
				}else $merged = [];
			}
			return json_decode(json_encode($merged));
		}

		//Get all sources from the source param, or one from it
		public function load_sources($pageType = ""){
			$sources	 = self::$sources;
			if(!empty($pageType) && isset($sources->{$pageType})){
				$sources = $sources->{$pageType};
			}
			return $sources;
		}

		//The the default role from the role param and format it to string (like a user's roledesc)
		public function default_role(){
			$roles	 = self::$roles;
			$response = null;
			if(!empty($roles)){
				$return 	= [];
				$group_id	= 1;
				foreach($roles as $group_name => $group_data){
					$links_id	= 1;
					foreach ($group_data->links as $links_key => $links_data) {
						$return[]="$group_id:$links_id";
						$links_id++;
					}
					$group_id++;
				}
				$response = implode(",", $return);
			}
			return($response);
		}

		//Extracts and rebuilds form elements to be usable by FormController class
		public function extract_form($form){
			$form = json_decode(json_encode($form), true);
			$data=array();
			$vs=!empty($form['sections']) ? $form['sections'] : array();
			foreach($vs as $kt1 => $v1){
				if(empty($v1['position']))continue;
				$positions = explode(' ',trim($v1['position']));
				$k0 = isset($positions[1]) ? trim($positions[1]) : '0';
				$k = trim($positions[0]);
				$k1=!empty($v1['section_title']) ? $v1['section_title'] : '';
				$vf=!empty($v1['section_elements']) ? $v1['section_elements'] : array();
				$data['form_position'] = $k;
				foreach($vf as $k2 => $v2){
					if(!empty($v2['column'])){
						$data['columns'][$k0][$k][$k1][]=$v2['column'];
						$data['name'][$k0][$k][$k1][]=!empty($v2['name']) ? $v2['name'] :  $v2['column'];
						$data['coldesc'][$k0][$k][$k1][]=!empty($v2['description']) ? $v2['description'] : '';
						$data['required'][$k0][$k][$k1][]=!empty($v2['required']) ? $v2['required'] : '';
						$data['disabled'][$k0][$k][$k1][]=!empty($v2['disabled']) ? $v2['disabled'] : false;
						$data['value'][$k0][$k][$k1][]=!empty($v2['value']) ? $v2['value'] : '';
						$data['readonly'][$k0][$k][$k1][]=!empty($v2['readonly']) ? $v2['readonly'] : false;
						$data['order'][$k0][$k][$k1][]=!empty($v2['type']) ? $v2['type'] : '';
						$data['src'][$k0][$k][$k1][]=!empty($v2['source']) ? $this->source_encode($v2['source']): '';
						$data['cls'][$k0][$k][$k1][]=!empty($v2['class']) ? $v2['class'] : '';
						$data['empty'][$k0][$k][$k1][] = isset($v2['empty']) ? $v2['empty'] : true;
						$data['placeholder'][$k0][$k][$k1][] = !empty($v2['placeholder']) ? $v2['placeholder'] : '';
						$data['event'][$k0][$k][$k1][]=!empty($v2['event']) ? $v2['event'] : '';
						$data['target'][$k0][$k][$k1][]=!empty($v2['target']) ? $v2['target'] : '';
						$data['mult'][$k0][$k][$k1][]=isset($v2['multiple']) ? $v2['multiple'] : false;
						$data['col'][]=$v2['column'];
						$data['desc'][]=!empty($v2['description']) ? $v2['description'] : '';
					}
				}
			}
			return $data;
		}

		public function extract_display_fields($display_fields){
			$display_fields = json_decode(json_encode($display_fields), true);
			$data=array();
			foreach($display_fields as $k2 => $v2){
				if(!empty($v2['column'])){
					$name = $v2['name'];
					$data['name'][$name]=$v2['name'];
					$data['column'][$name]=!empty($v2['column']) ? $v2['column'] : '';
					$data['description'][$name]=!empty($v2['description']) ? $v2['description'] : '';
					$data['type'][$name]=!empty($v2['type']) ? $v2['type'] : '';
					$data['source'][$name]=!empty($v2['source']) ? $v2['source'] : '';
					$data['filter'][$name]=!empty($v2['filter']) ? $v2['filter'] : '';
					$data['action'][$name]=!empty($v2['action']) ? $v2['action'] : '';
				}
			}
			return $data;
		}

		//Converts back and array to a linear string.
		//This is used by the filter control and transactions widget
		public function jsonRe_encode($arr){
			if(gettype($arr) =="array"){
				$jj = "";
				foreach($arr as $k => $v){
					$jn = "";
					$n = empty($v->name)? '':$v->name;
					$c = empty($v->column)? '':$v->column;
					$s = empty($v->source)? '':$v->source;
					$v = empty($v->value)? '':$v->value;
					$jn = $c.','.$n.','.$s.','.$v.'|';
					$jj .= $jn;
				}
				return(substr($jj,0,-1));
			}else return(0);
		}

		public function source_encode($source){
			if (is_object($source))$source=(array)$source;
			$concat = "";
			if(gettype($source) =="array"){
				$source = json_decode(json_encode(array_change_key_case($source)));
				if(gettype($source->column) == "array")$source->column = implode("*", $source->column);
				if(!empty($source->concat)){
					if(is_bool($source->concat))$source->concat = "true";
					$concat = "~{$source->concat}";
				}
				$source = "{$source->pagetype}~{$source->column}{$concat}";
			}
			return($source);
		}

		public function source_decode($source){
			$array_source = explode("~", $source);
			if(!empty($array_source[1])){
				$columns = array_unique(explode("*", $array_source[1]));
				$columns = implode(",", $columns);
				$source = array("pageType"=>$array_source[0], "column"=>$columns);
				if(!empty($array_source[2])){ $source["concat"] = $array_source[2];}
			}
			return($source);
		}

		//Extracts form for Transactions
		function extractFormSubset($form, $key){
			$dt=array();
			$form = json_decode(json_encode($form), true);
			$vs=!empty($form['sections']) ? $form['sections'] : array();
			foreach($vs as $kt1 => $v1){
				if(empty($v1['position']))continue;
				$positions = explode(' ',trim($v1['position']));
				$k0 = isset($positions[1]) ? trim($positions[1]) : '0';
				$k = trim($positions[0]);
				if(trim($key) !=$k) continue;
				$k1=!empty($v1['section_title']) ? $v1['section_title'] : '';
				$vf=!empty($v1['section_elements']) ? $v1['section_elements'] : array();
				foreach($vf as $k2 => $v2){
					if(!empty($v2['column'])){
						$data=array();
						$data[]=$v2['column'];
						$data[]=!empty($v2['description']) ? $v2['description'] : '';
						$data[]=!empty($v2['class']) ? $v2['class'] : '';
						$data[]=!empty($v2['type']) ? $v2['type'] : '';
						$data[]=!empty($v2['required']) ? $v2['required'] : '';
						$data[]=!empty($v2['disabled']) ? $v2['disabled'] : false;
						$data[]=!empty($v2['source']) ? $this->source_encode($v2['source']) : '';
						$data[]=!empty($v2['value']) ? $v2['value'] : '';
						$data[]=isset($v2['empty']) ? $v2['empty'] : true;
						//$data[]=!empty($v2['event']) ? $v2['event'] : '';
						//$data[]=!empty($v2['target']) ? $v2['target'] : '';
						//$dt[]=json_encode($data);
						$dt[]=implode(',',$data);
					}
				}
			}
			return implode('|', $dt);
		}

		//Used to identify the form elements for each type of data gotten from database to be able to custom form format the data to suit the element.
		public function extractFormElements($form){
			$data = [];
			if(isset($form->sections)):
				foreach ($form->sections as $key => $value) :
					if(isset($value->section_elements)):
						foreach ($value->section_elements as $se_key => $se_value) :
							$data[] = (object)$se_value;
						endforeach;
					endif;
				endforeach;
			endif;
			return $data;
		}


		//Loads matched rows from database or source param
		function load_data_from_param($param_name, $data_key = "")	{
			$response 				= [];
			$retrieve_filter 	= "";
			//If param name supplied is an array.
			if(gettype($param_name) == "array" || gettype($param_name) == "object"){
				if(gettype($param_name) == "object")$param_name = json_decode(json_encode($param_name), true);
				extract($param_name, EXTR_OVERWRITE);
			}else {
				$pageType = $param_name;
			}
			// Check sources first
			$sources = $this->get_page_param("sources");
			// If data is not found in sources
			if(!empty($pageType)){
				if(!isset($sources->{$pageType})){
					$param = $this->get_params($pageType);
					if(empty($param))
						$response = [];
					else{
						// Param is found in any of the pages
						if(isset($column)){
							if(gettype($column) == "array"){
								$tempsort = "{$column[0]} DESC";
							}else{
								$tempsort = "{$column} DESC";
							}
							$first_column = $column;
						}else{
							$display_fields = $param->display_fields;
							$display_fields = $display_fields[0];
							$first_column		=	$display_fields->column;
							$tempsort			 	= "$first_column DESC";
						}
						// if there is an external column that came from the array above, use it.
						if(gettype($first_column) == "array")$first_column = implode(", ", $first_column);
						if(empty($param->sort))$param->sort = $tempsort;
						if(empty($param->retrieve_filter))$param->retrieve_filter = "";
						//Merge filter queries from ajax request with the one from the param
						$param->retrieve_filter = implode(",", array_filter([$retrieve_filter, $param->retrieve_filter]));
						$excludes = array_filter(["<>", "("], function ($value='') use ($param) { return stripos($param->retrieve_filter, $value) !== false; });
						if(count($excludes)){
				      $param->retrieve_filter = $param->retrieve_filter;
				    }else{
				      $param->retrieve_filter = filterQuery($param->retrieve_filter, $this::$generic->getTableFields($param->table));
				    }
						$param->retrieve_filter = empty($param->retrieve_filter) ? "" : "WHERE {$param->retrieve_filter}";
						$limit = empty($param->limit) ? "" : "LIMIT {$param->limit}";
						$query = "SELECT {$param->primary_key}, {$first_column} FROM {$param->table} {$param->retrieve_filter} ORDER BY {$param->sort} {$limit}";
						$response = [];
						if($q = $this::$generic::$mydb->query($query)){
							while($value = $q->fetch_object()){
								$value 			= utf8ize($value);
								$key 			  = $value->{$param->primary_key};
								$countcols 	= explode(",", $first_column);
								$response[$key] = ((count($countcols) > 1) || !empty($usekey)) ? $value : $value->{$first_column} ;
								if(!empty($concat) && (count($countcols) > 1)){
									$value = (array)$value;
									unset($value[$param->primary_key]);
									if($concat == "true")$concat = " ";
									$response[$key] = implode($concat, array_values($value));
 								}
							}
						}
					}
				}else{
					$response = $sources->{$pageType};
					$response = json_decode(json_encode($response), true);
				}
				if(strlen(trim($data_key))){
					if(isset($response[$data_key]))$response = $response[$data_key];
					else $response = "";
				}
			}
			return $response;
			// return [];
		}

	}
