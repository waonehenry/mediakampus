<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
			$data['page'] = 'home/index';
			$data['title'] = 'Dashboard';
			$data['role'] = '';

			$this->view($data);
	}

	public function store()
	{
			// code here
	}

	public function update($id)
	{
			// code here
	}

	public function delete($id)
	{
			// code here
	}

	//server side list
	public function list()
	{
			//  code here
	}

	public function search()
	{
			// code here
	}

	public function view($data)
	{
			$data['menu'] = $this->menu_management->core();

			$this->load->view('home/layout/head', $data);
			$this->load->view($data['page'], $data);
			$this->load->view('home/layout/foot');
	}
}
?>
