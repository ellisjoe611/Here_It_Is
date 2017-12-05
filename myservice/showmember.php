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

  $sql = "SELECT * FROM mymember LIMIT {$firstLimitValue}, {$numView}";
  $result = $dbConnection->query($sql);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>고객 리스트</title>
<style>
table{font-size:10px}
</style>
</head>
<body>
  <h3>고객 리스트</h3>
  <table width="100%" bgcolor="skyblue" cellspacing="1">
    <tr bgcolor="white" align="center">
      <td>ID</td>
      <td>이름</td>
      <td>클라스</td>
      <td>이메일</td>
      <td>성별</td>
      <td>가입일</td>
    </tr>

<?php
  for($i = 0; $i < $result->num_rows; $i++){
    $member = $result->fetch_array(MYSQLI_ASSOC);
?>
      <tr bgcolor="white" align="center">
        <td><?=$member['myMemberID']?></td>
        <td><?=$member['userName']?></td>
        <td><?=$member['class']?></td>
        <td><?=$member['email']?></td>
        <td><?=(($member['gender']=='w')?'여성':'남성')?></td>
        <td><?=$member['regTime']?></td>
      </tr>
<?php } ?>
  </table>

</body>
</html>
