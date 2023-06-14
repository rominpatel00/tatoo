<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DoctorCounsellingModel;
use App\Models\DoctorLanguagesModel;
use App\Models\DoctorProfileModel;
use App\Models\DoctorQualificationsModel;
use App\Models\DoctorSpecializationsModel;
use App\Models\QualificationsModel;
use App\Models\UserModel;


class DoctorProfile extends BaseController
{
    use \CodeIgniter\API\ResponseTrait;
    private $db;

    public function __construct()
    {

        $this->db = \Config\Database::connect();
    }
    public function getProfile($doctorId)
    {
        $data=$this->getDoctorProfile($doctorId);

       if ($data == null) {
            $response = [
                "status" => 204,
                "data" => [],
                "message" => "No Record Found",
                "error" => null
            ];
            return $this->respond($response);
        }

            $data['qualification'] = $this->getQualifications($doctorId);
            $data['languages'] = $this->getLanguages($doctorId);
            $data['counselling'] = $this->getCounsellings($doctorId);
            $data['specialization'] = $this->getSpecilization($doctorId);
        $response = [
            "status" => 200,
            "message" => "Records fetched succesfully",
            "data" => $data
        ];
        return $this->respond($response);
    }
    public function listAll()
    {
        $model = new DoctorProfileModel();
        $data = $model->select("doctor_profile.*,user.*")->join("user", "user.id=doctor_profile.user_id", "INNER")->findAll();
        if ($data == null) {
            $response = [
                "status" => 204,
                "data" => [],
                "message" => "No Record Found",
                "error" => null
            ];
            return $this->respond($response);
        }
    foreach ($data as $key => $profile) {
            $data[$key]['qualification'] = $this->getQualifications($profile['user_id']);
            $data[$key]['languages'] = $this->getLanguages($profile['user_id']);
            $data[$key]['counselling'] = $this->getCounsellings($profile['user_id']);
            $data[$key]['specialization'] = $this->getSpecilization($profile['user_id']);
        }
        $response = [
            "status" => 200,
            "message" => "Records fetched succesfully",
            "data" => $data
        ];
        return $this->respond($response);
    }
    public function create()
    {
        $data = $this->request->getJson();
        $model = new DoctorProfileModel();
        $userController = new User;
        $qualificationModel = new DoctorQualificationsModel();
        $counsellingModel = new DoctorCounsellingModel();
        $lanugagesModel = new DoctorLanguagesModel();
        $specillizationModel = new DoctorSpecializationsModel();
        $data->is_email_verified = true;
        $data->is_anabled = true;
        $data->role = 1;
        $userData = $userController->register($data);
        if ($userData['status'] != 200) {
            return $this->respond($userData);
        }
        
        if (!isset($data->qualification) ||  !isset($data->specialization) || !isset($data->languages) || !isset($data->counselling)) {
            $response = [
                "status" => 204,
                "message" => "Please provide qualification,specialization,languages,counselling fieds",
                "data" => null,
            ];
            return $this->respond($response);
        }
        $doctorId = $userData['user_id'];
        $data->user_id = $userData['user_id'];
        $id = $model->insert($data);
        foreach ($data->qualification as $key => $value) {
            $qualData = [
                "qualification_id" => $value,
                "dr_id" => $doctorId
            ];
            $qualificationModel->insert($qualData);
            if ($qualificationModel->errors()) {
                $response = [
                    "status" => 204,
                    "data" => null,
                    "message" => $qualificationModel->errors(),
                ];
                return $this->respond($response);
            }
        }
        foreach ($data->specialization as $key => $value) {
            $qualData = [
                "specialization_id" => $value,
                "dr_id" => $doctorId
            ];
            $specillizationModel->insert($qualData);
            if ($specillizationModel->errors()) {
                $response = [
                    "status" => 204,
                    "data" => null,
                    "message" => $specillizationModel->errors(),
                ];
                return $this->respond($response);
            }
        }
        foreach ($data->languages as $key => $value) {
            $qualData = [
                "languages_id" => $value,
                "dr_id" => $doctorId
            ];
            $lanugagesModel->insert($qualData);
            if ($lanugagesModel->errors()) {
                $response = [
                    "status" => 204,
                    "data" => null,
                    "message" => $lanugagesModel->errors(),
                ];
                return $this->respond($response);
            }
        }
        foreach ($data->counselling as $key => $value) {
            $qualData = [
                "counselling_id" => $value,
                "dr_id" => $doctorId
            ];
            $counsellingModel->insert($qualData);
            if ($counsellingModel->errors()) {
                $response = [
                    "status" => 204,
                    "data" => null,
                    "message" => $counsellingModel->errors(),
                ];
                return $this->respond($response);
            }
        }

       
        if ($model->errors()) {
            $response = [
                "status" => 504,
                "success" => false,
                "message" => $model->errors(),
            ];
            return $this->respond($response);
        }

        $data = $this->getDoctorProfile($userData['user_id']);
        
        $data[$key]['qualifications'] = $this->getQualifications($userData['user_id']);
        $data[$key]['languages'] = $this->getLanguages($userData['user_id']);
        $data[$key]['counselling'] = $this->getCounsellings($userData['user_id']);
        $data[$key]['specialization'] = $this->getSpecilization($userData['user_id']);
        if ($data == null) {
            $response = [
                "status" => 204,
                "success" => false,
                "message" => "Something went wrong",
            ];
            return $this->respond($response);
        }
        $response = [
            "status" => 200,
            "message" => "Data inserted successfully",
            "data" => $data,
        ];

        return $this->respond($response);
    }
    public function getDoctorProfile($userid)
    {
        $doctorModel = new DoctorProfileModel();
        $data = $doctorModel->select("doctor_profile.*,user.*")->join("user", "user.id=doctor_profile.user_id", "inner")->where("user.id", $userid)->first();
        return $data;
    }


