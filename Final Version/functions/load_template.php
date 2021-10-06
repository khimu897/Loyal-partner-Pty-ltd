<!--function load template-->
<?php
	function loadTemplate($filename, $tempVars){//passes the variable as arguments
		extract($tempVars);//extracts the data
		ob_start();//start
		require $filename;
		$content = ob_get_clean();//clean
		return $content;

	}
?>