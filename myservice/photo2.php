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
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/myservice/include/header.php';
?>

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
			<li role="presentation" class="active"><a href="#People" aria-controls="People" role="tab" data-toggle="tab">People</a></li>
			<li role="presentation"><a href="#Animal" aria-controls="Animal" role="tab" data-toggle="tab">Animal</a></li>
			<li role="presentation"><a href="#Food" aria-controls="Food" role="tab" data-toggle="tab">Food</a></li>
		</ul>
	</div>
	<!--/ Tab -->

	<br>

	<!-- Content -->
	<div class="row">
		<div class="col-md-3">
			<a href="#" data-toggle="modal" data-target="#imageModal" data-whatever="images/crew-01.jpg"><img src="images/crew-01.jpg"
				class="img-responsive img-thumbnail" alt="Responsive image"></a>
			<h5>Image 1</h5>
    </div>

		<div class="col-md-3">
			<a href="#" data-toggle="modal" data-target="#imageModal" data-whatever="images/crew-02.jpg"><img src="images/crew-02.jpg"
				class="img-responsive img-thumbnail" alt="Responsive image"></a>
			<h5>Image 2</h5>
		</div>

		<div class="col-md-3">
			<a href="#" data-toggle="modal" data-target="#imageModal" data-whatever="images/crew-03.jpg"><img src="images/crew-03.jpg"
				class="img-responsive img-thumbnail" alt="Responsive image"></a>
			<h5>Image 3</h5>
		</div>

		<div class="col-md-3">
			<a href="#" data-toggle="modal" data-target="#imageModal" data-whatever="images/crew-01.jpg"><img src="images/crew-01.jpg"
				class="img-responsive img-thumbnail" alt="Responsive image"></a>
			<h5>Image 4</h5>
		</div>
	</div>

	<div class="row">
		<div class="col-md-3">
			<a href="#" data-toggle="modal" data-target="#imageModal" data-whatever="images/crew-02.jpg"><img src="images/crew-02.jpg"
				class="img-responsive img-thumbnail" alt="Responsive image"></a>
			<h5>Image 5</h5>
		</div>

		<div class="col-md-3">
			<a href="#" data-toggle="modal" data-target="#imageModal" data-whatever="images/crew-03.jpg"><img src="images/crew-03.jpg"
				class="img-responsive img-thumbnail" alt="Responsive image"></a>
			<h5>Image 6</h5>
		</div>

		<div class="col-md-3">
			<a href="#" data-toggle="modal" data-target="#imageModal" data-whatever="images/crew-01.jpg"><img src="images/crew-01.jpg"
				class="img-responsive img-thumbnail" alt="Responsive image"></a>
			<h5>Image 7</h5>
		</div>

		<div class="col-md-3">
			<a href="#" data-toggle="modal" data-target="#imageModal" data-whatever="images/crew-02.jpg"><img src="images/crew-02.jpg"
				class="img-responsive img-thumbnail" alt="Responsive image"></a>
			<h5>Image 8</h5>
		</div>
	</div>

	<div class="row">
		<div class="col-md-3">
			<a href="#" data-toggle="modal" data-target="#imageModal" data-whatever="images/crew-03.jpg"><img src="images/crew-03.jpg"
				class="img-responsive img-thumbnail" alt="Responsive image"></a>
			<h5>Image 9</h5>
		</div>

		<div class="col-md-3">
			<a href="#" data-toggle="modal" data-target="#imageModal" data-whatever="images/crew-01.jpg"><img src="images/crew-01.jpg"
				class="img-responsive img-thumbnail" alt="Responsive image"></a>
			<h5>Image 10</h5>
		</div>

		<div class="col-md-3">
			<a href="#" data-toggle="modal" data-target="#imageModal" data-whatever="images/crew-02.jpg"><img src="images/crew-02.jpg"
				class="img-responsive img-thumbnail" alt="Responsive image"></a>
			<h5>Image 11</h5>
		</div>

		<div class="col-md-3">
			<a href="#" data-toggle="modal" data-target="#imageModal" data-whatever="images/crew-03.jpg"><img src="images/crew-03.jpg"
				class="img-responsive img-thumbnail" alt="Responsive image"></a>
			<h5>Image 12</h5>
		</div>
	</div>
	<!--/ Content -->

	<!-- Pagination -->
	<nav>
		<ul class="pagination">
			<li><a href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span>
			</a></li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li><a href="#" aria-label="Next"> <span aria-hidden="true">&raquo;</span>
			</a></li>
		</ul>
	</nav>
	<!--/ Pagination -->

</div>
<!-- Content -->

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">

        <!--photo-->
				<img src="" class="img-responsive img-thumbnail" alt="Responsive image" onClick="javascript:$('#imageModal').modal('hide');">
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
