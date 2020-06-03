<?php
    namespace App\Models;

    use CodeIgniter\Model;

    class M_Barang extends Model{
        protected $DBGroup='default';
        protected $table      = 'tb_barang';
        protected $primaryKey = 'kode_barang';

        protected $returnType     = 'array';
        protected $useSoftDeletes = false;

        protected $allowedFields = ['nama_barang', 'stock'];

        // protected $useTimestamps = true;    
        // protected $createdField  = 'created_at';
        // protected $updatedField  = 'updated_at';
        // protected $deletedField  = 'deleted_at';

        // protected $validationRules    = [];
        // protected $validationMessages = [];
        // protected $skipValidation     = false;
    }


?>