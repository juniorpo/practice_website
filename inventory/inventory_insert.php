<?php 
    $item_no = $_POST["item_no"];
    $item_name = $_POST["item_name"];
    $price = $_POST["price"];
    $location = $_POST["location"];
    $qty_on_hand = $_POST["qty_on_hand"];
    $reorder_pt = $_POST["reorder_pt"];
    $sup_no = $_POST["sup_no"];
    $name = $_FILES["myFile"]["name"];
    $type = $_FILES["myFile"]["type"];
    $data = addslashes(file_get_contents($_FILES["myFile"]["tmp_name"])); 
    require_once "../config.php";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if (!$conn){
        die("ERROR: ".mysqli_connect_error());
    }
    $sql="INSERT INTO inventory (item_no,item_name,price,location,qty_on_hand,reorder_pt,sup_no
    ,image_name,image_type,image_data) 
    VALUES ('$item_no','$item_name','$price','$location','$qty_on_hand','$reorder_pt','$sup_no'
    ,'$name','$type','$data')";
    if (mysqli_query($conn,$sql)){
        printf("Insert Successfully!");
        header("Refresh:2;url=inventory_list.php");
    }else{
        printf("ERROR!: ".mysqli_error($conn));
    }
    mysqli_close($conn);
?>