<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" type="text/css" href="des.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
<link rel="shortcut icon" href="tcc.ico" />
<title>Test Case Checker</title>
</head>

<body>

<!--navbr-->
<nav class="navbar navbar-dark bg-inverse">
  <a class="navbar-brand" href="https://localhost/OTCC/page1/index.html"><img src="tcc.jpeg" width="30" height="30" alt="">Test Case Checker</a>
  <ul class="nav navbar-nav" id="r-nav">
    <li class="nav-item">
      <a class="nav-link" href="https://localhost/OTCC/page1/index.html">Home</a>
    </li>
	<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="supportedContentDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Coding Sites</a>
      <div class="dropdown-menu" aria-labelledby="supportedContentDropdown">
        <a class="dropdown-item" href="https://www.hackerrank.com" target="_blank">Hackerrank</a>
        <a class="dropdown-item" href="https://www.codechef.com" target="_blank">Codechef</a>
		<a class="dropdown-item" href="https://www.spoj.com" target="_blank">Spoj</a>
        <a class="dropdown-item" href="https://www.hackerearth.com" target="_blank">Hackerearth</a>
        <a class="dropdown-item" href="https://www.topcoder.com" target="_blank">Topcoder</a>
        <a class="dropdown-item" href="https://www.codeforces.com" target="_blank">Codeforces</a>
      </div>
    </li>
	<li class="nav-item">
      <a class="nav-link" href="#footer">Contact</a>
    </li>
  </ul>
</nav>

<?php
	if(count($_POST)>0)
	{
	$output="";
	$result="";
	$question=$_GET['submit'];
	$site="";
	$ques="";
	for($i=3;$question[$i]!="\\";$i++)
	{
		$site=$site.$question[$i];
	}
	$ques=substr($question,$i+1,-4);
	$query=str_replace("\n"," ",$_POST['inputt']);
	$start = microtime(true);
	$output=$output.shell_exec('echo '.$query.' | "'.$question.'"');
	$start = microtime(true) - $start;
	if($output != "")
	{
	//$output=nl2br($output);
	error_reporting(0);
	$connect = mysqli_connect("localhost", "root","", "tcc_db");
	if($connect){
		$in=$_POST['inputt'];
		$QUERY="insert into $site (question,input) values('$ques', '$in')";
		$rslt=$connect->query($QUERY);
		mysqli_close($connect);
	}
	$result='<div class="alert alert-success" role="alert"><strong>Success!</strong><br> Time Taken:- '.$start.' seconds.</div>';
	}
	else
	$result='<div class="alert alert-danger" role="alert"><strong>Something went Wrong!</strong><br> Incorrect Input or Time Limit Exceeded.</div>';
	}
?>

<div class="container range">
<form action="https://localhost/OTCC/page5/show.php" target="_blank">
	<button type="text" name="quest" value="<?php if(isset($_GET['submit'])) echo $_GET['submit']; ?>">Try available Test Cases</button>
	</form>
<form method="post">
<div class="row">
    <div class="col-xs-4">
	<label for="inp">Input:</label>
	<textarea id="inp" rows="15" cols="50" name="inputt" type="text"></textarea>
    </div>
    <div class="col-xs-4 center-block" id="cent">
	<input id="go" type="submit" value="Get Output">
    </div>
    <div class="col-xs-4">
	<label for="outp">Output:</label>
	<textarea id="outp" rows="15" cols="50" name="outputt" type="text"><?php if(count($_POST)>0) echo $output; ?></textarea>
    </div>
</div>
<form>
</div>

<div class="container"><?php if(isset($result)) echo $result; ?></div>

<div class="container-fluid" id="footer">
	<a href="https://www.facebook.com/yash.cupid" target="_blank" class="fa-foot"><i class="fa fa-facebook-official" style="color:#3b5998;"></i></a>
	<a style="color:#517fa4;" href="https://www.instagram.com/immittal77" class="fa-foot" target="_blank"><i class="fa fa-instagram"></i></a>
	<a style="color:#00aced;" href="#" class="fa-foot" target="_blank"><i class="fa fa-twitter"></i></a>
	<a style="color:#dd4b39;" href="#" class="fa-foot" target="_blank"><i class="fa fa-google-plus-square"></i></a>
	<a style="color:#007bb6;" href="https://www.linkedin.com/in/yash-mittal-427b55111" target="_blank" class="fa-foot"><i class="fa fa-linkedin-square"></i></a>
	<p style="color:white;">Powered by <a href="http://www.juit.ac.in" target="_blank" style="text-decoration: none;color:white;">juit.webtech</a></p>
</div>

</body>
</html>
