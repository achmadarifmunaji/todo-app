<?php

// get todo.json and coverte into array
$datas = json_decode(file_get_contents('todo.json'), true);

// var_dump($data);

// $data = $data ?? false;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo-App</title>
</head>

<body>
    <form action="todo.php" method="POST">
        <input type="text" name="todoName">
        <button type="submit">Add</button>
    </form>
    <?php foreach ($datas as $todoName => $todo) : ?>
        <div>
            <form action="change_status.php" method="post" style="display: inline-block;">
                <input type="hidden" name="todoName" value="<?= $todoName ?>">
                <input type="checkbox" name="" id="" <?= $todo['completed'] ? 'checked' : '' ?>>
            </form>
            <?= $todoName; ?>
            <form action="delete.php" method="post" style="display: inline-block;">
                <input type="hidden" name="todoName" value="<?= $todoName ?>">
                <button type="submit">Delete</button>
            </form>
        </div>
    <?php endforeach; ?>

    <script>
        const checkboxs = document.querySelectorAll('input[type=checkbox]');

        // checkboxs.forEach(ch => {
        //     ch.onclick = function() {
        //         this.parentNode.submit();
        //         console.log(this.parentNode);
        //     };
        // });

        checkboxs.forEach(function(el) {
            el.addEventListener('click', function(e) {
                e.target.parentNode.submit();
                // console.log(e.target.parentNode);
            })
        });
    </script>
</body>

</html>