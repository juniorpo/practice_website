<?php 
    $item_no=$_GET["item_no"];
    require_once "../config.php";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if (!$conn){
        die("ERROR: ".mysqli_connect_error($conn));
    }
    $sql="DELETE FROM inventory WHERE item_no='$item_no'";
    if (mysqli_query($conn,$sql)){
        printf("Delete Successfully");
        header("Refresh:2;url=inventory_list.php");
    }else{
        printf("ERROR!: ".mysqli_error($conn));
    }
    mysqli_close($conn);
?>