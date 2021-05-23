
<!DOCTYPE html>
<html lang="en">

<head>
  <title>EY | GDS</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/fire.css">
  <style>
  

  
.btn {
  border: none;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
}

.success {background-color: #4CAF50;} /* Green */
.success:hover {background-color: #46a049;}

.danger {background-color: #f44336;} /* Red */ 
.danger:hover {background: #da190b;}

</style>

<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/header-basic.css">
	

</head>

<body>

	<header class="header-basic">

			<div class="header-limiter">

				<h1><a href="index.php">Fire<span>pad</span></a></h1>

				<nav>
					<a href="index.php" class="selected">Home</a>
					<a href="employee.php">Admin</a>
					
				</nav>
			</div>

		</header>
		
		

<div class="content">
  <div class="fire">
  <div class="bottom"></div>
  <figure></figure>
  <figure></figure>
  <figure></figure>
  <figure></figure>
  <figure></figure>
  <figure></figure>
  <figure></figure>
  <figure></figure>
  <figure></figure>
  <figure></figure>
  <figure></figure>
  <figure></figure>
  <figure></figure>
  <figure></figure>
  <figure></figure>

    </div>

</div>
<svg xmlns="http://www.w3.org/2000/svg" version="1.1">
  <defs>
    <filter id="goo">
      <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
      <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
      <feBlend in="SourceGraphic" in2="goo" />
  	</filter>
  </defs>
</svg>

  
  
		<form class="modal-content animate" action="#" method="POST"> 
			
             <center><h2><b>Send Alert To Employee</b></h2>
			<div class="container"> 
				
				<!--<input type="text" placeholder="Enter Phone No." name="mobile" ><br><br>
				<input type="text" placeholder="Enter Message" name="msg" ><br><br>-->
				

				<button class="btn danger" type="submit" name="send">Send Alert!!!</button> 
				
			</div> 
			</center>
		</form>
		
		<form class="modal-content animate" action="#" method="POST"> 
			
             <center><h2><b>Emergency Exit Image</b></h2>
			<div class="container"> 
				
				<!--<input type="text" placeholder="Enter Phone No." name="mobile" ><br><br>
				<input type="text" placeholder="Enter Message" name="msg" ><br><br>-->
				

				<button class="btn success" type="submit" name="submit">Send Emergency Exit Image</button> 
				
			</div> 
			</center>
		</form>
<img src="img/1.gif" style="width:350px;height:350px;margin-left:50px;">
<img src="img/2.gif" style="width:400px;height:350px;float:center;margin-left:350px;">
<img src="img/3.gif" style="width:350px;height:350px;float:right;">
	<?php
if(isset($_REQUEST['send'])){

	$c = mysql_connect('localhost', 'root', '');
		mysql_select_db('sms', $c);
	
		$b = "SELECT * FROM sms1";
		$d = mysql_query($b) or die(mysql_error());
		while($row=mysql_fetch_array($d)) {
			extract($row);
	 //echo $a=$phone.',';	
		
	$fields = array(
    "sender_id" => "FSTSMS",
    "message" => "$msg",
    "language" => "english",
    "route" => "p",
    "numbers" => "$phone",
);
		}
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "authorization: dYhAJfgvelmRQq3wINaFjGHD5EzZXyP2rLVsW87KCiOknt0TxBTrymoghbOsRYxdfj2Xzqan07NWBS8k",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  "cURL Error #:" . $err;
} else {
  $response;
}
}
?>

<?php

if(isset($_REQUEST['submit'])){

	$c = mysql_connect('localhost', 'root', '');
		mysql_select_db('sms', $c);
	
		$b = "SELECT * FROM sms1";
		$d = mysql_query($b) or die(mysql_error());
		while($row=mysql_fetch_array($d)) {
			extract($row);
$code='91';
$arr=json_encode(array(
	"phone"=>$code . "$phone",
	"body"=>"Hello Chaitanya"
));
$url="https://api.chat-api.com/instance269893/message?token=8gdut79uwg3il2k7";
$arr=json_encode(array(
	"phone"=> $code . "$phone",
	"body"=>"https://i.pinimg.com/originals/2c/3f/2b/2c3f2b02e428ab812fe18491065f37ad.png",
	"filename"=>"Emergency Exit.png"
));
$url="https://api.chat-api.com/instance269893/sendFile?token=8gdut79uwg3il2k7";
			

$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$arr);
curl_setopt($ch,CURLOPT_HTTPHEADER,array(
	'Content-type:application/json',
	'Content-length:'.strlen($arr)
));
$result=curl_exec($ch);
curl_close($ch);
 $result;
 }
		}
?>
<?php

if(isset($_REQUEST['submit'])){

	$c = mysql_connect('localhost', 'root', '');
		mysql_select_db('sms', $c);
	
		$b = "SELECT * FROM user";
		$d = mysql_query($b) or die(mysql_error());
		while($row=mysql_fetch_array($d)) {
			extract($row);
$code='91';
$arr=json_encode(array(
	"phone"=>$code . "$phone",
	"body"=>"Hello " . " $username " . "The Fire Alert Has Been Activated Please Leave The Building By The Nearest Exit."
));
$url="https://api.chat-api.com/instance269893/message?token=8gdut79uwg3il2k7";


$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$arr);
curl_setopt($ch,CURLOPT_HTTPHEADER,array(
	'Content-type:application/json',
	'Content-length:'.strlen($arr)
));
$result=curl_exec($ch);
curl_close($ch);
 $result;
		}
}
?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		
</body>
</html>