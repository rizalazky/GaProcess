<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <button class="btn btn-default" data-toggle="modal" data-target="#modal-edit" id="btnTambah">Tambah</button>
            <select name="" id="">
                <option value="">Mobil</option>
                <option value="">Gedung</option>
            </select>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Stock Barang</th>
                    <th>Action</th>
                </thead>
                <tbody id="tbodyBarang">
                    
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
                            <label for="jenisAssets">Jenis Assets</label>
                            <select name="jenisAssets" id="" class="form-control">
                                <option value="">Mobil</option>
                                <option value="">Gedung</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kode Assets</label>
                            <input type="email" class="form-control" id="kodeBarang" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Alamat</label>
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
        </div>
        <div class="card-footer">
        </div>
    </div>
</div>
</div>

