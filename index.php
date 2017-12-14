
<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/myservice/common/session.php';
    if(isset($_SESSION['myMemberSes'])){
        header("Location:./memberPage.php");
        exit;
    }
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
<!-- 즐겨찾기 버튼-->
<script>
  $(document).ready(function(){
    $("#empty").click(function(){
      $("#empty").hide();
      $("#fill").show();
    });
    $("#fill").click(function(){
      $("#fill").hide();
      $("#empty").show();
    });
  });
</script>


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
            <ul class="nav navbar-nav">
                <li class="active"><a href="home.html">Home</a></li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gallery <span
                        class="caret"></span>
                </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="photo.html">Photo</a></li>
                        <li class="divider"></li>
                        <li><a href="movie.html">Movie</a></li>
                    </ul></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>


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
<div class="book-page-header-photo">
	<div class="page-header book-page-header">
		<div class="container">
			<h1>
				Photo <br> <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</small>
			</h1>
		</div>
	</div>
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
        $sql = "SELECT * FROM product where id like '$CT%' ";
        $result = $dbConnection->query($sql);

    for($i = 0; $i < $result->num_rows; $i++){
      $product = $result->fetch_array(MYSQLI_ASSOC);
      if($rown==0){
      echo '<div class="row">';
      }?>
		<div class="col-md-3">
      <?$photo=$product['productPhoto']?>
			<a href="#" data-toggle="modal" data-target="#imageModal" data-whatever="<?=$photo?>"><img src="<?=$photo?>"
				class="img-responsive img-thumbnail" alt="Responsive image"></a>
      <h5>품명 : <?=$product['name']?></h5>
			<h5>가격 : <?=$product['price']?></h5>
      <h5>상품코드 : <?=$product['id']?>
      <!-- 좋아요/싫어요/즐겨찾기 버튼-->
      <button type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-thumbs-up" ></button></span> <span class="badge"><?=$product['like_hate']?></span>
    </h5>
    </div>
  <?php $rown++; $total++;
  if($rown==4){
    echo '</div>';
    $rown=0;
  }} ?>
  </div>
</div>


  <div id="Food" class="tab-pane fade">


    <!--먹는거 출력하는곳--->
  <?php
        $rown=0;
        $CT = 20;
        $sql = "SELECT * FROM product where id like '$CT%' ";
        $result = $dbConnection->query($sql);

    for($i = 0; $i < $result->num_rows; $i++){
      $product = $result->fetch_array(MYSQLI_ASSOC);
      if($rown==0){
      echo '<div class="row">';
      }?>
  <!-- Content -->

    <div class="col-md-3">
      <?$photo=$product['productPhoto']?>
      <a href="#" data-toggle="modal" data-target="#imageModal" data-whatever="<?=$photo?>"><img src="<?=$photo?>"
        class="img-responsive img-thumbnail" alt="Responsive image"></a>
      <h5>품명 : <?=$product['name']?></h5>
      <h5>가격 : <?=$product['price']?></h5>
      <h5>상품코드 : <?=$product['id']?></h5>
    </div>
    <?php $rown++; $total++;
    if($rown==4){
      echo '</div>';
      $rown=0;
    }} ?>
