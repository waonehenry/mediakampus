<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thesis extends MX_Controller {

	function __construct()
    {
				parent::__construct();
				if ($this->session->userdata('login') == TRUE) {
							$this->user_id = $this->session->userdata('id');
				} else {
						redirect('admin/login/login');
				}
				$this->load->model('Schedule_thesis_model');
				$this->load->model('masterdata/Course_model');
				$this->load->model('masterdata/Shift_model');
				$this->load->model('masterdata/Dosen_model');
				$this->load->model('masterdata/Day_model');
				$this->load->model('masterdata/Room_model');
				$this->load->model('masterdata/Student_class_model');
				$this->load->model('masterdata/State_model');
				$this->load->model('register/Person_model');
				$this->load->model('register/Thesis_register_model');
				$this->load->model('register/Thesis_register_detail_model');
    }

	public function index($person_id = '')
	{
			$data['page'] = 'schedule/thesis/index';
			$data['title'] = 'Thesis';
			$data['shift'] = $this->Shift_model->get_data();
			$data['room'] = $this->Room_model->get_data();
			$data['dosen'] = $this->Dosen_model->get_data();
			$data['person'] = $this->Person_model->get_data();
			$data['exam'] = $this->State_model->get_data_by(array('type' => 'exam'));
			$data['modul'] = 'Thesis Schedule';
			$data['role'] = '';

			$this->view($data);
	}

	public function store()
	{
			$data = $this->input->post('data');
			$data['user_id'] = $this->user_id;
			if (!empty($data['d_date'])) {
					$data['d_date'] = convertDateMysql($data['d_date']);
			}

			$result = $this->Schedule_thesis_model->insert($data);
			if ($result)
			{
					if (!empty($data['profile_id'])) {
							$thesis_register = $this->Thesis_register_model->get_data_by(array('profile_id' => $data['profile_id']))->row_array();
							// insert log
							$log['thesis_register_id'] = $thesis_register['id'];
							// $log['description'] = "Ujian dilaksanakan pada tanggal ".date_indo($data['d_date']);
							$log['description'] = $data['description'];
							$log['state_id'] = $data['type'];
							$log['status'] = 2; // processing
							$log['user_id'] = $this->user_id;

							$result = $this->Thesis_register_detail_model->insert($log);
					}

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
			$where['tb_schedule_thesis.id'] = $id;
			$data = $this->Schedule_thesis_model->get_data_by($where)->row_array();
			if ($data['d_date'] != '0000-00-00') {
					$data['d_date'] = convertInputMask($data['d_date']);
			} else {
					$data['d_date'] = null;
			}

			echo json_encode($data);

	}

	public function update($id)
	{
			$data = $this->input->post('data');
			$data['updated_at'] = date('Y-m-d H:i:s');
			$data['user_id'] = $this->user_id;
			if (!empty($data['d_date'])) {
					$data['d_date'] = convertDateMysql($data['d_date']);
			}

			$result = $this->Schedule_thesis_model->update($data, $id);
			if ($result)
			{
					if (!empty($data['profile_id'])) {
							$thesis_register = $this->Thesis_register_model->get_data_by(array('profile_id' => $data['profile_id']))->row_array();
							// update log
							$log['thesis_register_id'] = $thesis_register['id'];
							$log['description'] = $data['description'];
							$log['status'] = 2; // processing
							$log['user_id'] = $this->user_id;
							$log['updated_at'] = date('Y-m-d H:i:s');

							$where['thesis_register_id'] = $thesis_register['id'];
							$where['state_id'] = $data['type'];

							$result = $this->Thesis_register_detail_model->update_where($log, $where);
					}

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

			$result = $this->Schedule_thesis_model->delete($data, $id);
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
      $list = $this->Schedule_thesis_model->get_datatables();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $field) {
					// if ($field->type == 1) {
					// 		$type = 'Munaqosah S1';
					// } elseif ($field->type == 2) {
					// 		$type = 'Munaqosah S2';
					// } elseif ($field->type == 3) {
					// 	 	$type = 'Seminar Proposal';
					// } else {
					// 		$type = 'undefined';
					// }
					$type = $this->State_model->get_data_by(array('id' => $field->type))->row_array();
          $no++;
          $row = array();
          $row[] = $no;
					$row[] = $field->title."<br>".$field->student;
					$row[] = $type['name'];
					$row[] = $field->examiner;
          $row[] = $field->d_date.'<br>'.$field->shift;
					$row[] = $field->room;
					$row[] = '<div class="btn-group">
							<button class="btn green btn-small btn-outline dropdown-toggle" data-toggle="dropdown">Tools
									<i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu pull-right">
									<li>
											<a href="'.base_url().'schedule/thesis/edit/'.$field->id.'" class="btn-edit">
													<i class="fa fa-pencil"></i> Edit </a>
									</li>
									<li>
											<a href="'.base_url().'schedule/thesis/approve/'.$field->student_id.'/'.$field->type.'" class="btn-approve">
													<i class="fa fa-star"></i> Approve </a>
									</li>
									<li>
											<a href="'.base_url().'schedule/thesis/delete/'.$field->id.'" class="btn-delete">
													<b>X</b> Delete </a>
									</li>
							</ul>
					</div>';
          $data[] = $row;
      }

      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->Schedule_thesis_model->count_all(),
                      "recordsFiltered" => $this->Schedule_thesis_model->count_filtered(),
                      "data" => $data,
              );

      echo json_encode($output);
  }

	public function approve($profile_id, $current_state)
	{
			$data['status'] = '1';
			$data['updated_at'] = date('Y-m-d H:i:s');
			$data['user_id'] = $this->user_id;
			$data['description'] = "Proses Selesai"; // bisa diambil dari konten schedule_thesis

			$thesis_register = $this->Thesis_register_model->get_data_by(array('profile_id' => $profile_id))->row_array();
			$where['thesis_register_id'] = $thesis_register['id'];
			$where['state_id'] = $current_state;

			$result = $this->Thesis_register_detail_model->update_where($data, $where);
			if ($result)
			{
					$response['status'] = 'success';
					$response['message'] = 'Congrulation! Data has been update.';
			}
			else
			{
					$response['status'] = 'danger';
					$response['message'] = 'Sorry! Data failed to removed.';
			}

			echo json_encode($response);
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
