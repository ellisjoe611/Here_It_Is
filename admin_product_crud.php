<?php

class ProductCrud
{

public $connect;
private $host = "localhost";
private $username = 'root';
private $password = 'root';	//get yout OWN PASSWORD on sql, please!
private $database = 'myservice';

//객체가 생성될때 호출
function __construct()
{
	$this -> database_connect();
}

// db 연결 함수
public function database_connect()
{
	$this->connect = mysqli_connect($this -> host, $this-> username, $this->password, $this->database);
}


//쿼리 실행 함수
public function execute_query($query)
{
return mysqli_query($this -> connect, $query);
}

//데이터 조회 함수
public function get_data_in_table($query)
{
$output ='';
$result = $this ->execute_query($query);
$output .= '
<table class="table table-bordered table-striped>"
<tr>
<th width="10%">Product ID</th>
<th width="10%">Product Count</th>
<th width="10%">카테고리_1</th>
<th width="10%">카테고리_2</th>
<th width="10%">Product Name</th>
<th width="10%">Expire after</th>
<th width="10%">Price</th>
<th width="10%">like_hate</th>

<th width="10%">이미지</th>
<th width="5%">수정</th>
<th width="5%">삭제</th>
</tr>';

while($row = mysqli_fetch_object($result))
{
$output .= '
<tr>

<td>'.$row->p_id.'</td>
<td>'.$row->p_num.'</td>
<td>'.$row->cate1.'</td>
<td>'.$row->cate2.'</td>
<td>'.$row->name.'</td>
<td>'.$row->expiry_day.'</td>
<td>'.$row->price.'</td>
<td>'.$row->like_hate.'</td>
<td><img src="upload/'.$row->productPhoto.'" class="img-thumbnail" width="50" height="35"></td>
<td><button type="button" name="update" id="'.$row->p_id.'"
class="btn btn-success btn-xs update">수정</button></td>
<td><button type="button" name="delete" id="'.$row->p_id.'"
class="btn btn-danger btn-xs delete">삭제</button></td>
</tr>
';
}
$output .='</table>';
return $output;
}

//파일 업로드 함수
function upload_file($file)
{
if(isset($file))
{
$extension = explode('.',$file["name"]);
$new_name = rand() . '.' . $extension[1];
$destination = './upload/' . $new_name;
move_uploaded_file($file['tmp_name'], $destination);
return $new_name;
}

}

}



?>