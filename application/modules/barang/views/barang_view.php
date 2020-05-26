 
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
                                Barang
                            </h2>
                            <br>
                            <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="material-icons">add_circle</i>  Tambah Data </a>
  
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
							   <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
  
									<thead>
										<tr> 
											<th style="width:5%;">Kode Barang</th>
                                            <th style="width:5%;">Merk / Model</th>
                                            <th style="width:5%;">Nama Barang</th>                                           
                                            <th style="width:10%;">Opsi</th> 
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
                                            <input type="text" name="kode_barang" id="kode_barang" class="datepicker form-control" placeholder="Kode Barang" />
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Nama Barang" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="merk_model" id="merk_model" class="form-control" placeholder="Merk Model" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="no_serial_pabrik" id="no_serial_pabrik" class="form-control" placeholder="No Serial Pabrik" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="ukuran" id="ukuran" class="form-control" placeholder="Ukuran" />
                                        </div>
                                    </div>
									<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="bahan" id="bahan" class="form-control" placeholder="Bahan" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="tahun_buat" id="tahun_buat" class="form-control" placeholder="Tahun Buat" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="jumlah_barang" id="jumlah_barang" class="form-control" placeholder="Jumlah Barang" />
                                        </div>
                                    </div>
									<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="satuan_barang" id="satuan_barang" class="form-control" placeholder="Satuan Barang" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="harga_beli" id="harga_beli" class="form-control" placeholder="Harga Beli" />
                                        </div>
                                    </div> 

								   <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan</button>

                                   <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal"> <i class="material-icons">clear</i> Batal</button>
							 </form>
					   </div>
                     
                    </div>
                </div>
    </div> 
     <!-- modal detail -->
     <div class="modal fade" id="DetailModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" >Detail</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>
                                <br>
                                <hr>
                                <table class="table table-bordered table-hovered">
                                <tr>
                                    <td>Kode Barang</td>
                                    <td>:</td>
                                    <td><div id="kode_barangdtl"> </div></td>
                                </tr>
								<tr>
                                    <td>Nama Barang</td>
                                    <td>:</td>
                                    <td><div id="nama_barangdtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>Merk Model</td>
                                    <td>:</td>
                                    <td><div id="merk_modeldtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>No Serial Pabrik</td>
                                    <td>:</td>
                                    <td><div id="no_serial_pabrikdtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>Ukuran</td>
                                    <td>:</td>
                                    <td><div id="ukurandtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>Bahan</td>
                                    <td>:</td>
                                    <td><div id="bahandtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>Tahun Buat</td>
                                    <td>:</td>
                                    <td><div id="tahun_buatdtl"> </div></td>
                                </tr>
								<tr>
                                    <td>No Kode Barang</td>
                                    <td>:</td>
                                    <td><div id="no_kode_barangdtl"> </div></td>
                                </tr>
								<tr>
                                    <td>Jumlah Barang</td>
                                    <td>:</td>
                                    <td><div id="jumlah_barangdtl"> </div></td>
                                </tr>
								<tr>
                                    <td>Satuan Barang</td>
                                    <td>:</td>
                                    <td><div id="satuan_barangdtl"> </div></td>
                                </tr>
								<tr>
                                    <td>Harga Beli</td>
                                    <td>:</td>
                                    <td><div id="harga_belidtl"> </div></td>
                                </tr> 
                                </table> 
                       </div> 
                    </div>
                </div>
    </div> 

  
 
   <script type="text/javascript">  
    function Detail(id){
        $("#DetailModal").modal({backdrop: 'static', keyboard: false,show:true});
 
		$.ajax({
			 url:"<?php echo base_url(); ?>barang/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){  
				 $("#kode_barangdtl").html(result.kode_barang);
                 $("#nama_barangdtl").html(result.nama_barang);
                 $("#merk_modeldtl").html(result.merk_model); 
                 $("#no_serial_pabrikdtl").html(result.no_serial_pabrik);
                 $("#ukurandtl").html(result.ukuran);
                 $("#bahandtl").html(result.bahan); 
				 $("#tahun_buatdtl").html(result.tahun_buat);
                 $("#no_kode_barangdtl").html(result.no_kode_barang);
                 $("#jumlah_barangdtl").html(result.jumlah_barang); 
                 $("#satuan_barangdtl").html(result.satuan_barang);
                 $("#harga_belidtl").html(result.harga_beli); 
			 }
		 });
    } 
      
	 function Ubah_Data(id){
		$("#defaultModalLabel").html("Form Ubah Data");
		$("#defaultModal").modal('show');
 
		$.ajax({
			 url:"<?php echo base_url(); ?>barang/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){  
				 $("#defaultModal").modal('show'); 
				 $("#id").val(result.id);
				 $("#kode_barang").val(result.kode_barang);
                 $("#nama_barang").val(result.nama_barang);
                 $("#merk_model").val(result.merk_model); 
                 $("#no_serial_pabrik").val(result.no_serial_pabrik);
                 $("#ukuran").val(result.ukuran);
                 $("#bahan").val(result.bahan); 
				 $("#tahun_buat").val(result.tahun_buat);
                 $("#no_kode_barang").val(result.no_kode_barang);
                 $("#jumlah_barang").val(result.jumlah_barang); 
                 $("#satuan_barang").val(result.satuan_barang);
                 $("#harga_beli").val(result.harga_beli); 
			 }
		 });
	 }
 
	 function Bersihkan_Form(){
        $(':input').val(''); 
         
     }

	 function Hapus_Data(id){
		if(confirm('Anda yakin ingin menghapus data ini?'))
        {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo base_url('barang/hapus_data')?>/"+id,
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
		//setting semua data dalam form dijadikan 1 variabel 
		 var formData = new FormData($('#user_form')[0]); 
 
                 //transaksi dibelakang layar
                 $.ajax({
                 url:"<?php echo base_url(); ?>barang/simpan_data",
                 type:"POST",
                 data:formData,
                 contentType:false,  
                 processData:false,   
                 success:function(result){ 
                    
                     $("#defaultModal").modal('hide');
                     $('#example').DataTable().ajax.reload(); 
                     $('#user_form')[0].reset();
                     Bersihkan_Form();
                     
                     $.notify("Data berhasil disimpan!", {
                        animate: {
                            enter: 'animated fadeInRight',
                            exit: 'animated fadeOutRight'
                     } 
                     },{
                        type: 'success'
                    });
                 }
                }); 
 
 
         

	}
      
	 
       $(document).ready(function() {
		   
		$("#addmodal").on("click",function(){
			$("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
            $("#method").val('Add');
            $("#defaultModalLabel").html("Form Tambah Data");
		});

		$('#example').DataTable({             
			"ajax": "<?php echo base_url(); ?>barang/fetch_barang"
		});


	  
		 
	  });
  
		
		 
    </script>
