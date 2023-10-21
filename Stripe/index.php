<?php

require('config.php');

?>

<form action="submit.php" method="post">
<script

src="https://checkout.stripe.com/checkout.js" class="stripe-button"
data-key="<?php echo $publishableKey; ?>"
data-amount="500"
data-name="Deena Nath Soni"
data-description="Deena Nath Soni PHP Developer"
data-image="images/logoblack.png"
data-currency="inr"
data-email="test@gmail.com"

>

</script>



</form>