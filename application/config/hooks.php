<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

#definição de hook para compressão
$hook['display_override'][] = [
	'class'=>'',
	'function'=>'compress',
	'filename'=>'compress.php',
	'filepath'=>'hooks'
];
