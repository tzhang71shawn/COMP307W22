<html>
<head>
	<title>mini4.php</title>
	<meta author="Tian Zhang, 260822562">
</head>
<body>

	<!--php code-->
	<?php
	//store all the form data 
	$fName = $_POST['fName'];
	$lName = $_POST['lName'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$books = $_POST['books'];
	$OS = $_POST['OS'];

	//append the data into the file
	$myfile = fopen("mini4.csv", "a") or die("Unable to open and write file!");
	$data = $fName. ', '. $lName . ', '.$email . ', '.$phone. ', '.$books.', '.$OS. "\n";
	fwrite($myfile, $data);
	fclose($myfile);

	//read the file and print the data out
	$myfile = fopen("mini4.csv", "r") or die("Unable to open and read file!");
	while(!feof($myfile)) {
		echo fgets($myfile) . "<br>";
	}
	fclose($myfile);
	?>

</body>
</html>

