<?php include "classUrl.php";?>
<?php include "newXmlstream.php";?>


<?php
$Url = new Url;
$Url->setNewUrl("https://news.google.com/news/rss/?ned=us&hl=en");
$urll= $Url->getUrl();
$url=("http://feeds.bbci.co.uk/news/rss.xml");
$xml= simplexml_load_file($url);


$items=array();
foreach ($xml->channel->item as $read) {
  $items[] = $read;
  # code...
}

usort($items,function($a,$b){
  return strcmp($a->pubDate,$b->pubDate);
});

echo"<pre>";
print_r($items);
echo"</pre>";

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
