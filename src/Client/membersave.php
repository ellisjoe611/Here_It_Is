<?php
 $host = 'localhost';
 $user = 'root';
 $pw = '777707';
 $dbName = 'hereitis';
 $mysqli = new mysqli($host, $user, $pw, $dbName);
 //get number of rows
 $query = "SELECT * FROM member";
 $data=mysqli_query($mysqli,$query);
 $totalRecords=mysqli_num_rows($data);

 $id=$totalRecords + 1;
 $password=$_POST['pwd'];
 $name=$_POST['name'];
 $phone=$_POST['phonenum'];
 $email=$_POST['email'];
 $gender=$_POST['gender'];
 $birthDate=$_POST['birthDate'];

 $sql = "insert into member (member_id, member_pass, member_name, phone_num, e_mail, gender, birthdate)";
 $sql = $sql. "values('$id','$password','$name','$phone','$email','$gender','$birthDate')";
 if($mysqli->query($sql)){
  echo 'success inserting';
 }else{
  echo 'fail to insert sql';
 }
?>
