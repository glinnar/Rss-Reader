<?php

class Xmlstream {
protected $xml;

public function setXmlstream($newxml){
     $this->xml=$newxml=simplexml_load_file();

}
public function getXmlstream(){

  return $this->xml;
}

}




 ?>
