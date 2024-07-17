<?php
// Include the autoload file
require_once 'autoload.php';

// Manually include config for the first time
require_once './Config/config.php';

// Create an instance of Crud class
$crud = new Crud();

// Fetching data of students
$query = "SELECT * FROM users";
$result = $crud->getData($query);
?>

<html>
<head>
    <title>Homepage</title>
</head>
<body>
    <h1>View Student Details</h1>
    <a href="./view/add.html">Add New Student Data</a><br /><br/>

    <table width='80%' border=1>
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Address</td>
            <td>Update</td>
        </tr>
        <?php
        foreach ($result as $key => $res) {
            echo "<tr>";
            echo "<td>" . $res['name'] . "</td>";
            echo "<td>" . $res['email'] . "</td>";
            echo "<td>" . $res['phone'] . "</td>";
            echo "<td>" . $res['address'] . "</td>";
            echo "<td>
                  <a href=\"edit.php?id=$res[id]\">Edit</a> |
                  <a href=\"delete.php?id=$res[id]\">Delete</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
