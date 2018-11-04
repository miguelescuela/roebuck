<?php

if (FileMaker::isError($result)) { 
	if ($result -> getCode() == 401 ){ // No records match the request
		$errorCode = 401 ;
	}else if( $result -> getCode() == 507 ){ // A field validation failed
			$errorCode = 507 ;
	}else{	//$errorCode = 999;
		$errorCode = $result -> getCode();
	}
}else{
	$errorCode = 0;
}
?>