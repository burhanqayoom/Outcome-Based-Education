<?php
//session_start();
$num=$_POST['category'];

echo "<h2> Modules </h2>";
echo "<hr width='60%' size='8px' style='background-color: #008080;'>";
	
for($i=1;$i<=$num;$i++){
	//echo "<form method='post' action='temp_outcome.php'>";
	echo "<h4><a href='ModuleDetails.php?mid=$i'>Module $i</a></h4>";
}


?>
