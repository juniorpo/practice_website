<?php 
    require_once('../config.php'); 
    /*เรียกไฟล์ config.php เพื่อใช้งานในฟังก์ชั่น connect โดยมีตัวแปร
    $servername = เป็นค่า localhost
    $username = เป็นค่า root (หากท่านใดเปลี่ยนชื่อ user ไว้ ก็ให้ใช้ชื่อที่ท่านตั้งไว้..)
    $password = เป็นค่าว่าง [""] (หากท่านใดกำหนดรหัสผ่านไว้ ก็ให้ใส่รหัสผ่านที่ท่านตั้งไว้..)
    $dbname = เป็นชื่อ database ที่ชื่อว่า 'mycompany'
    */
    $conn = mysqli_connect($servername, $username, $password, $dbname); 
    //เรียกฟังก์ชั่น mysqli_connect() เพื่อทำการเชื่อมต่อไปยัง MySQL Server
    if (!$conn) {
        die(mysqli_connect_error());
    } //หากทำการเชื่อมต่อไม่ได้ ก็จะส่งค่า ERROR โดยใช้ฟังก์ชั้น mysqli_connect_error() เป็นตัวบอกเหตุผล
    $sql = "SELECT * FROM customer"; //สั่งให้เลือกตาราง customer ทั้งตาราง
    $result = mysqli_query($conn, $sql); //เรียกใช้ฟังก์ชั่น mysqli_query() เพื่อทำการสอบถามติดต่อฐานข้อมูลกันและกัน
    printf("<a href='customer_form.php'>Add Customer</a>
    <table border='1'>
        <th>cust_no</th>
        <th>cust_name</th>
        <th>cust_street</th>
        <th>cust_city</th>
        <th>cust_state</th>
        <th>cust_zip</th>
        <th>ship_to_name</th>
        <th>ship_to_street</th>
        <th>ship_to_city</th>
        <th>ship_to_state</th>
        <th>ship_to_zip</th>
        <th>credit_limit</th>
        <th>last_revised</th>
        <th>credit_terms</th>
        <th>Delete</th>
    "); //สร้างตารางให้แสดงผลออกมา โดยใช้ HTML ในการเขียน
    while ($row = mysqli_fetch_assoc($result)) {
        printf("<tr>");
        printf("<td>"); printf($row["cust_no"]);
        printf("<td>"); printf($row["cust_name"]);
        printf("<td>"); printf($row["cust_street"]);
        printf("<td>"); printf($row["cust_city"]);
        printf("<td>"); printf($row["cust_state"]);
        printf("<td>"); printf($row["cust_zip"]);
        printf("<td>"); printf($row["ship_to_name"]);
        printf("<td>"); printf($row["ship_to_street"]);
        printf("<td>"); printf($row["ship_to_city"]);
        printf("<td>"); printf($row["ship_to_state"]);
        printf("<td>"); printf($row["ship_to_zip"]);
        printf("<td>"); printf($row["credit_limit"]);
        printf("<td>"); printf($row["last_revised"]);
        printf("<td>"); printf($row["credit_terms"]);
        printf("<td>"); printf("<a href='customer_delete.php?cust_no=".$row["cust_no"]."'>Delete</a>");
    }
    printf("</table>"); //ปิดส่วนของ table 
?>