<?php

require "Response.php";
$heading = "Note";

$config = require('config.php');
$db = new Database($config['database']);

$id = $_GET['id'];
$currentId = 1;

$note = $db->query('SELECT * FROM `posts` WHERE id= :id', ['id' => $id])->findOrFail();

authorize($note['user_id'] === $currentId);

require "views/note.view.php";