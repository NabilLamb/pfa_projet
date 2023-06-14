<?php
require('stripe-php-master/init.php');
require_once('vendor/autoload.php'); // Inclure la bibliothèque Stripe
$publishableKey="pk_test_51N1u3jJMspsNwoiunoHxiBQOOCwOUr0agVfg8iBtj91c9tHdkLS0LZWjX2tjRtQnRBA4y4XAWe87vgaZq4ochgRQ002Ab2Wolg";

$secretKey="sk_test_51N1u3jJMspsNwoiutwvFh6W7cK5NAXMNTKJx3nOdfjKmONliadvrrJEO2OJUKlUVvI3djBNUrzMWHvvOubruQUbv00KnQIY3mq";
\Stripe\Stripe::setApiKey($secretKey);
?>