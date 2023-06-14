<?php

namespace App\Models;

use CodeIgniter\Model;

class KioskModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kiosk';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["name", "kiosk_id", "state", "state_obj", "district", "district_obj", "block", "block_obj", "local_body", "local_body_obj", "address"];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        "name" => "required",
        "kiosk_id" => "required",
        "state" => "required",
        "district" => "required",
        "block" => "required",
        "local_body" => "required",
        "address" => "required",
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
