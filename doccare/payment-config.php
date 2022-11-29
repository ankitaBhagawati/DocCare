<?php
require('vendor/stripe-php-master/init.php');

$publishableKey="pk_test_51JTLEcSByJUZXdZWX1YqZWjimd49ZuhiCJi3HeKVaUz9BQ0vRE89Oz3BDr8L42HMtjpNCWJqQXzVq357zNynZndm00bhMi7Ntx";

$secretKey="sk_test_51JTLEcSByJUZXdZWoJsX4P9bmF20tqNWJadJT9dLFCeIKXFo1lGgyHEcxjY9hHM9wWDczPbPxAvrVq6zt1kSMI3R00YYdxVfSM";

\Stripe\Stripe::setApiKey($secretKey);
?>