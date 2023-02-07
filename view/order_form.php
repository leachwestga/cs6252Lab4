<!DOCTYPE html>
<html>
<head>
    <title>Wolfie's Candles</title>
    <link rel="stylesheet" type="text/css" href="./view/order.css"/>
</head>

<body>
    <main>
    <h1>Wolfie's Candles</h1>
    <form action="index.php" method="post">
		<input type="hidden" name="action" value="order_summary">
		
    <fieldset>
    <legend>Order Options</legend>
        <p>
            <label for="quantity">Quantity:</label>
            <input type="text" name="quantity" value="<?php echo $quantity; ?>" class="textbox">
            <span class="error_field"><?php echo $error_message; ?></span>
		</p>
		
        <p>Size:<br>
        	<select name="size">
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
        	</select>
		</p>
		
		<p>Shipping options<br>
            <input type="radio" name="shipping" value="free">
            Free (5-10 business days)<br>
            <input type="radio" name="shipping" value="standard" checked>
            Standard (4-5 business days)<br>
            <input type=radio name="shipping" value="expedited">
            Expedited (2-3 days)<br>
            <input type=radio name="shipping" value="one_day">
            One-day delivery (1 business days)<br>
        </p>
        <p>
            <input type="checkbox" name="gift_wrap">Gift-wrap this order
            <div id="gift">
                If gift-wrapped, enter a personalized gift message:<br>
                (maximum of 300 characters)
                <textarea name="gift_message" rows="5" cols="50" maxlength="300"></textarea>
        	</div>
        </p>
    </fieldset>

    <input type="submit" value="Order Summary">
    <br>

    </form>    
    </main>
</body>
</html>
