<?php
class otherFn
{
    public function strSort($text, $count)
    {
        $words = explode(' ', $text);
        $firstNWords = array_slice($words, 0, $count);
        return implode(' ', $firstNWords);
    }

    public function uniqueIdCreate()
    {
        $unique = uniqid();
        date_default_timezone_set("Asia/Dhaka");
        $timeCurrent = date("dmYhisA");
        return $unique.$timeCurrent;
    }
}
