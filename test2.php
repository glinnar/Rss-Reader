  <?php include "classUrl.php";?>



  <form class="" action="test2.php" method="post">
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

        $xml=simplexml_load_file('option');
        $items=array();
        foreach ($xml->channel->item as $read) {
          $items[] = $read;

        }

          // Sortera på publiceringsDatum
        if($sort=="pubDate"){
            usort($items,function($a,$b){
              return strtotime(str_replace('/', '-', $b->pubDate)) - strtotime(str_replace('/', '-', $a->pubDate));
          });
        }
        elseif ($sort=="title") {
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

          echo "<h1>".$html,"</h1>","</br>";
        }




          $xml2=simplexml_load_file('option');
          $items2=array();

          foreach ($xml2->channel->item as $read2) {
            $items2[] = $read2;
            }
      if($sort=="pubDate"){
          // Sortera på publiceringsDatum
          usort($items2,function($e,$f){
            return strtotime(str_replace('/', '-', $f->pubDate)) - strtotime(str_replace('/', '-', $e->pubDate));
          });
        }

      elseif ($sort=="title") {
          usort($items2,function($g,$h){
            return strcasecmp($g->title,$h->title);
          });
      }

      foreach($items2 as $item2){
          $link2 =$item2->link;
          $guid2=$item2->guid;
          $category2=$item2->category2;
          $title2=$item2->title;
          $pubDate2=$item2->pubDate;
          $description2=$item2->description;

          $html2= $title2. $link2.$guid2.$pubDate2.$description2;
          echo "<p>".$html2,"</br>","</p>","</br>";
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
