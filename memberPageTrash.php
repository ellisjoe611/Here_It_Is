
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/myservice/common/session.php';
  if(!isset($_SESSION['myMemberSes'])){
      header("Location:./index.php");
      exit;
  }
  $host = "localhost";
  $user = "root";
  $pw = "root";
  $dbName = "myservice";
  $dbConnection=new mysqli($host, $user, $pw, $dbName);
  $dbConnection->set_charset("utf8");
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

<!-- logout jquery-->
<script type="text/javascript" src="./js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="./js/me.js"></script>

</head>
<body>

<!-- Top Menu(상단고정) -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Company Name</a>
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

              <li><span style="font-size:25px;cursor:pointer" onclick="openNav()"><span id="bell" class="glyphicon glyphicon-bell"><span class="badge">5</span></span></a></li>
              <li><a href="#"  data-toggle="modal" data-target="#logoutModal"><span class="glyphicon glyphicon-log-out"> </span> Log out</a></li>
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
      <li role="presentation"><a href = "#Daily" aria-controls="Daily" role="tab" data-toggle="tab">DAILY PRODUCT</a></li>
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
			<a href="#" data-toggle="modal" data-target="#productModal" data-whatever="<?=$photo?>"><img src="<?=$photo?>"
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
      <a href="#" data-toggle="modal" data-target="#productModal" data-whatever="<?=$photo?>"><img src="<?=$photo?>"
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
  			<a href="#" data-toggle="modal" data-target="#productModal" data-whatever="<?=$photo?>"><img src="<?=$photo?>"
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
    			<a href="#" data-toggle="modal" data-target="#productModal" data-whatever="<?=$photo?>"><img src="<?=$photo?>"
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
      			<a href="#" data-toggle="modal" data-target="#productModal" data-whatever="<?=$photo?>"><img src="<?=$photo?>"
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




  <!-- Modal -->
  <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
  		<div class="modal-content">
  			<div class="modal-body">

          <!--photo-->
  				<img src="" class="img-responsive img-thumbnail" alt="Responsive image" onClick="javascript:$('#productModal').modal('hide');">
          <br/><br/>
          <!-- 좋아요/싫어요/즐겨찾기 버튼-->
          <button type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-thumbs-up"></span> <span class="badge">7</span></button>
          <button type="button" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-thumbs-down"></span> <span class="badge">3</span></button>
          <button type="button" id = "empty" class="btn btn-warning btn-sm"><span class="badge"><span class="glyphicon glyphicon-star-empty"></span> </span></button>
          <button type="button" id = "fill" class="btn btn-warning btn-sm"><span class="badge"><span class="glyphicon glyphicon-star"></span> </span></button>
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

<!-- log out Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
        <t1>Are you sure?</t2>
        <br/>
        <input type = "button" id = "logoutBtn" value = "Yes"></input>
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
	$('#productModal').on('show.bs.modal', function(event) {
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
