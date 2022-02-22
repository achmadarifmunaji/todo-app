<?php
$todoName = $_POST["todoName"];

// get todo.json
$todos = json_decode(file_get_contents('todo.json'), true);

// select $todos index and delete it
foreach ($todos as $i => $todo) {

    if ($i == $todoName) {

        unset($todos[$i]);

        file_put_contents('todo.json', json_encode($todos, JSON_PRETTY_PRINT));
    }
}

header('Location: index.php');
