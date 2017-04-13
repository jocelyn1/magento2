<?php

function getMediaGalleryEntries()
{
    $image = 'pub/media/import';

    $entries[] = [
        'position' => 1,
        'media_type' => 'image',
        'disabled' => false,
        'label' => 'azerty',
        'types' => ['image', 'small_image', 'thumbnail', 'swatch_image'],
        'content' => [
            'type' => 'image/jpeg',
            'name' => pathinfo($image,PATHINFO_FILENAME).'.'.pathinfo($image, PATHINFO_EXTENSION),
            'base64_encoded_data' => base64_encode(file_get_contents($image)),
        ]
    ];

    return $entries;
}






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


    $requestUrl='http://www.magento2.lan/rest/V1/products/';


    $image = 'pub/media/import/tee-shirt-rouge.jpg';

    $productData = array(
        'sku'               => 'skusku',
        'name'              => 'Simple Product ' . uniqid(),
        'visibility'        => 4,
        'type_id'           => 'simple',
        'price'             => 50,
        'status'            => 1,
        'attribute_set_id'  => 4,
        'weight'            => 1,
        'extension_attributes' => array(
            'stock_item' => array(
                'qty' => 20,
                'is_in_stock' => 1
            )
        ),
        'custom_attributes' => array(
            array('attribute_code' => 'category_ids', 'value' => ['5'] ),
            array('attribute_code' => 'description', 'value' => 'Simple Description' ),
            array('attribute_code' => 'short_description', 'value' => 'Simple  Short Description' )
        ),
        'media_gallery_entries' => array(
            array(
                'position' => 1,
                'media_type' => 'image',
                'disabled' => false,
                'label' => 'azerty',
                'types' => array('image', 'small_image', 'thumbnail', 'swatch_image'),
                'content' => array(
                    'type' => 'image/jpeg',
                    'name' => pathinfo($image,PATHINFO_FILENAME).'.'.pathinfo($image, PATHINFO_EXTENSION),
                    'base64_encoded_data' => base64_encode(file_get_contents($image)),
                )
            )
        ),
        'product_links' => array(
            array(
                'sku' => 'skusku',
                'link_type' => 'related',
                'linked_product_sku' => '0004999'
            )
        )
    );

    $productData = json_encode(array('product' => $productData));

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
