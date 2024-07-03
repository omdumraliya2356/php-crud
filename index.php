<?php 
    include "connection/config.php";
    session_start();
    if(isset($_SESSION['id'])){
        header("getAll.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>

<head>
      <title>Registration Form</title>
      <link rel="stylesheet" href="css/style.css">
</head>

<body>
      <div class="main">
            <h1>REGISTER</h1>
            <h3>Enter your Register credentials</h3>
            <form action="" method="POST">
                  <label for="first">
                        Username:
                  </label>
                  <input type="text" 
                         id="name" 
                         name="name" 
                         placeholder="Enter your Username" required>

                  <label for="email">
                        Email:
                  </label>
                  <input type="email"
                         id="email" 
                         name="email"
                         placeholder="Enter your Email" required>

                  <label for="phone">
                        Phone:
                  </label>
                  <input type="phone"
                         id="phone" 
                         name="phone"
                         placeholder="Enter your Phone" required>

                  <label for="password">
                        Password:
                  </label>
                  <input type="password"
                         id="password" 
                         name="password"
                         placeholder="Enter your Password" required>

                  <div class="wrap">
                        <button type="submit"
                                name="register" id="register">
                              Register
                        </button>
                  </div>
            </form>
            <?php 
                if(isset($_POST['register'])){
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $password = $_POST['password'];

                    $register = "INSERT INTO crud (name, email, phone, password) VALUES ('$name', '$email', '$phone', '$password')";
                    $data = mysqli_query($conn, $register);

                    if($data){
                        $row = mysqli_fetch_assoc($data);
                        $_SESSION['id'] = $row['id'];
                        header("Location: getAll.php");
                    }else{
                       $conn->error;
                    }
                }
            ?>
            <p>Alerady Registered?
                  <a href="login.php"
                     style="text-decoration: none;">
                        Login
                  </a>
            </p>

      </div>
</body>

</html>
