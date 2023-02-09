<?php 
    $item_no=$_GET["item_no"];
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
    $sql="SELECT * FROM inventory WHERE item_no='$item_no'";
    $result=mysqli_query($conn,$sql);
    if ($row=mysqli_fetch_assoc($result)){ ?>
        <form action="inventory_save.php?item_no=<?php printf("$item_no");?>" method="post" enctype="multipart/form-data">
        item_no<br> <input type="text" name="item_no" value="<?php printf($row["item_no"]);?>"><br>
        item_name<br> <input type="text" name="item_name" value="<?php printf($row["item_name"]);?>"><br>    
        price<br> <input type="text" name="price" value="<?php printf($row["price"]);?>"><br>
        location<br> <input type="text" name="location" value="<?php printf($row["location"]);?>"><br>
        qty_on_hand<br> <input type="text" name="qty_on_hand" value="<?php printf($row["qty_on_hand"]);?>"><br>
        reorder_pt<br> <input type="text" name="reorder_pt" value="<?php printf($row["reorder_pt"]);?>"><br>
        supplier<br> <select name="sup_no" id="sup_no"><?php printf($select_supplier);?></select> <br>
        image<br> <input type="file" name="myFile" id="uploadImage" onchange="PreviewImage();"><br>
        <?php printf("<img id='uploadPreview' src='data:img/jpeg;base64,".base64_encode($row["image_data"])."' 
        width=100px></img>"); ?><br><br>
        <input type="submit" value="Update"> 
    <?php }else {
        printf("ไม่สามารถแสดงข้อมูลได้");
    } ?>
    <script>
        function selectElement(id,valueToSelect) {
            let element = document.getElementById(id);
            element.value  = valueToSelect;
        }
        selectElement("sup_no","<?php printf($row["sup_no"])?>");

        function PreviewImage() {
            var ofReader = new FileReader();
            ofReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
            ofReader.onload = function(ofEvent){
                document.getElementById("uploadPreview").src = ofEvent.target.result;
            }
        }
    </script>
</form>