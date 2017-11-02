<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*@permission 首页
*/
class Demo
{
	//protected $active_top_tag  = 'home';


	public function __construct(){

	}
    /**
	*@permission 首页列表
	*/
	public function index(){
        echo 'aa';
	}

	/**
	*@permission 首页测试
	*/
	public function test(){
        echo 'aa';
	}
	public function test2(){//不会被记录权限。因为没有关键注释permission
        echo 'aa';
	}
}
