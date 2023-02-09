<?php 
    $sup_no=$_GET["sup_no"];
    require_once "../config.php";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if (!$conn){
        die("ERROR: ".mysqli_connect_error($conn));
    }
    $sql="DELETE FROM supplier WHERE sup_no='$sup_no'";
    if (mysqli_query($conn,$sql)){
        printf("Delete Successfully");
        header("Refresh:2;url=supplier_list.php");
    }else{
        printf("ERROR!: ".mysqli_error($conn));
    }
    mysqli_close($conn);
?>