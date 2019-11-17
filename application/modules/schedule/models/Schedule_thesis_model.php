<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule_thesis_model extends CI_Model {
		private $table = 'tb_schedule_thesis';
    var $column_order = array(null, 'id'); //set column field database for datatable orderable
    var $column_search = array('title', 'description'); //set column field database for datatable searchable
    var $order = array('id' => 'asc'); // default order

		public function insert($data) {

			return $this->db->insert($this->table, $data);
		}

		public function update($data, $id) {
			$this->db->where('id', $id);

			return $this->db->update($this->table, $data);
		}

		public function delete($data, $id) {
			$this->db->where('id', $id);

			return $this->db->update($this->table, $data);
		}

		public function get_data() {
			$this->db->select('tb_schedule_thesis.*');
			$this->db->select('ref_room.name as room');
			$this->db->select('ref_shift.name as shift');
			$this->db->select('TIME_FORMAT(ref_shift.start_time, "%H:%i") as start', FALSE);
			$this->db->select('TIME_FORMAT(ref_shift.end_time, "%H:%i") as end', FALSE);
			$this->db->select('CONCAT("(1)",dos1.name," (2)",dos2.name," (3)",dos3.name) as examiner');
			$this->db->select('p.name as student');
			$this->db->join('ref_room', 'ref_room.id = tb_schedule_thesis.room_id');
			$this->db->join('ref_shift', 'ref_shift.id = tb_schedule_thesis.shift_id');
			$this->db->join('tb_dosen as dos1', 'dos1.id = tb_schedule_thesis.dosen_id_1', 'left');
			$this->db->join('tb_dosen as dos2', 'dos2.id = tb_schedule_thesis.dosen_id_2', 'left');
			$this->db->join('tb_dosen as dos3', 'dos3.id = tb_schedule_thesis.dosen_id_3', 'left');
			$this->db->join('tb_person as p', 'p.id = tb_schedule_thesis.profile_id', 'left');
			$this->db->where('tb_schedule_thesis.status', '1');

			return $this->db->get($this->table);
		}

		public function get_data_by($where)
		{
				$this->db->select('tb_schedule_thesis.*');
				$this->db->select('ref_room.name as room');
				$this->db->select('ref_shift.name as shift');
				$this->db->select('TIME_FORMAT(ref_shift.start_time, "%H:%i") as start', FALSE);
				$this->db->select('TIME_FORMAT(ref_shift.end_time, "%H:%i") as end', FALSE);
				$this->db->select('CONCAT("<li>",dos1.name,"</li><li>",dos2.name,"</li><li>",dos3.name,"</li>") as examiner');
				$this->db->select('p.name as student, p.id as student_id');
				$this->db->join('ref_room', 'ref_room.id = tb_schedule_thesis.room_id', 'left');
				$this->db->join('ref_shift', 'ref_shift.id = tb_schedule_thesis.shift_id', 'left');
				$this->db->join('tb_dosen as dos1', 'dos1.id = tb_schedule_thesis.dosen_id_1', 'left');
				$this->db->join('tb_dosen as dos2', 'dos2.id = tb_schedule_thesis.dosen_id_2', 'left');
				$this->db->join('tb_dosen as dos3', 'dos3.id = tb_schedule_thesis.dosen_id_3', 'left');
				$this->db->join('tb_person as p', 'p.id = tb_schedule_thesis.profile_id', 'left');
				$this->db->where('tb_schedule_thesis.status', '1');
				foreach ($where as $key => $value) {
					$this->db->where($key, $value);
				}

				return $this->db->get($this->table);
		}

		private function _get_datatables_query($state_type = '')
    {
				$this->db->select('tb_schedule_thesis.*');
				$this->db->select('ref_room.name as room');
				$this->db->select('ref_shift.name as shift');
				$this->db->select('TIME_FORMAT(ref_shift.start_time, "%H:%i") as start', FALSE);
				$this->db->select('TIME_FORMAT(ref_shift.end_time, "%H:%i") as end', FALSE);
				$this->db->select('CONCAT("<li>",dos1.name,"</li><li>",dos2.name,"</li><li>",dos3.name,"</li>") as examiner');
				$this->db->select('p.name as student, p.id as student_id');
				$this->db->select('ref_state.name as state');
				$this->db->join('ref_state', 'ref_state.id = tb_schedule_thesis.type');
				$this->db->join('ref_room', 'ref_room.id = tb_schedule_thesis.room_id', 'left');
				$this->db->join('ref_shift', 'ref_shift.id = tb_schedule_thesis.shift_id', 'left');
				$this->db->join('tb_dosen as dos1', 'dos1.id = tb_schedule_thesis.dosen_id_1', 'left');
				$this->db->join('tb_dosen as dos2', 'dos2.id = tb_schedule_thesis.dosen_id_2', 'left');
				$this->db->join('tb_dosen as dos3', 'dos3.id = tb_schedule_thesis.dosen_id_3', 'left');
				$this->db->join('tb_person as p', 'p.id = tb_schedule_thesis.profile_id', 'left');
				$this->db->where('tb_schedule_thesis.status', '1');
        $this->db->from($this->table);

				if ($state_type != '') {
						$this->db->where('ref_state.type', $state_type);
				}

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

    function get_datatables($state_type = '')
    {
        $this->_get_datatables_query($state_type);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($state_type = '')
    {
        $this->_get_datatables_query($state_type);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($state_type = '')
    {
				$this->db->join('ref_state', 'ref_state.id = tb_schedule_thesis.type');
    		$this->db->where($this->table.'.status', '1');
				if ($state_type != '') {
						$this->db->where('ref_state.type', $state_type);
				}
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
