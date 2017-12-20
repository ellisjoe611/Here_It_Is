<?php
include("likefunction");
$connect = myqueryi_connect("localhost", "root", "root","myservice");


$member=$_POST["member"];
$product=$_POST["product"];
$arlready=already_like($connect,$member,$product);


//좋아요 혹은 취소하기

if($arlready==true){ //이미 좋아요를 눌었을때 -> 취소하기
  //멤버와 프로덕트 tuple 삭제
  $query="
  DELETE FROM product_like
  WHERE product='$product' and member='$member';
  ";
  if(myqueryi_query($connect, $query))
  {
  echo '삭제 완료';
  }

}
else{ //좋아요!
  //tuple 추가하기!
  $query="
  INSERT INTO product_like (proudct, member)
  VALUES($product, $member);
  ";
  if(myqueryi_query($connect, $query))
  {
  echo '추가 완료';
  }

}
  //최신 좋아요수 구하기
  $totallike=count_content_like($connect,$product);
  $query="
  UPDATE product
  SET likes='$totallike'
  WHERE p_id='$product'
  ";
  myqueryi_query($connect, $query);
  //전체 좋아요수 리턴
  return $totallike;

?>
