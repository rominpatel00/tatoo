<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;

class Doctors extends ResourceController
{
    use ResponseTrait;

    // all users
    public function index()
    {
        $model = new UserModel();
        $data['user'] = $model->orderBy('id', 'DESC')->findAll();

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
        $model = new UserModel();
        $data = $model->Where(['id' => $id])->first();
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
        $model = new UserModel();

        $data = $this->request->getJson();
        $data->password = password_hash($data->password, PASSWORD_DEFAULT);
        $data->is_email_verified = true;
        $data->is_anabled = true;
        $data->role=1;
        
         $id = $model->insert($data);
        
        if($model->errors())
            {
                $response=[
                    "status"=>504,
                    "data"=>null,
                    "error"=>$model->errors(),
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
        $model = new UserModel();
        $password = $this->request->getVar('password');
        $data = [
            'email' => $this->request->getVar('email'),
            'profile_id' => $this->request->getVar('profile_id')


        ];
        $data['password'] = password_hash($password, PASSWORD_DEFAULT);

        $model->update($id, $data);
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
   
    // delete
    public function delete($id = null)
    {
        $model = new UserModel();
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

    public function getRoleId($id)
    {
        $model = new UserModel();
        $data = $model->find($id);
        if ($data == null) {
            $response = [
                "status" => 204,
                "data" => [],
                "message" => "No Record Found",
                'error'    => null,
            ];
        } else {

            $response = [
                "status" => 200,
                "data" => [
                    "role_id" => $data['role'],
                ],
                'error'    => null,
            ];
        }
        return $this->respond($response);
    }
}
