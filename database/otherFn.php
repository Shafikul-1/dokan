<?php 
class otherFn{
    public function strSort($text, $count){
        $words = explode(' ', $text);
        $firstNWords = array_slice($words, 0, $count);
        return implode(' ', $firstNWords);
    }
}

?>