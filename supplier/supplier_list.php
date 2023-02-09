<?php 
    require_once "../config.php";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if (!$conn){
        die("ERROR: ".mysqli_connect_error());
    }
    $sql="SELECT * FROM supplier";
    $result=mysqli_query($conn,$sql);
    printf("<a href='supplier_form.php'>Add supplier</a> 
        <table border='1'>
        <th>sup_no</th>
        <th>sup_company</th>
        <th>sup_contact</th>
        <th>sup_telephone</th>
        <th>sup_email</th>
        <th>Edit</th>
        <th>Delete</th>");
    while ($row=mysqli_fetch_assoc($result)) {
        printf("<tr>");
        printf("<td>"); printf($row["sup_no"]);
        printf("<td>"); printf($row["sup_company"]);        
        printf("<td>"); printf($row["sup_contact"]);
        printf("<td>"); printf($row["sup_telephone"]);
        printf("<td>"); printf($row["sup_email"]);
        printf("<td>"); printf("<a href='supplier_edit.php?sup_no=".$row["sup_no"]."'>Edit</a>");
        printf("<td>"); printf("<a href='supplier_delete.php?sup_no=".$row["sup_no"]."'>Delete</a>");
    }
    printf("</table>")
?>