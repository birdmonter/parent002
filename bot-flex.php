<?php

$API_URL = 'https://api.line.me/v2/bot/message';
$ACCESS_TOKEN = 'exRwq1i1noogIKE8x9QpmYH8PlQQdSvCjBEeoQfy+sCbKkLHNV3Kol5ZxfuCebtuRyHunNm6/KGAVw+uDgy6GQEAeKsAhLGAIpJCYMLvxVWVX2b4o8DN0z03MVgp1TC2JsjIEQPXRqWxua9JrPIVfwdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่'; 
$channelSecret = 'aa79f5f6f04e775f836bf54644526aed';


$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$request = file_get_contents('php://input');   // Get request content
$request_array = json_decode($request, true);   // Decode JSON to Array

if (strtolower($message['text']) == "buttons template" || $message['text'] == "h") {
  $client->replyMessage(array(
      'replyToken' => $event['replyToken'],
      'messages' => array(
          array(
              'type' => 'template', // 訊息類型 (模板)
              'altText' => 'Example buttons template', // 替代文字
              'template' => array(
                  'type' => 'buttons', // 類型 (按鈕)
                  'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
                  'title' => 'Example Menu', // 標題 <不一定需要>
                  'text' => 'Please select', // 文字
                  'actions' => array(
                      array(
                          'type' => 'postback', // 類型 (回傳)
                          'label' => 'Postback example', // 標籤 1
                          'data' => 'action=buy&itemid=123' // 資料
                      ),
                      array(
                          'type' => 'message', // 類型 (訊息)
                          'label' => 'Message example', // 標籤 2
                          'text' => 'Message example' // 用戶發送文字
                      ),
                      array(
                          'type' => 'uri', // 類型 (連結)
                          'label' => 'Uri example', // 標籤 3
                          'uri' => 'https://github.com/GoneTone/line-example-bot-php' // 連結網址
                      )
                  )
              )
          )
      )
  ));
}

/**
確認模板陣列輸出 Json
==============================
{
  "type": "template",
  "altText": "Example confirm template",
  "template": {
      "type": "confirm",
      "text": "Are you sure?",
      "actions": [
          {
              "type": "message",
              "label": "Yes",
              "text": "Yes"
          },
          {
              "type": "message",
              "label": "No",
              "text": "No"
          }
      ]
  }
}
==============================
*/
if (strtolower($message['text']) == "confirm template" || $message['text'] == "f") {
  $client->replyMessage(array(
      'replyToken' => $event['replyToken'],
      'messages' => array(
          array(
              'type' => 'template', // 訊息類型 (模板)
              'altText' => 'Example confirm template', // 替代文字
              'template' => array(
                  'type' => 'confirm', // 類型 (確認)
                  'text' => 'Are you sure?', // 文字
                  'actions' => array(
                      array(
                          'type' => 'message', // 類型 (訊息)
                          'label' => 'Yes', // 標籤 1
                          'text' => 'Yes' // 用戶發送文字 1
                      ),
                      array(
                          'type' => 'message', // 類型 (訊息)
                          'label' => 'No', // 標籤 2
                          'text' => 'No' // 用戶發送文字 2
                      )
                  )
              )
          )
      )
  ));
}

