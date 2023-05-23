<?php
ob_start();
foreach ($users as $user) {
    $id = $user->getId();
    echo "<li>{$user->getName()} - {$user->getEmail()} <a href='" . BASE_PATH . "edit/{$id}'>Edit</a> <a href='" . BASE_PATH . "delete/{$id}'>Delete</a></li>";
    }
$content = ob_get_clean();
require __DIR__ . '/../layout.php';
?>