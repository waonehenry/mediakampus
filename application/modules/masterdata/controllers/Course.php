<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends MX_Controller {

	function __construct()
    {
        parent::__construct();
				$this->load->model('Course_model');
				$this->load->model('Prodi_model');
				$this->user_id = 1;
    }

	public function index()
	{
			$data['page'] = 'masterdata/course/index';
			$data['title'] = 'Course';
			$data['modul'] = 'Masterdata';
			$data['role'] = '';
			$data['prodi'] = $this->Prodi_model->get_data();

			$this->view($data);
	}

	public function store()
	{
			$data = $this->input->post('data');
			$data['user_id'] = $this->user_id;

			$result = $this->Course_model->insert($data);
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
			$where['ref_course.id'] = $id;
			$data = $this->Course_model->get_data_by($where)->row_array();

			echo json_encode($data);
	}

	public function update($id)
	{
			$data = $this->input->post('data');
			$data['updated_at'] = date('Y-m-d H:i:s');
			$data['user_id'] = $this->user_id;

			$result = $this->Course_model->update($data, $id);
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

			$result = $this->Course_model->delete($data, $id);
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
      $list = $this->Course_model->get_datatables();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $field) {
          $no++;
          $row = array();
          $row[] = $no;
          $row[] = $field->code;
					$row[] = $field->name;
          $row[] = $field->description;
					$row[] = $field->prodi;
					$row[] = '<div class="btn-group">
							<button class="btn green btn-small btn-outline dropdown-toggle" data-toggle="dropdown">Tools
									<i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu pull-right">
									<li>
											<a href="'.base_url().'masterdata/course/edit/'.$field->id.'" class="btn-edit">
													<i class="fa fa-pencil"></i> Edit </a>
									</li>
									<li>
											<a href="'.base_url().'masterdata/course/delete/'.$field->id.'" class="btn-delete">
													<i class="fa fa-delete"></i> Delete </a>
									</li>
							</ul>
					</div>';
          $data[] = $row;
      }

      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->Course_model->count_all(),
                      "recordsFiltered" => $this->Course_model->count_filtered(),
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
