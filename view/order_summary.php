<?php
$op= new OrderPrices();
$gp = $op->getGiftWrapPrice();
$qty = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
$size = filter_input(INPUT_POST, 'size');
$itemstring = $qty . " ". $size . " Wolfie Candles";
$cost = $qty * $op->getCandlePrice($size);
$coststring = "$".number_format($cost,2);

$taxrate = $op->getTaxRate();
$taxstring = "Tax rate: " . number_format(100 * $taxrate,2) . "%";
$taxtotal = $taxrate * $cost;
$taxstring2 = "$".number_format($taxtotal,2);

$shipping = filter_input(INPUT_POST, 'shipping');
$shippingcost = $op->getShippingCost($shipping);
if ($shippingcost > 0){
    $shippingstring = "$". number_format($shippingcost,2);
    } else {
        $shippingstring = "-";
    }

$giftwrap = filter_input(INPUT_POST, 'gift_wrap', FILTER_VALIDATE_BOOLEAN);
$giftwrapcost = $op->getGiftWrapPrice();
$giftmessage = filter_input(INPUT_POST, 'gift_message');
if ($giftwrap) {
        $giftwrapstring = "Yes";
        $displaymessage = "block";
        $giftstring = "$".number_format($giftwrapcost,2);
    } else {
        $giftwrapstring = "none";
        $displaymessage = "none";
        $giftstring = "-";

    }

    $totalcost = $shippingcost + $taxtotal + $cost + $giftwrapcost;
    $totalstring = "$".number_format($totalcost, 2);
    
    $totalString = "oasijdoajid";

?>





<!DOCTYPE html>
<html>
<head>
    <title>Wolfie's Candles</title>
    <link rel="stylesheet" type="text/css" href="./view/order.css"/>
</head>

<body>
    <main>
        <h1>Wolfie's Candles</h1>
   		
    <fieldset>
        <h2> Your Order</h2>
        <table>
            <tr><th> Order     </th><td><?php echo $itemstring;?>    </td><td class='moneytd'><?php echo $coststring;?></td></tr>
            <tr><th> Taxes     </th><td><?php echo $taxstring;?>     </td><td class='moneytd'><?php echo $taxstring2;?></td></tr>
            <tr><th> Shipping  </th><td><?php echo $shipping;?>      </td><td class='moneytd'><?php echo $shippingstring;?></td></tr>
            <tr><th> Gift Wrap </th><td><?php echo $giftwrapstring;?></td><td class='moneytd'><?php echo $giftstring;?></td></tr>
            <tr><th> Total     </th><td>                              </td><td class='moneytd'><?php echo $totalstring;?></td></tr>
                

        </table>
        <div id='giftmessagediv' style='display:<?php echo $displaymessage;?>'>
        <h3>Your Gift Message:</h3>
        <?php echo $giftmessage; ?>
        </div>
        <p>

    </fieldset>

    <br>
    </main>
</body>
</html>
