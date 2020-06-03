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
<script>

    $(document).ready(function(){
        
        // btn Edit
        // fetchData();

        // function fetchData(){
        //   let html='';
        //   $.get("http://localhost:8080/Admin/Home/getAll",function(result){
            
        //     let data=JSON.parse(result);
            
        //     data.forEach(function(row){
        //       html+=`
        //       <tr>
        //                     <td>${row.kode_barang}</td>
        //                     <td> ${row.nama_barang}</td>
        //                     <td>${row.stock}</td>
        //                     <td>
        //                         <button class='btn btn-info btnEdit' data-toggle='modal' data-target='#modal-edit' data-id='${row.kode_barang}'>Edit</button>
        //                         <button class='btn btn-danger btnHapus' data-toggle='modal' data-target='#modal-hapus' data-id='${row.kode_barang}'>Hapus</button>
        //                     </td>
        //                 </tr>
        //       `;
        //     })
            
            
        //     $('#tbodyBarang').append(html);
        //   });
        // }

        $('.btnEdit').click(function(){

          $('.modal-title').text('Edit Barang');
          $('#btnSaveTambah').hide();
         $('#btnSaveEdit').show();
          
            let kodeBarang=$(this).data('id');
            console.log(kodeBarang);
            let url="http://localhost:8080/Admin/Home/getOne/"+kodeBarang;

            $.get(url,function(result){
              let data=JSON.parse(result);
              console.log(data);
              $('#kodeBarang').val(data.kode_barang);
              $('#namaBarang').val(data.nama_barang);
              $('#stock').val(data.stock);
            })
        });

    });

    // save Edit

    $('#btnSaveEdit').click(function(){

      // hide SaveTambah
     


      let kodeBarang=$('#kodeBarang').val();

      let data={
        nama_barang :$('#namaBarang').val(),
        stock :$('#stock').val()
      }

      let url="http://localhost:8080/Admin/Home/editBarang/"+kodeBarang;

      $.post(url,data,function(result){
        
        alert('Berhasil Update');
        // fetchData();
      });
    });

    // hapus

    $('.btnHapus').click(function(){
      let kodeBarang=$(this).data('id');
      let url="http://localhost:8080/Admin/Home/hapusBarang/"+kodeBarang;
      
      let konfirm=confirm("Yakin Ingin Menghapus??");
      console.log(konfirm);
      if(konfirm){
          $.get(url,function(res){
            alert("Berhasil Menghapus");
            // fetchData();
          });
      }
      
    });


    // tambah

    $('#btnTambah').click(function(){
      $('.modal-title').text('Tambah Barang');
      $('#btnSaveEdit').hide();
      $('#btnSaveTambah').show();

      $('#kodeBarang').val(null);
        $('#namaBarang').val(null);
        $('#stock').val(null);
      
    });

    $('#btnSaveTambah').click(function(){
      let data={
        nama_barang:$('#namaBarang').val(),
        stock:$('#stock').val()
      }

      console.log(data);

      $.post("http://localhost:8080/Admin/Home/tambahBarang",data,function(result){
        console.log(result);
        
        if(result){
          alert("Berhasil Insert");
          // fetchData();
        }else{
          alert("Gagal Insert");
        }
      });
    })



</script>

</body>
</html>