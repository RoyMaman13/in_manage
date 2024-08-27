<?php
require __DIR__ . '/../classes/Database.php';
$db = new Database();
$conn = $db->getConnection();

$current_month = date('m');
$last_post = $db->select("SELECT posts.title, posts.content, users.name 
                         FROM users 
                         JOIN posts ON users.id = posts.user_id 
                         WHERE MONTH(users.birthday) = :current_month 
                         ORDER BY posts.creation_date_time DESC 
                         LIMIT 1", [':current_month' => $current_month]);

?>

<!DOCTYPE html>
<html lang="en">
<body>

<?php
if ($last_post) {
    echo "<img src='/../assets/avatar.jpg' alt='Avatar' style='width:50px;height:50px;'>";
    echo "<h2 style='display: inline; margin: 0;'>{$last_post[0]['name']}</h2>";
    echo "<h3 style='margin-left: 50px;'>{$last_post[0]['title']}</h3>";
    echo "<p style='margin-left: 50px;'>{$last_post[0]['content']}</p>";
} else {
    echo "<p>No posts found for users with a birthday this month.</p>";
}
?>

</body>
</html>
