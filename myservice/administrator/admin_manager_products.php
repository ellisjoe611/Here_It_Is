<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<title>Product Manager</title>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a,
.dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, 
.dropdown:hover .dropbtn {
    background-color: #4CAF50;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}
.dropdown:hover
.dropdown-content {display: block;}

.active_selected {background-color: #4CAF50;}
.active_logout {background-color: red;}
</style>
</head>

<body>

<ul>
	<li><a href="admin_manager_accounts.html">Accounts</a></li>
	<li><a class="active_selected">Products</a></li>
	<li class="dropdown">
		<a href="javascript:void(0)" class="dropbtn">Add Product</a>
		<div class="dropdown-content">
			<a href="admin_add_snacks.html">감미품</a>
			<a href="admin_add_foods.html">식품</a>
			<a href="admin_add_ices.html">빙과</a>
			<a href="admin_add_drinks.html">음료</a>
			<a href="admin_add_households.html">생활용품</a>
		</div>
	</li>
	<li style="float:right"><a class="active_logout" href="admin_logout_process.php">Sign Out</a></li>
  
</ul>

<?php
$servername = "localhost";
$username = "username";
$password = "athens94";
$dbname = "MYPROD";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * from product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["id"]. " - ". $row["cate1"]. " " . $row["cate2"] ." ".$row["name"]
		  ." ".$row["expiry_day"]." ".$row["price"]." ".$row["like_hate"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?> 
</body>
</html>