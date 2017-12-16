<?php

//한 유저가 한 게시물에 좋아요를 눌렀는지 안눌렀는지 체크해주는 함수
//member 와 특정 product 로 조회 해서 값이 있으면 좋아요 버튼을 누른것
//없으면 안누른것
function already_like($connect, $member, $product)
{

  $query = "
  SELECT * FROM product_like
  WHERE product = '$product'
  AND member = '$member'";

  $statement = $connect -> query($query);
  $total_rows = mysqli_num_rows($statement);

if($total_rows > 0)
{
return true;
}
else
{
return false;
}

}

//게시물이 좋아요 몇 번을 받았는지 반환해 주는 함수
function count_content_like($connect, $product)
{

$query = "
SELECT * FROM product_like
WHERE product = '$product'";

$statement = $connect -> query($query);
$total_rows = mysqli_num_rows($statement);
return $total_rows;
}
?>
