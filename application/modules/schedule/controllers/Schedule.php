<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends MX_Controller {

	function __construct()
    {
				parent::__construct();
				if ($this->session->userdata('login') == TRUE) {
							$this->user_id = $this->session->userdata('id');
				} else {
						redirect('admin/login/login');
				}
				$this->load->model('Schedule_model');
				$this->load->model('masterdata/Course_model');
				$this->load->model('masterdata/Shift_model');
				$this->load->model('masterdata/Dosen_model');
				$this->load->model('masterdata/Day_model');
				$this->load->model('masterdata/Room_model');
				$this->load->model('masterdata/Student_class_model');
    }

	public function index()
	{
			$data['page'] = 'schedule/schedule/index';
			$data['title'] = 'Course';
			$data['day'] = $this->Day_model->get_data();
			$data['shift'] = $this->Shift_model->get_data();
			$data['course'] = $this->Course_model->get_data();
			$data['room'] = $this->Room_model->get_data();
			$data['dosen'] = $this->Dosen_model->get_data();
			$data['class'] = $this->Student_class_model->get_data();
			$data['modul'] = 'Schedule';
			$data['role'] = '';

			$this->view($data);
	}

	public function store()
	{
			$data = $this->input->post('data');
			$data['user_id'] = $this->user_id;

			$result = $this->Schedule_model->insert($data);
			if ($result)
			{
				$response['status'] = 'success';
				$response['message'] = 'Congrulation! Data has been saved.';
			}
			else
			{
				$response['status'] = 'danger';
				$response['message'] = 'Sorry! Data has not been saved.';
			}

			echo json_encode($response);
	}

	public function edit($id)
	{
			$where['tb_schedule.id'] = $id;
			$data = $this->Schedule_model->get_data_by($where)->row_array();

			echo json_encode($data);
	}

	public function update($id)
	{
			$data = $this->input->post('data');
			$data['updated_at'] = date('Y-m-d H:i:s');
			$data['user_id'] = $this->user_id;

			$result = $this->Schedule_model->update($data, $id);
			if ($result)
			{
				$response['status'] = 'success';
				$response['message'] = 'Congrulation! Data has been updated.';
			}
			else
			{
				$response['status'] = 'danger';
				$response['message'] = 'Sorry! Data has not been updated.';
			}

			echo json_encode($response);
	}

	public function delete($id)
	{
			$data['status'] = '0';
			$data['deleted_at'] = date('Y-m-d H:i:s');
			$data['user_id'] = '1';

			$result = $this->Schedule_model->delete($data, $id);
			if ($result)
			{
				$response['status'] = 'success';
				$response['message'] = 'Congrulation! Data has been removed.';
			}
			else
			{
				$response['status'] = 'danger';
				$response['message'] = 'Sorry! Data has not been removed.';
			}

			echo json_encode($response);
	}

	//server side list
	public function server_side_list()
  {
      $list = $this->Schedule_model->get_datatables();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $field) {
          $no++;
          $row = array();
          $row[] = $no;
          $row[] = $field->dosen;
					$row[] = $field->course.'('.$field->class.')';
					$row[] = $field->day_name.' '.$field->shift;
					$row[] = $field->room;
          $row[] = (($field->semester == '1') ? "Gasal" : "Genap").' '.$field->course_year;
					$row[] = '<div class="btn-group">
							<button class="btn green btn-small btn-outline dropdown-toggle" data-toggle="dropdown">Tools
									<i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu pull-right">
									<li>
											<a href="'.base_url().'schedule/schedule/edit/'.$field->id.'" class="btn-edit">
													<i class="fa fa-pencil"></i> Edit </a>
									</li>
									<li>
											<a href="'.base_url().'schedule/schedule/delete/'.$field->id.'" class="btn-delete">
													<i class="fa fa-delete"></i> Delete </a>
									</li>
							</ul>
					</div>';
          $data[] = $row;
      }

      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->Schedule_model->count_all(),
                      "recordsFiltered" => $this->Schedule_model->count_filtered(),
                      "data" => $data,
              );

      echo json_encode($output);
  }

	public function search()
	{
			// code here
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
