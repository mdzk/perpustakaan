<?php 
    if(! function_exists('get_url')) {
        function get_url($segmentNumber, $segmentValue) {
            $uri = current_url(true);
            return $uri->getSegment($segmentNumber) == $segmentValue;
        }
    }
?>