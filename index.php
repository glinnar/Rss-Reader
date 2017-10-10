<?php include "classUrl.php";?>
<?php include "newXmlstream.php";?>
<?php include "header.php"; ?>

<form class="" action="index.php" method="post">
  <select class="" name="Rss-feed">
      <option value="Google">Google</option>
      <option value="Aftonbladet">Aftonbladet</option>
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

  if($Option =="Google"){
  $Url = new Url;
  $Url->setNewUrl("https://news.google.com/news/rss/?ned=us&hl=en");
  $url= $Url->getUrl();
  $xml_to_array= (array)simplexml_load_file($url);
//var_dump($xml_to_array); ANVÄND BARA DECODE OCH ENCODE INTE =(ARRAY)
$xml=json_decode(json_encode($xml_to_array));
foreach($xml->channel->item as $read){
  $title=$read->title;
  $link =$read->link;
  $guid=$read->guid;
  $category=$read->category;
  $pubDate=$read->pubDate;
  $description=$read->description;

$html= $title. $link.$guid.$category.$pubDate.$description;
echo "<p>".$html,"</p>","</br>";
}

/*
  function my_sort($a,$b){
    if($a==$b)return 0;
    return($a<$b)?-1:1;
  }
  $a=(array)simplexml_load_file($url);
  usort($a,"my_sort");
  $arrlength=count($a);
  for($x=0;$x<$arrlength;$x++){
    print_r ($a[$x]);
    echo "<br>";
  }
*/

/*  $present = new View($View_format);
  $present->ViewMethod();
  $sort = new Sort($Sort_by);
  $sort ->SortMethod();*/


/*
    foreach($xml->channel->item as$read){
      $title=$read->title;
      $link =$read->link;
      $guid=$read->guid;
      $category=$read->category;
      $pubDate=$read->pubDate;
      $description=$read->description;

  $html= $title. $link.$guid.$category.$pubDate.$description;
    echo "<p>".$html,"</p>","</br>";
 }*/
}

else if($Option =="Aftonbladet") {
  $Url2 = new Url;
  $Url2 ->setNewUrl("http://www.aftonbladet.se/sportbladet/rss.xml");
  $url2=$Url2->getUrl();
  $xml2=simplexml_load_file($url2);
  foreach($xml2->channel->item as $read2){
    $link2 =$read2->link;
    $guid2=$read2->guid;
    $category2=$read2->category2;
    $title2=$read2->title;
    $pubDate2=$read2->pubDate;
    $description2=$read2->description;

  $html2= $title2. $link2.$guid2.$pubDate2.$description2;
    echo "<p>".$html2,"</br>","</p>","</br>";
  }
}
}

?>

<?php include "footer.php";?>
