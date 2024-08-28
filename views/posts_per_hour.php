<?php
require __DIR__ . '/../classes/Database.php';
$db = new Database();
$conn = $db->getConnection();

$posts_per_hour = $db->select("SELECT HOUR(creation_date_time) as hour, COUNT(*) as posts_count 
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

<table border="1">
    <tr>
        <th>Date and Time</th>
        <th>Amount of Posts</th>
    </tr>

    <?php
    foreach ($posts_per_hour as $row) {
        echo "<tr><td>{$row['hour']}:00</td><td>{$row['posts_count']}</td></tr>";
    }
    ?>
</table>

</body>
</html>
