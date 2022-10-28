<?php
// Initialize the variables
$consumer_key = '3A4bGbLUzYze6krQdpVkHOwpAEPgbBng';
$consumer_secret = '8AzNNqHJ9gnG44Zu';
$Business_Code = '9654421';
$Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
$Type_of_Transaction = 'CustomerBuyGoodsOnline';
$Token_URL = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$phone_number = $_POST['phone_number'];
$OnlinePayment = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
$total_amount = $_POST['amount'];
$CallBackURL = 'https://tweetbot.site/callback.php?key=your password';
$Time_Stamp = date("Ymdhis");
$password = base64_encode($Business_Code . $Passkey . $Time_Stamp);

//////////////////////////////////////////////////////////////////////////////////////////

$curl_Tranfer = curl_init();
curl_setopt($curl_Tranfer, CURLOPT_URL, $Token_URL);
$credentials = base64_encode($consumer_key . ':' . $consumer_secret);
curl_setopt($curl_Tranfer, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials));
curl_setopt($curl_Tranfer, CURLOPT_HEADER, false);
curl_setopt($curl_Tranfer, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_Tranfer, CURLOPT_SSL_VERIFYPEER, false);
$curl_Tranfer_response = curl_exec($curl_Tranfer);

$token = json_decode($curl_Tranfer_response)->access_token;

////////////////////////////////////////////////////////////////////////////////////

$curl_Tranfer2 = curl_init();
curl_setopt($curl_Tranfer2, CURLOPT_URL, $OnlinePayment);
curl_setopt($curl_Tranfer2, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $token));

$curl_Tranfer2_post_data = [
    'BusinessShortCode' => $Business_Code,
    'Password' => $password,
    'Timestamp' =>$Time_Stamp,
    'TransactionType' =>$Type_of_Transaction,
    'Amount' => $total_amount,
    'PartyA' => $phone_number,
    'PartyB' => $Business_Code,
    'PhoneNumber' => $phone_number,
    'CallBackURL' => $CallBackURL,
    'AccountReference' => 'Hillary',
    'TransactionDesc' => 'Test',
];

$data2_string = json_encode($curl_Tranfer2_post_data);

curl_setopt($curl_Tranfer2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl_Tranfer2, CURLOPT_POST, true);
curl_setopt($curl_Tranfer2, CURLOPT_POSTFIELDS, $data2_string);
curl_setopt($curl_Tranfer2, CURLOPT_HEADER, false);
curl_setopt($curl_Tranfer2, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl_Tranfer2, CURLOPT_SSL_VERIFYHOST, 0);
$curl_Tranfer2_response = json_decode(curl_exec($curl_Tranfer2));

echo json_encode($curl_Tranfer2_response, JSON_PRETTY_PRINT);
?>

<form class="contact2-form validate-form" action="#" method="post">
   <input type="hidden" name="Check_request_ID" value="<?php echo $curl_Tranfer2_response->Check_request_ID ?>">
   </br></br>
   <button class="contact2-form-btn" style="margin-bottom: 30px;">Confirm Payment is Complete</button>
</form>
https://tweetbot.site/ - We are a company offering brokerage services to clients interested in investing in various property projects in the country.
Our customer journey:
1. Awareness:We advertise various properties available via various advertisement channels 
2.Engagement: On ad channels used we engage with potential clients who show interest in the advertised properties
3. Evaluation: We take the clients for site visits and show proof of property ownership from the seller.
4. Purchase: Once the client is content they purchase the property from where we collect our commission as per our agreement with the seller.
Refund process: We collect our commission if and only when the sale of property is done and our brokerage services have been offered. There is no pre-payment before the service is offered.

0716912002

Wang'ang'a


39290974

farajiproperties@gmail.com

