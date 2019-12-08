<?php
require_once("../config.php");
if($_POST){
$p=$_POST;
$state=$p['state'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$state."",
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
/*$res = json_decode($response,true);
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
foreach ($res['rajaongkir']['results'] as $result) {
    $datacity[$ctr]=array(
      'idcity'=>$result['city_id'],
      'city'=>$result['city']
    );
    $ctr++;
  };
  //echo "<pre>";
  //echo $datacity;
  echo "1";
//echo "</pre>"*/
echo $response;
}

?>