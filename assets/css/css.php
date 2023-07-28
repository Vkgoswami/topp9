<?php 
	header('Content-type: text/css');
	ob_start("compress");

	function compress($buffer) {
		$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
		$buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
		return $buffer;
	}	
	include('owl.carousel.min.css');
	include('owl.theme.default.min.css');
	include('main.css');
	ob_end_flush();
?>