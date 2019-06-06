<?php
$text = "";
$linecount = 0;
$arrpara = array();
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['genquotes']))
	{
		$handle = fopen("assets/css/texts/temp.txt", "r");
		if ($handle) 
		{
			while (($line = fgets($handle)) !== false) //read file line by line
			{
				$linecount += 1;//line counter
				if(strstr($line, "----")) //hyphen - paragraph separator
				{
					array_push($arrpara, $linecount);//count num of paras
				}
			}
			$randomnum = rand(0, count($arrpara) - 1);//random number generator from num of paras
			
			if($randomnum == (count($arrpara) - 1))//last hyphen selected
			{
				$limit = $linecount;//upper limit is end of file
			}
			else
			{
				$limit = $arrpara[$randomnum+1];//upper limit is next hyphen
			}
			
			$spl = new SplFileObject("assets/css/texts/temp.txt");
			for($x = $arrpara[$randomnum]; $x < $limit; $x++) 
			{
				$spl->seek($x); // Zero-based numbering - jump to that line number
				$text .= $spl->current();//append lines till next hyphen
			}
			
		fclose($handle);
		} 
		else 
		{
			// error opening the file.
			$text = "Error Generating Quotes. Try again later.";
		}
	}
	//Alternate to SplFileObject -> convert file to array and read
	//$lines = file('temp.txt');
	//print $lines[2]; will read 3rd line
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sherlock Ipsum</title>
	<link rel="icon" type="image/png" href="assets/logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/pageone.css">
</head>
<style>
div.texta {
	display: flex;
    flex-direction: column;
	text-align: center;
}
div.textb {
	flex-grow: 1;
    overflow: auto;
	text-align: center;
}
div.bottom-right {
    font-size:1vw;
}

body, html {
	background-repeat: repeat-y;
}

input[type=text] {
	width: 8vw;
	height: 8vh;
	text-align: center;
	font-size:6vw;
	font-family: 'Sherlock', Gadget, sans-serif;
    padding: 2vw 1px;
	background-color: white;
    color: black;
	margin-right: 10px;
	text-transform: uppercase;
}
input[type=text]:focus {
    border: 3px solid white;
}

h1, h2, p, a {
	font-family: 'Sherlock', Gadget, sans-serif;
	font-weight:normal;
	font-style:normal;
	color: white;
	letter-spacing: 3px;
}

input[type="submit"] {
    background-color: #00000000;
    border: 3px solid white;
	border-radius: 25px;
    color: white;
    padding: 15px 32px;
    text-align: center;
    display: inline-block;
    font-size: 16px;
	font-family: 'Sherlock', Gadget, sans-serif;
    margin: 4px 2px;
    cursor: pointer;
}

</style>
<body>
<div class="centered">
<div class = "texta">
<h1>SHERLOCK IPSUM</h1>
<h2>a random quote generator from the sherlock tv series, created for sherlock fans !!</h2>
<form action="" method="post">
	<input type="submit" name="genquotes" value="GENERATE QUOTES">
</form>
</div>
<div class = "textb">
<p><?php echo nl2br($text); ?></p>
</div>
</div>

<div class="bottom-right">
<p style="color: gray;">created by: Surhud004 on FRIDAY the 13TH JULY 2018 copyrights reserved <a href="credits.html"> CREDITS </a></p>
</div>
</body>
</html>
