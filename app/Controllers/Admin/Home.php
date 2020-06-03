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
    }
?>