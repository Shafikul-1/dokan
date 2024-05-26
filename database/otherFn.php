<?php
class otherFn
{
    public function strSort($text, $count)
    {
        $words = explode(' ', $text);
        $firstNWords = array_slice($words, 0, $count);
        return implode(' ', $firstNWords);
    }
    public function randNumberCreate($value)
    {
        $arr = array();
        array_push($arr, $value);

        // Unique Array Value
        $values = array_unique($arr);

        // Retrieve the keys of the array
        $keys = array_keys($values);

        // Check if an index is already set in the session
        if (isset($_SESSION['array_index'])) {
            // Decrement the index to get the previous value
            $_SESSION['array_index'] = ($_SESSION['array_index'] - 1 + count($keys)) % count($keys);
        } else {
            // Initialize the index to the last position
            $_SESSION['array_index'] = count($keys) - 1;
        }

        // Get the current key based on the session index
        $current_key = $keys[$_SESSION['array_index']];

        // Get the current value from the array
        $current_value = $values[$current_key];

        // Output the current value (or use it as needed)
        echo "Current Value: " . $current_value;
        return $current_value;
    }

    public function uniqueIdCreate()
    {
        $unique = uniqid();
        date_default_timezone_set("Asia/Dhaka");
        $timeCurrent = date("dmYhisA");
        return $unique.$timeCurrent;
    }
}
