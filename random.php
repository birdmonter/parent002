<!DOCTYPE html>
<html>
<body>

<?php
$a=array("ขอโทษครับ บอทยังไม่เข้าใจคำถาม","ไม่แน่ใจว่าถูกมั๊ย","ลองพิมพ์ใหม่อีกครั้ง หรือเลือกเมนูด้านล่างได้นะครับ 🙇","yellow","brown");
$random_keys=array_rand($a,3);
echo $a[$random_keys[0]]."<br>";

?>
</html>
