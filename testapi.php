<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: 65e1e7b8ec96ac864026f422af5512d9"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$results[]=json_decode($response,true);
    
  //echo $results;

foreach($results as $result) {
     echo $result['results']['provinsi'];
  };
?>