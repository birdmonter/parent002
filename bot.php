<?php
 
    $strAccessToken = "m7uuiyQihjxD2Po3jFwWxjslOwuw1T/ODORXy1vPsFQ2XuUHVVj5Sk9sHQNhdNjMRyHunNm6/KGAVw+uDgy6GQEAeKsAhLGAIpJCYMLvxVU3EgejzBxajVyv30+aa3gPxAtxAgL7ertukDN7srPvXFGUYhWQfeY8sLGRXgo3xvw=";//copy Channel access token ตอนที่ตั้งค่ามาใส่;
    $channelSecret = '1e9a50e53936e05409b5095cabc4ac2b';

    $content = file_get_contents('php://input');
    $arrJson = json_decode($content, true);
    $strUrl = "https://api.line.me/v2/bot/message/reply";

    $arrHeader = array();
    $arrHeader[] = "Content-Type: application/json";
    $arrHeader[] = "Authorization: Bearer {$strAccessToken}";

if($arrJson['events'][0]['message']['text'] == "สวัสดี" ||$arrJson['events'][0]['message']['text'] == "สวัสดีค่ะ" || $arrJson['events'][0]['message']['text'] == "สวัสดีคะ"){
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "text";
    $arrPostData['messages'][0]['text'] = "สวัสดีจ้าาาา มีอะไรให้เราช่วยไหมค่ะ ";  //.$arrJson['events'][0]['source']['userId'];

}else if($arrJson['events'][0]['message']['text'] == "สวัสดีคับ" ||$arrJson['events'][0]['message']['text'] == "สวัสดีครับ"){
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "text";
    $arrPostData['messages'][0]['text'] = "สวัสดีจ้าาาา มีอะไรให้เราช่วยไหมค่ะ";

}else if($arrJson['events'][0]['message']['text'] == "สวัสดีจ่ะ"|| $arrJson['events'][0]['message']['text'] == "สวัสดีจร้า"){
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "text";
    $arrPostData['messages'][0]['text'] = "สวัสดีจ้าาาา มีอะไรให้เราช่วยไหมค่ะ";

//////////////////ขอบคุณ
}else if($arrJson['events'][0]['message']['text'] == "ขอบคุณ" ||$arrJson['events'][0]['message']['text'] == "ขอบคุณค่ะ"){
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "text";
    $arrPostData['messages'][0]['text'] = "ยินดีจร้าาา";
    $arrPostData['messages'][1]['type'] = "sticker";
    $arrPostData['messages'][1]['packageId'] = "1";
    $arrPostData['messages'][1]['stickerId'] = "4";

}else if($arrJson['events'][0]['message']['text'] == "ขอบคุณคะ"||$arrJson['events'][0]['message']['text'] == "ขอบคุณจ่ะ"){
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "text";
    $arrPostData['messages'][0]['text'] = "ยินดีจร้าาา";
    $arrPostData['messages'][1]['type'] = "sticker";
    $arrPostData['messages'][1]['packageId'] = "1";
    $arrPostData['messages'][1]['stickerId'] = "4";

}else if($arrJson['events'][0]['message']['text'] == "ขอบคุณครับ" || $arrJson['events'][0]['message']['text'] == "ขอบคุณคับ"){
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "text";
    $arrPostData['messages'][0]['text'] = "ยินดีจร้าาา";
    $arrPostData['messages'][1]['type'] = "sticker";
    $arrPostData['messages'][1]['packageId'] = "1";
    $arrPostData['messages'][1]['stickerId'] = "4";    

}else if($arrJson['events'][0]['message']['text'] == "ใจจ่ะ"||$arrJson['events'][0]['message']['text'] == "ขอบใจคับ"||$arrJson['events'][0]['message']['text'] == "ขอบใจครับ"){
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "text";
    $arrPostData['messages'][0]['text'] = "ยินดีจร้าาา";
    $arrPostData['messages'][1]['type'] = "sticker";
    $arrPostData['messages'][1]['packageId'] = "1";
    $arrPostData['messages'][1]['stickerId'] = "4";

}else if($arrJson['events'][0]['message']['text'] == "ขอบใจจ่ะ" ||$arrJson['events'][0]['message']['text'] == "ขอบใจจร้า" || $arrJson['events'][0]['message']['text'] == "ใจจร้า"){
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "text";
    $arrPostData['messages'][0]['text'] = "ยินดีจร้าาา";
    $arrPostData['messages'][1]['type'] = "sticker";
    $arrPostData['messages'][1]['packageId'] = "1";
    $arrPostData['messages'][1]['stickerId'] = "4"; 

//ลูกเล่นทั่วไป-------------ข่าว----ราคาน้ำมัน---ราคาทอง---พยากรณือากาศ
// }else if($arrJson['events'][0]['message']['text'] == "พยากรณ์อากาศ" || $arrJson['events'][0]['message']['text'] == "ราคาทอง"|| $arrJson['events'][0]['message']['text'] == "ราคาน้ำมัน" || $arrJson['events'][0]['message']['text'] == "ข่าว"){

}else if($arrJson['events'][0]['message']['text'] == "ราคาทอง"  || $arrJson['events'][0]['message']['text'] == "ทอง"){
    require "gold.php";

}else if($arrJson['events'][0]['message']['text'] == "ราคาน้ำมัน"  || $arrJson['events'][0]['message']['text'] == "น้ำมัน"){
    require "oil.php";

}else if($arrJson['events'][0]['message']['text'] == "ข่าวสาร"  || $arrJson['events'][0]['message']['text'] == "ข่าว"){
    require "news.php";

}else if($arrJson['events'][0]['message']['text'] == "พยากรณ์"  || $arrJson['events'][0]['message']['text'] == "ฝน ฟ้า อากาศ"|| $arrJson['events'][0]['message']['text'] == "ฝนฟ้าอากาศ"|| $arrJson['events'][0]['message']['text'] == "พยากรณ์อากาศ"){
    require "Weather.php";    

    /////////////////////////////////////////////////////////////////////////////////////////////
}else if($arrJson['events'][0]['message']['text'] == "ทำอะไรได้บ้าง"){
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "text";
    $arrPostData['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";


// }else if($arrJson['events'][0]['message']['text'] =="y"){
//     require "imap.php";



    /////////////////////////////////////////เมนู6เมนู///////////////////////////////////////////////

}else if($arrJson['events'][0]['message']['text'] == "ตารางเรียน" || $arrJson['events'][0]['message']['text'] == "timetable"){
    require "butontimetable.php";
    
}else if($arrJson['events'][0]['message']['text'] == "ผลการเรียน" || $arrJson['events'][0]['message']['text'] == "Academic results" || $arrJson['events'][0]['message']['text'] == "grade"){
   require "bot-flex-Gpa.php";
    
    // $replyjson['type'] = 'text'
    // $replyjson['text'] = '1234'
    // json_encode($replyjson)

}else if($arrJson['events'][0]['message']['text'] == "การเรียนการสอน"|| $arrJson['events'][0]['message']['text'] == "learn"){
    require "study.php";
 
}else if($arrJson['events'][0]['message']['text'] == "การบ้าน"|| $arrJson['events'][0]['message']['text'] == "homework"){
    require "bothomework.php";
    
}else if($arrJson['events'][0]['message']['text'] == "ค่าใช้จ่าย"|| $arrJson['events'][0]['message']['text'] == "เป๋าตังค์"){
    require "valet.php";
    
}else if($arrJson['events'][0]['message']['text'] == "กิจกรรม"|| $arrJson['events'][0]['message']['text'] == "acctivity"){
    require  "buttonActivity.php";
    

   //////////////////////////////////////ดักคำแปลกๆ/////////////////////////////////////////////////
}else{
    $a=array("ถามอย่างนี้ บอทตั้งตัวไม่ทันเลยว่าจะตอบคำนี้ว่าไง","ขอโทษครับ บอทยังไม่เข้าใจคำถาม","ลองพิมพ์ใหม่อีกครั้ง หรือเลือกเมนูด้านล่างได้นะครับ 🙇","บอทไม่มีคำตอบสำหรับคำถามนี้ มีอะไรอย่างอื่นให้บอทช่วยไหม?","ไม่แน่ใจว่าเข้าใจถูกมั๊ย","นั้นคงอยู่นอกเหนือความสามารถของบอทตอนนี้");
    $random_keys=array_rand($a,2);
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "text";
    $arrPostData['messages'][0]['text'] = $a[$random_keys[0]];
}


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$strUrl);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close ($ch);

    exit;               


?>