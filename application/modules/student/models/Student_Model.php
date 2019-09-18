<?php
class Student_Model extends Common_Model
{
    
    public function __construct()
    {
        parent::__construct();
        $this->table = 'student';
        $this->order_by = ['id', 'DESC'];
        $this->select_results_info($this->table, '', $this->order_by);
    }
    
}

