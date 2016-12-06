<?php
include 'config.php';
$datee = date("Y-m-d H:i:s");
if(isset($_POST['A'],$_POST['B'],$_POST['C']))
{
	if(empty($_POST['A']) || empty($_POST['B']) || empty($_POST['C']))
	{
		echo 'Form cant be empty!';
	}else{
		$A = $_POST['A'];
		$B = $_POST['B'];
		$C = $_POST['C'];
		$oblicz = $B*$B-4*$A*$C;
		if($oblicz < 0)
		{
			echo 'No solution!';
		}else{
			if($oblicz == 0)
			{
				$x0 = -$B/(2*$A);
				echo 'X0 = '.$x0;
				$sql = "INSERT INTO delta(del_ID,del_X0,del_date) VALUES (' ','{$x0}','{$datee}')";
				mysql_query($sql);
			
			}else{
				$x1 = (-$B-sqrt($oblicz))/(2*$A);
				$x2 = (-$B+sqrt($oblicz))/(2*$A);
				echo 'X1 = '.$x1.'<br>X2 = '.$x2;
				$sql = "INSERT INTO delta(del_ID,del_X1,del_X2,del_date) VALUES (' ','{$x1}','{$x2}','{$datee}')";
				mysql_query($sql);
				
			}
		}
		mysql_close();
	}
}


?>

<form method="POST">
A:<br>
<input type="text" name="A"><br>
B:<br>
<input type="text" name="B"><br>
C:<br>
<input type="text" name="C"><br><br>
<input type="submit">
<input type="reset">

<form>