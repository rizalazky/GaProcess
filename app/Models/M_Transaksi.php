<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class M_Transaksi extends Model{
        protected $DBGroup='default';
        protected $table      = 'tb_transaksi';
        protected $primaryKey = 'kode_transaksi';

        protected $returnType     = 'array';
        protected $useSoftDeletes = false;

        protected $allowedFields = ['kode_barang', 'Qty','jenis_transaksi'];

        public function getTransaksi(){
            $query=$this->db->table('tb_transaksi')
                            ->join('tb_barang','tb_transaksi.kode_barang=tb_barang.kode_barang')
                            ->orderBy('kode_transaksi','desc')
                            ->get();
            return $query->getResultArray();
        }
    }
?>