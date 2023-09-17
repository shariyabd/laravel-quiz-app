<?php

    if (!function_exists('resizeString')) {
        function resizeString($string, $start, $end, $encoder = "utf-8"){
            $stripString = strip_tags($string);
            $newString = mb_strlen($stripString) > $end ? mb_substr($stripString, $start, $end,  $encoder) . '....' : $stripString;
            if($start == 0 && $end == 0){
                $newString = $string;
            }

            return $newString;
        }
    }

?>