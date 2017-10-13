<?php include "classUrl.php";?>
<?php include "newXmlstream.php";?>


<form class="" action="test2.php" method="post">
  <select class="" name="Rss-feed">
      <option value="1">Google</option>
      <option value="2">Aftonbladet</option>
    </select>
    <select class="" name="View_format">
      <option value="html_format">Html</option>
      <option value="plain_text">Text</option>
    </select>
    <select class="" name="Sort_by">
      <option value="pubdDate">Publication Date</option>
      <option value="title">Title</option>
    </select>
    <input type="submit"id="showfeed" name="showfeed" value="Show Feed">
  </select>
</form>
<?php

if(isset($_POST['showfeed'])){
  $Option = $_POST['Rss-feed'];
  $Sort = $_POST['Sort_by'];

  if($Option =="1"){
$url=("http://feeds.bbci.co.uk/news/rss.xml") or die("Cannot load Rss feed");
$xml= simplexml_load_file($url);


$items=array();
foreach ($xml->channel->item as $read) {
  $items[] = $read;
  # code...
}
// Sortera på publiceringsDatum
usort($items,function($a,$b){
  return strtotime(str_replace('/', '-', $b->pubDate)) - strtotime(str_replace('/', '-', $a->pubDate));
});

}
elseif ($Sort=="title") {
// Sorterar på Title
usort($items,function($c,$d){
  return strcasecmp($c->title,$d->title);
});

}
foreach($items as $item){
  $title=$item->title;
  $link =$item->link;
  $guid=$item->guid;
  $category=$item->category;
  $pubDate=$item->pubDate;
  $media=$item->media;
  $description=$item->description;

$html= $title. $link.$guid.$category.$pubDate.$media.$description;
reset($item);
echo "<h1>".$html,"</h1>","</br>";

}

}

//$xml=json_decode(json_encode($xml_to_array),true);
 /*$order= $xml->XPath('/channel/items');
foreach($order as $read){
echo $read->asXML(),"<br>";
print_r($read);
}*/





/*
function my_sort($a, $b){
    return strcmp($a['pubDate'],$b['pubDate']);
}
usort($order,'my_sort');
 echo $order
*/

/*$sort=array();
foreach((array) (isset($xml['item'])) as $items){
  $sort[] =$items;
}
function cmp($a,$b){
  if((string)$a->pubDate ==(string)$b->pubDate){

  return 0;

}
return ((string) $a->pubDate<(string)$b->pubDate)?-1:1;
}
usort($sort,'cmp');
foreach($sort as $key =>$value){
  echo"$key: $value->pubDate<br>";
}
*/
 ?>
