<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<title>감미품(Snacks) 추가</title>
<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>
</head>


<body>
<h1 align="center">Add Snacks</h1>
<h2 align="center">감미품 추가</h2>
<br>

<div>
	<form action="/action_page.php">
		<label for="product_id">Product ID</label>
		<input type="text" id="product_id" name="product_id" placeholder="Product ID.." required>
    
		<label for="category_1">Big Category</label>
		<select id="category_1" name="category_1">
			<option value="감미품" SELECTED>감미품</option>
			
		</select>
    
		<label for="category_2">Small Category</label>
		<select id="category_2" name="category_2">
			<option value="초콜릿류" SELECTED>초콜릿류</option>
			<option value="껌류">껌류</option>
			<option value="감자칩류">감자칩류</option>
			<option value="비스켓류">비스켓류</option>
			<option value="건과류">건과류</option>
		</select>
    
		<label for="product_id">Product Name</label>
		<input type="text" id="product_name" name="product_name" placeholder="Product Name.." required>
    
		<label for="expire_date">Expiration Date</label>
		<input type="text" id="expire_date" name="expire_date" placeholder="Expiration Date.." required>
    
		<label for="price">Price</label>
		<input type="text" id="price" name="price" placeholder="Price.." required>
    
		<br><br><br><br>
		<input type="submit" value="Submit">
	</form>
</div>

</body>
</html>
