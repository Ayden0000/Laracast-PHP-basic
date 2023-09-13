<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$currentId = 1;

$note = $db->query('SELECT * FROM `posts` WHERE id= :id', [
    'id' => $_POST['id']])->findOrFail();

authorize($note['user_id'] === $currentId);

$db->query('DELETE  FROM `posts` WHERE id = :id', [
    'id' => $_POST['id']
]);
header('location: /notes');
exit();