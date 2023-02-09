<?php 
    $old_item_no = $_GET["item_no"];
    $item_no = $_GET["item_no"];
    $item_name = $_POST["item_name"];
    $price = $_POST["price"];
    $location = $_POST["location"];
    $qty_on_hand = $_POST["qty_on_hand"];
    $reorder_pt = $_POST["reorder_pt"];
    $sup_no = $_POST["sup_no"];
    $name = $_FILES["myFile"]["name"];
    $type = $_FILES["myFile"]["type"];
    if ($name != null){
        $data = addslashes(file_get_contents($_FILES["myFile"]["tmp_name"])); 
    }
    require_once "../config.php";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if (!$conn){
        die("ERROR: ".mysqli_connect_error());
    }
    $sql = "UPDATE inventory SET ";
    if ($name != null){
        $sql = $sql."image_name='$name',image_type='$type',image_data='$data',";
    }
    $sql=$sql."item_no='$item_no',item_name='$item_name',
    price='$price',location='$location',qty_on_hand='$qty_on_hand',
    reorder_pt='$reorder_pt',sup_no='$sup_no' WHERE item_no='$old_item_no'";
    if (mysqli_query($conn,$sql)){
        printf("Update Successfully!");
        header("Refresh:2;url=inventory_list.php");
    }else{
        printf("ERROR!: ".mysqli_error($conn));
    }
    mysqli_close($conn);
?>