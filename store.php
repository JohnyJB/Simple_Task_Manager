<?php
//Nueva tarea

$taskName = $_POST['task'];
$description = $_POST['description'] ?? "";

$tasks = json_decode(file_get_contents('tasks.json'), true);

$tasks[] = [
    "name" => $taskName,
    "description" => $description,
    "completed" => false
];

file_put_contents('tasks.json', json_encode($tasks));

echo json_encode(["status"=>"ok"]);