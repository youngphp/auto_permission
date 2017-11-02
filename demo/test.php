<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/ERP_Controller.php';

/**
*@permission 首aaaaaab
*/
class Test extends ERP_Controller
{
	//protected $active_top_tag  = 'home';


	public function __construct(){
		parent::__construct();
		// $data = array();
		// $permissions = $this->getUserPermissions();
		// var_dump($permissions);die;
		// $data['active_menu_tag'] = 'index';
		// $data['task_status_types'] = $this->task_status_types;
		// $data['active_top_tag'] = $this->active_top_tag;
		// $this->load->vars($data);
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