<?php

$dir_handle = opendir("audio");
$allowed_extensions = ["mp3", "flac", "wav", "ogg"];

while (($file_name = readdir($dir_handle)) != false) {
	$file_path = pathinfo($file_name); 	
	if ($file_name == "." || $file_name == ".." || !in_array($file_path['extension'], $allowed_extensions) ) {
		continue;
	}
	
	echo '<div class="player">';
	echo '<div>';
	echo '<audio controls preload="none">';
	echo sprintf('<source src="audio/%s">', $file_name);
	echo '</audio>';
	echo '</div>';
	echo sprintf('<div class="item">%s</div>', $file_name);
	echo '</div>';
}

closedir($dir_handle);

?>
