<form action="customer_insert.php" method="post"> 
    <!-- สร้างฟอร์มขึ้นมา โดยเขียนภาษา HTML ซึ่งต้องการให้นำข้อมูลที่พิมพ์เสร็จส่งไปยังหน้า insert ทำหน้าที่ต่อไป-->
    cust_no<br> <input type="text" name="cust_no"><br> <!-- ระวัง! ชื่อของมันค่อนข้างเซนซิทีฟ คิดก่อนตั้งทุกครั้ง! -->
    cust_name<br> <input type="text" name="cust_name"><br>
    cust_street<br> <input type="text" name="cust_street"><br>
    cust_city<br> <input type="text" name="cust_city"><br>
    cust_state<br> <input type="text" name="cust_state"><br>
    cust_zip<br> <input type="text" name="cust_zip"><br>
    ship_to_name<br> <input type="text" name="ship_to_name"><br>
    ship_to_street<br> <input type="text" name="ship_to_street"><br>
    ship_to_city<br> <input type="text" name="ship_to_city"><br>
    ship_to_state<br> <input type="text" name="ship_to_state"><br>
    ship_to_zip<br> <input type="text" name="ship_to_zip"><br>
    credit_limit<br> <input type="text" name="credit_limit"><br>
    last_revised<br> <input type="text" name="last_revised"><br>
    credit_terms<br> <input type="text" name="credit_terms"><br>
    <input type="submit" value="Insert"> <!-- สร้างปุ่ม submit เพื่อนำข้อมูลที่พิมพ์ไว้ส่งต่อไปยังหน้า insert-->
</form>