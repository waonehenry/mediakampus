<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule_restriction_model extends CI_Model {
		private $table = 'tb_schedule_restriction';
    var $column_order = array(null, 'id'); //set column field database for datatable orderable
    var $column_search = array('dosen'); //set column field database for datatable searchable
    var $order = array('id' => 'asc'); // default order

		public function insert($data) {

			return $this->db->insert($this->table, $data);
		}

		public function insert_array($data_array) {

			return $this->db->insert_batch($this->table, $data_array);
		}

		public function update($data, $id) {
			$this->db->where('id', $id);

			return $this->db->update($this->table, $data);
		}

		public function delete($data, $id) {
			$this->db->where('id', $id);

			return $this->db->update($this->table, $data);
		}

		public function clear($where) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}

			return $this->db->delete($this->table);
		}

		public function get_data() {
			$this->db->select('tb_schedule_restriction.*');
			$this->db->select('tb_dosen.name as dosen');
			$this->db->select('ref_shift.name as shift');
			$this->db->select('TIME_FORMAT(ref_shift.start_time, "%H:%i") as start', FALSE);
			$this->db->select('TIME_FORMAT(ref_shift.end_time, "%H:%i") as end', FALSE);
			$this->db->join('ref_shift', 'ref_shift.id = tb_schedule_restriction.shift_start');
			$this->db->join('tb_dosen', 'tb_dosen.id = tb_schedule_restriction.dosen_id');
			$this->db->where('tb_schedule_restriction.status', '1');

			return $this->db->get($this->table);
		}

		public function get_data_by($where)
		{
				$this->db->select('tb_schedule_restriction.*');
				$this->db->select('tb_dosen.name as dosen');
				$this->db->select('ref_shift.name as shift');
				$this->db->select('TIME_FORMAT(ref_shift.start_time, "%H:%i") as start', FALSE);
				$this->db->select('TIME_FORMAT(ref_shift.end_time, "%H:%i") as end', FALSE);
				$this->db->join('ref_shift', 'ref_shift.id = tb_schedule_restriction.shift_start');
				$this->db->join('tb_dosen', 'tb_dosen.id = tb_schedule_restriction.dosen_id');
				$this->db->where('tb_schedule_restriction.status', '1');
				foreach ($where as $key => $value) {
					$this->db->where($key, $value);
				}

				return $this->db->get($this->table);
		}

		private function _get_datatables_query()
    {
				$this->db->select('tb_schedule_restriction.*');
				$this->db->select('tb_dosen.name as dosen');
				$this->db->select('GROUP_CONCAT(ref_shift.name, "|" ) as shift');
				$this->db->select('TIME_FORMAT(ref_shift.start_time, "%H:%i") as start', FALSE);
				$this->db->select('TIME_FORMAT(ref_shift.end_time, "%H:%i") as end', FALSE);
				$this->db->join('ref_shift', 'ref_shift.id = tb_schedule_restriction.shift_start');
				$this->db->join('tb_dosen', 'tb_dosen.id = tb_schedule_restriction.dosen_id');
				$this->db->where('tb_schedule_restriction.status', '1');
				$this->db->group_by('tb_schedule_restriction.status, tb_schedule_restriction.date_start');
        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
    	$this->db->where('status', '1');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
