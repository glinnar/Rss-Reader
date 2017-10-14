<?php

class Url{
  protected $url="";


  public function setNewUrl($newUrl){
    $this->url=$newUrl;
  }

  public function getUrl(){
    return $this->url;
  }

}
//json_decode(json_encode($array));
?>
