<?php
// index.php

// Run all scripts at server start (or when the index is accessed)
require 'scripts/create_tables.php';

// Include and run the script to populate the tables with data
require 'scripts/populate_tables.php';

// Include and run the script to fetch and save the avatar image
require 'scripts/fetch_image.php';

// Optionally, handle routing for other pages
$page = isset($_GET['page']) ? $_GET['page'] : 'Home';
echo "<h1 style='text-align: center;'>$page</h1>";

switch ($page) {
    case 'active_users':
        require 'views/display_active_users.php';
        break;
    case 'birthday_post':
        require 'views/last_post_of_birthday_user.php';
        break;
    case 'posts_per_hour':
        require 'views/posts_per_hour.php';
        break;
    default:
        require 'views/Home.php';        
        break;
}
?>
