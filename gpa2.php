<?php

$API_URL = 'https://api.line.me/v2/bot/message';
$ACCESS_TOKEN = '072ioqcw4uT17+qwjIDmsn4XlTguP6hRKZjWyJf2nu5tFaheu0baLx26OQ3K5II9RyHunNm6/KGAVw+uDgy6GQEAeKsAhLGAIpJCYMLvxVW4aCCAL4XClCPZUtKmZzjBM5mOHHi5w8jFzTfgnDVFc1GUYhWQfeY8sLGRXgo3xvw=';
$channelSecret = '157d1d03926e37e516f42f5e9a44af73';

$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$content = file_get_contents('php://input');   // Get request content
$request_array = json_decode($content , true);   // Decode JSON to Array

$jsonFlex = [

        "type"=> "flex",
        "altText"=> "Flex Message",
        "contents"=> [
          "type"=> "bubble",
          "hero"=> [
            "type"=> "image",
            "url"=> "https://i.dlpng.com/static/png/351060_preview.png",
            "size"=> "full",
            "aspectRatio"=> "3:1",
            "action"=> [
              "type"=> "uri",
              "label"=> "Action",
              "uri"=> "https://linecorp.com"
]
        ],
          "body"=> [
            "type"=> "box",
            "layout"=> "vertical",
            "spacing"=> "md",
            "action"=> [
              "type"=> "uri",
              "label"=> "Action",
              "uri"=> "https://linecorp.com"
],
            "contents"=> [
              [
                "type"=> "text",
                "text"=> "ผลการเรียน",
                "size"=> "xl",
                "size"=> "xl",
                "weight"=>  "bold",
                "color"=>  "#226068"
            ],
              [
                "type"=>  "box",
                "layout"=>  "vertical",
                "spacing"=>  "sm",
                "contents"=>  [
                  [
                    "type"=>  "box",
                    "layout"=>  "baseline",
                    "contents"=>  [
                      [
                        "type"=>  "text",
                        "text"=>  "ผลการเรียนรวม",
                        "flex"=>  0,
                        "margin"=>  "sm",
                        "weight"=>  "regular",
                        "color"=>  "#226068"
                    ],
                      [
                        "type"=>  "text",
                        "text"=>  "00.00",
                        "size"=>  "xl",
                        "align"=>  "end",
                        "weight"=>  "bold",
                        "color"=>  "#1084EA"
                    ]
                    ]
                    ],
                  [
                    "type"=> "separator",
                    "margin"=>  "md"
                ],
                  [
                    "type"=>  "box",
                    "layout"=>  "baseline",
                    "contents"=>  [
                      [
                        "type"=>  "text",
                        "text"=>  "รวมหน่วยกิจ ",
                        "flex"=>  0,
                        "margin"=>  "sm",
                        "weight"=>  "regular",
                        "color"=>  "#226068"
                    ],
                      [
                        "type"=>  "text",
                        "text"=>  "100.0 หน่วยกิจ",
                        "size"=>  "sm",
                        "align"=>  "end",
                        "weight"=>  "regular",
                        "color"=>  "#226068"
                    ]
                    ]
                ]
                ]
            ]
            ]
            ],
          "footer"=>  [
            "type"=>  "box",
            "layout"=>  "vertical",
            "contents"=>  [
              [
                "type"=>  "button",
                "action"=>  [
                  "type"=>  "uri",
                  "label"=>  "ผลการเรียนแต่ละเทอม",
                  "uri"=>  "https://linecorp.com"
            ],
                "color"=>  "#519BDC",
                "style"=>  "primary"
            ]
            ]
            ]
        ]
    ];
if ($request_array ) {
    foreach ($request_array['events'] as $event) {
        error_log(json_encode($event));
        $reply_message = '';
        $reply_token = $event['replyToken'];


        $data = [
            'replyToken' => $reply_token,
            'messages' => [$jsonFlex]
        ];

        //print_r($data);

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