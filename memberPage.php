<?php
include("likefunction.php");
$host = "localhost";
$user = "root";
$pw = "root";
$dbName = "myservice";
$dbConnection = new mysqli($host, $user, $pw, $dbName);
$dbConnection -> set_charset("utf8");

include_once $_SERVER['DOCUMENT_ROOT'] . '/myservice/common/session.php';
if (!isset($_SESSION['myMemberSes'])) {
    header("Location:./index.php");
    exit ;
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
			$(document).ready(function() {
				$("#empty").click(function() {
					$("#empty").hide();
					$("#fill").show();
				});
				$("#fill").click(function() {
					$("#fill").hide();
					$("#empty").show();
				});
			});

		</script>

		<!-- logout jquery-->
		<script type="text/javascript" src="./js/me.js"></script>

	</head>
	<body>

		<!-- Top Menu(상단고정) -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">HERE IT IS</a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="active">
							<a href="home.html">Home</a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gallery <span
							class="caret"></span> </a>
							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="photo.html">Photo</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="movie.html">Movie</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="about.html">About</a>
						</li>
						<li>
							<a href="contact.html">Contact</a>
						</li>
					</ul>

					<ul class="nav navbar-nav navbar-right">

						<div id="mySidenav" class="sidenav">
							<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
							<a href="#">About</a>
							<a href="#">Services</a>
							<a href="#">Clients</a>
							<a href="#">Contact</a>
						</div>
						<li>
							<span style="font-size:25px;cursor:pointer" onclick="openNav()"><span id="bell" class="glyphicon glyphicon-bell"><span class="badge">5</span></span></a>
						</li>
						<li>
							<a href="#"  data-toggle="modal" data-target="#logoutModal"><span class="glyphicon glyphicon-log-out"> </span> Log out</a>
						</li>

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
					<h1> Photo
					<br>
					<small>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</small></h1>
				</div>
			</div>
		</div>
		<!--/ Page Header -->

		<div class="container">

			<!--/ Tab -->
			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class = "active">
						<a href = "#Snack" aria-controls="Snack" role="tab" data-toggle="tab">SNACK</a>
					</li>
					<li role="presentation">
						<a href = "#Food" aria-controls="Food" role="tab" data-toggle="tab">FOOD</a>
					</li>
					<li role="presentation">
						<a href = "#Ice" aria-controls="Ice" role="tab" data-toggle="tab">ICE CREAM</a>
					</li>
					<li role="presentation">
						<a href = "#Drink" aria-controls="Drink" role="tab" data-toggle="tab">DRINK</a>
					</li>
					<li role="presentation">
						<a href = "#Daily" aria-controls="DP" role="tab" data-toggle="tab">DAILY PRODUCT</a>
					</li>
				</ul>
			</div>
      <!--/ Page Header -->
			<!--/ Tab -->
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
          $alreadyLike = already_like($dbConnection,$_SESSION['myMemberSes']['myMemberID'],$product['p_id']);
          ?>
    		<div class="col-md-3">
    			<a href="#" data-toggle="modal" data-target="#imageModal" data-name="<?=$product['p_id'] ?>" data-whatever="<?=$product['productPhoto']?>"><img src="<?=$product['productPhoto']?>"
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
          <td> <button type="button" button type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-thumbs-up" ></button></span></td>
          <td><?=(($alreadyLike == 1) ? '취소하기' : '좋아요')?></td>
          <td><?=$count_like?></td>
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
          }?>
      <!-- Content -->

        <div class="col-md-3">
          <a href="#" data-toggle="modal" data-target="#imageModal" data-name="<?=$product['p_id'] ?>" data-whatever="<?=$product['productPhoto']?>"><img src="<?=$product['productPhoto']?>"
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
            <td> <button type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-thumbs-up" ></button></span></td>
            <td> <span class="badge"><?=$product['like_hate'] ?></span></td>
            </tr>
          </tbody>
          </table>
        </div>
        <?php $rown++;
            if ($rown == 4) {
                echo '</div>';
                $rown = 0;
            }}
     ?>
    </div>
    </div>
     <div id="Ice" class="tab-pane fade">

          <!--차가워라 보여주기-->
          <?php
              $rown=0;
              $CT = 30;
              $sql = "SELECT * FROM product where p_id like '$CT%' ";
              $result = $dbConnection->query($sql);

          for($i = 0; $i < $result->num_rows; $i++){
            $product = $result->fetch_array(MYSQLI_ASSOC);
            if($rown==0){
            echo '<div class="row">';
            }?>
      	<!-- Content -->

      		<div class="col-md-3">
            <?$photo=$product['productPhoto']?>
      			<a href="#" data-toggle="modal" data-target="#imageModal" data-name="<?=$product['p_id'] ?>" data-whatever="<?=$product['productPhoto']?>"><img src="<?=$product['productPhoto']?>"
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
              <td> <button type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-thumbs-up" ></button></span></td>
              <td> <span class="badge"><?=$product['like_hate'] ?></span></td>
              </tr>
            </tbody>
            </table>
          </div>
            <?php $rown++;
            if ($rown == 4) {
                echo '</div>';
                $rown = 0;
            }}
     ?>
        </div>
      </div>
        <div id="Drink" class="tab-pane fade">


            <!--마시자으아 보여주기-->
            <?php
                $rown=0;
                $CT=40;
                $sql = "SELECT * FROM product where p_id like '$CT%' ";
                $result = $dbConnection->query($sql);

            for($i = 0; $i < $result->num_rows; $i++){
              $product = $result->fetch_array(MYSQLI_ASSOC);
              if($rown==0){
              echo '<div class="row">';
              }?>
        	<!-- Content -->

        		<div class="col-md-3">
              <?$photo=$product['productPhoto']?>
        			<a href="#" data-toggle="modal" data-target="#imageModal" data-name="<?=$product['p_id'] ?>" data-whatever="<?=$product['productPhoto']?>"><img src="<?=$product['productPhoto']?>"
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
                <td> <button type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-thumbs-up" ></button></span></td>
                <td> <span class="badge"><?=$product['like_hate'] ?></span></td>
                </tr>
              </tbody>
              </table>
            </div>
              <?php $rown++;
                if ($rown == 4) {
                    echo '</div>';
                    $rown = 0;
                }}
     ?>
          </div>
        </div>
        <div id="Daily" class="tab-pane fade">


              <!--입고 소비하자 으란ㅇ머리-->
            <?php
                  $rown=0;
                  $CT = 50;
                  $sql = "SELECT * FROM product where p_id like '$CT%' ";
                  $result = $dbConnection->query($sql);

              for($i = 0; $i < $result->num_rows; $i++){
                $product = $result->fetch_array(MYSQLI_ASSOC);
                if($rown==0){
                echo '<div class="row">';
                }?>
          	<!-- Content -->

          		<div class="col-md-3">
                <?$photo=$product['productPhoto']?>
          			<a href="#" data-toggle="modal" data-target="#imageModal" data-name="<?=$product['p_id'] ?>" data-whatever="<?=$product['productPhoto']?>"><img src="<?=$product['productPhoto']?>"
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
                  <td> <button type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-thumbs-up" ></button></span></td>
                  <td> <span class="badge"><?=$product['like_hate'] ?></span></td>
                  </tr>
                </tbody>
                </table>
              </div>
                <?php $rown++;
                if ($rown == 4) {
                    echo '</div>';
                    $rown = 0;
                }}
     ?>
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
						<img id="picture" src="" class="img-responsive img-thumbnail" alt="Responsive image">
						<br/>
						<br/>

						<!-- 좋아요/싫어요/즐겨찾기 버튼-->
						<button type="button" id = "empty" class="btn btn-warning btn-sm">
							<span class="badge"><span class="glyphicon glyphicon-star-empty"></span> </span>
						</button>
						<button type="button" id = "fill" class="btn btn-warning btn-sm">
							<span class="badge"><span class="glyphicon glyphicon-star"></span> </span>
						</button>

						<!--comment-->
						<form  id="comment" method="get" action="commet목적지">
							<div class="form-group">
								<label for="comment">Comment:</label>
								<textarea class="form-control" rows="5" placeholder="comments.."></textarea>
							</div>
							<input type="button" class="regCommentBtn" id="" value="write"/>
						</form>
						<hr>

						<div class="myCommentArea" id="center">

						</div>

					</div>
				</div>
			</div>
		</div>

		<!-- log out Modal -->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<t1>
							Are you sure?
						</t1>
						<br/>
						<input type = "button" id = "logoutBtn" value = "Yes">
						</input>
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

                                    inputHtml += "<div class='media-body' id='" + comments[comment]['contentsID'] + "'>";
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
				<p class="text-muted">
					&copy; COPYRIGHT 2015 Company Name
				</p>
			</div>
		</footer>
		<!--/ Footer(하단 고정) -->

	</body>
</html>
