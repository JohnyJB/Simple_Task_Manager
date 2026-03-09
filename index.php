
<?php
$tasks = json_decode(file_get_contents('tasks.json'), true);
?>


<!DOCTYPE HTML>
<html>
<head>
    <title>Administrador de Tareas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <div class="container py-5"></div>
    <h1 class="text-center mb-4">Task Manager</h1>

    <form id="taskform" method="POST">
    <div class="mb-3">  
    <input type="text" name="task" id="taskinput" placeholder="Nueva tarea" class="form-control">
    <div id="taskerrorname"></div>
    <input type="text" name="taskdescription" id="taskdescinput" placeholder="Descripción" class="form-control">
    <div></div>
    <button type="submit" class="btn btn-primary w-100">Guardar</button>
    </div>
    </form>

<ul id="tasklist" class="list-group">

<?php foreach($tasks as $index => $task): ?>

<li class="list-group-item d-flex align-items-center gap-3 <?= $task['completed'] ? 'bg-success' : 'bg-warning' ?>">

<input type="checkbox" class="taskcheck" data-id="<?= $index ?>" <?= $task['completed'] ? "checked" : "" ?>>
<div>
<span class="<?= $task['completed'] ? "text-decoration-line-through text-dark" : "" ?>">
<strong><?= htmlspecialchars($task['name']) ?></strong>
</span>
<br>
<small>
<?= htmlspecialchars($task['description'] ?? "") ?>
</small>
</div>
</li>
<?php endforeach; ?>
</ul>

    <script src="assets/script.js"></script>

</body>
</html>