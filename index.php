<?php

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
        require 'scripts/create_tables.php';
        require 'scripts/populate_tables.php';
        require 'scripts/fetch_image.php';
        require 'views/Home.php';        
        break;
}
?>
