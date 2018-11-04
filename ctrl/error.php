<?php

if (FileMaker::isError($resultado)) { 
	if ($resultado -> getCode() == 401 ){ // No records match the request
		$errorCode = 401 ;
	}else if( $resultado -> getCode() == 507 ){ // A field validation failed
		$errorCode = 507 ;
	}else{	//$errorCode = 999;
		$errorCode = $resultado -> getCode();
	}
}else{
	$errorCode = 0;
}
?>