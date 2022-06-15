<?php
if (!function_exists('title')) {
    function title($title = null)
    {
        if ($title != null) {
            $value = "D M Prints: " . $title;
        } else {
            $value = "D M Prints";
        }
        return $value;
    }
}
if (!function_exists('pr')) {
    function pr($arr)
    {
        echo '<pre>';
        print_r($arr);
        echo "</pre>";
    }
}
if (!function_exists('activeTag')) {
    function activeTag($urlName, $secondUrl)
    {
        if (current_url() != site_url($urlName)) {

            $ActiveValue  =  current_url() == site_url($secondUrl) ? 'nav-link active  py-2' : 'nav-link py-2';
        } else {

            $ActiveValue  =  current_url() == site_url($urlName) ? 'nav-link active  py-2' : 'nav-link py-2';
        }
        return $ActiveValue;
    }
}
