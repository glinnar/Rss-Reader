<?php
class Sort {
        // Sorterar på PubliceringsDatum
    public function sort_By_pubDate(&$items) {
        usort($items, function($a, $b) {
            if (strtotime($a->pubDate) == strtotime($b->pubDate)) {
                return 0;
            }
            return strtotime($a->pubDate) > strtotime($b->pubDate) ? -1 : 1;
        });
    }
     // Sorterar på Titel
    public function sort_By_Title(&$items) {
        usort($items, function($a, $b) {
            if ($a->title == $b->title) {
                return 0;
            }
            return $a->title->__toString() < $b->title->__toString() ? -1 : 1;
        });
    }
}

?>
