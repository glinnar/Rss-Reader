<?php include "classUrl.php";?>
<?php include "newXmlstream.php";?>

<?php
$Url = new Url;
$Url->setNewUrl("https://news.google.com/news/rss/?ned=us&hl=en");
$url= $Url->getUrl();
$xml_to_array= simplexml_load_file($url);


$xml=json_decode(json_encode($xml_to_array),true);

function my_sort($a, $b){
    if ($a->pubDate-> == $b->pubDate) {
        return 0;
    }
    return ($a->pubDate < $b->pubDate) ? -1 : 1;
}

usort($xml->item, "my_sort");


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
