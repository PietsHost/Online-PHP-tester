<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(E_ALL);
if ($_POST['submit'] != '') {
    ob_start();
    $theCode=ltrim(rtrim(stripslashes($_POST['code'])));
    if(!strncmp($theCode,"<?",2)) //if it's full php, remove the tags
    {
	  if(!strncmp($theCode,"<?php",5))
	  {
		$theCode=substr($theCode,5);
	  }
	  else
	  {
		$theCode=substr($theCode,2);
	  }
	  $theCode=substr($theCode,0,strlen($theCode)-2);
	  $theCode=ltrim(rtrim(stripslashes($theCode)));
    }
    eval($theCode);



    $result = ob_get_contents();
    ob_end_clean();
} else {
    $result = '<p>Please input something !!</p>';
}

?>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <style>
		body{background-color:#333; font-family:'Microsoft Sans Serif',arial, sans-serif;}
		legend{color:white;font-size:10px}
	  </style>
    </head>
    <body>
	  <fieldset style="border:1px solid black;height:300px;overflow:hidden;"><legend>Raw (+htmlentities()): </legend>
		<textarea style="overflow:auto;height:200px;width:600px;background:white;padding:10px">	
<?php
echo htmlentities($result);
?>
		</textarea>
	  </fieldset>
	  <fieldset style="border:1px solid black;height:400px;overflow:hidden;"><legend>Html: </legend>
		<div style="overflow:auto;height:400px;background:white;padding:10px;margin:10px">
		    <?php
		    echo $result;

		    ?>
		</div>
	  </fieldset>
    </body>
</html>
