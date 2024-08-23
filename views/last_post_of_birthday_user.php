<?php

$current_month = date('m');
$last_post = $db->select("SELECT posts.title, posts.content, users.name 
                         FROM users 
                         JOIN posts ON users.id = posts.user_id 
                         WHERE MONTH(users.birthday) = :current_month 
                         ORDER BY posts.creation_date DESC 
                         LIMIT 1", [':current_month' => $current_month]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Last Post of Birthday User</title>
</head>
<body>

<h1>Last Post by User with Birthday This Month</h1>

<?php
if ($last_post) {
    echo "<h1>{$last_post[0]['name']}</h2>";
    echo "<h2>{$last_post[0]['title']}</h2>";
    echo "<p>{$last_post[0]['content']}</p>";
} else {
    echo "<p>No posts found for users with a birthday this month.</p>";
}
?>

</body>
</html>
