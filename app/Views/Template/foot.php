</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url();?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url();?>/assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>/assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url();?>/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url();?>/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>/assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url();?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url();?>/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url();?>/assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url();?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>/assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>/assets/dist/js/demo.js"></script>
<script src="<?php echo base_url();?>/assets/dist/js/select2.min.js"></script>
<script>

    $(document).ready(function(){

      

      fetchData();
      fetchDataTransaksi();

      $('#transaksiKodeBarang').select2({
        theme:'classic',
        width:'resolve'
      });

      $('#cardBarang').click(function(e){

        const target=e.target;


        // tambah
        if(target.id == "btnTambah"){
          
          $('#judulModal').text('Tambah Barang');
          $('#btnSaveEdit').hide();
          $('#btnSaveTambah').show();

          $('#kodeBarang').val(null);
          $('#namaBarang').val(null);
          $('#stock').val(null);
        }

        // save Tambah

        if(target.id == "btnSaveTambah"){
          let data={
            nama_barang:$('#namaBarang').val(),
            stock:$('#stock').val()
          }
    
          let url="http://localhost:8080/Admin/Home/tambahBarang";

          $.post(url,data,function(res){
            if(res=='true'){
              alert('Berhasil Insert');
              fetchData();
            }else{
              alert('Gagal Insert');
            }
          });

          
        }

        // btn Edit
        if(target.classList.contains("btnEdit")){
          
          $('#judulModal').text('Edit Barang');
          $('#btnSaveTambah').hide();
          $('#btnSaveEdit').show();
          
          let kodeBarang=$(target).data('id');
          console.log(kodeBarang);
          let url="http://localhost:8080/Admin/Home/getOne/"+kodeBarang;

          $.get(url,function(result){
            let data=JSON.parse(result);
            console.log(data);
            $('#kodeBarang').val(data.kode_barang);
            $('#namaBarang').val(data.nama_barang);
            $('#stock').val(data.stock);
          });
        }

        // save Edit
        if(target.id == "btnSaveEdit"){
          let kodeBarang=$('#kodeBarang').val();

          let data={
            nama_barang :$('#namaBarang').val(),
            stock :$('#stock').val()
          }

          let url="http://localhost:8080/Admin/Home/editBarang/"+kodeBarang;

          $.post(url,data,function(result){
            
            alert('Berhasil Update');
            fetchData();
          });
        }


        // Hapus
        if(target.classList.contains("btnHapus")){
          let kodeBarang=$(target).data('id');
          let url="http://localhost:8080/Admin/Home/hapusBarang/"+kodeBarang;
          
          let konfirm=confirm("Yakin Ingin Menghapus??");
          console.log(konfirm);
          if(konfirm){
              $.get(url,function(res){
                alert("Berhasil Menghapus");
                fetchData();
              });
          }
        }

        // transaksiBarang save

        if(target.id== "btnSaveTransaksi"){
          let data={
            kode_barang:$('#transaksiKodeBarang').val(),
            jenis_transaksi:$('#jenisTransaksi').val(),
            Qty:$('#transaksiJumlahBarang').val()
          }

          let urlTransaksi="http://localhost:8080/Admin/Transaksi/transaksiInsert";

          let create=create(urlTransaksi,data);

          
            if(create){
              $.get('http://localhost:8080/Admin/Home/getOne/'+$('#transaksiKodeBarang').val(),function(res){

                let datanyaaa=JSON.parse(res);
                let stockLama=datanyaaa.stock;
                
                let updateStock=0;

                console.log(typeof($('#jenisTransaksi').val()));

                if($('#jenisTransaksi').val() == 1){
                  updateStock=Number(stockLama)+Number($('#transaksiJumlahBarang').val());
                }else{
                  updateStock=Number(stockLama)-Number($('#transaksiJumlahBarang').val());
                }

                

                let data={
                  stock:updateStock
                }

                $.post('http://localhost:8080/Admin/Home/updateStock/'+$('#transaksiKodeBarang').val(),data,function(result){
                  if(result == 1){
                    alert('Transaksi Berhasil');
                  }else{
                    alert('Transaksi Gagal')
                  }

                  fetchData();
                })
              });

            }
          
        }

        
      });

      $('#btnTransaksi').click(function(){
        
        
          $.get("http://localhost:8080/Admin/Home/getAll",function(result){
            console.log(result);
            
            let dataResult=JSON.parse(result);

            

            let opt='';
            dataResult.forEach(function(re){

              opt+=`<option value='${re.kode_barang}' class='form-control'>${re.nama_barang}</option>`;

              
              
            });
            $('#transaksiKodeBarang').html(opt);
            // $('#transaksiKodeBarang').append('<option id="lainnya" data-toggle="modal" data-target="#modal-edit">Lainya....</option>');
            
          })
      })

      
      
        
      
        

      function fetchData(){
        console.log("fetch");
        let html='';
        $.get("http://localhost:8080/Admin/Home/getAll",function(result){
          
          let data=JSON.parse(result);
          
          data.forEach(function(row){
            html+=`
            <tr>
                          <td>${row.kode_barang}</td>
                          <td> ${row.nama_barang}</td>
                          <td>${row.stock}</td>
                          <td>
                              <button class='btn btn-info btnEdit' data-toggle='modal' data-target='#modal-edit' data-id='${row.kode_barang}'>Edit</button>
                              <button class='btn btn-danger btnHapus' data-toggle='modal' data-target='#modal-hapus' data-id='${row.kode_barang}'>Hapus</button>
                          </td>
                      </tr>
            `;
          })
          
          
          $('#tbodyBarang').html(html);
        });
      }

      function fetchDataTransaksi(){
        console.log('Data Transaksi');
        let html='';
        $.get("http://localhost:8080/Admin/transaksi/getAll",function(result){
          
          let data=JSON.parse(result);
          let bulan=['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
          data.forEach(function(row){
            
            let tanggal=new Date(row.date);
            html+=`
            <tr>
                          <td>${row.kode_transaksi}</td>
                          <td> ${row.jenis_transaksi == 1 ? 'IN' : 'OUT'}</td>
                          <td>${row.nama_barang}</td>
                          <td>${row.Qty}</td>
                          <td>${tanggal.getDay()} ${bulan[tanggal.getMonth()]} ${tanggal.getFullYear()}</td>
                          <td>
                              <button class='btn btn-info btnEdit' data-toggle='modal' data-target='#modal-edit' data-id='${row.kode_transaksi}'>Edit</button>
                              <button class='btn btn-danger btnHapus' data-toggle='modal' data-target='#modal-hapus' data-id='${row.kode_transaksi}'>Hapus</button>
                          </td>
                      </tr>
            `;
          })
          
          
          $('#tbodyTransaksi').html(html);
        });
      }

      


    });

       

</script>

</body>
</html>