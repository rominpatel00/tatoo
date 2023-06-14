<?php 
namespace App\Models;
use CodeIgniter\Model;
class PatientsModel extends Model
{
    protected $table = 'patients';
    protected $primaryKey = 'id';
    protected $allowedFields = ['firstName','lastName','middleName','user_name','password','gender','state','state_obj','district','district_obj','block','block_obj','village','village_obj',"contact_number", "email", "dob","bloodGroup","height","weight","bmi", "school", "class","address", "rfID"];
}