<?php
function implode_get() {
	$first = true;
	$output = '';
	foreach($_GET as $key => $value) {
		if ($first) {
			$output = '?'.$key.'='.$value;
			$first = false;
		} else {
			$output .= '&'.$key.'='.$value;
		}
	}
	return $output;
}
?><html>
	<head>
		<title>PHP CONSOLE</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="_js/CodeMirror/lib/codemirror.css">
	</head>
	<body>
<body>
<table style="width:100%;height:100%;overflow:hidden">
	<tr style="vertical-align:top">
		<td style="width:45%;height:99%;max-width:700px;">
			<h2>PHP Code input <input type="submit" id="saveButton" title="click to save this code" value="save" /></h2>
			<form method="post" action="php_result.php<?php echo implode_get() ?>" target="result">
				<p style="text-align:right"><input type="submit" name="submit" value="process" class="button" ></p>
				<textarea  name="code" class="php" id="code"><?php //echo $serializedGet
				echo "<?php \n" ?>$message = 'hello World';
echo $message;<?php echo "\n?>";?></textarea>
			</form>
		</td>
		<td  style="width:45%;height:100%">
			<h2>Output</h2>
			<iframe name="result" style="width:100%;height:100%;border:1px dotted black"><p>hello</p></iframe>
		</td>
	</tr>
</table>
<script type="text/javascript" src="_js/jquery-3.2.1.min.js"></script>
<script type="text/javaScript" src="_js/CodeMirror/lib/codemirror.js"></script>
<script src="_js/CodeMirror/addon/edit/matchbrackets.js"></script>
<script src="_js/CodeMirror/mode/htmlmixed/htmlmixed.js"></script>
<script src="_js/CodeMirror/mode/xml/xml.js"></script>
<script src="_js/CodeMirror/mode/javascript/javascript.js"></script>
<script src="_js/CodeMirror/mode/css/css.js"></script>
<script src="_js/CodeMirror/mode/clike/clike.js"></script>
<script type="text/javascript" src="_js/CodeMirror/mode/php/php.js"></script>
<script type="text/javascript">
var myTextArea = document.getElementById('code');
var myCodeMirror = CodeMirror.fromTextArea(myTextArea, {
        lineNumbers: true,
        matchBrackets: true,
        mode: "application/x-httpd-php",
        indentUnit: 4,
        indentWithTabs: true,
        enterMode: "keep",
        tabMode: "shift"
      });

$('#saveButton').click(function(){
	var code = $('#code').val();
	$.post('save.ajax.php',{code: code},function(data,result){
		alert("Result : " + data);
	});
});
</script>
</body>
</html>