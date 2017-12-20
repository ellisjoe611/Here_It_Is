<?php
  $host = "localhost";
  $user = "root";
  $pw = "root";
  $dbName = "myservice";
  $dbConnection=new mysqli($host, $user, $pw, $dbName);
  $dbConnection->set_charset("utf8");
  //접속 확인

  if(mysqli_connect_errno()){
    echo "접속실패\n";
    echo mysqli_connect_error();
  }
  else{
    echo "접속성공\n";
  }

  //페이지 값을 구함
  if(isset($_GET['page'])){
    $page = (int) $_GET['page'];
  }else{
    //페이지 값이 없으면 1로 초기화
    $page = 1;
  }

  // 페이지에 출력할 레코드 수
  $numView = 50;

  // 변수 page값에 따른 LIMIT의 첫번째 값 계산
  $firstLimitValue = ($numView * $page) - $numView;

  $sql = "SELECT * FROM product LIMIT {$firstLimitValue}, {$numView}";
  $result = $dbConnection->query($sql);
?>

<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<title>Product Manager</title>
<style>
table{font-size:15px}

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
	<li><a href="admin_manager_accounts.php">Accounts</a></li>
	<li><a class="active_selected">Products</a></li>
	<li class="dropdown">
		<a href="javascript:void(0)" class="dropbtn">Add Product</a>
		<div class="dropdown-content">
			<a href="admin_add_snacks.php">감미품</a>
			<a href="admin_add_foods.php">식품</a>
			<a href="admin_add_ices.php">빙과</a>
			<a href="admin_add_drinks.php">음료</a>
			<a href="admin_add_households.php">생활용품</a>
		</div>
	</li>
	<li style="float:right"><a class="active_logout" href="admin_logout_process.php">Sign Out</a></li>
  
</ul>

<br>
<h3 align = "center">Products</h3>
  <table width="100%" bgcolor="skyblue" cellspacing="1">
    <tr bgcolor="white" align="center">
      <td>Product ID</td>
      <td>Category_1</td>
      <td>Category_2</td>
      <td>Product Name</td>
      <td>Days before Expire</td>
      <td>like_hate</td>
    </tr>

<?php
  for($i = 0; $i < $result->num_rows; $i++){
    $member = $result->fetch_array(MYSQLI_ASSOC);
?>
      <tr bgcolor="white" align="center">
			<td><?=$member['id']?></td>
			<td><?=$member['cate1']?></td>
			<td><?=$member['cate2']?></td>
			<td><?=$member['name']?></td>
			<td><?=$member['expiry_day']?></td>
			<td><?=$member['price']?></td>
			<td><?=$member['like_hate']?></td>
		  
      </tr>
<?php } ?>
  </table>

</body>
</html>