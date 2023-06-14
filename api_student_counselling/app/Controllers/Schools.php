<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SchoolsModel;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use App\Controllers\Demographic;

class Schools extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $model = new SchoolsModel();
        $data = $model->orderBy('id', 'DESC')->findAll();
        if ($data != null) {
            $response = [
                "status" => 200,
                "data" => $data,
                "error" => null
            ];
            return $this->respond($response);
        } else {
            $response = [
                "status" => 204,
                "data" => [],
                "message" => "No Record Found",
                "error" => null
            ];
            return $this->respond($response);
        }
    }
    public function create()
    {
        $userModel=new UserModel();
        $model = new SchoolsModel();
        $userdata=$this->request->getJson(); 
        $data = $this->request->getJson();
        $userdata->is_email_verified=true;
        $userdata->is_anabled = true;
        $userdata->role = 7;
        $demographic = new Demographic;
        $data->state_obj = $demographic->getObj("state", $data->state);
        $data->district_obj = $demographic->getObj("district", $data->district);
        $data->block_obj = $demographic->getObj("block", $data->block);
        $data->village_obj = $demographic->getObj("village", $data->village);

        $userId = $userModel->insert($userdata);
        if ($model->errors()) {
        $response = [
            "status" => 500,
            "data" => null,
            "message" => $model->errors()
        ];
        return $this->respond($response);
    }
    $data->admin_id=$userId;

    $schoolId=$model->insert($data);  
    if ($model->errors()) {
        $response = [
            "status" => 500,
            "data" => null,
            "message" => $model->errors()
        ];
        return $this->respond($response);
    }
        $userdata=$userModel->select("first_name,last_name,middle_name,user_name,password,gender")->find($userId);    
        
    
       
    
        $data = $model->find($schoolId);
        if ($data == null ) {
            $response = [
                "status" => "204",
                "data" => null,
                "message" => "Something went wrong!"
            ];
            return $this->respond($response);
        }
        $response = [
            "status" => "200",
            "data" => [
                "userdata"=>$userdata,
                "schooldata"=>$data
            ],
            "message" => "Record inserted successfully"
        ];
        return $this->respond($response);
    }
    public function update($id)
    {    $userModel=new UserModel();
        $model = new SchoolsModel();
        $data = $this->request->getJson();
        $demographic = new Demographic;
        if(isset($data->state))
        $data->state_obj = $demographic->getObj("state", $data->state);
        if(isset($data->district))
        $data->district_obj = $demographic->getObj("district", $data->district);
        if(isset($data->block))
        $data->block_obj = $demographic->getObj("block", $data->block);
        if(isset($data->village))
        $data->village_obj = $demographic->getObj("village", $data->village);

        if (isset($data->medicines)) {
            $data->medicines = json_encode($data->medicines, true);
        }
        try {
           $model->update($id, $data);
        } catch (\CodeIgniter\Database\Exceptions\DataException $th) {
           
        }
        try {
            // $userModel->update($id, $data);
         } catch (\CodeIgniter\Database\Exceptions\DataException $th) {
            
         }
         $data = $model->select("schools.*,user.*")->join("user", "user.id=schools.admin_id", "INNER")->where(["schools.id" => $id])->findAll();
     
 
        if ($data == null) {
            $response =
                [
                    "status" => 500,
                    "data" => null,
                    "message" => "Something went wrong!",
                ];
            return $this->respond($response);
        }
        $response =
            [
                "status" => 200,
                "message" => "Record fetched successfully",
                "data" => $data
            ];
        return $this->respond($response);
    }
    public function delete($id = null)
    {
        $model = new SchoolsModel();
        $data = $model->where('id', $id)->delete($id);
        if ($data) {
            $model->delete($id);
            $response = [
                "status"   => 200,
                'error'    => null,
                'messages' => [
                    'response' => 'Record successfully deleted'
                ]
            ];
            return $this->respond($response);
        } else {
            $response = [
                "status"   => 500,
                'error'    => null,
                'messages' => [
                    'response' => 'Something went wrong! Please try again later'
                ]
            ];
        }
        return $this->respond($response);
    }
}
