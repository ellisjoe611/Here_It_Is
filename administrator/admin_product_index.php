<?php
//admin_product_index.php
include 'admin_product_crud.php';
$object = new ProductCrud();
?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<title> Product Manager </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
body
{
margin:0;
padding:0;
background-color:#f1f1f1;
}
.box
{
width:900px;
padding:20px;
background-color:#fff;
border:1px solid #ccc;
border-radius:5px;
margin-top:100px;
}

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
	<li><a href="admin_account_index.php">Accounts</a></li>
	<li><a class="active_selected">Products</a></li>
	<li style="float:right"><a class="active_logout" href="admin_logout_process.php">Sign Out</a></li>
  
</ul>

<div class="container box">
<h3 align="center"> Product Manager </h3><br />
<br />

<button type="button" name="add" class="btn btn-success" data-toggle="collapse" data-target="#user_collapse">Add Product</button>

</br></br>

<!--추가할 정보 입력창을 보여준다-->
<div id="user_collapse" class="collapse">
<form method="post" id="user_form">

<label>Product ID</label>
<input type="text" name="p_id" id="p_id" class="form-control" />
</br>

<label>Product Count</label>
<input type="text" name="p_num" id="p_num" class="form-control" />
</br>

<label>카테고리_1(한글)</label>
<input type="text" name="cate1" id="cate1" class="form-control" />
</br>

<label>카테고리_2(한글)</label>
<input type="text" name="cate2" id="cate2" class="form-control" />
</br>

<label>Product Name</label>
<input type="text" name="name" id="name" class="form-control" />
</br>

<label>Expire after</label>
<input type="text" name="expiry_day" id="expiry_day" class="form-control" />
</br>

<label>Price</label>
<input type="text" name="price" id="price" class="form-control" />
</br>

<label>like_hate</label>
<input type="text" name="like_hate" id="like_hate" class="form-control" />
</br>

<label>Image</label>
<input type="file" name="productPhoto" id="productPhoto" />
<input type="hidden" name="hidden_productPhoto" id="hidden_productPhoto" />
<span id="uploaded_image"></span>
</br>

<div align="center">
<input type="hidden" name="action" id="action" />
<input type="hidden" name="product_id" id="product_id" />
<br><br>
<input type="submit" name="button_action" id="button_action" value="Add Product" />
</div>
</form>
</div>
<br>
<!-- 유저 정보 데이터 뿌려주는 곳 -->
<div id="user_table" class="table-responsive">
</div>
</div>
</body>
</html>

<script>
$(document).ready(function(){

load_data();
$('#action').val("Insert");

function load_data()
{
var action = "Load";
$.ajax({
url:"admin_product_action.php",
method:"POST",
data:{action:action},
success:function(data){

$('#user_table').html(data);
}
});
}


$('#user_form').on('submit',function(event){

event.preventDefault();

//여기에 html에서 쓰인 값들을 불러온다
var p_id = $('#p_id').val();
var p_num = $('#p_num').val();
var cate1 = $('#cate1').val();
var cate2 = $('#cate2').val();
var expiry_day = $('#expiry_day').val();
var price = $('#price').val();
var like_hate = $('#like_hate').val();
var extension = $('#productPhoto').val().split('.').pop().toLowerCase();

if(extension !='')
{
if(jQuery.inArray(extension,['gif','png','jpg','jpeg'])== -1)
{
alert("지원되지 않는 파일 입니다.");
$('#productPhoto').val('');
return false;
}

}
if(firstName != '' && lastName !='')
{
$.ajax({
url:"admin_product_action.php",
method:"POST",
data:new FormData(this),
contentType:false,
processData:false,
success:function(data){

alert(data);
$('#user_form')[0].reset();
load_data();
$("#action").val("Insert");
$('#button_action').val("추가");
$('#uploaded_image').html('');
}

});


}else
{
alert("Empty");
}

});

//수정 버튼 클릭했을 때
$(document).on('click','.update',function(){
var product_id = $(this).attr("p_id");
var action = "Single";
$.ajax({
url:"admin_product_action.php",
method:"POST",
data:{product_id:product_id,action:action},
dataType:"json",
success:function(data){

//보여주기(display)
$('.collapse').collapse("show");

$('#p_id').val(data.p_id);
$('#p_num').val(data.p_num);
$('#cate1').val(data.cate1);
$('#cate2').val(data.cate2);
$('#name').val(data.name);
$('#expiry_day').val(data.expiry_day);
$('#like_hate').val(data.like_hate);

$('#uploaded_image').html(data.image);
$('#hidden_productPhoto').val(data.productPhoto);
$('#button_action').val("수정");
$('#action').val("Edit");
$('#product_id').val(product_id);
}

});

})

});

</script>