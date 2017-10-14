
  <?php include "sortclass.php";?>
  <?php include "header.php";?>

  <form action="index.php" method="post">
    <select name="feed">
        <option value="http://feeds.bbci.co.uk/news/rss.xml">BBC</option>
        <option value="http://www.aftonbladet.se/sportbladet/rss.xml">Sportbladet</option>
      </select>
      <select name="sort_By">
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
        // Skapar Array för att kunna sortera xml data
        $items=array();
        foreach ($xml->channel->item as $read) {
          $items[] = $read;

        }
          $sorting= new Sort();
          // Sortera på publiceringsDatum
        if($sort=="pubDate"){
          $sorting->sort_By_pubDate($items);
        }
        elseif ($sort=="title") {
          $sorting->sort_By_Title($items);

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

          echo "<h1>".$html,"</h1>", "\n";
        }





    }




   ?>
     <?php include "footer.php";?>
