<?php 
    $sup_no = $_POST["sup_no"];
    $sup_company = $_POST["sup_company"];
    $sup_contact = $_POST["sup_contact"];
    $sup_telephone = $_POST["sup_telephone"];
    $sup_email = $_POST["sup_email"];
    require_once "../config.php";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if (!$conn){
        die("ERROR: ".mysqli_connect_error());
    }
    $sql="INSERT INTO supplier (sup_no,sup_company,sup_contact,sup_telephone,sup_email) 
    VALUES ('$sup_no','$sup_company',$sup_contact,'$sup_telephone',$sup_email)";
    if (mysqli_query($conn,$sql)){
        printf("Insert Successfully!");
        header("Refresh:2;url=supplier_list.php");
    }else{
        printf("ERROR!: ".mysqli_error($conn));
    }
    mysqli_close($conn);
?>