<?php
$active_users = $db->select("SELECT users.id, users.name, users.email, posts.title, posts.content 
                            FROM users 
                            JOIN posts ON users.id = posts.user_id 
                            WHERE users.active = 1 AND posts.active = 1");

foreach ($active_users as $user) {
    echo "<div class='user'>";
        echo "<img src='/../assets/avatar.jpg' alt='Avatar' style='width:50px;height:50px;'>";
        echo "<h2 style='display: inline; margin: 0;'>{$user['name']} ({$user['email']})</h2>";
        echo "<h3 style='margin-left: 50px;'>Title : {$user['title']}</h3>";
        echo "<p style='margin-left: 50px;'>Content: {$user['content']}</p>";
    echo "</div>";
}
?>
