<?php
require_once('vendor/autoload.php');

$stripe = array(
  "secret_key"      => "sk_test_WC7ow4OVjkQ5TPvvJO8gNu8l",
  "publishable_key" => "pk_test_d3si4rbGewZyQJkoW0Ys2AFg"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);//<a href="{{ action('CartController@detallePedido') }}" class="button width-130 success round text-center"><i class="fi-credit-card"></i>Comprar</a>
?>
