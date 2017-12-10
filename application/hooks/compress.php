<?php
if (! defined ('BASEPATH')) exit("Não foi possivél executar o script");

function compress() {
	ini_set('pcre.recursion_limit','16777');
	$CI =& get_instance();
	
	$buffer = $CI->output->get_output();
	
	$reg = "%(?>[^\S ]\s*| \s{2,})(?=[^<]*+(?:<(?!/?(?:textarea|pre|script)\b)[^<]*+)*+(?:<(?>textarea|pre|script)\b| \z))%Six";
	
	$new_buffer = preg_replace($reg," ",$buffer);
	
	if($new_buffer === null) {
		$new_buffer = $buffer;
	}
	
	$CI->output->set_output($new_buffer);
	$CI->output->_display();
}