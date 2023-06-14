<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use App\Models\DoctorProfileModel;
use App\Models\DoctorCounsellingModel;
use App\Models\DoctorLanguagesModel;
use App\Models\DoctorQualificationsModel;
use App\Models\DoctorSpecializationsModel;
use \Firebase\JWT\JWT;

class login extends ResourceController
{
  use ResponseTrait;
  // all users
  public function index()
  {
    $model = new UserModel();
    $data = $this->request->getJson();
    $userName = $data->user_name;
    $password = $data->password;

    $data = $model->where(['user_name' => $userName, 'password' => $password ])->first();
    if($data['role'] == 1){
      $doctorId = $data['id'];
      $data=$this->getDoctorProfile($doctorId);
      $data['qualification'] = $this->getQualifications($doctorId);
      $data['languages'] = $this->getLanguages($doctorId);
      $data['counselling'] = $this->getCounsellings($doctorId);
      $data['specialization'] = $this->getSpecilization($doctorId);
    }
    
    if ($data == null) {
      $response = [
        "status" => 204,
        "message" => "No records found",
        "data" => null,
      ];
      return $this->respond($response);
    }

    //  $passVerify = password_verify($password, $data['password']);
     if(!$data)
     {
      $response=[
        "status"=>204,
        "message"=>"Username or password is incorrect",
        "data"=>null,
      ];
      return  $this->respond($response);
     }
     $response=[
      "status"=>200,
      "message"=>"Records fetched succesfully",
      "data"=>$data,
     ];
     return $this->respond($response);
  }
  public function getDoctorProfile($userid)
  {
      $doctorModel = new DoctorProfileModel();
      $data = $doctorModel->select("doctor_profile.*,user.*")->join("user", "user.id=doctor_profile.user_id", "inner")->where("user.id", $userid)->first();
      return $data;
  }
  public function getQualifications($doctorId)
    {
        $model = new DoctorQualificationsModel();
        $data = $model->select("qualifications.id,qualifications.qualification")->join("qualifications", "qualifications.id=dr_qualifications.qualification_id")->where(["dr_id" => $doctorId])->findAll();
        return $data;
    }
    public function getLanguages($doctorId)
    {
        $model = new DoctorLanguagesModel();
        $data = $model->select("languages.*")->join("languages", "languages.id=dr_languages.languages_id", "INNER")->where(['dr_languages.dr_id' => $doctorId])->findAll();
        return $data;
    }
    public function getCounsellings($doctorId)
    {
        $model = new DoctorCounsellingModel();
        $data = $model->select("counselling.*")->join("counselling", "counselling.id=dr_counselling.counselling_id", "INNER")->where(["dr_id" => $doctorId])->findAll();
        return $data;
    }
    public function getSpecilization($doctorId)
    {
        $model = new DoctorSpecializationsModel();
        $data = $model->select("specializations.*")->join("specializations", "specializations.id=dr_specializations.specialization_id", "INNER")->where(["dr_id" => $doctorId])->findAll();
        return $data;
    }
}
