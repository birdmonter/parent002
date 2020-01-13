<?php

$strAccessToken = 'exRwq1i1noogIKE8x9QpmYH8PlQQdSvCjBEeoQfy+sCbKkLHNV3Kol5ZxfuCebtuRyHunNm6/KGAVw+uDgy6GQEAeKsAhLGAIpJCYMLvxVWVX2b4o8DN0z03MVgp1TC2JsjIEQPXRqWxua9JrPIVfwdB04t89/1O/w1cDnyilFU=';
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
$strUrl = "https://api.line.me/v2/bot/message/reply";
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";


/*Return HTTP Request 200*/
http_response_code(200);


// ---------------------------------------------------ส่ง user id---------------------------------------

// if($arrJson['events'][0]['message']['text'] == "สวัสดี"){
//   $arrPostData = array();
//   $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
//   $arrPostData['messages'][0]['type'] = "text";
//   $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];

// //---------------------------------------------บัตรประชาชน---------------------------------------------

// }else if($arrJson['events'][0]['message']['text'] == "1959900506758"){
//   $arrPostData = array();
//   $data=$arrJson['events'][0]['message']['text'];

//   $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
//   $arrPostData['messages'][0]['type'] = "text";
//   $arrPostData['messages'][0]['text'] = strlen($data); //เป็นการนับ
  


// // ---------------------------------------------เลขสมาชิก---------------------------------------------

// }else if($arrJson['events'][0]['message']['text'] == "1234567890"){
//     $arrPostData = array();
//     $data=$arrJson['events'][0]['message']['text'];
//     $cutstring=substr($data, 5 ,10 ); //เป็นการตัดข้อความ


//     $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
//     $arrPostData['messages'][0]['type'] = "text";
//     $arrPostData['messages'][0]['text'] = $cutstring; 
    
//   //-------------------------------------------------ตอบตรงคำถาม------------------------------------------

// }else if($arrJson['events'][0]['message']['text'] == "ทำอะไรได้บ้าง"){
//   $arrPostData = array();
//   $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
//   $arrPostData['messages'][0]['type'] = "text";
//   $arrPostData['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";


// // --------------------------------------------ตอบกลับที่เราพิมพ์------------------------------------------

// }else if($arrJson['events'][0]['message']['text'] == "เหมืนเดิม"){
//     $arrPostData = array();
//     $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
//     $arrPostData['messages'][0]['type'] = "text";
//     $arrPostData['messages'][0]['text'] = $arrJson['events'][0]['message']['text'];

// // --------------------------ถ้าข้อความไม่ตรงเงือนไขทั้งหมดจะตอบเงือนไขสุดท้าย----------------------------------

// }else{
//   $arrPostData = array();
//   $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
//   $arrPostData['messages'][0]['type'] = "text";
//   $arrPostData['messages'][0]['text'] = "กรอกข้อมูลไม่ถูกต้องกรุณา กรอกข้อมูลใหม่!!!";
// }

// //rich menu

// $actions = array (
//   New \LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder("yes", "ans=y"),
//   New \LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder("no", "ans=N")
// );
// $button = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder("confim message", $actions);
// $outputText = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder("confim message", $button);
// $response = $bot->replyMessage($event->getReplyToken(), $outputText);


require_once '../vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
$logger = new Logger('LineBot');
$logger->pushHandler(new StreamHandler('php://stderr', Logger::DEBUG));
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($_ENV["LINEBOT_ACCESS_TOKEN"]);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $_ENV["LINEBOT_CHANNEL_SECRET"]]);
$signature = $_SERVER['HTTP_' . \LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];
try {
	$events = $bot->parseEventRequest(file_get_contents('php://input'), $signature);
} catch(\LINE\LINEBot\Exception\InvalidSignatureException $e) {
	error_log('parseEventRequest failed. InvalidSignatureException => '.var_export($e, true));
} catch(\LINE\LINEBot\Exception\UnknownEventTypeException $e) {
	error_log('parseEventRequest failed. UnknownEventTypeException => '.var_export($e, true));
} catch(\LINE\LINEBot\Exception\UnknownMessageTypeException $e) {
	error_log('parseEventRequest failed. UnknownMessageTypeException => '.var_export($e, true));
} catch(\LINE\LINEBot\Exception\InvalidEventRequestException $e) {
	error_log('parseEventRequest failed. InvalidEventRequestException => '.var_export($e, true));
}
foreach ($events as $event) {
	// Postback Event
	if (($event instanceof \LINE\LINEBot\Event\PostbackEvent)) {
		$logger->info('Postback message has come');
		continue;
	}
	// Location Event
	if  ($event instanceof LINE\LINEBot\Event\MessageEvent\LocationMessage) {
		$logger->info("location -> ".$event->getLatitude().",".$event->getLongitude());
		continue;
	}
	// Message Event = TextMessage
	if (($event instanceof \LINE\LINEBot\Event\MessageEvent\TextMessage)) {
		$messageText=strtolower(trim($event->getText()));
		switch ($messageText) {
		case "text" : 
			$outputText = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder("text message");
			break;
		case "location" :
			$outputText = new \LINE\LINEBot\MessageBuilder\LocationMessageBuilder("Eiffel Tower", "Champ de Mars, 5 Avenue Anatole France, 75007 Paris, France", 48.858328, 2.294750);
			break;
		case "button" :
			$actions = array (
				// general message action
				New \LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder("button 1", "text 1"),
				// URL type action
				New \LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder("Google", "http://www.google.com"),
				// The following two are interactive actions
				New \LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder("next page", "page=3"),
				New \LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder("Previous", "page=1")
			);
			$img_url = "https://cdn.shopify.com/s/files/1/0379/7669/products/sampleset2_1024x1024.JPG?v=1458740363";
			$button = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder("button text", "description", $img_url, $actions);
			$outputText = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder("this message to use the phone to look to the Oh", $button);
			break;
		case "carousel" :
			$columns = array();
			$img_url = "https://cdn.shopify.com/s/files/1/0379/7669/products/sampleset2_1024x1024.JPG?v=1458740363";
			for($i=0;$i<5;$i++) {
				$actions = array(
					new \LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder("Add to Card","action=carousel&button=".$i),
					new \LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder("View","http://www.google.com")
				);
				$column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder("Title", "description", $img_url , $actions);
				$columns[] = $column;
			}
			$carousel = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder($columns);
			$outputText = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder("Carousel Demo", $carousel);
			break;	
		case "image" :
			$img_url = "https://cdn.shopify.com/s/files/1/0379/7669/products/sampleset2_1024x1024.JPG?v=1458740363";
			$outputText = new LINE\LINEBot\MessageBuilder\ImageMessageBuilder($img_url, $img_url);
			break;	
		case "confirm" :
			$actions = array (
				New \LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder("yes", "ans=y"),
				New \LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder("no", "ans=N")
			);
			$button = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder("problem", $actions);
			$outputText = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder("this message to use the phone to look to the Oh", $button);
			break;
		default :
			$outputText = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder("demo command: text, location, button, confirm to test message template");	
			break;
		}
		$response = $bot->replyMessage($event->getReplyToken(), $outputText);
	}
}  


// ส่วนของการส่งการแจ้งเตือนผ่านฟังก์ชั่น cURL
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
 
?>