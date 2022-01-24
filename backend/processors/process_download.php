e<?php
if(is_http_url($post->filename))$post->filename = absolute_filepath($post->filename);
if(file_exists($post->filename)){
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename={$post->filename}");
    echo readfile($post->filename);
    die();
}else{
    $response = object(["status"=>0, "message"=> basename($post->filename). " does not exist"]) ;
}
?>
