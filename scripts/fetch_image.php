<?php
$image_url = 'https://cdn2.vectorstock.com/i/1000x1000/23/81/default-avatar-profile-icon-vector-18942381.jpg';
$image_path = 'assets/avatar.jpg';

// Check if the assets directory exists; if not, create it
$dir = dirname($image_path);
if (!is_dir($dir)) {
    if (!mkdir($dir, 0755, true)) {
        die("Failed to create directory: $dir");
    }
}

// Fetch the image data
$image_data = file_get_contents($image_url);
if ($image_data === false) {
    die("Failed to fetch the image from URL: $image_url");
}

// Save the image
if (file_put_contents($image_path, $image_data) === false) {
    die("Failed to save the image to: $image_path");
}
?>
