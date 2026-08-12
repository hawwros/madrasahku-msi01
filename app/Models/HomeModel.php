<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    protected $table = 'settings';

    /**
     * Ambil semua pengaturan website sebagai key-value array
     */
    public function getSettings(): array
    {
        $rows = $this->db->table('settings')->get()->getResultArray();
        $result = [];
        foreach ($rows as $row) {
            $result[$row['key']] = $row['value'];
        }
        return $result;
    }

    /**
     * Update pengaturan berdasarkan key
     */
    public function updateSetting(string $key, string $value): bool
    {
        $exists = $this->db->table('settings')->where('key', $key)->countAllResults();
        if ($exists) {
            return $this->db->table('settings')
                ->where('key', $key)
                ->update(['value' => $value]);
        }
        return $this->db->table('settings')
            ->insert(['key' => $key, 'value' => $value]);
    }

    /**
     * Update banyak setting sekaligus
     */
    public function updateManySettings(array $data): void
    {
        foreach ($data as $key => $value) {
            $this->updateSetting($key, $value);
        }
    }

    /**
     * Ambil informasi SPMB
     */
    public function getSpmbInfo(): array
    {
        $rows = $this->db->table('spmb_info')->get()->getResultArray();
        $result = [];
        foreach ($rows as $row) {
            $result[$row['key']] = $row['value'];
        }
        return $result;
    }
}