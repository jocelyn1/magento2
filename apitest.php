<?php

$adminUrl='http://www.magento2.lan/rest/V1/integration/admin/token';
$ch = curl_init();
$data = array("username" => "wsuser", "password" => "password123");
$data_string = json_encode($data);
$ch = curl_init($adminUrl);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string))
);
$token = curl_exec($ch);
$token =  json_decode($token);

//Use above token into header
$headers = array("Authorization: Bearer $token","Content-Type: application/json");

$skus = array(
    '24-WG085',
    '24-WG086'
);


foreach ($skus as $sku) {
    $requestUrl='http://www.magento2.lan/rest/V1/products/' . $sku;

    $sampleProductData = array(
        "name" => "co" . $sku,
        "price" => 150
    );
    $productData = json_encode(array('product' => $sampleProductData));

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $requestUrl);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $productData);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    var_dump($response);

    unset($productData);
    unset($sampleProductData);
}