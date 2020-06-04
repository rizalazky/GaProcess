<?php
    namespace App\Controllers\Admin;

    use CodeIgniter\Controller;
    use App\Models\M_Barang;

    class Assets extends Controller{


        public function index(){
            $model=new M_Barang();


            $data['barang']=$model->findAll();
            
            $data['title']="Halaman Assets";
            $data['isi']="Admin/Assets";
            echo view('Template\index',$data);
        }


    }
?>