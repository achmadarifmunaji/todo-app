<?php

$todoName = $_POST['todoName'] ?? false;

// remove whitespace
$todoName = trim($todoName);

if ($todoName) {
    $json = json_decode(file_get_contents('todo.json'), true);
    $json[$todoName] = ['completed' => false];

    file_put_contents('todo.json', json_encode($json, JSON_PRETTY_PRINT));
}

header('Location: index.php');
