<?php 
    include "connection/config.php";
    session_start();
    if(isset($_SESSION['id'])){
        header("Location: getAll.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>

<head>
      <title>Login Form</title>
      <link rel="stylesheet" href="css/style.css">
</head>

<body>
      <div class="main">
            <h1>LOGIN</h1>
            <h3>Enter your login credentials</h3>
            <form action="" method="POST">
                  <label for="first">
                        Username:
                  </label>
                  <input type="text" 
                         id="name" 
                         name="name" 
                         placeholder="Enter your Username" required>

                  <label for="password">
                        Password:
                  </label>
                  <input type="password"
                         id="password" 
                         name="password"
                         placeholder="Enter your Password" required>

                  <div class="wrap">
                        <button type="submit"
                                name="save" id="save">
                              Login
                        </button>
                  </div>
            </form>
            <?php 
                if(isset($_POST['save'])){
                    $name = $_POST['name'];
                    $password = $_POST['password'];

                    $login = "SELECT id FROM crud WHERE name = '$name' AND password = '$password'";
                    $data = mysqli_query($conn, $login);

                    if(mysqli_num_rows($data)>0){
                        $row = mysqli_fetch_assoc($data);
                        $_SESSION['id'] = $row['id'];
                        header("Location: getAll.php");
                    }else{
                        echo '<p style = "color: red">'; 
                        echo 'Invalide Creadintials';
                        echo '</p>';
                    }
                }
            ?>
            <p>Not registered?
                  <a href="index.php"
                     style="text-decoration: none;">
                        Create an account
                  </a>
            </p>

      </div>
</body>

</html>