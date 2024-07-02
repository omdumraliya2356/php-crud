<?php 

include "connection/config.php";

$id = $_GET['id'];

$delete = "DELETE FROM crud WHERE id='$id'";
$data = mysqli_query($conn, $delete);

if($data){
   header("Location: getAll.php");
}else{
    echo "error". $conn->error;
}

?>