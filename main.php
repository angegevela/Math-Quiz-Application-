<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Quiz Welcome Page</title>
</head>
<style>
#wrapper {
    font-family: Monaco, Courier, 'Courier New', monospace;
	margin: 50px auto ;
	padding: 30px;
	background: #4D6879; /* You can change the main color of thew form here. */
	font-size: 14px;
	width:100%;
	max-width:500px;
	box-sizing: border-box;
}

label {
	display: block;
	font-size: 24px;
	padding: 13px 0;
	color: #fff;
	text-shadow: 1px 1px 1px #666;
}

input {
	height: 18px;
	padding: 20px;
	width: 100%;
	box-sizing: border-box;
	-webkit-border-radius: 6px;
	-khtml-border-radius: 6px;
	-moz-border-radius: 6px;
	border-radius: 6px;
	-webkit-box-shadow: 0 0 10px #444;
	-moz-box-shadow: 0 0 10px #444;
	box-shadow: 0 0 10px #444;
	border: 1px solid #fff;
}

input[type="text"]:hover, textarea:hover {
	border: 1px solid #fff;
	-webkit-box-shadow: 0 0 20px rgba(0, 0, 0, 0.25) inset, 0 0 5px rgba(255, 255, 255, 0.4);
	-moz-box-shadow: 0 0 20px rgba(0, 0, 0, 0.25) inset, 0 0 5px rgba(255, 255, 255, 0.4);
	box-shadow: 0 0 20px rgba(0, 0, 0, 0.25) inset, 0 0 5px rgba(255, 255, 255, 0.4);
}

input#submit {
	text-align: center;
	color: #fff;
	height: 50px;
	padding: 0;
	text-shadow: 1px 1px 1px #000;
	font-size: 18px;
	text-transform: uppercase;
	margin-top: 50px;
	border: 1px solid #000;
	background: #000;
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #3b3b3b), color-stop(100%, #000000));
	background: -webkit-linear-gradient(top, #3b3b3b 0%,#000000 100%);
	background: -moz-linear-gradient(top, #3b3b3b 0%,#000000 100%);
	background: -o-linear-gradient(top, #3b3b3b 0%,#000000 100%);
	background: -ms-linear-gradient(top, #3b3b3b 0%,#000000 100%);
	background: linear-gradient(top, #3b3b3b 0%,#000000 100%);
	opacity: 0.5;
}

input#submit:hover {
	color: #ccc;
	cursor: pointer;
	opacity: 0.8;
}

label {
	text-transform: uppercase;
	font-size: 14px;
}

h3{
    text-align: center;
    font-family: Monaco, Courier, 'Courier New', monospace;
    font-size: 24px;
    
}
p{
    text-align: center;
    font-family: Monaco, Courier, 'Courier New', monospace;
    font-size: 16px;
}

body{
    background: url('bg.gif') no-repeat center center fixed; /* Add the GIF */
    background-size: cover; /* Ensure it covers the entire viewport */
    height: 100vh;
}

</style>
<body>
<div id="wrapper">
<h3>Welcome to the Math Quiz Calculator</h3>
<p>Get ready to challenge yourself with math problems and sharpen your skills!</p>
		<form action="index.php" method="GET">
			<input type="submit" value="Let's Get Started" name="submit" id="submit" />
		</s>
</div>
</body>
</html>