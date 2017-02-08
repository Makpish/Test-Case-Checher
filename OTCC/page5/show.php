<?php
	$gap="=========================================<br>";
	$question=$_GET['quest'];
	$site="";
	$ques="";
	for($i=3;$question[$i]!="\\";$i++)
	{
		$site=$site.$question[$i];
	}
	$ques=substr($question,$i+1,-4);
	error_reporting(0);
	$connect = mysqli_connect("localhost", "root", "Asdfasf2", "tcc_db");
	if($connect){
		$QUERY="select * from $site where question='$ques'";
		$rslt=$connect->query($QUERY);
		if(mysqli_num_rows($rslt) >0)
		{
			while($rows=mysqli_fetch_row($rslt))
			{
				echo $rows[2]."<br>";
				echo $gap;
			}
		}
		mysqli_close($connect);
	}
	else
	{
		echo "hala hala";
	}
?>