<?php 
    $sup_no = $_GET["sup_no"];
    $old_sup_no = $_GET["sup_no"];
    $sup_company = $_POST["sup_company"];
    $sup_contact = $_POST["sup_contact"];
    $sup_telephone = $_POST["sup_telephone"];
    $sup_email = $_POST["sup_email"];
    require_once "../config.php";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if (!$conn){
        die("ERROR: ".mysqli_connect_error());
    }
    $sql="UPDATE supplier SET sup_no='$sup_no',sup_company='$sup_company',
    sup_contact='$sup_contact',sup_telephone='$sup_telephone',sup_email='$sup_email'
    WHERE sup_no='$old_sup_no'";
    if (mysqli_query($conn,$sql)){
        printf("Update Successfully!");
        header("Refresh:2;url=supplier_list.php");
    }else{
        printf("ERROR!: ".mysqli_error($conn));
    }
    mysqli_close($conn);
?>