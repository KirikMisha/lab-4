<?php 
include 'database.php';
$id = (int) $_GET['id'];
$db->query('DELETE FROM list WHERE id="'.$id.'"');
header('location: index.php?page_layout=list');
?>