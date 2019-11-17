<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasca extends MX_Controller {

		function __construct()
    {
        parent::__construct();
				$this->load->model('schedule/Schedule_model');
				$this->load->model('schedule/Schedule_thesis_model');
				$this->load->model('agenda/Agenda_model');
				$this->load->model('agenda/Running_text_model');
				$this->load->model('register/Thesis_register_model');
				$this->load->model('masterdata/State_model');
    }

	public function index()
	{
			$where = array(
					'semester' => setting_display()['semester'],
					'course_year' => date('Y'),
					'day' => date('N')
			);

			$data['page'] = 'home/index_pasca';
			$data['title'] = 'Dashboard';
			$data['role'] = '';
			$data['thesis']	= $this->Schedule_thesis_model->get_data();
			$data['running_text']	= $this->Running_text_model->get_data();
			$data['register']	= $this->Thesis_register_model->get_data();
			$data['count_page'] = ceil($this->Schedule_thesis_model->count_all()/10);

			$this->view($data);
	}

	public function course()
	{
			$where = array(
					'semester' => setting_display()['semester'],
					'course_year' => date('Y'),
					'day' => date('N')
			);

			$data['page'] = 'home/index_pasca_course';
			$data['title'] = 'Dashboard';
			$data['role'] = '';
			$data['course']	= $this->Schedule_model->get_data_by($where);
			$data['thesis']	= $this->Schedule_thesis_model->get_data();
			$data['running_text']	= $this->Running_text_model->get_data();
			$data['agenda']	= $this->Agenda_model->get_data_by(array('type'=>1));
			$data['info']	= $this->Agenda_model->get_data_by(array('type'=>2));
			$data['register']	= $this->Thesis_register_model->get_data();

			$this->view($data);
	}

	public function dashboard()
  {
			$state_type = 'exam';
      $list = $this->Schedule_thesis_model->get_datatables($state_type);
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $field) {
					$no++;
					$row = array();
					$row[] = $no;
					$row[] = $field->student;
					$row[] = $field->state;
					$row[] = get_day($field->d_date).', '.date_indo($field->d_date);
					$row[] = $field->start.'-'.$field->end;
					// $row[] = $field->room;

					$data[] = $row;
      }

      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->Schedule_thesis_model->count_all($state_type),
                      "recordsFiltered" => $this->Schedule_thesis_model->count_filtered($state_type),
                      "data" => $data,
              );

      echo json_encode($output);
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
