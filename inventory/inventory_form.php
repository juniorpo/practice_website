<?php 
    require_once "../config.php";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if (!$conn){
        die("ERROR: ".mysqli_connect_error());
    }
    $sql="SELECT * FROM supplier";
    $result=mysqli_query($conn,$sql); 
    $select_supplier="";
    while ($row = mysqli_fetch_assoc($result)) {
        $select_supplier=$select_supplier."<option value='".$row['sup_no']."'>".$row['sup_company']."</option>";
    }
    ?>
<form action="inventory_insert.php" method="post" enctype="multipart/form-data">
    item_no<br> <input type="text" name="item_no"><br>
    item_name<br> <input type="text" name="item_name"><br>    
    price<br> <input type="text" name="price"><br>
    location<br> <input type="text" name="location"><br>
    qty_on_hand<br> <input type="text" name="qty_on_hand"><br>
    reorder_pt<br> <input type="text" name="reorder_pt"><br>
    supplier<br> <select name="sup_no"><?php printf($select_supplier);?></select><br>
    image<br> <input type="file" name="myFile" id="uploadImage" onchange="PreviewImage()"><br>
    <img id="uploadPreview" style="height: 100px;"><br><br>
    <input type="submit" value="Insert">
</form>
<script>
    function PreviewImage() {
        var ofReader = new FileReader();
        ofReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
        ofReader.onload = function(ofEvent){
            document.getElementById("uploadPreview").src = ofEvent.target.result;
        }
    }
</script>