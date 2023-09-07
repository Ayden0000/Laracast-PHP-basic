<?php




$config = require base_path('config.php');
$db = new Database($config['database']);

$notes = $db->query('SELECT * FROM `posts` WHERE user_id=1')->get();

view('/notes/show.view.php', [
    'heading' => "My Notes",
    'notes' => $notes
]);