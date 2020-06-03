<?php
    namespace App\Controllers\Admin;

    use CodeIgniter\Controller;
    use App\Models\M_Barang;

    class Home extends Controller{


        public function index(){
            $model=new M_Barang();


            $data['barang']=$model->findAll();
            
            $data['title']="Halaman Admin Judul";
            $data['isi']="Admin/Home";
            echo view('Template\index',$data);
        }

        public function getOne($kodeBarang){
            $model=new M_Barang();

            $result=$model->find($kodeBarang);

            echo json_encode($result);
        }

        public function editBarang($kodeBarang){
            $model=new M_Barang();

            $data=$_POST;
            $update=$model->update($kodeBarang,$data);
        }

        public function tambahBarang(){
            $model=new M_Barang();

            $datta=$_POST;
            $insert=$model->insert($datta);

            echo json_encode($insert);
        }

        public function hapusBarang($kodeBarang){
            $model=new M_Barang();

            $update=$model->delete($kodeBarang);
        }

        public function getAll(){
            $model=new M_Barang();

            $data=$model->findAll();

            echo json_encode($data);
        }
    }
?>