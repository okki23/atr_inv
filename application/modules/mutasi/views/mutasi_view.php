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
								Mutasi
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
                                            <th style="width:10%;">Gedung Asal</th>  
											<th style="width:10%;">Ruangan Asal</th> 
											<th style="width:10%;">Gedung Tujuan</th>  
											<th style="width:10%;">Ruangan Tujuan</th> 
											<th style="width:10%;">Tanggal Mutasi</th>  
											<th style="width:25%;">Opsi</th> 
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
								 <input type="hidden" name="id" id="id">
								 	<div class="form-group">
                                        <div class="form-line">
											<label> Nomor Mutasi </label>
                                            <input type="text" name="no_mutasi" id="no_mutasi" class="form-control" readonly="readonly" />
                                        </div>
                                    </div> 
								 	<div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="nama_barang" id="nama_barang" class="form-control" required readonly="readonly" >
                                                    <input type="hidden" name="id_barang" id="id_barang" required>
                                                    
                                                </div>
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="PilihBarang();" class="btn btn-primary"> Pilih Barang.. </button>
                                                </span>
									</div> 
									<div class="form-group">
                                        <div class="form-line">
											<label> Jumlah Barang </label>
                                            <input type="number" name="jml_barang" id="jml_barang" class="form-control" placeholder="Jumlah Barang" />
                                        </div>
                                    </div>									
									<div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="nama_gedung_asal" id="nama_gedung_asal" class="form-control" required readonly="readonly" >
                                                    <input type="hidden" name="id_gedung_asal" id="id_gedung_asal" required>
                                                    
                                                </div>
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="PilihGedungAsal();" class="btn btn-primary"> Pilih Gedung Asal.. </button>
                                                </span>
									</div> 
									
									<div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="nama_ruangan_asal" id="nama_ruangan_asal" class="form-control" required readonly="readonly" >
                                                    <input type="hidden" name="id_ruangan_asal" id="id_ruangan_asal" required>
                                                    
                                                </div>
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="PilihRuanganAsal();" class="btn btn-primary"> Pilih Ruangan Asal.. </button>
                                                </span>
                                    </div> 
									<hr>
									<h3 align="center"> Pindah </h3>
									<hr> 
									<div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="nama_gedung_tujuan" id="nama_gedung_tujuan" class="form-control" required readonly="readonly" >
                                                    <input type="hidden" name="id_gedung_tujuan" id="id_gedung_tujuan" required>
                                                    
                                                </div>
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="PilihGedungTujuan();" class="btn btn-primary"> Pilih Gedung Tujuan.. </button>
                                                </span>
									</div> 
									
									<div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="nama_ruangan_tujuan" id="nama_ruangan_tujuan" class="form-control" required readonly="readonly" >
                                                    <input type="hidden" name="id_ruangan_tujuan" id="id_ruangan_tujuan" required>
                                                    
                                                </div>
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="PilihRuanganTujuan();" class="btn btn-primary"> Pilih Ruangan Tujuan.. </button>
                                                </span>
                                    </div> 									
                                    <div class="form-group">
                                        <div class="form-line">
										<label> Tanggal Mutasi </label>
                                            <input type="text" name="tgl_mutasi" id="tgl_mutasi" class="datepicker form-control" placeholder="Tanggal Mutasi" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
										<label> Keterangan </label>
                                            <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan" />
                                        </div>
                                    </div>
                                     
									<div class="form-group">
                                        <div class="form-line">
										<label>Image</label> 
											<input type="file" name="user_image" id="user_image" class="form-control" onchange="PreviewGambar(this);" placeholder="pegawai" />  
                                        </div>
										   <input type="hidden" name="image" id="image">
                                    </div>
                                    <br>
                                    <img onerror="this.onerror=null;this.src='<?php echo base_url('assets/images/image_prev.jpg'); ?>';" id="image1" src="<?php echo base_url('upload/image_prev.jpg');?>" style="height: 300px;" alt="..." class="img-rounded img-responsive">
                                    <br> 
								    <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan</button>

                                    <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal"> <i class="material-icons">clear</i> Batal</button>
							 </form>
					   </div>
                     
                    </div>
                </div>
    </div>


    <!-- modal cari ruangan asal -->
    <div class="modal fade" id="PilihRuanganAsalModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" > Pilih Ruangan Asal</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_ruangan_asal" >
  
                                    <thead>
                                        <tr> 
                                   
											<th style="width:95%;">Kode Ruangan</th>
											<th style="width:95%;">Nama Ruangan</th>
                                             
                                        </tr>
                                    </thead> 
                                    <tbody id="daftar_ruangan_asalx">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
	</div>
	
	
    <!-- modal cari ruangan tujuan -->
    <div class="modal fade" id="PilihRuanganTujuanModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" > Pilih Ruangan Tujuan</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_ruangan_tujuan" >
  
                                    <thead>
                                        <tr> 
                                   
											<th style="width:95%;">Kode Ruangan</th>
											<th style="width:95%;">Nama Ruangan</th>
                                             
                                        </tr>
                                    </thead> 
                                    <tbody id="daftar_ruangan_tujuanx">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
	</div>
	
	
    <!-- modal cari gedung asal -->
    <div class="modal fade" id="PilihGedungAsalModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" > Pilih Gedung Asal</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_gedung_asal" >
  
                                    <thead>
                                        <tr> 
                                   
											<th style="width:95%;">Kode Gedung</th>
											<th style="width:95%;">Nama Gedung</th>
											<th style="width:95%;">Alamat</th>
                                             
                                        </tr>
                                    </thead> 
                                    <tbody id="daftar_gedung_asalx">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
	</div>
	
	
    <!-- modal cari gedung tujuan -->
    <div class="modal fade" id="PilihGedungTujuanModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" > Pilih Gedung Tujuan</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_gedung_tujuan" >
  
                                    <thead>
                                        <tr> 
                                   
											<th style="width:95%;">Kode Ruangan</th>
											<th style="width:95%;">Nama Ruangan</th>
											<th style="width:95%;">Alamat</th>
                                             
                                        </tr>
                                    </thead> 
                                    <tbody id="daftar_gedung_tujuanx">

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
                                   
											<th style="width:95%;">Kode Barang</th>
											<th style="width:95%;">Nama Barang</th>
											<th style="width:95%;">Merk/Model</th>
											<th style="width:95%;">No Serial Pabrik</th>
											<th style="width:95%;">Ukuran</th>
											<th style="width:95%;">Bahan</th>
											<th style="width:95%;">Tahun Buat</th>
											<th style="width:95%;">No Kode Barang</th>
											<th style="width:95%;">Satuan</th>
											<th style="width:95%;">Harga Beli</th> 
                                        </tr>
                                    </thead> 
                                    <tbody id="daftar_barangx">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
    </div>
	
	<!-- detail data mutasi -->
	<div class="modal fade" id="DetailModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Detail mutasi</h4>
                        </div>
                        <div class="modal-body">
						
						<table class="table table-responsive">
							<tr>
								<td style="font-weight:bold;"> No Mutasi</td>
								<td> : </td>
								<td> <p id="nomutasidtl"> </p> </td>

								<td style="font-weight:bold;"> Kode Barang</td>
								<td> : </td>
								<td> <p id="kodebarangdtl"> </p> </td>
								 
							</tr>
                        	<tr>
								<td style="font-weight:bold;"> Nama Barang</td>
								<td> : </td>
								<td> <p id="namabarangdtl"> </p> </td> 
								
								<td style="font-weight:bold;"> Jumlah Barang</td>
								<td> : </td>
								<td> <p id="jmlbarangdtl"> </p> </td> 
							</tr>
							 
							<tr>
								<td style="font-weight:bold;"> Gedung Asal</td>
								<td> : </td>
								<td> <p id="gedungasaldtl"> </p> </td>
								
								<td style="font-weight:bold;"> Ruangan Asal</td>
								<td> : </td>
								<td> <p id="ruanganasaldtl"> </p> </td> 
                            </tr>

							<tr>
								<td style="font-weight:bold;"> Gedung Tujuan</td>
								<td> : </td>
								<td> <p id="gedungtujuandtl"> </p> </td>
								
								<td style="font-weight:bold;"> Ruangan Tujuan</td>
								<td> : </td>
								<td> <p id="ruangantujuandtl"> </p> </td> 
                            </tr>
                            
                            <tr>
								<td style="font-weight:bold;"> Tanggal Mutasi</td>
								<td> : </td>
								<td> <p id="tglmutasidtl"> </p> </td>
								
								<td style="font-weight:bold;"> Keterangan</td>
								<td> : </td>
								<td> <p id="keterangandtl"> </p> </td> 
							</tr>

							<tr>
								<td style="font-weight:bold;"> Image  </td> 
								<td colspan="4">  : </td> 
							</tr> 
							<tr>
								<td colspan="6" align="center">  
								<img src="" class="img responsive" style="width:50%; height: 50%;" id="imagedtl">
								</td>
							</tr>
							  
						 
							 <div class="modal-footer">
							  <button type="button" class="btn btn-danger" data-dismiss="modal"> X Tutup </button>
							 </div>
						</table>
                           
					   </div>
                     
                    </div>
                </div>
    </div>
			
 
   <script type="text/javascript">
	function PilihRuanganAsal(){
        $("#PilihRuanganAsalModal").modal({backdrop: 'static', keyboard: false,show:true});
    }
	function PilihRuanganTujuan(){
        $("#PilihRuanganTujuanModal").modal({backdrop: 'static', keyboard: false,show:true});
    }
	function PilihGedungAsal(){
        $("#PilihGedungAsalModal").modal({backdrop: 'static', keyboard: false,show:true});
    }
	function PilihGedungTujuan(){
        $("#PilihGedungTujuanModal").modal({backdrop: 'static', keyboard: false,show:true});
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
      
    $('#daftar_ruangan_asal').DataTable( {
        "ajax": "<?php echo base_url(); ?>ruangan/fetch_ruangan" 
    });

    var daftar_ruangan_asal = $('#daftar_ruangan_asal').DataTable();
     
        $('#daftar_ruangan_asal tbody').on('click', 'tr', function () {
            
            var content = daftar_ruangan_asal.row(this).data()
            console.log(content);
            $("#nama_ruangan_asal").val(content[1]);
            $("#id_ruangan_asal").val(content[3]);
            $("#PilihRuanganAsalModal").modal('hide');
        } );
	
	$('#daftar_ruangan_tujuan').DataTable( {
        "ajax": "<?php echo base_url(); ?>ruangan/fetch_ruangan" 
    });

    var daftar_ruangan_tujuan = $('#daftar_ruangan_tujuan').DataTable();
     
        $('#daftar_ruangan_tujuan tbody').on('click', 'tr', function () {
            
            var content = daftar_ruangan_tujuan.row(this).data()
            console.log(content);
            $("#nama_ruangan_tujuan").val(content[1]);
            $("#id_ruangan_tujuan").val(content[3]);
            $("#PilihRuanganTujuanModal").modal('hide');
        } );
	
	$('#daftar_gedung_asal').DataTable( {
        "ajax": "<?php echo base_url(); ?>gedung/fetch_gedung" 
    });

    var daftar_gedung_asal = $('#daftar_gedung_asal').DataTable();
     
        $('#daftar_gedung_asal tbody').on('click', 'tr', function () {
            
            var content = daftar_gedung_asal.row(this).data()
            console.log(content);
            $("#nama_gedung_asal").val(content[1]);
            $("#id_gedung_asal").val(content[4]);
            $("#PilihGedungAsalModal").modal('hide');
        } );
	
	$('#daftar_gedung_tujuan').DataTable( {
        "ajax": "<?php echo base_url(); ?>gedung/fetch_gedung" 
    });

    var daftar_gedung_tujuan = $('#daftar_gedung_tujuan').DataTable();
     
        $('#daftar_gedung_tujuan tbody').on('click', 'tr', function () {
            
            var content = daftar_gedung_tujuan.row(this).data()
            console.log(content);
            $("#nama_gedung_tujuan").val(content[1]);
            $("#id_gedung_tujuan").val(content[4]);
            $("#PilihGedungTujuanModal").modal('hide');
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
			 url:"<?php echo base_url(); ?>mutasi/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){  
                 var nf = new Intl.NumberFormat();
                 $("#namabarangdtl").html(result.nama_barang);
                 $("#kodebarangdtl").html(result.kode_barang);
				 $("#nomutasidtl").html(result.no_mutasi);
                 $("#tglmutasidtl").html(result.tgl_mutasi); 
                 $("#keterangandtl").html(result.keterangan);
				 $("#gedungasaldtl").html(result.gedung_asal);
                 $("#gedungtujuandtl").html(result.gedung_tujuan);
                 $("#ruanganasaldtl").html(result.ruangan_asal); 
                 $("#ruangantujuandtl").html(result.ruangan_tujuan) 
                 $("#jmlbarangdtl").html(result.jml_barang);  
				 $("#imagedtl").attr("src","upload/"+result.image);
			 }
		 });
	 }
       
	 function Ubah_Data(id){
		$("#defaultModalLabel").html("Form Ubah Data");
		$("#defaultModal").modal('show');
 
		$.ajax({
			 url:"<?php echo base_url(); ?>mutasi/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){  
				 $("#defaultModal").modal('show'); 
				 $("#id").val(result.id);
				 $("#id_barang").val(result.id_barang);
				 $("#no_mutasi").val(result.no_mutasi);
				 $("#id_ruangan_asal").val(result.id_ruangan_asal); 
                 $("#id_ruangan_tujuan").val(result.id_ruangan_tujuan);
                 $("#id_gedung_asal").val(result.id_gedung_asal); 
                 $("#id_gedung_tujuan").val(result.id_gedung_tujuan);  
                 $("#nama_ruangan_asal").val(result.ruangan_asal); 
                 $("#nama_ruangan_tujuan").val(result.ruangan_tujuan);
                 $("#nama_gedung_asal").val(result.gedung_asal); 
                 $("#nama_gedung_tujuan").val(result.gedung_tujuan); 
                 $("#nama_barang").val(result.nama_barang);
				 $("#jml_barang").val(result.jml_barang);
                 $("#kode_barang").val(result.kode_barang);
                 $("#tgl_mutasi").val(result.tgl_mutasi); 
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
            url : "<?php echo base_url('mutasi/hapus_data')?>/"+id,
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

          
         var foto = $('#image').val();
		 var extension = $('#image').val().split('.').pop().toLowerCase();  
  
           
            $.ajax({
             url:"<?php echo base_url(); ?>mutasi/simpan_data",
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
			$.ajax({
			url:"<?php echo base_url('mutasi/get_last_id'); ?>",
			type:"GET",
			data:{id:1},
			success:function(result){
				$("#no_mutasi").val(result);
			}
			});
			$("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
            $("#method").val('Add');
            $("#defaultModalLabel").html("Form Tambah Data");
		});
		
		$("#addmodalx").on("click",function(){
			$("#defaultModalx").modal({backdrop: 'static', keyboard: false,show:true});
            $("#defaultModalLabel").html("Form Tambah Datax");
		});
		
		$('#example').DataTable( {
			"ajax": "<?php echo base_url(); ?>mutasi/fetch_mutasi",
      'rowsGroup': [1] 
		});
	 
	    $('#daftar_sales').DataTable( {
            "ajax": "<?php echo base_url(); ?>mutasi/fetch_kategori" 
        });
 
		 
	  });
  
		
		 
    </script>
