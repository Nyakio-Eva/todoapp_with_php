<?php
require_once __DIR__ . '/../dbConfig.php';

$sql=$connection->prepare("DELETE FROM tasks WHERE id=?");

$sql->excecute();

echo "Tasks deleted successfully!";

