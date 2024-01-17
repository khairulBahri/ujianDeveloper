<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReportProduct;
use CodeIgniter\HTTP\ResponseInterface;

class ReportProductController extends BaseController
{
    public function index()
    {
        $data = [];
        return view('report-product/index',$data);
    }

    public function tampilGrafik(){
        $model = new ReportProduct();
        $query = $model->getData(); // Assume you have a method in your model to get data


        $db = \Config\Database::connect();
        $query = $db->query('with total as (
            select sum(rp.compliance)/COUNT(*) * 100 as total, s.area_id  from store as s
            inner join report_product rp on s.store_id = rp.store_id 
            GROUP by s.area_id )
            
            SELECT t.total,sa.area_name  FROM store_area sa
            inner join total as t on t.area_id = sa.area_id 
            order by total desc
            ');
        $area = $query->getResult();

        // var_dump($area);die;




        $json = [
            'data' => view('report-product/grafik', [
                'data' => $query,
                'area' => $area
            ])
        ];

        // echo json_encode($json);

        return $this->response->setJSON($json);
    }

    public function chart(){
        return view('report-product/chart');
    }

    public function getData()
    {
        // Logika untuk mengambil data dari model atau sumber data lainnya
        // Contoh sederhana:
        $data = [
            'labels' => ['Label 1', 'Label 2', 'Label 3'],
            'data'   => [10, 20, 30],
        ];

        return $this->response->setJSON($data);
    }
}
