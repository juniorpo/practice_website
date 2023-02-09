<?php 
    require_once "../config.php";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if (!$conn){
        die("ERROR: ".mysqli_connect_error());
    }
    $sql="SELECT * FROM inventory LEFT JOIN supplier ON inventory.sup_no = supplier.sup_no";
    $result=mysqli_query($conn,$sql);
    printf("<a href='inventory_form.php'>Add Inventory</a> 
        <table border='1'>
        <th>image</th>
        <th>item_no</th>
        <th>item_name</th>
        <th>price</th>
        <th>location</th>
        <th>qty_on_hand</th>
        <th>reorder_pt</th>
        <th>sup_company</th>
        <th>Edit</th>
        <th>Delete</th>");
    while ($row=mysqli_fetch_assoc($result)) {
        printf("<tr>");
        printf("<td>"); printf("<img src='data:img/jpeg;base64,".base64_encode($row["image_data"])."' 
        width=100px></img>");
        printf("<td>"); printf($row["item_no"]);
        printf("<td>"); printf($row["item_name"]);        
        printf("<td>"); printf($row["price"]);
        printf("<td>"); printf($row["location"]);
        printf("<td>"); printf($row["qty_on_hand"]);
        printf("<td>"); printf($row["reorder_pt"]);
        printf("<td>"); printf($row["sup_company"]);
        printf("<td>"); printf("<a href='inventory_edit.php?item_no=".$row["item_no"]."'>Edit</a>");
        printf("<td>"); printf("<a href='inventory_delete.php?item_no=".$row["item_no"]."'>Delete</a>");
    }
    printf("</table>")
?>