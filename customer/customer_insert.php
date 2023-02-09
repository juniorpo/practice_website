<?php
$cust_no = $_POST["cust_no"];
$cust_name = $_POST["cust_name"];
$cust_street = $_POST["cust_street"];
$cust_city = $_POST["cust_city"];
$cust_state = $_POST["cust_state"];
$cust_zip = $_POST["cust_zip"];
$ship_to_name = $_POST["ship_to_name"];
$ship_to_street = $_POST["ship_to_street"];
$ship_to_city = $_POST["ship_to_city"];
$ship_to_state = $_POST["ship_to_state"];
$ship_to_zip = $_POST["ship_to_zip"];
$credit_limit = $_POST["credit_limit"];
$last_revised = $_POST["last_revised"];
$credit_terms = $_POST["credit_terms"];
/*ตั้งตัวแปรขึ้นมาตามฟอร์มที่เราได้สร้างไว้ โดยตัวแปร $_POST ใน double quote ("") 
จะค่อนข้าง sensitive ต้องเขียนให้ตรงกับ name ที่เราเขียนในไฟล์ customer_form.php ไม่งั้นข้อมูลจะไม่ได้นำเข้าไปในฐานข้อมูล*/
require_once "../config.php"; 
/*เรียกไฟล์ config.php เพื่อใช้งานในฟังก์ชั่น connect โดยมีตัวแปร
    $servername = เป็นค่า localhost
    $username = เป็นค่า root (หากท่านใดเปลี่ยนชื่อ user ไว้ ก็ให้ใช้ชื่อที่ท่านตั้งไว้..)
    $password = เป็นค่าว่าง [""] (หากท่านใดกำหนดรหัสผ่านไว้ ก็ให้ใส่รหัสผ่านที่ท่านตั้งไว้..)
    $dbname = เป็นชื่อ database ที่ชื่อว่า 'mycompany'
    */
$conn = mysqli_connect($servername,$username,$password,$dbname);
//เรียกฟังก์ชั่น mysqli_connect() เพื่อทำการเชื่อมต่อไปยัง MySQL Server
if (!$conn) {
    die(mysqli_connect_error());
} //หากทำการเชื่อมต่อไม่ได้ ก็จะส่งค่า ERROR โดยใช้ฟังก์ชั้น mysqli_connect_error() เป็นตัวบอกเหตุผล
$sql = "INSERT INTO customer (cust_no,cust_name,cust_street,cust_city,cust_state,cust_zip,
        ship_to_name,ship_to_street,ship_to_city,ship_to_state,ship_to_zip,
        credit_limit,last_revised,credit_terms) 
        VALUES ('$cust_no','$cust_name','$cust_street','$cust_city','$cust_state','$cust_zip',
        '$ship_to_name','$ship_to_street','$ship_to_city','$ship_to_state','$ship_to_zip',
        '$credit_limit','$last_revised','$credit_terms')";
//สั่งให้ทำการ insert ข้อมูลเข้าไปในตาราง customer โดย insert ค่าข้อมูลตาม column ที่เรากำหนดไว้
$result = mysqli_query($conn, $sql); //เรียกใช้ฟังก์ชั่น mysqli_query() เพื่อทำการติดต่อสอบถามฐานข้อมูลกันและกัน
if ($result) { //หากทำการติดต่อสอบถามฐานข้อมูลได้และ insert ข้อมูลในแต่ละ column สำเร็จ ก็จะเข้าเงื่อนไขดังนี้
    printf("Insert Successfully."); //แสดงผลคำว่า "Insert Successfully" ขึ้นมาทางหน้าจอ
    header("Refresh:2;url=customer_list.php"); //หลังจากนั้นก็จะค้างไว้ประมาณ 2 วินาทีและทำการเข้าสู่หน้า customer_list.php
}else{
    printf(mysqli_error($conn)); //แต่ถ้าหากผิดพลาดขึ้นมา ก็จะแสดง error โดยใช้ฟังก์ชั่น mysqli_error เป็นตัวบอกเหตุผล
}
mysqli_close($conn); //ปิดการทำงาน
?>
