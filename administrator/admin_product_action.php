<?php
include 'admin_product_crud.php';
$object = new ProductCrud();

if(isset($_POST["action"]))
{
//리스트 조회
if($_POST["action"] == "Load")
{
echo $object -> get_data_in_table("SELECT * FROM product ORDER BY p_id ASC");
}


//값들을 삽입한다
if($_POST["action"] == "Insert")
{
	$p_id = mysqli_real_escape_string($object ->connect, $_POST["p_id"]);
	$p_num = mysqli_real_escape_string($object ->connect, $_POST["p_num"]);
	$cate1 = mysqli_real_escape_string($object ->connect, $_POST["cate1"]);
	$cate2 = mysqli_real_escape_string($object ->connect, $_POST["cate2"]);
	$name = mysqli_real_escape_string($object ->connect, $_POST["name"]);
	$expiry_day = mysqli_real_escape_string($object ->connect, $_POST["expiry_day"]);
	$price = mysqli_real_escape_string($object ->connect, $_POST["price"]);
	$like_hate = mysqli_real_escape_string($object ->connect, $_POST["like_hate"]);
	$productPhoto = $object -> upload_file($_FILES["productPhoto"]);

	//activate query(모은 정ㅂ들에 대해서 쿼리를 작동한다)
	$query = "INSERT INTO product (p_id, p_num, cate1, cate2, name, expiry_day, price, like_hate, productPhoto) 
	VALUES ('".$p_id."','".$p_num."', '".$cate1."', '".$cate2."', '".$name."', '".$expiry_day."', '".$price."', '".$like_hate."', '".$productPhoto."')";

	$object -> execute_query($query);

	echo 'Add complete';
}

//수정
if($_POST["action"] == "Single")
{
$output = '';
$query = "SELECT * FROM product WHERE p_id = '".$_POST["product_id"]."'";
$result = $object -> execute_query($query);

//값들을 display한다
while($row = mysqli_fetch_array($result))
{ 
output["p_id"] = $row["p_id"];
$output["p_num"] = $row["p_num"];
$output["cate1"] = $row["cate1"];
$output["cate2"] = $row["cate2"];
$output["name"] = $row["name"];
$output["expiry_day"] = $row["expiry_day"];
$output["price"] = $row["price"];
$output["like_hate"] = $row["like_hate"];
$output["productPhoto"] = '<img src="upload/'.$row["productPhoto"].'" class="img-thumbnail" width="50" height="35" />';
}

echo json_encode($output);

}


//수정2

if($_POST["action"]== "Edit")
{
$productPhoto = '';

if($_FILES["productPhoto"]["name"] != '')
{
$productPhoto = $object -> upload_file($_FILES["productPhoto"]);
}else
{
$productPhoto = $_POST["hidden_productPhoto"];
}

//수정할 값들을 불러온다
$p_id = mysqli_real_escape_string($object ->connect, $_POST["p_id"]);
$p_num = mysqli_real_escape_string($object ->connect, $_POST["p_num"]);
$cate1 = mysqli_real_escape_string($object ->connect, $_POST["cate1"]);
$cate2 = mysqli_real_escape_string($object ->connect, $_POST["cate2"]);
$name = mysqli_real_escape_string($object ->connect, $_POST["name"]);
$expiry_day = mysqli_real_escape_string($object ->connect, $_POST["expiry_day"]);
$price = mysqli_real_escape_string($object ->connect, $_POST["price"]);
$like_hate = mysqli_real_escape_string($object ->connect, $_POST["like_hate"]);

$query = "UPDATE product SET p_id ='".$p_id."' , p_num = '".$p_num."', cate1 = '".$cate1."' , cate2 = '".$cate2."'
, name = '".$name."' , expiry_day = '".$expiry_day."' , price = '".$price."' , like_hate = '".$like_hate."' , productPhoto = '".$productPhoto."' 
WHERE p_id = '".$_POST["product_id"]."' ";
$object -> execute_query($query);
echo "수정 성공";
}



}



?>