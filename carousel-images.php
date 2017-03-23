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
    //echo "i = " . $i . "\n";
    //echo "slide_num_json = " . $jsonArray['slide_num'] . "\n";
    $file = $files[$i];
    if ($i == $jsonArray['slide_num'] - 1) {
        echo '<div class="item active">' . "\n";
        if ($i == $num_files - 1) {
            // echo $i . $num_files;
            $jsonArrayCopy['slide_num'] = 1;     
        }
        else {
            $jsonArrayCopy['slide_num'] = $jsonArray['slide_num'] + 1;     
        }    
    }
    else {
        echo '<div class="item">' . "\n";
    }
    echo "<img src=\"$dir$file\" alt=\"slide$i\" width=100% height=100%>\n";
    echo '</div>' . "\n";
} 
$newJsonString = json_encode($jsonArrayCopy);
//print_r($jsonArrayCopy);
file_put_contents('config.json', $newJsonString); 
?>
