<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*@permission 首
*/
class Test
{
	

	public function __construct(){
		
	}
    /**
	*@permission 首页概述
	*/
	public function index(){
        echo 'aa';
	}

	/**
	*@permission test
	*/
	public function test(){
        echo 'aa';
	}
}
