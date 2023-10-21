<?php

require('config.php');

\Stripe\Stripe::setVerifySslCerts(false);

$token = $_POST['stripeToken'];

$data=\Stripe\Charge::create(array(
    "amount"=>500,
    "currency"=>"inr",
    "description"=>"Deena Nath Soni PHP Developer",
    "source"=>$token
));

echo "<pre>";
print_r($data);

?>