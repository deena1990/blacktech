<?php

require('stripe-php-master/init.php');

$publishableKey = "pk_test_51MjxYuSEfXPuupzVIvNPpgJA7Oz8GCHUlxPnKBAhcNhRScBNQjqTu2anpRsSiSzi7D6yJsR6Lv79t5tZfqbDoUep00T84S9Nl4";
$secretKey = "sk_test_51MjxYuSEfXPuupzVzysqQKOiSAhVxbz3FGTxd53I6ACJCTaF0pvYpIudylhbBYheEN969aPuprtx4MXzVAdCzBZc00kxHSaF9w";

\Stripe\Stripe::setApiKey($secretKey);

?>