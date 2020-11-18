<!DOCTYPE html>
<html>
<head>
	<title>Order food</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="order.js"></script>
</head>
<body>
	<form action="#" method="post" id="order_form">
		<div style="padding: 10px">
			<label for="foodName">Type of food:</label>
			<input type="text" name="food" id="foodName">
		</div>
		<div style="padding: 10px">
			<label for="amount">Quantity</label>
			<input type="number" name="quantity" id="amount">
		</div>
		<div style="padding: 10px">
			<input type="submit" name="order_btn" id="btn">
		</div>
	</form>
</body>
</html>