/**
輪播模板陣列輸出 Json
==============================
{
  "type": "template",
  "altText": "Example carousel template",
  "template": {
      "type": "carousel",
      "columns": [
          {
              "thumbnailImageUrl": "https://api.reh.tw/line/bot/example/assets/images/example.jpg",
              "title": "Example Menu 1",
              "text": "Description 1",
              "actions": [
                  {
                      "type": "postback",
                      "label": "Postback example 1",
                      "data": "action=buy&itemid=123"
                  },
                  {
                      "type": "message",
                      "label": "Message example 1",
                      "text": "Message example 1"
                  },
                  {
                      "type": "uri",
                      "label": "Uri example 1",
                      "uri": "https://github.com/GoneTone/line-example-bot-php"
                  }
              ]
          },
          {
              "thumbnailImageUrl": "https://api.reh.tw/line/bot/example/assets/images/example.jpg",
              "title": "Example Menu 2",
              "text": "Description 2",
              "actions": [
                  {
                      "type": "postback",
                      "label": "Postback example 2",
                      "data": "action=buy&itemid=123"
                  },
                  {
                      "type": "message",
                      "label": "Message example 2",
                      "text": "Message example 2"
                  },
                  {
                      "type": "uri",
                      "label": "Uri example 2",
                      "uri": "https://github.com/GoneTone/line-example-bot-php"
                  }
              ]
          }
      ]
  }
}
==============================
*/
if (strtolower($message['text']) == "carousel template" || $message['text'] == "g" || $message['text'] == "s") {
  $client->replyMessage(array(
      'replyToken' => $event['replyToken'],
      'messages' => array(
          array(
              'type' => 'template', // 訊息類型 (模板)
              'altText' => 'Example buttons template', // 替代文字
              'template' => array(
                  'type' => 'carousel', // 類型 (輪播)
                  'columns' => array(
                      array(
                          'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
                          'title' => 'Example Menu 1', // 標題 1 <不一定需要>
                          'text' => 'Description 1', // 文字 1
                          'actions' => array(
                              array(
                                  'type' => 'postback', // 類型 (回傳)
                                  'label' => 'Postback example 1', // 標籤 1
                                  'data' => 'action=buy&itemid=123' // 資料
                              ),
                              array(
                                  'type' => 'message', // 類型 (訊息)
                                  'label' => 'Message example 1', // 標籤 2
                                  'text' => 'Message example 1' // 用戶發送文字
                              ),
                              array(
                                  'type' => 'uri', // 類型 (連結)
                                  'label' => 'Uri example 1', // 標籤 3
                                  'uri' => 'https://github.com/GoneTone/line-example-bot-php' // 連結網址
                              )
                          )
                      ),
                      array(
                          'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
                          'title' => 'Example Menu 2', // 標題 2 <不一定需要>
                          'text' => 'Description 2', // 文字 2
                          'actions' => array(
                              array(
                                  'type' => 'postback', // 類型 (回傳)
                                  'label' => 'Postback example 2', // 標籤 1
                                  'data' => 'action=buy&itemid=123' // 資料
                              ),
                              array(
                                  'type' => 'message', // 類型 (訊息)
                                  'label' => 'Message example 2', // 標籤 2
                                  'text' => 'Message example 2' // 用戶發送文字
                              ),
                              array(
                                  'type' => 'uri', // 類型 (連結)
                                  'label' => 'Uri example 2', // 標籤 3
                                  'uri' => 'https://github.com/GoneTone/line-example-bot-php' // 連結網址
                              )
                          )
                      )
                  )
              )
          )
      )
  ));
}

/**
圖片輪播模板陣列輸出 Json
==============================
{
  "type": "template",
  "altText": "Example image carousel template",
  "template": {
      "type": "image_carousel",
      "columns": [
          {
              "imageUrl": "https://api.reh.tw/line/bot/example/assets/images/example_1-1.jpg",
              "action": {
                  "type": "postback",
                  "label": "Postback example",
                  "data": "action=buy&itemid=123"
              }
          },
          {
              "imageUrl": "https://api.reh.tw/line/bot/example/assets/images/example_1-1.jpg",
              "action": {
                  "type": "message",
                  "label": "Message example",
                  "text": "Message example"
              }
          },
          {
              "imageUrl": "https://api.reh.tw/line/bot/example/assets/images/example_1-1.jpg",
              "action": {
                  "type": "uri",
                  "label": "Uri example",
                  "uri": "https://github.com/GoneTone/line-example-bot-php"
              }
          }
      ]
  }
}
==============================
*/
/* 未知錯誤，先註解起來，如果你知道原因請幫我修復OxO
if (strtolower($message['text']) == "image carousel template" || $message['text'] == "圖片輪播模板") {
  $client->replyMessage(array(
      'replyToken' => $event['replyToken'],
      'messages' => array(
          array(
              'type' => 'template', // 訊息類型 (模板)
              'altText' => 'Example image carousel template', // 替代文字
              'template' => array(
                  'type' => 'image_carousel', // 類型 (圖片輪播)
                  'columns' => array(
                      array(
                          'imageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example_1-1.jpg', // 圖片網址
                          'action' => array(
                              'type' => 'postback', // 類型 (回傳)
                              'label' => 'Postback example', // 標籤
                              'data' => 'action=buy&itemid=123' // 資料
                          )
                      ),
                      array(
                          'imageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example_1-1.jpg', // 圖片網址
                          'action' => array(
                              'type' => 'message', // 類型 (訊息)
                              'label' => 'Message example', // 標籤
                              'text' => 'Message example' // 用戶發送文字
                          )
                      ),
                      array(
                          'imageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example_1-1.jpg', // 圖片網址
                          'action' => array(
                              'type' => 'uri', // 類型 (連結)
                              'label' => 'Uri example', // 標籤
                              'uri' => 'https://github.com/GoneTone/line-example-bot-php' // 連結網址
                          )
                      )
                  )
              )
          )
      )
  ));
}
*/
?>