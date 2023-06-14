<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\PatientsModel;
use App\Controllers\Demographic;

class Patients extends ResourceController
{
    use ResponseTrait;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        //OR
        //$this->db = db_connect();
    }
    // all users
    public function index()
    {
        $model = new PatientsModel();
        $data = $model->orderBy('id', 'DESC')->findAll();
    
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

    public function show($id = null)
    {
        $model = new PatientsModel();
        
        $data = $this->db->query("SELECT patients.*, schools.name as school_name FROM patients, schools WHERE patients.school = schools.id AND patients.id = {$id}")->getResultArray();
       
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
    
    public function getByRFID($rfid = null)
    {
      
        $data = $this->db->query("SELECT patients.*, schools.name as school_name FROM patients, schools WHERE patients.school = schools.id AND patients.rfID = '{$rfid}'")->getResultArray();
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

    // create
    public function create()
    {
        $model = new PatientsModel();
        $data = $this->request->getJson();
        $demographic = new Demographic;
        $data->state_obj = $demographic->getObj("state", $data->state);
        $data->district_obj = $demographic->getObj("district", $data->district);
        $data->block_obj = $demographic->getObj("block", $data->block);
        $data->village_obj = $demographic->getObj("village", $data->village);

        if(!isset($data->password))
        {
            return $this->respond([
                "status"=>204,
                "message"=>"Password is required",
                "data"=>null,
            ]);
        }
        $password=$data->password;
        // $data->password = password_hash($password, PASSWORD_DEFAULT);

        $data->is_email_verified = true;
        $data->is_anabled = true;
        $data->role = 1;
        $id = $model->insert($data);
        if ($model->errors()) {
            $response = [
                "status" => 504,
                "data" => null,
                "error" => $model->errors(),
            ];
            return $this->respond($response);
        }
        
        $data = $model->find($id);
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


    public function update($id = null)
    {
        $model = new PatientsModel();
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
        $model->update($id, $data);

        $responceData = $model->find($id);
        if ($responceData != null) {
            $response = [
                "status" => 200,
                "data" =>$responceData,
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
   
   

    // delete
    public function delete($id = null)
    {
        $model = new PatientsModel();
        $data = $model->where('id', $id)->delete($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'User deleted successfully'
                ]
            ];
        } else {
            $response = [
                'status'   => 504,
                'error'    => null,
                'messages' => [
                    'success' => 'Something went wrong! Please try again later'
                ]
            ];
        }
        return $this->respond($response);
    }
}
