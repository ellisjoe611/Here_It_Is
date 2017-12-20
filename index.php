
<?php
include("likefunction.php");
include_once $_SERVER['DOCUMENT_ROOT'] . '/myservice/common/session.php';
if (isset($_SESSION['myMemberSes'])) {
    header("Location:./memberPage.php");
    exit ;
}
$host = "localhost";
$user = "root";
$pw = "root";
$dbName = "myservice";
$dbConnection = new mysqli($host, $user, $pw, $dbName);
$dbConnection -> set_charset("utf8");
//접속 확인

if (mysqli_connect_errno()) {
    echo "접속실패\n";
    echo mysqli_connect_error();
} else {
    echo "접속성공\n";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Site Template</title>
<!-- Bootstrap core CSS & JavaScript -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Footer Custom style -->
<link href="css/sticky-footer-navbar.css" rel="stylesheet">
<!-- 예제에서 사용하기 위해 정의한 CSS -->
<link href="css/style.css" rel="stylesheet">

</head>
<body>

<!-- Top Menu(상단고정) -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">HERE IT IS</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

            <ul class="nav navbar-nav navbar-right">

              <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="#">About</a>
                <a href="#">Services</a>
                <a href="#">Clients</a>
                <a href="#">Contact</a>
              </div>
              <li><a href="#" data-toggle="modal" data-target ="#loginModal"><span class="glyphicon glyphicon-log-in"></span> Log in</a></li>
              <li><a href="#" data-toggle="modal" data-target ="#signModal"><span class="glyphicon glyphicon-user"></span> sign in</a></li>


            </ul>
        </div>
    </div>
</nav>
<!--/ Top Menu(상단고정) -->

<!-- Content -->
<!-- Page Header --> 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <p style="text-align: center;">
            <img src="/myservice/images/coca.jpg" alt="Coca cola" style="width:1200px; height:500px;">
        </p>
      </div>

      <div class="item">
          <p style="text-align: center;">
              <img src="/myservice/images/shake.jpg" alt="Chicago" style="width:1200px; height:500px;">
          </p>
      </div>
    
      <div class="item">
          <p style="text-align: center;">
              <img src="/myservice/images/ghana.jpg" alt="New york" style="width:1200px; height:500px;">
          </p>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
<!--/ Page Header -->

<div class="container">

	<!--/ Tab -->
	<div role="tabpanel">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class = "active"><a href = "#Snack" aria-controls="Snack" role="tab" data-toggle="tab">SNACK</a></li>
			<li role="presentation"><a href = "#Food" aria-controls="Food" role="tab" data-toggle="tab">FOOD</a></li>
      <li role="presentation"><a href = "#Ice" aria-controls="Ice" role="tab" data-toggle="tab">ICE CREAM</a></li>
      <li role="presentation"><a href = "#Drink" aria-controls="Drink" role="tab" data-toggle="tab">DRINK</a></li>
      <li role="presentation"><a href = "#Daily" aria-controls="DP" role="tab" data-toggle="tab">DAILY PRODUCT</a></li>
		</ul>
	</div>
	<!--/ Tab -->
	<br>

  <div class="tab-content">
  <div id="Snack" class="tab-pane fade in active">
    <!--살찌는거 출력하는곳-->
    <?php
            $rown=0;
            $CT = 10;
            $sql = "SELECT * FROM product where p_id like '$CT%' ";
            $result = $dbConnection->query($sql);
        for($i = 0; $i < $result->num_rows; $i++){
          $product = $result->fetch_array(MYSQLI_ASSOC);
          if($rown==0){
          echo '<div class="row">';
          }
          $count_like = count_content_like($dbConnection, $product['p_id']);
          ?>
            <div class="col-md-3">
                <a href="#" data-toggle="modal" data-target="#imageModal" id="<?=$product['p_id'] ?>" data-name="<?=$product['p_id'] ?>" data-whatever="<?=$product['productPhoto']?>"><img src="<?=$product['productPhoto']?>"
            class="img-responsive img-thumbnail" alt="Responsive image"></a>
          <table border=3 width="100%" bordercolor="lightblue"cellspacing="10">
            <tbody>
            <tr bgcolor="white" align="center">
              <td>품명</td>
              <td><?=$product['name'] ?></td>
            </tr>
            <tr bgcolor="white" align="center">
              <td>가격</td>
              <td><?=$product['price'] ?></td>
            </tr>
            <tr bgcolor="white" align="center">
              <td>재고</td>
              <td><?=$product['p_num'] ?></td>
            </tr>
          </tbody>
          </table>
          <!-- 좋아요/싫어요/즐겨찾기 버튼-->
          <table border=3 bordercolor="lightblue" width="100%" cellpadding="15">
          <tbody>
          <tr bgcolor="lightblue" align="center">
          <td> <button type="button" class="btn btn-primary btn-sm likeBtn" id="likes<?=$product['p_id']?>"><span class="glyphicon glyphicon-thumbs-up" ></span></button></td>
          <td> 좋아요</td>
          <td class="likes<?=$product['p_id']?>"><?=$count_like?></td>
          </tr>
        </tbody>
        </table>
        </div>
      <?php $rown++;
            if ($rown == 4) {
                echo '</div></br>';
                $rown = 0;
            }}
     ?>
      </div>
    </div>


  <div id="Food" class="tab-pane fade">


    <!--먹는거 출력하는곳--->
    <?php
            $rown=0;
            $CT = 20;
            $sql = "SELECT * FROM product where p_id like '$CT%' ";
            $result = $dbConnection->query($sql);
        for($i = 0; $i < $result->num_rows; $i++){
          $product = $result->fetch_array(MYSQLI_ASSOC);
          if($rown==0){
          echo '<div class="row">';
          }
          $count_like = count_content_like($dbConnection, $product['p_id']);
          ?>
            <div class="col-md-3">
                <a href="#" data-toggle="modal" data-target="#imageModal" id="<?=$product['p_id'] ?>" data-name="<?=$product['p_id'] ?>" data-whatever="<?=$product['productPhoto']?>"><img src="<?=$product['productPhoto']?>"
            class="img-responsive img-thumbnail" alt="Responsive image"></a>
          <table border=3 width="100%" bordercolor="lightblue"cellspacing="10">
            <tbody>
            <tr bgcolor="white" align="center">
              <td>품명</td>
              <td><?=$product['name'] ?></td>
            </tr>
            <tr bgcolor="white" align="center">
              <td>가격</td>
              <td><?=$product['price'] ?></td>
            </tr>
            <tr bgcolor="white" align="center">
              <td>재고</td>
              <td><?=$product['p_num'] ?></td>
            </tr>
          </tbody>
          </table>
          <!-- 좋아요/싫어요/즐겨찾기 버튼-->
          <table border=3 bordercolor="lightblue" width="100%" cellpadding="15">
          <tbody>
          <tr bgcolor="lightblue" align="center">
          <td> <button type="button" class="btn btn-primary btn-sm likeBtn" id="likes<?=$product['p_id']?>"><span class="glyphicon glyphicon-thumbs-up" ></span></button></td>
          <td> 좋아요</td>
          <td class="likes<?=$product['p_id']?>"><?=$count_like?></td>
          </tr>
        </tbody>
        </table>
        </div>
      <?php $rown++;
            if ($rown == 4) {
                echo '</div></br>';
                $rown = 0;
            }}
     ?>
      </div>
    </div>
 <div id="Ice" class="tab-pane fade">

      <!--차가워라 보여주기-->
       <?php
            $rown=0;
            $CT = 20;
            $sql = "SELECT * FROM product where p_id like '$CT%' ";
            $result = $dbConnection->query($sql);
        for($i = 0; $i < $result->num_rows; $i++){
          $product = $result->fetch_array(MYSQLI_ASSOC);
          if($rown==0){
          echo '<div class="row">';
          }
          $count_like = count_content_like($dbConnection, $product['p_id']);
          ?>
            <div class="col-md-3">
                <a href="#" data-toggle="modal" data-target="#imageModal" id="<?=$product['p_id'] ?>" data-name="<?=$product['p_id'] ?>" data-whatever="<?=$product['productPhoto']?>"><img src="<?=$product['productPhoto']?>"
            class="img-responsive img-thumbnail" alt="Responsive image"></a>
          <table border=3 width="100%" bordercolor="lightblue"cellspacing="10">
            <tbody>
            <tr bgcolor="white" align="center">
              <td>품명</td>
              <td><?=$product['name'] ?></td>
            </tr>
            <tr bgcolor="white" align="center">
              <td>가격</td>
              <td><?=$product['price'] ?></td>
            </tr>
            <tr bgcolor="white" align="center">
              <td>재고</td>
              <td><?=$product['p_num'] ?></td>
            </tr>
          </tbody>
          </table>
          <!-- 좋아요/싫어요/즐겨찾기 버튼-->
          <table border=3 bordercolor="lightblue" width="100%" cellpadding="15">
          <tbody>
          <tr bgcolor="lightblue" align="center">
          <td> <button type="button" class="btn btn-primary btn-sm likeBtn" id="likes<?=$product['p_id']?>"><span class="glyphicon glyphicon-thumbs-up" ></span></button></td>
          <td> 좋아요</td>
          <td class="likes<?=$product['p_id']?>"><?=$count_like?></td>
          </tr>
        </tbody>
        </table>
        </div>
      <?php $rown++;
            if ($rown == 4) {
                echo '</div></br>';
                $rown = 0;
            }}
     ?>
      </div>
    </div>
    <div id="Drink" class="tab-pane fade">


        <!--마시자으아 보여주기-->
         <?php
            $rown=0;
            $CT = 20;
            $sql = "SELECT * FROM product where p_id like '$CT%' ";
            $result = $dbConnection->query($sql);
        for($i = 0; $i < $result->num_rows; $i++){
          $product = $result->fetch_array(MYSQLI_ASSOC);
          if($rown==0){
          echo '<div class="row">';
          }
          $count_like = count_content_like($dbConnection, $product['p_id']);
          ?>
            <div class="col-md-3">
                <a href="#" data-toggle="modal" data-target="#imageModal" id="<?=$product['p_id'] ?>" data-name="<?=$product['p_id'] ?>" data-whatever="<?=$product['productPhoto']?>"><img src="<?=$product['productPhoto']?>"
            class="img-responsive img-thumbnail" alt="Responsive image"></a>
          <table border=3 width="100%" bordercolor="lightblue"cellspacing="10">
            <tbody>
            <tr bgcolor="white" align="center">
              <td>품명</td>
              <td><?=$product['name'] ?></td>
            </tr>
            <tr bgcolor="white" align="center">
              <td>가격</td>
              <td><?=$product['price'] ?></td>
            </tr>
            <tr bgcolor="white" align="center">
              <td>재고</td>
              <td><?=$product['p_num'] ?></td>
            </tr>
          </tbody>
          </table>
          <!-- 좋아요/싫어요/즐겨찾기 버튼-->
          <table border=3 bordercolor="lightblue" width="100%" cellpadding="15">
          <tbody>
          <tr bgcolor="lightblue" align="center">
          <td> <button type="button" class="btn btn-primary btn-sm likeBtn" id="likes<?=$product['p_id']?>"><span class="glyphicon glyphicon-thumbs-up" ></span></button></td>
          <td> 좋아요</td>
          <td class="likes<?=$product['p_id']?>"><?=$count_like?></td>
          </tr>
        </tbody>
        </table>
        </div>
      <?php $rown++;
            if ($rown == 4) {
                echo '</div></br>';
                $rown = 0;
            }}
     ?>
      </div>
    </div>
    <div id="Daily" class="tab-pane fade">


          <!--입고 소비하자 으란ㅇ머리-->
         <?php
            $rown=0;
            $CT = 20;
            $sql = "SELECT * FROM product where p_id like '$CT%' ";
            $result = $dbConnection->query($sql);
        for($i = 0; $i < $result->num_rows; $i++){
          $product = $result->fetch_array(MYSQLI_ASSOC);
          if($rown==0){
          echo '<div class="row">';
          }
          $count_like = count_content_like($dbConnection, $product['p_id']);
          ?>
            <div class="col-md-3">
                <a href="#" data-toggle="modal" data-target="#imageModal" id="<?=$product['p_id'] ?>" data-name="<?=$product['p_id'] ?>" data-whatever="<?=$product['productPhoto']?>"><img src="<?=$product['productPhoto']?>"
            class="img-responsive img-thumbnail" alt="Responsive image"></a>
          <table border=3 width="100%" bordercolor="lightblue"cellspacing="10">
            <tbody>
            <tr bgcolor="white" align="center">
              <td>품명</td>
              <td><?=$product['name'] ?></td>
            </tr>
            <tr bgcolor="white" align="center">
              <td>가격</td>
              <td><?=$product['price'] ?></td>
            </tr>
            <tr bgcolor="white" align="center">
              <td>재고</td>
              <td><?=$product['p_num'] ?></td>
            </tr>
          </tbody>
          </table>
          <!-- 좋아요/싫어요/즐겨찾기 버튼-->
          <table border=3 bordercolor="lightblue" width="100%" cellpadding="15">
          <tbody>
          <tr bgcolor="lightblue" align="center">
          <td> <button type="button" class="btn btn-primary btn-sm likeBtn" id="likes<?=$product['p_id']?>"><span class="glyphicon glyphicon-thumbs-up" ></span></button></td>
          <td> 좋아요</td>
          <td class="likes<?=$product['p_id']?>"><?=$count_like?></td>
          </tr>
        </tbody>
        </table>
        </div>
      <?php $rown++;
            if ($rown == 4) {
                echo '</div></br>';
                $rown = 0;
            }}
     ?>
      </div>
    </div>
	

</div>
<!-- Content -->



<!-- product Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">

        <!--photo-->
				<img src="" class="img-responsive img-thumbnail" alt="Responsive image">
        <br/><br/>


        <div class="myCommentArea" id="center">
        </div>

			</div>
		</div>
	</div>
</div>

<!-- login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
        <div id="loginForm">
          <form name="loginForm" method="post" action="./login.php">
            <div id="loginEmailArea">
              <label for="loginEmail">E-mail</label>
              <div class="loginInputBox">
                <input type="email" id="loginEmail" name="email" placeholder="이메일" />
              </div>
            </div>
            <div id="loginPwArea">
              <label for="loginPw">Password</label>
              <div class="loginInputBox">
                <input type="password" name="userPw" id="loginPw" placeholder="비밀번호 8자 이상 입력" />
              </div>
            </div>
            <div class="loginSubmitBox">
              <input type="submit" id="loginSubmit" value="로그인" />
            </div>
          </form>
        </div>
			</div>
		</div>
	</div>
</div>

<!-- sign in Modal -->
<div class="modal fade" id="signModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
        <div id="container">
          <section id="introSite">
            <div id="siteComment">
              내가 만드는<br />
              첫 웹서비스에<br />
              어서오세요.
            </div>
            <div id="signUpBtn">
              <p>가입하기</p>
            </div>
          </section>
          <section id="signup">
            <div id="signupCenter">
              <form id="signUpForm" method="post" action="./database/myMember.php">
                <div class="row">
                  <div class="inputBox">
                    <input type="text" name="userName" id="userName" placeholder="이름" />
                  </div>
                </div>
                <div class="row">
                  <div class="inputBox">
                    <input type="email" name="userEmail" id="userEmail" placeholder="이메일" />
                  </div>
                </div>
                <div class="row">
                  <div class="inputBox">
                    <input type="password" name="userPw" id="userPw" placeholder="비밀번호" />
                  </div>
                </div>
                <div class="row">
                  <label>생일</label>
                  <div class="selectBox">
                    <select name="birthYear" id="birthYear">
                      <option value="">연도</option>
      <?php
        //현재 연도를 구함
        $nowYear = date("Y",time());
        //현재 연도부터 1900년도까지 내림차순으로 option태그 생성
        for($i = $nowYear; $i >= 1900; $i--){?>
                      <option value="<?=$i ?>"><?=$i ?></option>
      <?php } ?>
                    </select>
                  </div>

                  <div class="selectBox selectBoxMargin">
                    <select name="birthMonth" id="birthMonth">
                      <option value="">월</option>
      <?php
        for($i = 1; $i <= 12; $i++){?>
                      <option value="<?=$i ?>"><?=$i ?></option>
      <?php } ?>
                    </select>
                  </div>
                  <div class="selectBox">
                    <select name="birthDay" id="birthDay">
                      <option value="">일</option>
      <?php
        for($i = 1; $i <= 31; $i++){?>
                      <option value="<?=$i ?>"><?=$i ?></option>
      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="row genderRow">
                  <div id="genderLabel">
                    <label for="gW" id="gMW">여성</label>
                    <label for="gM" id="gMM">남성</label>
                  </div>
                  <input type="radio" name="gender" class="gender" id="gW" value="w" />
                  <input type="radio" name="gender" class="gender" id="gM" value="m" />
                </div>
                <div class="row">
                  <p id="valueError"></p>
                </div>
                <div class="row">
                  <div class="submitBox">
                    <input type="submit" id="signUpSubmit" value="가입하기" />
                  </div>
                </div>
                <input type="hidden" name="mode" value="save" />
              </form>
              <br/>
            </div>
          </section>
        </div>
			</div>
		</div>
	</div>
</div>


<!-- side nav bar-->
<script>
	function openNav() {
		document.getElementById("mySidenav").style.width = "250px";
	}

	function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
	}
</script>

<script type="text/javascript">
	$('#imageModal').on('show.bs.modal', function(event) {
		var link = $(event.relatedTarget);
		// Button that triggered the modal
		var recipient = link.data('whatever');
		var product_id = link.data('name');

		// Extract info from data-* attributes
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this);
		modal.find('.modal-body img').attr("src", recipient);
		modal.find('.modal-body img').attr("width", 800);
		modal.find('.modal-body input').attr("id", product_id);

         $.ajax({
                    type : 'post',
                    dataType : 'json',
                    url : './database/contents.php',
                    data : {mode : 'onlyComment', productID : product_id},
                    async : false,
                    success : function(data) {
                        console.log(data);
                        //데이터 불러오기 성공시
                        if (data.result == true) {
                            //게시물을 변수에 대입
                            var comments = data.content;
                            console.log('contents is ' + JSON.stringify(comments));

                           console.log('comment is ' + JSON.stringify(comments['comment']));

                            //게시물 데이터 id가 center인 엘리먼트에 넣기 위해
                            //게시물의 HTML 태그를 만듬


                            //생성할 HTML코드를 대입할 변수 선언
                            var inputHtml = "";
                                for (var comment in comments) {

                                    inputHtml += "<div class='media'>";
                                    //inputHtml += "<img src=' " + comments[comment]['profilePhoto'] + "' />";
                                    //타임스탬프 시간을 사람이 이해 할 수 있는 시간으로 변경
                                    var d = new Date(comments[comment]['regTime'] * 1000);

                                    //getMonth()는 0부터 시작하므로 1을 더해야 함 예로 11월은 10으로 보여줌 그러므로 +1
                                    var month = d.getMonth() + 1;
                                    //시간 만들기
                                    var regTime = d.getFullYear() + '년 ' + month + '월 ' + d.getDate() + '일 ' + d.getHours() + '시 ' + d.getMinutes() + '분';

                                    //사용자가 내용에 태그 입력시를 대비해서 특수기호를 HTML 코드로 변경
                                    bbs2 = comments[comment]['comment'];
                                    bbs = bbs2.replace(/</g, '&lt;');
                                    bbs = bbs2.replace(/>/g, '&gt;');

                                    inputHtml += "<div class='media-body'>";
                                    inputHtml += "<h4 class='media-heading'>" + comments[comment]['userName'] + "<small><i>  " + regTime + "</i></small></h4>";
                                    inputHtml += "<p>" + bbs2 + "</p>";
                                    inputHtml += "</div></div></hr>";

                                }
                                //댓글 영역 끝


                            //위에서 완성된 HTML 코드를 id가 container인 엘리먼트에 넣음
                            $('.myCommentArea').append(inputHtml);


                        }else{
                            alert('댓글 불러오기 실패');
                        }
                    },
                    error : function(request, status, error) {
                        console.log('request ' + JSON.stringify(request));
                        console.log('status ' + status);
                        console.log('error ' + error);
                    }
                });

	});
	 $("#imageModal").on('hide.bs.modal', function () {
                      $(".myCommentArea").empty();

            });

</script>
<!--/ Modal -->

<!-- Footer(하단 고정) -->
<footer class="footer">
	<div class="container">
		<p class="text-muted">&copy; COPYRIGHT 2015 Company Name</p>
	</div>
</footer>
<!--/ Footer(하단 고정) -->

</body>
</html>
