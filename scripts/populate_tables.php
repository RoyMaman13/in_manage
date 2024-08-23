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
    $db->insert("
        INSERT INTO posts (id, user_id, title, content) 
        VALUES (:id, :user_id, :title, :content)
        ON DUPLICATE KEY UPDATE 
            title = VALUES(title), 
            content = VALUES(content)", [
        ':id' => $post['id'],
        ':user_id' => $post['userId'],
        ':title' => $post['title'],
        ':content' => $post['body']
    ]);
}
?>
