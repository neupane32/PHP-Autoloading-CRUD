<?php
require_once 'autoload.php';

$crud = new Crud();
$validation = new Validation();

if(isset($_POST['update'])) {
    $id = $crud->escape_string($_POST['id']);

    // Validating inputs
    $msg = $validation->check_empty($_POST, array('name', 'email', 'phone', 'address'));
    $check_name = $validation->is_name_valid($_POST['name']);
    $check_email = $validation->is_email_valid($_POST['email']);
    $check_phone = $validation->is_phone_valid($_POST['phone']);
    $check_address = $validation->is_address_valid($_POST['address']);

    // Checking empty fields
    if($msg != null) {
        echo $msg;
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } elseif (!$check_name) {
        echo 'Please provide a valid name.';
    } elseif (!$check_email) {
        echo 'Please provide a valid email.';
    } elseif (!$check_phone) {
        echo 'Please provide a valid phone number.';
    } elseif (!$check_address) {
        echo 'Please provide a valid address.';
    } else {
        $name = $crud->escape_string($_POST['name']);
        $email = $crud->escape_string($_POST['email']);
        $phone = $crud->escape_string($_POST['phone']);
        $address = $crud->escape_string($_POST['address']);

        $result = $crud->execute("UPDATE users SET name='$name', email='$email', phone='$phone', address='$address' WHERE id=$id");

        // Redirect to homepage 
        header("Location: index.php");
    }
}
?>
