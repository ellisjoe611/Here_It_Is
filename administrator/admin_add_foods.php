<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<title>식품(Foods) 추가</title>
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
<h1 align="center">Add Foods</h1>
<h2 align="center">식품 추가</h2>
<br>

<div>
	<form action="/action_page.php">
		<label for="product_id">Product ID</label>
		<input type="text" id="product_id" name="product_id" placeholder="Product ID.." required>
    
		<label for="category_1">Big Category</label>
		<select id="category_1" name="category_1">
			<option value="식품" SELECTED>식품</option>
			
		</select>
    
		<label for="category_2">Small Category</label>
		<select id="category_2" name="category_2">
			<option value="라면류" SELECTED>라면류</option>
			<option value="레토르트류">레토르트류</option>
			<option value="참치통조림류">참치통조림류</option>
			<option value="냉동식품류">냉동식품류</option>
			<option value="신선식품류">신선식품류</option>
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
