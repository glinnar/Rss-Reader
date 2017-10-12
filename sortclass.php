<?php

class Sort{


public $Sort_by;

public function __construct($Sort_by){
  $this->Sort_by=$Sort_by;
}

public function SortMethod(){
  switch ($this->Sort_by) {
    case 'pubDate':

      break;
      case 'title';

      break;

    default:
      $err ="Something went wrong";
      break;
  }
}

}
?>
