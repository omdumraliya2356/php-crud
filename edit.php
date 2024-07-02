<?php 
    include "connection/config.php";
    session_start();
    if(!isset($_SESSION['id'])){
        header("index.php");
        exit();
    }

    $id = $_GET['id'];
    $select = "SELECT * FROM crud WHERE id = '$id'";
    $data = mysqli_query($conn, $select);
    $result = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>

<head>
      <title>Update Form</title>
      <link rel="stylesheet" href="css/style.css">
</head>

<body>
      <div class="main">
            <h3>Update User</h3>
            <form action="" method="POST">
                  <label for="first">
                        Username:
                  </label>
                  <input type="text" 
                         id="name" 
                         name="name" 
                         placeholder="Enter your Username"
                         value="<?php echo $result['name']; ?>">

                  <label for="email">
                        Email:
                  </label>
                  <input type="email"
                         id="email" 
                         name="email"
                         placeholder="Enter your Email" 
                         value="<?php echo $result['email']; ?>">

                  <label for="phone">
                        Phone:
                  </label>
                  <input type="phone"
                         id="phone" 
                         name="phone"
                         placeholder="Enter your Phone" 
                         value="<?php echo $result['phone']; ?>">

                  <label for="password">
                        Password:
                  </label>
                  <input type="text"
                         id="password" 
                         name="password"
                         placeholder="Enter your Password" 
                         value="<?php echo $result['password']; ?>">

                  <div class="wrap">
                        <button type="submit"
                                name="update" id="update">
                              Update
                        </button>
                  </div>
            </form>
            <?php 
                if(isset($_POST['update'])){
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $password = $_POST['password'];

                    $update = "UPDATE crud SET name = '$name', email = '$email', phone = '$phone', password = '$password' WHERE id = '$id'";
                    $data = mysqli_query($conn, $update);

                    if($data){
                        header("Location: getAll.php");
                    }else{
                       $conn->error;
                    }
                }
            ?>
            <p>
                  <a href="getAll.php"
                     style="text-decoration: none;">
                        Back
                  </a>
            </p>
      </div>
</body>

</html>