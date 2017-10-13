<?php

class Sort{


public $items=array();
public $xml;
public $read;
public $item;
public $Sort_by;

public function __construct($items,$xml,$read,$item,$Sort_by){
  $this->items=$items;
  $this->xml=$xml;
  $this->read=$read;
  $this->item=$item;
  $this->Sort_by=$Sort_by;
}

public function SortMethod(){
  foreach ($xml->channel->item as $read) {
    $items[] = $read;
  switch ($this->Sort_by) {
    case 'pubDate':
      usort($items,function($a,$b){
        return strtotime(str_replace('/', '-', $a->pubDate)) - strtotime(str_replace('/', '-', $b->pubDate));
      });
      break;
      case 'title';
      usort($items,function($c,$d){
        return strcasecmp($c->title,$d->title);
      });

      break;

    default:
      $err ="Something went wrong";
      break;
  }
}

}
}
?>
