<?php

$db = new SQLite3('products_crud.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);

$id = $_POST['id'] ?? null;

if (!$id) {
  header('Location: index.php');
  exit;
}

$statement = $db->prepare('DELETE FROM products '
          . 'WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: index.php');
