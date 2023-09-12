<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$id = $_GET['id'];
$currentId = 1;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $note = $db->query('SELECT * FROM `posts` WHERE id= :id', [
        'id' => $id ])->findOrFail();

    authorize($note['user_id'] === $currentId);

    $db->query('DELETE  FROM `posts` WHERE id = :id', [
        'id' => $id
    ]);
    header('location: /notes');
    exit();
}else {
    $note = $db->query('SELECT * FROM `posts` WHERE id= :id', ['id' => $id])->findOrFail();

    authorize($note['user_id'] === $currentId);

    view('/notes/show.view.php', [
        'heading' => "Note",
        'note' => $note
    ]);
}

