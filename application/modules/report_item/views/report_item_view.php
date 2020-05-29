 
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
								Laporan Barang
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
								 <th style="width:5%;">No</th>	
											<th style="width:5%;">Kode Barang</th>
											<th style="width:5%;">Nama Barang</th>
											<th style="width:5%;">Merk / Model</th>   
											<th style="width:5%;">No Serial Pabrik</th> 
											<th style="width:5%;">Ukuran</th> 
											<th style="width:5%;">Bahan</th>   
											<th style="width:5%;">Tahun Buat</th> 
											<th style="width:5%;">No Kode Barang</th>  
											<th style="width:5%;">Jumlah Barang</th>  
											<th style="width:5%;">Satuan Barang</th>  
											<th style="width:5%;">Harga Beli</th>  
											<th style="width:5%;">Ruangan</th>  
								</tr> 
									 <?php 
									
										if($listing->num_rows() > 0){ 
											foreach($listing->result() as $key=>$val){ 
											echo '<tr align="center">  
											<td>'.$val->kode_barang.'</td>
											<td>'.$val->nama_barang.'</td>
											<td>'.$val->merk_model.'</td> 
											<td>'.$val->no_serial_pabrik.'</td> 
											<td>'.$val->ukuran.'</td>
											<td>'.$val->bahan.'</td>
											<td>'.$val->tahun_buat.'</td>
											<td>'."'".$val->no_kode_barang.'</td>
											<td>'.$val->jumlah_barang.'</td>
											<td>'.$val->satuan_barang.'</td> 
											<td>'.$val->harga_beli.'</td> 
											<td>'.$val->nama_ruangan.'</td> 
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
								 <form method="POST" action="<?php echo base_url('report_item/print'); ?>">
									<input type="text" name="idx" id="idx"> 
									<input type="submit" name="btn" value="Print" class="btn btn-primary">
								 </form>
                        </div>
                    </div>
                </div>
            </div>
         


        </div>
    </section>
     