<?php
header('Content-Type: application/json');
$input = json_decode(file_get_contents("php://input"), true);
$query = $input['query'] ?? 'Recommend property';

$apiKey = 'YOUR_OPENAI_API_KEY';

$data = [
  "model" => "gpt-4.1-mini",
  "messages" => [
    ["role"=>"system","content"=>"You are a real estate AI advisor for Leaf-Note."],
    ["role"=>"user","content"=>$query]
  ]
];

$ch = curl_init("https://api.openai.com/v1/chat/completions");
curl_setopt_array($ch,[
  CURLOPT_HTTPHEADER=>[
    "Authorization: Bearer $apiKey",
    "Content-Type: application/json"
  ],
  CURLOPT_POST=>true,
  CURLOPT_POSTFIELDS=>json_encode($data),
  CURLOPT_RETURNTRANSFER=>true
]);

echo curl_exec($ch);
?>