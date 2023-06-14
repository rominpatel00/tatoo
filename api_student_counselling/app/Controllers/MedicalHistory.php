<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MedicalHistoryModel;
use CodeIgniter\API\ResponseTrait;

class MedicalHistory extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $model = new MedicalHistoryModel();
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
    public function show($id = null)
    {
        $model = new MedicalHistoryModel();
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

    public function patientHistory($id = null)
    {
        $model = new MedicalHistoryModel();
        $data = $model->Where(['patient_id' => $id])->findAll();
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
    public function create()
    {
        $model = new MedicalHistoryModel();
        $data = $this->request->getJson();
        try {
            //code..
           
        $data->updated_at=date("Y-m-d h:i:s");
        $data->call_start=date("Y-m-d h:i:s");
        $data->call_end=date("Y-m-d h:i:s");
      

            $id = $model->insert($data);
        } catch (\CodeIgniter\Database\Exceptions\DataException $th) {
            $response = [
                "status" => 500,
                "data" => null,
                "message" => $th->getMessage(),
            ];
            return $this->respond($response);
        }
        if ($model->errors()) {
            $response = [
                "status" => 500,
                "data" => null,
                "message" => $model->errors()
            ];
            return $this->respond($response);
        }
        $data = $model->find($id);
        if ($data == null) {
            $response = [
                "status" => "204",
                "data" => null,
                "message" => "Something went wrong!"
            ];
            return $this->respond($response);
        }
        $response = [
            "status" => "200",
            "data" => $data,
            "message" => "Record inserted successfully"
        ];
        return $this->respond($response);
    }
    public function update($id)
    {
        $model = new MedicalHistoryModel();
        $data = $this->request->getJson();
 
        $data->updated_at=date("Y-m-d h:i:s");
        $model->update($id, $data);
        $data = $model->find($id);
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
        $model = new MedicalHistoryModel();
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
