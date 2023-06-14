<?php

namespace App\Models;

use CodeIgniter\Model;

class DoctorProfileModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'doctor_profile';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id',  "email",  'contact_number', 'address',  'status',"user_id","notification_token","socket_id"];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'user_id' => "required|numeric",

    ];
    protected $validationMessages   = [
        'first_name' => "required",
        'last_name' => "required",
        'qualification' => "required",
        'contact_number' => "required",
        'role' => "required",
        'address' => "required",
        'specialization' => "required",
        'languages' => "required",
        'counseling' => "required",
    ];
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
