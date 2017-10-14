<?php
class Sort {

    public function sort_ByPubDate(&$items) {
        usort($items, function($a, $b) {
            if (strtotime($a->pubDate) == strtotime($b->pubDate)) {
                return 0;
            }
            return strtotime($a->pubDate) > strtotime($b->pubDate) ? -1 : 1;
        });
    }

    public function sort_ByTitle(&$items) {
        usort($items, function($a, $b) {
            if ($a->title == $b->title) {
                return 0;
            }
        return (string) $a->title < (string) $b->title ? -1 : 1;
            //return $a->title->__toString() < $b->title->__toString() ? -1 : 1;
        });
    }
}

?>
