<?php namespace App\Models;

use CodeIgniter\Model;

class KalenderModel extends Model
{
    protected $table = 'kalender';
    protected $allowedFields = ['title','start_date','end_date','type'];

    public function getEventsForMonth($year = null, $month = null)
    {
        try {
            if ($this->db->tableExists($this->table)) {
                if (!$year) $year = date('Y');
                if (!$month) $month = date('m');
                $start = "$year-$month-01";
                $rows = $this->like('start_date', "$year-$month", 'after')->orderBy('start_date','ASC')->findAll();
                return $rows;
            }
        } catch (\Exception $e) {
        }

        // fallback events
        return [
            ['title'=>'Pendaftaran SPMBM Dibuka','start_date'=>date('Y-m-d', strtotime('+5 days')),'type'=>'Penting'],
            ['title'=>'Libur Semester','start_date'=>date('Y-m-d', strtotime('+15 days')),'type'=>'Libur'],
        ];
    }
}
