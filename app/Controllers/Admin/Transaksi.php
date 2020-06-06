<?php
    namespace App\Controllers\Admin;

    use CodeIgniter\Controller;
    use App\Models\M_Transaksi;

    class Transaksi extends Controller{


        public function index(){
            $model=new M_Transaksi();


            $data['barang']=$model->findAll();
            
            $data['title']="Halaman Transaksi";
            $data['isi']="Admin/Transaksi";
            echo view('Template\index',$data);
            
        }

        public function getAll(){
            $model=new M_Transaksi();

            $result=$model->getTransaksi();

            echo json_encode($result);
        }

        public function transaksiInsert(){
            $M_Transaksi=new M_Transaksi();

            $data=$_POST;

            $insert=$M_Transaksi->insert($data);

            $response='';
            if($insert){
                $response=true;
            }else{
                $response=false;
            }
            echo json_encode($response);


        }


    }
?>