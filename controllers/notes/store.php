<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

if (!Validator::string($_POST['title'], 1, 100)) {
    $errors['title'] = 'A title of no more than 100 words is required';
}
elseif (!Validator::string($_POST['description'], 1, 1000)) {
    $errors['description'] = 'A description of no more than 1000 words is required';
}
else{
    if (!empty($errors)) {
        view('/notes/create.view.php', [
            'heading' => "Create Note",
            'errors' => $errors
        ]);
    }
    $db->query('INSERT INTO `posts` (`title`,`description`,`user_id`) VALUES(:title, :description, :user_id)', [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'user_id' => 1,
    ]);

    header('location: /notes');
    die();
}
