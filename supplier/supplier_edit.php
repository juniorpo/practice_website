<?php 
    $sup_no=$_GET["sup_no"];
    require_once "../config.php";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if (!$conn){
        die("ERROR: ".mysqli_connect_error());
    }
    $sql="SELECT * FROM supplier WHERE sup_no='$sup_no'";
    $result=mysqli_query($conn,$sql);
    if ($row=mysqli_fetch_assoc($result)){ ?>
        <form action="supplier_save.php?sup_no=<?php printf("$sup_no");?>" method="post">
        sup_no<br> <input type="text" name="sup_no" value="<?php printf($row["sup_no"]);?>"><br>
        sup_company<br> <input type="text" name="sup_company" value="<?php printf($row["sup_company"]);?>"><br>    
        sup_contact<br> <input type="text" name="sup_contact" value="<?php printf($row["sup_contact"]);?>"><br>
        sup_telephone<br> <input type="text" name="sup_telephone" value="<?php printf($row["sup_telephone"]);?>"><br>
        sup_email<br> <input type="text" name="sup_email" value="<?php printf($row["sup_email"]);?>"><br>
        <input type="submit" value="Update"> 
    <?php }else {
        printf("ไม่สามารถแสดงข้อมูลได้");
    } ?>

</form>