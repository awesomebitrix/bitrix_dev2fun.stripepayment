<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * User: darkfriend <hi@darkfriend.ru>
 * Date: 26.02.2017
 * Time: 21:13
 */
?>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<form action="<?=$APPLICATION->GetCurDir();?>?ORDER_ID=<?=$orderID?>" method="POST" id="stripe-form">
    <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="<?=$publishKey?>"
            data-token="callTokenHandler"
            data-amount="<?=($sum*100)?>"
            data-name="ORDER #<?=$order->getId()?>"
            data-description=""
            data-email="<?=$USER->GetEmail()?>"
            data-currency="USD"
            data-locale="auto"
            data-allow-remember-me="false"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            data-locale="auto">
    </script>
</form>
