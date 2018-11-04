<?php

if (FileMaker::isError($result2)) { 
	if ($result2 -> getCode() == 401 ){ // No records match the request
		$errorCode = 401 ;
	}else if( $result2 -> getCode() == 507 ){ // A field validation failed
		$errorCode = 507 ;
	}else{	//$errorCode = 999;
		$errorCode = $result2 -> getCode();
	}
}else{
	$errorCode = 0;
}
?>