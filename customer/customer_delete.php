<?php
$cust_no = $_GET["cust_no"]; 
//ใช้ $_GET เพื่อระบุหมายเลขข้อมูลในการลบ โดยเราจะใช้ cust_no ในการอ้างอิง เพราะเป็น Primary Key ข้อมูลใน column นี้ไม่มีทางซ้ำกัน
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
$sql = "DELETE FROM customer WHERE cust_no = '$cust_no'";
//สั่งให้ลบข้อมูลในตาราง customer โดยใช้ column cust_no ในการอ้างอิง
$result = mysqli_query($conn, $sql); //เรียกใช้ฟังก์ชั่น mysqli_query() เพื่อทำการติดต่อสอบถามฐานข้อมูลกันและกัน
if ($result) { //หากทำการติดต่อสอบถามฐานข้อมูลได้และลบข้อมูลสำเร็จ ก็จะเข้าเงื่อนไขดังนี้
    printf("Delete Successfully"); //แสดงผลคำว่า "Delete Successfully" ขึ้นมาทางหน้าจอ
    header("Refresh:2; url=customer_list.php"); //หลังจากนั้นก็จะค้างไว้ประมาณ 2 วินาทีและทำการเข้าสู่หน้า customer_list.php
}else{
    printf(mysqli_error($conn)); //แต่ถ้าหากผิดพลาดขึ้นมา ก็จะแสดง error โดยใช้ฟังก์ชั่น mysqli_error เป็นตัวบอกเหตุผล
}
mysqli_close($conn); //ปิดการทำงาน
?>