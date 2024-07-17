<html>
<head>
    <title>Add Data</title>
</head>
<body>
    <?php
    // Include the autoload file
    require_once './autoload.php';
    // Manually include config for the first time
    require_once './Config/config.php';

    // Create instances of the classes
    $crud = new Crud();
    $validation = new Validation();

    if (isset($_POST['Submit'])) {
        $name = $crud->escape_string($_POST['name']);
        $email = $crud->escape_string($_POST['email']);
        $phone = $crud->escape_string($_POST['phone']);
        $address = $crud->escape_string($_POST['address']);

        $msg = $validation->check_empty($_POST, array('name', 'email', 'phone', 'address'));
        $check_name = $validation->is_name_valid($_POST['name']);
        $check_email = $validation->is_email_valid($_POST['email']);
        $check_phone = $validation->is_phone_valid($_POST['phone']);
        $check_address = $validation->is_address_valid($_POST['address']);

        // Checking empty fields
        if ($msg != null) {
            echo $msg;
            // Link to the previous page
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
            // Insert data into the database
            $result = $crud->execute("INSERT INTO users(name, email, phone, address) VALUES('$name','$email','$phone','$address')");

            if ($result) {
                echo "<font color='green'>Data added successfully.</font>";
                echo "<br/><a href='index.php'>View details</a>";
            }
        }
    }
    ?>
</body>
</html>
