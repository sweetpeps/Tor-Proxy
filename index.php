
<?php
list($subdomain,$host) = explode('.', $_SERVER["SERVER_NAME"]);
$url = 'http://' . $subdomain . '.onion/';
$request = $_SERVER['REQUEST_URI'];
$ch = curl_init();
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  
 
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);
   
}
 $options = [
  CURLOPT_URL => $url . $request,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HEADER         => false,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_ENCODING       => "",
CURLOPT_AUTOREFERER    => true,
  CURLOPT_CONNECTTIMEOUT => 120,
  CURLOPT_TIMEOUT        => 120,
  CURLOPT_MAXREDIRS      => 10, 
  CURLOPT_HTTPPROXYTUNNEL      => true,
  CURLOPT_PROXYTYPE    => CURLPROXY_HTTP,  
  CURLOPT_PROXY    => 'localhost:8118',  

];


curl_setopt_array($ch, $options);
$remoteSite = curl_exec($ch);
$headerr = curl_getinfo($ch);
curl_close($ch);
header('Content-Type: '.$headerr['content_type']);
echo  $remoteSite;
?>
