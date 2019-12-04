<?php
//function api_getprovince(){
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
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
$res = json_decode($response,true);
echo "<pre>";
//print_r($res);
//print_r($res->rajaongkir->results);
echo "</pre>";
//die();
$ctr=0;
foreach ($res['rajaongkir']['results'] as $result) {
  $dataprovinsi[$ctr]=array(
    'idprovinsi'=>$result['province_id'],
    'namaprovinsi'=>$result['province']
  );
  $ctr++;
};
/*echo "<pre>";
print_r($dataprovinsi);

echo "</pre>";*/
//echo "</pre>";
//}

?>