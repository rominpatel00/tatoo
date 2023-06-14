<?php 
namespace App\Models;
use CodeIgniter\Model;
class MedicalHistoryModel extends Model
{
    protected $table = "medical_history";
    protected $primaryKey = "id";
    protected $allowedFields = ["patient_id","title","description","call_id","prscription_id","created_at","updated_at"];
}