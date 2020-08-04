 
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
								Laporan Inventaris
                            </h2>
                            
                        </div>
                        <div class="body"> 
							<form method="POST" action="<?php echo base_url('report_inventaris'); ?>"> 
							 	<div class="form-group">
                                        <div class="form-line">
											<label> Gedung /Ruangan </label>
                                            <select class="form-control" name="id_ruangan" id="id_ruangan" >
													<option value="">-Pilih-</option>
													<?php  
														foreach($list_ruangan as $keys=>$vals){
															echo '<option value="'.$vals->id.'">'.$vals->nama_ruangan.'</option>';
													}
												?>
											</select>
                                        </div>
                                </div>		 
								<input type="submit" name="cari" value="Cari" class="btn btn-primary">
							</form> 

								 <br>
								 &nbsp; 

								 <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
								 <tr align="center">  
									<th style="width:10%;">Kode Barang</th>
									<th style="width:10%;">Nama Barang</th>
									<th style="width:10%;">Merk/Model</th>
									<th style="width:10%;">No Serial Pabrik</th>
									<th style="width:10%;">Ukuran</th>
									<th style="width:10%;">Bahan</th>
									<th style="width:10%;">Tahun Buat</th>
									<th style="width:10%;">No Kode Barang</th>
									<th style="width:10%;">Jumlah Barang</th>
									<th style="width:20%;">Harga Beli</th> 
									<th style="width:10%;">Satuan</th>
									<th style="width:20%;">Mutasi</th> 
									<th style="width:20%;">Keterangan</th> 
								</tr>
									 <?php 
									
										if($listing->num_rows() > 0){ 
											foreach($listing->result() as $key=>$val){ 
											echo '<tr align="center">  
											<td>'.$val->kode_barang.'</td>
											<td>'.$val->nama_barang.'</td>
											<td>'.$val->merk_model.'</td>
											<td>'."'".$val->no_serial_pabrik.'</td>
											<td>'.$val->ukuran.'</td>
											<td>'.$val->bahan.'</td>
											<td>'.$val->tahun_buat.'</td>
											<td>'."'".$val->no_kode_barang.'</td>
											<td>'.$val->jumlah_barang.'</td>
											<td>'.$val->harga_beli.'</td>
											<td>'.$val->satuan_barang.'</td>
											<td>'.$val->ruangan_asal.' - '.$val->ruangan_tujuan.'</td>
											<td>'.$val->keterangan.'</td>
											<td></td>
											</tr>';
											}
										}else{
											echo '<tr align="center"> 
												<td colspan="13"> Tidak ada data </td>
											</tr>';
										}
									  
										?>
								 </table>
								 <form method="POST" action="<?php echo base_url('report_inventaris/print'); ?>">
									<input type="hidden" name="idx" id="idx"> 
									<input type="submit" name="btn" value="Print" class="btn btn-primary">
								 </form>
							
                        </div>
                    </div>
                </div>
            </div>
         


        </div>
    </section>
    <script>
		$('select').on('change', function() {
			$("#idx").val(this.value); 
		});
	</script>
