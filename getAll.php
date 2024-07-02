<?php
    include "connection/config.php";
    session_start();

    if(!isset($_SESSION['id'])){
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <div class="button-container">
        <a href="logout.php">
            <button class="logout">Logout</button>
        </a>
    </div>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
    <?php 
        $select = "SELECT * FROM crud";
        $data = mysqli_query($conn, $select);
        $result = mysqli_num_rows($data);

        if($result){
            while($row = mysqli_fetch_array($data)){
    ?>
        <tr>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['phone'] ?></td>
            <td><?php echo $row['password'] ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>"><button class="edit">Edit</button></a>
                <a href="delete.php?id=<?php echo $row['id']; ?>"><button class="delete">Delete</button></a>
            </td>
        </tr>
    <?php 
            }
        }
    ?>
    </table>
</body>
</html>
