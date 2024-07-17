<?php
require_once 'autoload.php';

$crud = new Crud();

$id = $crud->escape_string($_GET['id']);

//$result = $crud->execute("DELETE FROM users WHERE id=$id");
$result = $crud->delete($id, 'users');

if ($result) {
    //redirecting to the display page.
    header("Location:index.php");
}
?>