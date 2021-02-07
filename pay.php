<?php
require('./instamojo.php'); 
//dev
const API_KEY ="####yourtestapikey####";
const AUTH_TOKEN = "####yourtestapikey####";

//prod
//const API_KEY ="####yourprodapikey####";
//const AUTH_TOKEN = "####yourprodapikey####";



if(isset($_POST['purpose']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['amount']))
{
//dev
    $api = new Instamojo\Instamojo(API_KEY, AUTH_TOKEN,'https://test.instamojo.com/api/1.1/');
//prod
//  $api = new Instamojo\Instamojo(API_KEY, AUTH_TOKEN,'https://www.instamojo.com/api/1.1/');
   
    try {
        $response = $api->paymentRequestCreate(array( 
            "purpose" => $_POST['purpose'],
            "buyer_name" => $_POST['name'],
            "amount" => $_POST['amount'],
            "send_email" => true,
            "email" => $_POST['email'],
			//dev
            "redirect_url" => "http://localhost/InstamojoPHP-master/success.html"
			//prod
		     //"redirect_url" => "http://yourdomainname/InstamojoPHP-master/success.html"
            ));
        header('Location:'. $response['longurl']);
    }
    catch (Exception $e) {
        print('Error: ' . $e->getMessage());
    }
}
?>
