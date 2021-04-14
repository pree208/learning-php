<?php

$id = $GET['id'] ?? null;

if (!$id) {
  header('Location:index.php');
  exit;
}
