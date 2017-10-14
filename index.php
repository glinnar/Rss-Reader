  <?php include "classUrl.php";?>
  <?php include "sortclass.php";?>


  <form class="" action="index.php" method="post">
    <select class="" name="feed">
        <option value="http://feeds.bbci.co.uk/news/rss.xml">BBC</option>
        <option value="http://www.aftonbladet.se/sportbladet/rss.xml">Sportbladet</option>
      </select>
      <select class="" name="View_format">
        <option value="html_format">Html</option>
        <option value="plain_text">Text</option>
      </select>
      <select class="" name="sort_By">
        <option value="pubDate">Publication Date</option>
        <option value="title">Title</option>
      </select>
      <input type="submit"id="showfeed" name="showfeed" value="Show Feed">
    </select>
  </form>
  <?php

    if(isset($_POST['showfeed'])){
      $option = $_POST['feed'];
      $sort = $_POST['sort_By'];

        $xml=simplexml_load_file($option);
        $items=array();
        foreach ($xml->channel->item as $read) {
          $items[] = $read;

        }
          $obj= new Sort();
          // Sortera på publiceringsDatum
        if($sort=="pubDate"){
          $obj->sort_ByPubDate($items);
        }
        elseif ($sort=="title") {
          $obj->sort_ByTitle($items);

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

          echo "<h1>".$html,"</h1>","</br>";
        }





    }


  /*if(php_sapi_name()=="cli"){

    foreach($xml->channel->item as $read){
      $title=$read->title;
      $link =$read->link;
      $guid=$read->guid;
      $category=$read->category;
      $pubDate=$read->pubDate;
      $media=$read->media;
      $description=$read->description;

    $html= $title. $link.$guid.$category.$pubDate.$media.$description;
    echo "<p>".$html,"</p>","</br>";
    }

  }*/

   ?>
