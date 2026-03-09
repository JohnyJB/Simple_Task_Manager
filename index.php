
<?php
$tasks = json_decode(file_get_contents('tasks.json'), true);
?>


<!DOCTYPE HTML>
<html>
<head>
    <title>Administrador de Tareas</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>

    <h1>Task Manager</h1>

    <form id="taskform" method="POST">

    <input type="text" name="task" id="taskinput" placeholder="Nueva tarea">
    <div id="taskerrorname"></div>
    <input type="text" name="taskdescription" id="taskdescinput" placeholder="Descripción">
    <div></div>
    <button type="submit">Agregar</button>

    </form>

    <ul id="tasklist">
        <?php foreach($tasks as $index => $task): ?>

            <li>
            <input type="checkbox" class="taskcheck" data-id="<?= $index ?>" <?= $task['completed'] ? "checked" : "" ?>>
            <span class="<?= $task['completed'] ? "done" : "" ?>">
            <?= htmlspecialchars($task['name']) ?>
            <?= htmlspecialchars($task['description'] ?? "") ?>
            </span>

            </li>
        <?php endforeach; ?>
    </ul>

    <script src="assets/script.js"></script>

</body>
</html>