<?php

Class View{

public $View_format;

public function__Construct($View_format){
  $this->View_format=$View_format;
}
public function ViewMethod(){
  switch ($this->View_format) {
    case 'html_format':
      # code...
      break;
      case 'plain_text':

      break;
    default:
      # code...
      break;
  }
}
}
 ?>
