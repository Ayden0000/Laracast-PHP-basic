<?php
require base_path("Validator.php");
$errors = [];

$config = require base_path('config.php');
$db = new Database($config['database']);

if($_SERVER['REQUEST_METHOD']=== 'POST')
{
    if(! Validator::string($_POST['title'], 1, 100)){
        $errors['title'] = 'A title of no more than 100 words is required';
    }
    if(! Validator::string($_POST['description'], 1, 1000)){
        $errors['description'] = 'A description of no more than 1000 words is required';
    }
    if(empty($errors)){
        $db->query('INSERT INTO `posts` (`title`,`description`,`user_id`) VALUES(:title, :description, :user_id)' ,[
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'user_id' => 1,
        ]);
    }
}

view('/notes/create.view.php', [
    'heading' => "Create Note",
    'errors' => $errors
]);