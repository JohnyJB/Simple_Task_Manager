<?php
//Actualizar Tarea

$id = $_POST['id'];

$status = $_POST['status'] === "true";

$tasks = json_decode(file_get_contents('tasks.json'), true);

$tasks[$id]['completed'] = $status;

file_put_contents('tasks.json', json_encode($tasks));

echo json_encode(["status"=>"updated"]);