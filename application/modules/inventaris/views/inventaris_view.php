f 
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                 
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
								Inventaris
                            </h2>
                            <br>
                            <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="material-icons">add_circle</i>  Tambah Data </a>
 
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
							   <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
									<thead>  
										<tr>
											<th style="width:5%;">Nama Barang</th>
                                            <th style="width:10%;">Merk Model</th>  
											<th style="width:10%;">No Serial Pabrik</th> 
											<th style="width:10%;">Ukuran</th>  
											<th style="width:10%;">Bahan</th>  
											<th style="width:10%;">Tahun Pembelian</th>  
											<th style="width:10%;">No Kode Barang</th>  
											<th style="width:10%;">Jumlah Barang</th> 
											<th style="width:10%;">Harga Beli</th>  
											<th style="width:10%;">Mutasi</th>  
											<th style="width:10%;">Keterangan</th>  
											<th style="width:15%;">Opsi</th> 
										</tr>
									</thead> 
								</table> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         


        </div>
    </section>

   
	<!-- form tambah dan ubah data -->
	<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Form Tambah Data</h4>
                        </div>
                        <div class="modal-body">
                              <form method="post" id="user_form" enctype="multipart/form-data">   
                                 <input type="text" name="id" id="id"> 
								 	<div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="nama_barang" id="nama_barang" class="form-control" required readonly="readonly" >
                                                    <input type="text" name="id_barang" id="id_barang" required>
                                                    
                                                </div>
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="PilihBarang();" class="btn btn-primary"> Pilih Barang.. </button>
                                                </span>
                                    </div> 
                                    <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="nama_ruangan" id="nama_ruangan" class="form-control" required readonly="readonly" >
                                                    <input type="text" name="id_ruangan" id="id_ruangan" required>
                                                    
                                                </div>
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="PilihRuangan();" class="btn btn-primary"> Pilih Ruangan.. </button>
                                                </span>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
										<label>Keterangan</label>
                                            <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan" />
                                        </div>
                                    </div>  
								    <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan</button>

                                    <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal"> <i class="material-icons">clear</i> Batal</button>
							 </form>
					   </div>
                     
                    </div>
                </div>
    </div>


    <!-- modal cari ruangan -->
    <div class="modal fade" id="PilihRuanganModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" > Pilih Ruangan </h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_ruangan" >
  
                                    <thead>
                                        <tr> 
                                   
											<th style="width:95%;">Kode Ruangan</th>
											<th style="width:95%;">Nama Ruangan</th>
                                             
                                        </tr>
                                    </thead> 
                                    <tbody id="daftar_ruanganx">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
    </div>
	
	
    <!-- modal cari barang -->
    <div class="modal fade" id="PilihBarangModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" > Pilih Barang </h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_barang" >
  
                                    <thead>
                                        <tr> 
                                   
											<th style="width:10%;">Kode Barang</th>
											<th style="width:10%;">Nama Barang</th>
											<th style="width:10%;">Merk/Model</th>
											<th style="width:10%;">No Serial Pabrik</th>
											<th style="width:10%;">Ukuran</th>
											<th style="width:10%;">Bahan</th>
											<th style="width:10%;">Tahun Buat</th>
											<th style="width:10%;">No Kode Barang</th>
											<th style="width:10%;">Satuan</th>
											<th style="width:20%;">Harga Beli</th> 
                                        </tr>
                                    </thead> 
                                    <tbody id="daftar_barangx">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
    </div>
	 
 
   <script type="text/javascript">
	function PilihRuangan(){
        $("#PilihRuanganModal").modal({backdrop: 'static', keyboard: false,show:true});
    }
	function PilihBarang(){
        $("#PilihBarangModal").modal({backdrop: 'static', keyboard: false,show:true});
    } 

    function PreviewGambar(input) {
        if (input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image1').attr('src', e.target.result);
                $("#image").val($('#user_image').val().replace(/C:\\fakepath\\/i, ''));
            };
            reader.readAsDataURL(input.files[0]);
            
        }
    }
      
    $('#daftar_ruangan').DataTable( {
        "ajax": "<?php echo base_url(); ?>ruangan/fetch_ruangan" 
    });

    var daftar_ruangan = $('#daftar_ruangan').DataTable();
     
        $('#daftar_ruangan tbody').on('click', 'tr', function () {
            
            var content = daftar_ruangan.row(this).data()
            console.log(content);
            $("#nama_ruangan").val(content[0]);
            $("#id_ruangan").val(content[3]);
            $("#PilihRuanganModal").modal('hide');
        } );

	$('#daftar_barang').DataTable( {
        "ajax": "<?php echo base_url(); ?>barang/fetch_barang_all" 
    });

    var daftar_barang = $('#daftar_barang').DataTable();
     
        $('#daftar_barang tbody').on('click', 'tr', function () {
            
            var content = daftar_barang.row(this).data()
            console.log(content);
            $("#nama_barang").val(content[1]);
            $("#id_barang").val(content[11]);
            $("#PilihBarangModal").modal('hide');
        } );


	 function Show_Detail(id){ 
		$("#DetailModal").modal({backdrop: 'static', keyboard: false,show:true});
		$.ajax({
			 url:"<?php echo base_url(); ?>inventaris/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){  
                 var nf = new Intl.NumberFormat();
                 $("#namabarangdtl").html(result.nama_barang);
                 $("#kodebarangdtl").html(result.kode_barang);
                 $("#tglinventarisdtl").html(result.tgl_inventaris); 
                 $("#kerusakandtl").html(result.kerusakan); 
                 $("#ruangandtl").html(result.nama_ruangan); 
                 $("#keterangandtl").html(result.keterangan); 
				 $("#imagedtl").attr("src","upload/"+result.image);
			 }
		 });
	 }
       
	 function Ubah_Data(id){
		$("#defaultModalLabel").html("Form Ubah Data");
		$("#defaultModal").modal('show');
 
		$.ajax({
			 url:"<?php echo base_url(); ?>inventaris/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){  
				 $("#defaultModal").modal('show'); 
				 $("#id").val(result.id);
				 $("#id_barang").val(result.id_barang);
				 $("#id_ruangan").val(result.id_ruangan); 
                 $("#nama_barang").val(result.nama_barang);
                 $("#kode_barang").val(result.kode_barang);
                 $("#tgl_inventaris").val(result.tgl_inventaris);
                 $("#kerusakan").val(result.kerusakan);
                 $("#nama_ruangan").val(result.nama_ruangan);
                 $("#keterangan").val(result.keterangan); 
				 $("#image").val(result.image);
                  
				 $('#image1').attr('src',"upload/"+result.image);
			 }
		 });
	 }
 
	 function Bersihkan_Form(){
        $(':input').val(''); 
        $("#image1").attr('src','<?php echo base_url('upload/image_prev.jpg'); ?>');
     }

	 function Hapus_Data(id){
		if(confirm('Anda yakin ingin menghapus data ini?'))
        {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo base_url('inventaris/hapus_data')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
			   
               $('#example').DataTable().ajax.reload(); 
			   
			    $.notify("Data berhasil dihapus!", {
					animate: {
						enter: 'animated fadeInRight',
						exit: 'animated fadeOutRight'
					}  
				 },{
					type: 'success'
					});
				 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
   
    }
	}
    
  
	function Simpan_Data(){
	 
		 var formData = new FormData($('#user_form')[0]); 

          
        //  var foto = $('#image').val();
		//  var extension = $('#image').val().split('.').pop().toLowerCase();  
  
           
            $.ajax({
             url:"<?php echo base_url(); ?>inventaris/simpan_data",
             type:"POST",
             data:formData,
             contentType:false,  
             processData:false,   
             success:function(result){ 
                
                 $("#defaultModal").modal('hide');
                 $('#example').DataTable().ajax.reload(); 
                 $('#user_form')[0].reset();
                 $("#image1").attr("src","<?php echo base_url(); ?>/upload/image_prev.jpg");
                 $.notify("Data berhasil disimpan!", {
                    animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                 } 
                 } );
             }
            });  

	}
     

	 $('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD',
        clearButton: true,
        weekStart: 1,
        time: false
     });
      
      
       $(document).ready(function() {
		   
		$("#addmodal").on("click",function(){
			$("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
            $("#method").val('Add');
            $("#defaultModalLabel").html("Form Tambah Data");
		});
		
		$("#addmodalx").on("click",function(){
			$("#defaultModalx").modal({backdrop: 'static', keyboard: false,show:true});
            $("#defaultModalLabel").html("Form Tambah Datax");
		});
		
		$('#example').DataTable( {
			"ajax": "<?php echo base_url(); ?>inventaris/fetch_inventaris"  
		});
	 
	    $('#daftar_sales').DataTable( {
            "ajax": "<?php echo base_url(); ?>inventaris/fetch_kategori" 
        });
 
		 
	  });
  
		
		 
    </script>
