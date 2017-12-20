<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<title>Administrator Log-in</title>
<style>
@font-face {
   font-family: myFirstFont;
   src: url(sansation_light.woff);
}

@font-face {
   font-family: myFirstFont;
   src: url(sansation_bold.woff);
   font-weight: bold;
}

form {
    border: 3px solid #f1f1f1;
}

input[type=email], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: SlateBlue;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 20px 20px 20px 20px;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>

<body>
<h2 align="center">Administrator Log-in</h2>

<form action="admin_login_process.php">
	<div class="imgcontainer">
		<img src="https://avidplus.co.nz/avid_img/services/avp-Administration.png" width="10%" height="10%" alt="Avatar" class="avatar">
	</div>

	<div class="container">
		<label><b>Admin_Email</b></label>
		<input type="email" name="userEmail" id="userEmail" placeholder="Enter Email" required>
		<br><br>
		<label><b>Admin_PW</b></label>
		<input type="password" name="userPw" id="userPw" placeholder="Enter Password" required>
		
		<button type="submit">Login</button>
	</div>

</form>

</body>
</html>
