<?php
require_once 'classes/Database.php';

$db = new Database();
$conn = $db->getConnection();

$posts_per_hour = $db->select("SELECT DATE_FORMAT(creation_date, '%Y-%m-%d %H:00:00') as hour, COUNT(*) as posts_count 
                              FROM posts 
                              GROUP BY hour");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts Per Hour</title>
</head>
<body>

<h1>Number of Posts Per Hour</h1>

<table border="1">
    <tr>
        <th>Date and Time</th>
        <th>Amount of Posts</th>
    </tr>

    <?php
    foreach ($posts_per_hour as $row) {
        echo "<tr><td>{$row['hour']}</td><td>{$row['posts_count']}</td></tr>";
    }
    ?>
</table>

</body>
</html>
