<div class="row">
<div class="col-12">
    <div class="card" id="cardBarang">
        <div class="card-header">
            <button class="btn btn-default" data-toggle="modal" data-target="#modal-edit" id="btnTambah">Tambah</button>
            <button class="btn btn-default" data-toggle="modal" data-target="#modal-transaksi" id="btnTransaksi">Transaksi</button>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <th>Kode Transaksi</th>
                    <th>Jenis Transaksi</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </thead>
                <tbody id="tbodyTransaksi">
                    
                </tbody>
            </table>

            <div class="modal fade" id="modal-edit">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Edit Data Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kode Barang</label>
                            <input type="email" class="form-control" id="kodeBarang" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Barang</label>
                            <input type="text" class="form-control" id="namaBarang" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Stock</label>
                            <input type="text" class="form-control" id="stock" placeholder="Password">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnSaveEdit">Save changes</button>
                    <button type="button" class="btn btn-primary" id="btnSaveTambah">Save</button>
                    </div>
                </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <!-- Modal Transaksi Barang -->


            <div class="modal fade" id="modal-transaksi">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Transaksi Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="jenisTransaksi">Jenis Transaksi</label>
                            <select name="" id="jenisTransaksi" class="form-control">
                                <option value="1">Transaksi In</option>
                                <option value="2">Transaksi Out</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="transaksiKodeBarang">Nama Barang</label><br>
                            <select style="width:100%;" id="transaksiKodeBarang">
                                
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jumlah</label>
                            <input type="text" class="form-control" id="transaksiJumlahBarang" placeholder="Jumlah Barang">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnSaveTransaksi">Save</button>
                    
                    </div>
                </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal Tansaksi barang-->
        </div>
        <div class="card-footer">
        </div>
    </div>
</div>
</div>

