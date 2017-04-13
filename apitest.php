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

for ($i = 0; $i < 5000; $i++) {
    $requestUrl='http://www.magento2.lan/rest/V1/products/';


   $stock_item = array(
       "qty" => 20,
       "is_in_stock" => 1
   );


    $sampleProductData = array(
        "attribute_set_id" => 4,
        "sku" => '000'. $i,
        "name" => "co" . $i,
        "price" => 20,
        "status" => 1,
        "visibility" => 1,
        "weight" => 150,
        "type_id" => "simple",
        "extension_attributes" => array("stock_item" => $stock_item)
    );

    $productData = json_encode(array('product' => $sampleProductData));

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $requestUrl);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $productData);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    var_dump($response);

    unset($productData);
    unset($sampleProductData);
}