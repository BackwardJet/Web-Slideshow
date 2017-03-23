<?php
    
$dir = "uploads/";

$files = array_filter(scandir($dir), function($item) {
    global $dir;
    return !is_dir($dir . $item);
});

$files = array_values($files);
$num_files = count($files);

$jsonString = file_get_contents('config.json');
$jsonArray = json_decode($jsonString, true);
$jsonArrayCopy = json_decode($jsonString, true);
//print_r($jsonArray);
$jsonArray['num_slides'] = $num_files;

for($i = 0; $i < $num_files; $i++)
{
    //if ($i == 0) {
    if ($i == $jsonArray['slide_num'] - 1) {
        echo "<li data-target=\"#myCarousel\" data-slide-to=\"$i\" class=\"active\"></li>\n";
    }
    else {
        echo "<li data-target=\"#myCarousel\" data-slide-to=\"$i\"></li>\n";
    }
}
?>