</div>
</div>
 <div id="Ice" class="tab-pane fade">

      <!--차가워라 보여주기-->
      <?php
          $rown=0;
          $CT = 30;
          $sql = "SELECT * FROM product where id like '$CT%' ";
          $result = $dbConnection->query($sql);

      for($i = 0; $i < $result->num_rows; $i++){
        $product = $result->fetch_array(MYSQLI_ASSOC);
        if($rown==0){
        echo '<div class="row">';
        }?>
  	<!-- Content -->

  		<div class="col-md-3">
        <?$photo=$product['productPhoto']?>
  			<a href="#" data-toggle="modal" data-target="#imageModal" data-whatever="<?=$photo?>"><img src="<?=$photo?>"
  				class="img-responsive img-thumbnail" alt="Responsive image"></a>
        <h5>품명 : <?=$product['name']?></h5>
  			<h5>가격 : <?=$product['price']?></h5>
        <h5>상품코드 : <?=$product['id']?></h5>
      </div>
        <?php $rown++; $total++;
        if($rown==4){
          echo '</div>';
          $rown=0;
        }} ?>
    </div>
  </div>
    <div id="Drink" class="tab-pane fade">


        <!--마시자으아 보여주기-->
        <?php
            $rown=0;
            $CT=40;
            $sql = "SELECT * FROM product where id like '$CT%' ";
            $result = $dbConnection->query($sql);

        for($i = 0; $i < $result->num_rows; $i++){
          $product = $result->fetch_array(MYSQLI_ASSOC);
          if($rown==0){
          echo '<div class="row">';
          }?>
    	<!-- Content -->

    		<div class="col-md-3">
          <?$photo=$product['productPhoto']?>
    			<a href="#" data-toggle="modal" data-target="#imageModal" data-whatever="<?=$photo?>"><img src="<?=$photo?>"
    				class="img-responsive img-thumbnail" alt="Responsive image"></a>
          <h5>품명 : <?=$product['name']?></h5>
    			<h5>가격 : <?=$product['price']?></h5>
          <h5>상품코드 : <?=$product['id']?></h5>
        </div>
          <?php $rown++; $total++;
          if($rown==4){
            echo '</div>';
            $rown=0;
          }} ?>
      </div>
    </div>
    <div id="Daily" class="tab-pane fade">


          <!--입고 소비하자 으란ㅇ머리-->
        <?php
              $rown=0;
              $CT = 50;
              $sql = "SELECT * FROM product where id like '$CT%' ";
              $result = $dbConnection->query($sql);

          for($i = 0; $i < $result->num_rows; $i++){
            $product = $result->fetch_array(MYSQLI_ASSOC);
            if($rown==0){
            echo '<div class="row">';
            }?>
      	<!-- Content -->

      		<div class="col-md-3">
            <?$photo=$product['productPhoto']?>
      			<a href="#" data-toggle="modal" data-target="#imageModal" data-whatever="<?=$photo?>"><img src="<?=$photo?>"
      				class="img-responsive img-thumbnail" alt="Responsive image"></a>
            <h5>품명 : <?=$product['name']?></h5>
      			<h5>가격 : <?=$product['price']?></h5>
            <h5>상품코드 : <?=$product['id']?></h5>
          </div>
            <?php $rown++; $total++;
            if($rown==4){
              echo '</div>';
              $rown=0;
            }} ?>
        </div>
      </div>
	<!--/ Content -->

	<!-- Pagination -->
	<!-- <nav>

		<ul class="pagination">
			<li><a href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span>
			</a></li>
			<li><a href="#"<?$_POST['page']=1?>>1</a></li>
			<li><a href="#"<?$_POST['page']=2?>>2</a></li>
			<li><a href="#"<?$_POST['page']=3?>>3</a></li>
			<li><a href="#"<?$_POST['page']=4?>>4</a></li>
			<li><a href="#"<?$_POST['page']=5?>>5</a></li>
			<li><a href="#" aria-label="Next"> <span aria-hidden="true">&raquo;</span>
			</a></li>
		</ul>

	</nav> -->
	<!--/ Pagination -->


</div>
<!-- Content -->



<!-- product Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">

        <!--photo-->
				<img src="" class="img-responsive img-thumbnail" alt="Responsive image" onClick="javascript:$('#imageModal').modal('hide');">
        <br/><br/>

        <!--comment-->
        <form  id="comment" method="post" action="commet목적지">
          <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea class="form-control" rows="5" id="comment" placeholder="comments.."></textarea>
          </div>
          <input type="button" class="btn btn-default" id="commentBtn" value="write"/>
        </form>
        <hr>

        <div class="media">
          <div class="media-left">
            <img src="img_avatar1.png" class="media-object" style="width:60px">
          </div>
          <div class="media-body">
            <h4 class="media-heading">Left-aligned  <small><i>Posted on February 19, 2016</i></small></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
        </div>
        <hr>

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
                      <option value="<?=$i?>"><?=$i?></option>
      <?php
        }
      ?>
                    </select>
                  </div>

                  <div class="selectBox selectBoxMargin">
                    <select name="birthMonth" id="birthMonth">
                      <option value="">월</option>
      <?php
        for($i = 1; $i <= 12; $i++){?>
                      <option value="<?=$i?>"><?=$i?></option>
      <?php
        }
      ?>
                    </select>
                  </div>
                  <div class="selectBox">
                    <select name="birthDay" id="birthDay">
                      <option value="">일</option>
      <?php
        for($i = 1; $i <= 31; $i++){?>
                      <option value="<?=$i?>"><?=$i?></option>
      <?php
        }
      ?>
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
		var link = $(event.relatedTarget); // Button that triggered the modal
		var recipient = link.data('whatever'); // Extract info from data-* attributes
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this);
		modal.find('.modal-body img').attr("src", recipient);
		modal.find('.modal-body img').attr("width", 800);
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