    public function update($id)
    {
        $data = $this->request->getJson();
        $model = new DoctorProfileModel();
        $userController = new User;
        $qualificationModel = new DoctorQualificationsModel();
        $counsellingModel = new DoctorCounsellingModel();
        $lanugagesModel = new DoctorLanguagesModel();
        $specillizationModel = new DoctorSpecializationsModel();
        $data->is_email_verified = true;
        $data->is_anabled = true;
        $data->role = 1;
        $userData = $userController->updateUser($id,$data);
     
        if ($userData['status'] != 200) {
            return $this->respond($userData);
        }   
        $doctorId = $userData['user_id'];
        $drProfileId=$model->where(['user_id'=>$doctorId])->first(); 
        $data->user_id = $doctorId;      
        $id = $model->update($drProfileId['id'],$data);


        if (!isset($data->qualification) ||  !isset($data->specialization) || !isset($data->languages) || !isset($data->counselling)) {
            $response = [
                "status" => 204,
                "message" => "Please provide qualification,specialization,languages,counselling fieds",
                "data" => null,
            ];
            return $this->respond($response);
        }      
        $qualificationModel->where(['dr_id'=>$doctorId])->delete();
        foreach ($data->qualification as $key => $value) {
            $qualData = [
                "qualification_id" => $value,
                "dr_id" => $doctorId
            ];
            $qualificationModel->insert($qualData);
            
            if ($qualificationModel->errors()) {
                $response = [
                    "status" => 204,
                    "data" => null,
                    "message" => $qualificationModel->errors(),
                ];
                return $this->respond($response);
            }
        } 
          $specillizationModel->where(['dr_id'=>$doctorId])->delete();
        foreach ($data->specialization as $key => $value) {
            $qualData = [
                "specialization_id" => $value,
                "dr_id" => $doctorId
            ];
            $specillizationModel->insert($qualData);
            if ($specillizationModel->errors()) {
                $response = [
                    "status" => 204,
                    "data" => null,
                    "message" => $specillizationModel->errors(),
                ];
                return $this->respond($response);
            }
        }
        $lanugagesModel->where(['dr_id'=>$doctorId])->delete();
        foreach ($data->languages as $key => $value) {
            $qualData = [
                "languages_id" => $value,
                "dr_id" => $doctorId
            ];
            $lanugagesModel->insert($qualData);
            if ($lanugagesModel->errors()) {
                $response = [
                    "status" => 204,
                    "data" => null,
                    "message" => $lanugagesModel->errors(),
                ];
                return $this->respond($response);
            }
        }
        $counsellingModel->where(['dr_id'=>$doctorId])->delete();
        foreach ($data->counselling as $key => $value) {
            $qualData = [
                "counselling_id" => $value,
                "dr_id" => $doctorId
            ];
            $counsellingModel->insert($qualData);
            if ($counsellingModel->errors()) {
                $response = [
                    "status" => 204,
                    "data" => null,
                    "message" => $counsellingModel->errors(),
                ];
                return $this->respond($response);
            }
        }       
        if ($model->errors()) {
            $response = [
                "status" => 504,
                "success" => false,
                "message" => $model->errors(),
            ];
            return $this->respond($response);
        }
        $responseData = $this->getDoctorProfile($userData['user_id']);       
        $responseData['qualifications'] = $this->getQualifications($userData['user_id']);
        $responseData['languages'] = $this->getLanguages($userData['user_id']);       
        $responseData['counselling'] = $this->getCounsellings($userData['user_id']);      
        $responseData['specialization'] = $this->getSpecilization($userData['user_id']);
       
        
        if ($responseData == null) {
            $response = [
                "status" => 204,
                "success" => false,
                "message" => "Something went wrong",
            ];
            return $this->respond($response);
        }
        else{
        $response = [
            "status" => 200,
            "message" => "Data inserted successfully",
            "data" => $responseData,
        ];
        return $this->respond($response);

         }
    }
    public function show($id)
    {
        $model = new DoctorProfileModel();


        $data = $model->where(["user_id" => $id])->findAll();
        if ($data == null) {
            $response = [
                "status" => "success",
                "data" => null,
                "message" => "No records found"
            ];
            return $this->respond($response);
        }
        $response = [
            "status" => "success",
            "data" => $data,
            "message" => "No records found"
        ];
        return $this->respond($response);
    }
    public function updateState($id)
    {
        $status = $this->request->getJsonVar('isOnline');
        $model = new DoctorProfileModel();
        // $model->where(['user_id' => $id])->set("isOnline", 1);
        $model->where(['user_id' => $id])->update(null, array("isonline" => $status));
        $userModel = new UserModel();
        $userData['email'] = $userModel->where(['id' => $id])->findColumn("email");
        $userData['status'] = $model->where(['user_id' => $id])->findColumn("isonline");
        return $this->respond($userData);
    }
    public function getAvailable()
    {
        $data = $this->request->getJson();
        $doctorModel = new DoctorProfileModel();
        $excludeArray = $data->exclude;
        $exclude = implode(', ', $excludeArray);
     
    
        $language = $data->language;
        $counselling = $data->counselling;
        if(strlen($exclude)>0){
            $query = $this->db->query("SELECT doctor_profile.*, user.* FROM doctor_profile INNER JOIN user ON doctor_profile.user_id=user.id LEFT JOIN dr_languages ON dr_languages.dr_id=user.id LEFT JOIN dr_counselling ON dr_counselling.dr_id=user.id WHERE dr_languages.dr_id=user.id AND dr_languages.languages_id=$language AND dr_counselling.dr_id=user.id AND dr_counselling.counselling_id=$counselling AND doctor_profile.status=2 AND user.id NOT IN ($exclude) LIMIT 1;");
        } else {
            $query = $this->db->query("SELECT doctor_profile.*, user.* FROM doctor_profile INNER JOIN user ON doctor_profile.user_id=user.id LEFT JOIN dr_languages ON dr_languages.dr_id=user.id LEFT JOIN dr_counselling ON dr_counselling.dr_id=user.id WHERE dr_languages.dr_id=user.id AND dr_languages.languages_id=$language AND dr_counselling.dr_id=user.id AND dr_counselling.counselling_id=$counselling AND doctor_profile.status=2 LIMIT 1;");
        }
      

        $data = $query->getResultArray();
        if ($data == null) {
            $response = [
                "status" => 204,
                "message" => "No doctors are available at this time",
                "data" => null,
            ];
            return $this->respond($response);
        }
       // $data = $data[0];
        $response = [
            "status" => 200,
            "message" => "Records fetched succesfully",
            "data" => $data
        ];
        return $this->respond($response);
    }
    public function updateStatus($drId, $status)
    {
        $doctorModel = new DoctorProfileModel();
        $userModel = new UserModel();
        $drData = $userModel->find($drId);
        if ($drData == null) {
            $response = [
                "status" => 204,
                "message" => "Record doesn't exiest",
                "data" => null,
            ];
            return $this->respond($response);
        }
        // $doctorModel->where->([''])->update(null,["status"=>$status]);
        $doctorModel->where(['user_id' => $drId])->update(null, ['status' => $status]);
        $drData = $this->getDoctorProfile($drId);
        $response = [
            "status" => 200,
            "message" => "status updated successfully",
            "data" => $drData,
        ];
        return $this->respond($response);
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
    public function updateToten($id = null)
    {
        
        $modelProfile = new DoctorProfileModel();
        $dataRow = $modelProfile->where('user_id', $id)->first();
        $data = $this->request->getJson();
       
        $modelProfile->update($dataRow['id'], $data);
        $data = $modelProfile->find($dataRow['id']);
        if ($data != null) {
            $response = [
                "status" => 200,
                "data" => $data,
                'error'    => null,
            ];
        } else {
            $response = [
                "status" => 204,
                "data" => [],
                "message" => "No Record Found",
                'error'    => null,
            ];
        }
        return $this->respond($response);
    }
    public function getToten($id = null)
    {
        
        $modelProfile = new DoctorProfileModel();
        $dataRow = $modelProfile->where('user_id', $id)->first();
      
        if ($dataRow != null) {
            $response = [
                "status" => 200,
                "data" => $dataRow,
                'error'    => null,
            ];
        } else {
            $response = [
                "status" => 204,
                "data" => [],
                "message" => "No Record Found",
                'error'    => null,
            ];
        }
        return $this->respond($response);
    }


    
        public function delete($id = null){
            $model = new DoctorProfileModel();
            $data['status']="4";
            $model->update($id,$data);
                $response = [
                    'status'   => 200,
                    'error'    => null,
                    'messages' => [
                        'success' => 'profile deleted successfully'
                    ]
                ];
          
            return $this->respond($response);
        }
    }

