<?php
require_once 'autoload.php';

$crud = new Crud();

if(isset($_GET['id'])) {
    $id = $crud->escape_string($_GET['id']);
    $result = $crud->getData("SELECT * FROM users WHERE id=$id");

    // Check if data is fetched successfully
    if($result) {
        $res = $result[0];
        // Initialize variables with fetched data
        $name = $res['name'];
        $email = $res['email'];
        $phone = $res['phone'];
        $address = $res['address'];
    } else {
        echo "No data found for id: $id";
        exit;
    }
} else {
    echo "ID parameter is missing in the URL.";
    exit;
}
?>
<html>
<head>
    <title>Edit Data</title>
</head>
<body>
    <h1>Update student details</h1>
    <form name="form1" method="post" action="updateDetails.php">
        <table border="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name ?? ''; ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $email ?? ''; ?>"></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone" value="<?php echo $phone ?? ''; ?>"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address" value="<?php echo $address ?? ''; ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $_GET['id'] ?? ''; ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
