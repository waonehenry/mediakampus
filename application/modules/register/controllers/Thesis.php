<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thesis extends MX_Controller {

	function __construct()
    {
        parent::__construct();
				$this->load->model('Thesis_register_model');
				$this->load->model('Thesis_document_model');
				$this->load->model('masterdata/Document_model');
				$this->user_id = 1;
    }

	public function index()
	{
			$data['page'] = 'register/thesis/index';
			$data['title'] = 'Thesis';
			$data['document'] = $this->Document_model->get_data();
			$data['modul'] = 'Register';
			$data['role'] = '';

			$this->view($data);
	}

	public function store()
	{
			$data = $this->input->post('data');
			$data_checkbox = $this->input->post('data_checkbox');
			$data['user_id'] = $this->user_id;
			// $data['date_start'] = convertDateMysql($data['date_start']);
			$result_id = $this->Thesis_register_model->insertid($data);
			if ($result_id > 0)
			{
					foreach ($data_checkbox['document'] as $key => $value) {
							if ($value !='') {
									$data_array[$key]['register_id'] = $result_id;
									$data_array[$key]['document_id'] = $value;
									$data_array[$key]['description'] = $data['description'];
							}
					}
					$result = $this->Thesis_document_model->insert_array($data_array);
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
			$where['tb_thesis_document.id'] = $id;
			$data = $this->Thesis_register_model->get_data_by($where)->row_array();
			$data['date_start'] = convertInputMask($data['date_start']);

			echo json_encode($data);
	}

	public function edit_group($dosen_id, $date)
	{
			$where = array(
					'dosen_id' => $dosen_id,
					'date_start' => $date
			);

			$data = $this->Thesis_register_model->get_data_by($where)->result_array();
			foreach ($data as $key => $value) {
					$data[$key]['date_start'] = convertInputMask($value['date_start']);
			}


			echo json_encode($data);
	}

	public function update_group($dosen_id, $date)
	{
			$data = $this->input->post('data');
			$data['updated_at'] = date('Y-m-d H:i:s');
			$data['user_id'] = $this->user_id;
			$data['date_start'] = convertDateMysql($data['date_start']);

			// delete all
			$delete = array(
					'dosen_id' => $dosen_id,
					'date_start' => $date
			);

			$del = $this->Thesis_register_model->clear($delete);
			if ($del) {
					foreach ($data['shift_start'] as $key => $value) {
							if ($value !='') {
									$data_array[$key]['dosen_id'] = $data['dosen_id'];
									$data_array[$key]['date_start'] = $data['date_start'];
									$data_array[$key]['shift_start'] = $value;
									$data_array[$key]['user_id'] = $data['user_id'];
									$data_array[$key]['description'] = $data['description'];
							}
					}

					$result = $this->Thesis_register_model->insert_array($data_array);
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
			} else {
					$response['status'] = 'danger';
					$response['message'] = 'Sorry! Data has not been updated correctly.';
			}

			echo json_encode($response);
	}

	public function delete($id)
	{
			$data['status'] = '0';
			$data['deleted_at'] = date('Y-m-d H:i:s');
			$data['user_id'] = '1';

			$result = $this->Thesis_register_model->delete($data, $id);
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

	public function erase($dosen_id, $date)
	{
			$data = array(
				'dosen_id' => $dosen_id,
				'date_start' => $date
			);

			$result = $this->Thesis_register_model->clear($data);
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
      $list = $this->Thesis_register_model->get_datatables();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $field) {
          $no++;
          $row = array();
          $row[] = $no;
					$row[] = $field->created_at;
					$row[] = $field->name;
          $row[] = $field->document;
					$row[] = $field->description;
					$row[] = '<div class="btn-group">
							<button class="btn green btn-small btn-outline dropdown-toggle" data-toggle="dropdown">Tools
									<i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu pull-right">
									<li>
											<a href="'.base_url().'register/thesis/edit/'.$field->id.'" class="btn-edit">
													<i class="fa fa-pencil"></i> Edit </a>
									</li>
									<li>
											<a href="'.base_url().'register/thesis/delete/'.$field->id.'" class="btn-delete">
													<i class="fa fa-delete"></i> Delete </a>
									</li>
							</ul>
					</div>';
          $data[] = $row;
      }

      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->Thesis_register_model->count_all(),
                      "recordsFiltered" => $this->Thesis_register_model->count_filtered(),
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
