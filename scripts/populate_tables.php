<?php
// Fetching and inserting users
$users_url = 'https://jsonplaceholder.typicode.com/users';
$users_response = file_get_contents($users_url);
$users = json_decode($users_response, true);

$startDate = '1980-01-01';
$endDate = '2000-12-31';

function randomDate($startDate, $endDate) {
    $startTimestamp = strtotime($startDate);
    $endTimestamp = strtotime($endDate);
    $randomTimestamp = mt_rand($startTimestamp, $endTimestamp);

    return date("Y-m-d", $randomTimestamp);
}

function randomHour() {
    $hours = str_pad(mt_rand(0, 23), 2, '0', STR_PAD_LEFT);
    $minutes = str_pad(mt_rand(0, 59), 2, '0', STR_PAD_LEFT);
    
    return "$hours:$minutes:00"; // Ensure the time is in HH:MM:SS format
}

// Fetching and inserting users
foreach ($users as $user) {
    $birthday = randomDate($startDate, $endDate);
    $db->insert("
        INSERT INTO users (id, name, email, birthday) 
        VALUES (:id, :name, :email, :birthday)
        ON DUPLICATE KEY UPDATE name = VALUES(name), email = VALUES(email), birthday = VALUES(birthday)", [
        ':id' => $user['id'],
        ':name' => $user['name'],
        ':email' => $user['email'],
        ':birthday' => $birthday
    ]);
}

// Fetching and inserting posts
$posts_url = 'https://jsonplaceholder.typicode.com/posts';
$posts_response = file_get_contents($posts_url);
$posts = json_decode($posts_response, true);

// Fetching and inserting posts
foreach ($posts as $post) {
    $creation_date = randomDate($startDate, $endDate);
    $creation_time = randomHour();
    $creation_date_time = "{$creation_date} {$creation_time}";
    $db->insert("
        INSERT INTO posts (id, user_id, title, content, creation_date_time) 
        VALUES (:id, :user_id, :title, :content, :creation_date_time)
        ON DUPLICATE KEY UPDATE 
            title = VALUES(title), 
            content = VALUES(content),
            creation_date_time = VALUES(creation_date_time)", [
        ':id' => $post['id'],
        ':user_id' => $post['userId'],
        ':title' => $post['title'],
        ':content' => $post['body'],
        ':creation_date_time' => $creation_date_time
    ]);
}
?>
