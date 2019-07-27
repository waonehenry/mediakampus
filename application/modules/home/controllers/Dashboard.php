<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

		function __construct()
    {
        parent::__construct();
				$this->load->model('schedule/Schedule_model');
				$this->load->model('schedule/Schedule_thesis_model');
				// if (!$this->session->userdata('login')) redirect('admin/login');
    }

	public function index()
	{
			$where = array(
					'semester' => 1,
					'course_year' => 2019
			);

			$data['page'] = 'home/index';
			$data['title'] = 'Dashboard';
			$data['role'] = '';
			$data['course']	= $this->Schedule_model->get_data_by($where);
			$data['thesis']	= $this->Schedule_thesis_model->get_data();

			$this->view($data);
	}


	public function view($data)
	{
			// $data['menu'] = $this->menu_management->core();

			$this->load->view('home/layout/head', $data);
			$this->load->view('home/layout/menu');
			$this->load->view($data['page'], $data);
			$this->load->view('home/layout/foot');
	}
}
?>
