<?php

// take json file
$json = json_decode(file_get_contents('todo.json'), true);

// take $_POST data
$todoName = $_POST["todoName"];

// change the completed value to true or false
// if ($json[$todoName]['completed']) {

//     $json[$todoName]['completed'] = false;
// } else {
//     $json[$todoName]['completed'] = true;
// }

$json[$todoName]['completed'] = !$json[$todoName]['completed'];

// update json file

file_put_contents('todo.json', json_encode($json, JSON_PRETTY_PRINT));

header('Location: index.php');
