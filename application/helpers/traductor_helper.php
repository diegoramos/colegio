<?php 
function traducir($param){
	$data = array();
	$data['module_administration'] = 'ADMINISTRAR';
	$data['module_matricular'] = 'MATRICULAR';
	$data['module_economia'] = 'ECONOMIA';
	$data['module_usuarios'] = 'Users';
	return $data[$param];
}

 ?>