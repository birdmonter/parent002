<?php
$API_URL = 'https://api.line.me/v2/bot/message';
$ACCESS_TOKEN = 'm7uuiyQihjxD2Po3jFwWxjslOwuw1T/ODORXy1vPsFQ2XuUHVVj5Sk9sHQNhdNjMRyHunNm6/KGAVw+uDgy6GQEAeKsAhLGAIpJCYMLvxVU3EgejzBxajVyv30+aa3gPxAtxAgL7ertukDN7srPvXFGUYhWQfeY8sLGRXgo3xvw= ';//copy Channel access token ตอนที่ตั้งค่ามาใส่ 
$channelSecret = '1e9a50e53936e05409b5095cabc4ac2b';


$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$content = file_get_contents('php://input');   // Get request content
$request_array = json_decode($content , true);   // Decode JSON to Array

$jsonquickReplye =[
    
  "to"=> "U3c28a70ed7c5e7ce2c9a7597...",
  "messages"=> [
    [
      "type"=> "text",
      "text"=> "Hello Quick Reply!",
      "quickReply"=> [
        "items"=>[
          [
            "type"=> "action",
            "action"=> [
              "type"=>"cameraRoll",
              "label"=> "Camera Roll"
            ]
            ],
          [
            "type"=> "action",
            "action"=> [
              "type"=> "camera",
              "label"=> "Camera"
            ]
            ],
          [
            "type"=> "action",
            "action"=> [
              "type"=> "location",
              "label"=> "Location"
          ]
            ],
          [
            "type"=> "action",
            "imageUrl"=> "https://cdn1.iconfinder.com/data/icons/mix-color-3/502/Untitled-1-512.png",
            "action"=> [
              "type"=> "message",
              "label"=> "Message",
              "text"=> "Hello World!"
            ]
            ],
          [
            "type"=> "action",
            "action"=> [
              "type"=> "postback",
              "label"=> "Postback",
              "data"=> "action=buy&itemid=123",
              "displayText"=> "Buy"
          ]
      ],
          [
            "type"=> "action",
            "imageUrl"=> "https://icla.org/wp-content/uploads/2018/02/blue-calendar-icon.png",
            "action"=> [
              "type"=> "datetimepicker",
              "label"=> "Datetime Picker",
              "data"=> "storeId=12345",
              "mode"=> "datetime",
              "initial"=> "2018-08-10t00:00",
              "max"=> "2018-12-31t23:59",
              "min"=> "2018-08-01t00:00"
            ]
          ]
        ]
  ]
]
   ]
            ];
            if ( sizeof($request_array['events']) > 0 ) {
                foreach ($request_array['events'] as $event) {
                    error_log(json_encode($event));
                    $reply_message = '';
                    $reply_token = $event['replyToken'];
            
                    $data = [
                        'replyToken' => $reply_token,
                        'messages' => [$jsontemplate ]
                    ];
            
                    print_r($data);
            
                    $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);
                    
                    $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);
            
                    echo "Result: ".$send_result."\r\n";
                    
                }
            }
            
            echo "OK";
            
            
            function send_reply_message($url, $post_header, $post_body)
            {
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                $result = curl_exec($ch);
                curl_close($ch);
            
                return $result;
            }
            
            
            ?>