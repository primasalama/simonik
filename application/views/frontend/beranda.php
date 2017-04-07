<style type="text/css">
	.morecontent span {
    display: none;
}
.morelink {
    display: block;
}
.active{
	color: blue;
	font-weight: bold;
}
</style>
<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
<div class="well well-sm">
    <div class="container">
        <div class="row">
        	<div class="col-md-12">
                <ol class="breadcrumb" style="margin-bottom: 0;">
                    <li class="active">
                    <a href="index.php">
                        <span class="glyphicon glyphicon-home"></span> Beranda
                    </a>
                    </li>
                </ol>
        	</div>
        </div>
    </div>
</div>
<div class="container">
	<div class="panel panel-default">
    	<div class="panel-body">
        <div class="well well-sm">
    <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Kebijakan</li>
					<li class="pull-right">
                        <div class="btn-group">
                          <button type="button" class="btn btn-xs btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Export <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url();?>beranda/excels/kebijakan/asdep1">Asdep1</a></li>
                            <li><a href="<?php echo base_url();?>beranda/excels/kebijakan/asdep2">Asdep2</a></li>
                            <li><a href="<?php echo base_url();?>beranda/excels/kebijakan/asdep3">Asdep3</a></li>
                            <li><a href="<?php echo base_url();?>beranda/excels/kebijakan/asdep4">Asdep4</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url();?>beranda/excels/kebijakan">Semua Kebijakan</a></li>
                          </ul>
                        </div>
                    </li>
                </ol>
                <?php 
	//print_r($kprogress->num_rows());die();
	$z=1;
	$data = $kprogress->result();
	for ($i=0; $i < $kprogress->num_rows() ; $i++) { 
		# code...
		if ($i+1 != $kprogress->num_rows()) {
			if ($data[$i]->narasiKebijakan != $data[$i+1]->narasiKebijakan) {
				# code...
				$baris[$i][0] = $z ;$z++;
			}else{
				$baris[$i][0] = $z ;
			}
		}else{
			$baris[$i][0] = $z ;
		}
		$baris[$i][1] = nl2br($data[$i]->narasi);
		$baris[$i][2] = nl2br($data[$i]->uraian);
		$baris[$i][3] = nl2br($data[$i]->tindak_ljt);
		$baris[$i][4] = nl2br($data[$i]->masalah);
	}
	?>
<script type="text/javascript">
	$(document).ready( function () {
  
	var data = <?php echo json_encode($baris);?>;
	console.log(data);
	 var table = $('#example').DataTable({
    rowsGroup: [
      0,1,
    ],
    pageLength: '10',
    });
});
</script>
	<table id="example" class="table table-bordered">
			   <thead>
              <tr>
                <th>No.</th>
                <th>Narasi</th>
                <th>Uraian</th>
                <th>Tindak Lanjut</th>
                <th>Masalah</th>
              </tr>   
         </thead>
         <tbody>
           <?php
           $i=1; 
              foreach ($baris as $key) {
                ?>
                <tr>
                  <td><?php echo $key[0];?></td>
                  <td><?php echo $key[1];?></td>
                  <?php 
                    if (strlen($key[2]) > 200) {
                      ?><td><?php echo substr(nl2br($key[2]), 0,200);?><span id="k_uraian_<?php echo $i;?>" class="collapse"><?php echo substr(nl2br($key[2]), 200) ?></span><a data-toggle="collapse" data-target="#k_uraian_<?php echo $i;?>"> Readmore..</a></td><?php
                    }else{
                      ?> <td><?php echo nl2br($key[2]);?></td><?php 
                    }
                  ?>
                  <?php 
                    if (strlen($key[3]) > 200) {
                      ?><td><?php echo substr(nl2br($key[3]), 0,200);?><span id="k_tdklanjut_<?php echo $i;?>" class="collapse"><?php echo substr(nl2br($key[3]), 200) ?></span><a data-toggle="collapse" data-target="#k_tdklanjut_<?php echo $i;?>"> Readmore..</a></td><?php
                    }else{
                      ?> <td><?php echo nl2br($key[3]);?></td><?php 
                    }
                  ?>
                  <?php 
                    if (strlen($key[4]) > 200) {
                      ?><td><?php echo substr(nl2br($key[4]), 0,200);?><span id="k_masalah_<?php echo $i;?>" class="collapse"><?php echo substr(nl2br($key[4]), 200) ?></span><a data-toggle="collapse" data-target="#k_masalah_<?php echo $i;?>"> Readmore..</a></td><?php
                    }else{
                      ?> <td><?php echo nl2br($key[4]);?></td><?php 
                    }
                  ?>
                </tr>
                <?php 
                $i++;
              }
           ?>
         </tbody>
				</table>
	<br/>
	<
	<?php 
	if ($this->session->userdata('session')) {
	?>
	<br/>
	<ol class="breadcrumb">
                    <li class="breadcrumb-item active">Kebijakan</li>
					<li class="pull-right">
                        <div class="btn-group">
                          <button type="button" class="btn btn-xs btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Export <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url();?>beranda/excels/kebijakan/asdep1">Asdep1</a></li>
                            <li><a href="<?php echo base_url();?>beranda/excels/kebijakan/asdep2">Asdep2</a></li>
                            <li><a href="<?php echo base_url();?>beranda/excels/kebijakan/asdep3">Asdep3</a></li>
                            <li><a href="<?php echo base_url();?>beranda/excels/kebijakan/asdep4">Asdep4</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url();?>beranda/excels/kebijakan">Semua Kebijakan</a></li>
                          </ul>
                        </div>
                    </li>
                </ol>
     <table class="table table-bordered" id="kebijakan">
     	<thead>
     		<tr>
     			<th>No</th>
     			<th>Narasi</th>
     			<th>Status</th>
     			<th>Indikator</th>
     			<th>PIC</th>
     		</tr>
     	</thead>
     	<tbody>

     		<?php 
     			$n=1;
     			foreach ($kebijakan as $key) {
     				?>
     				<tr>
     					<td><?php echo $n;?></td>
     					<td><?php echo nl2br($key->narasi);?></td>
     					<?php 
								if (strlen($key->status) > 200) {
									?><td><?php echo substr(nl2br($key->status), 0,200);?><span id="k_status_<?php echo $n;?>" class="collapse"><?php echo substr(nl2br($key->status), 200) ?></span><a data-toggle="collapse" data-target="#k_status_<?php echo $n;?>"> Readmore..</a></td><?php
								}else{
									?> <td><?php echo nl2br($key->status);?></td><?php 
								}
							?>
     					<td><?php echo nl2br($key->indikator);?></td>
     					<td><?php echo nl2br($key->pic);?></td>
     				</tr>
     				<?php
     				$n++;
     			}

     		?>
     	</tbody>
     </table>
     <br/>
	<ol class="breadcrumb" style="margin-top:-20px;">
        <li class="breadcrumb-item active">Progress</li>
		<li class="pull-right">
                        <div class="btn-group">
                          <button type="button" class="btn btn-xs btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Export <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">	
                            <li><a href="<?php echo base_url();?>beranda/excels/progress/asdep1">Asdep1</a></li>
                            <li><a href="<?php echo base_url();?>beranda/excels/progress/asdep2">Asdep2</a></li>
                            <li><a href="<?php echo base_url();?>beranda/excels/progress/asdep3">Asdep3</a></li>
                            <li><a href="<?php echo base_url();?>beranda/excels/progress/asdep4">Asdep4</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url();?>beranda/excels/progress">Semua Progress</a></li>
                          </ul>
                        </div>
                    </li>
	</ol>
		<table id="progress" class="table table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th width="15%">Narasi</th>
							<th>Waktu/Tanggal</th>
							<th width="20%">Uraian</th>
							<th width="20%">Tindak Lanjut</th>
							<th width="20%">Masalah</th>
							<th>Dokumentasi</th>
                            <th width="10%">Output</th>
							<?php 
							if ($this->uri->segment(3)) {
								?><th>Action</th><?php
								switch (variable) {
									case 'value':
										# code...
										break;
									
									default:
										# code...
										break;
								}
							}
							?>
						</tr>
					</thead>
					<tbody>
					<?php
						$i=1;
						foreach ($progress as $key) {
						?>
						<tr>
							<td><?php echo $i;?></td>
							<td ><?php echo nl2br($key->narasi);?></td>
							<td><?php 
                            if ($key->tanggal1 == $key->tanggal2) {
                               echo date("d-M-Y h:i:s",strtotime($key->tanggal1));
                            }else{
                                echo date("d-M-Y h:i:s",strtotime($key->tanggal1))." s/d ".date("d-M-Y h:i:s",strtotime($key->tanggal2));
                            }
                            ?></td>
							<?php 
								if (strlen($key->uraian) > 200) {
									?><td><?php echo substr(nl2br($key->uraian), 0,200);?><span id="uraian_<?php echo $i;?>" class="collapse"><?php echo substr(nl2br($key->uraian), 200) ?></span><a data-toggle="collapse" data-target="#uraian_<?php echo $i;?>"> Readmore..</a></td><?php
								}else{
									?> <td><?php echo nl2br($key->uraian);?></td><?php 
								}
							?>
							<?php 
								if (strlen($key->tindak_ljt) > 300) {
									?><td><?php echo substr(nl2br($key->tindak_ljt), 0,300);?><span id="tindak_ljt_<?php echo $i;?>" class="collapse"><?php echo substr(nl2br($key->tindak_ljt), 300) ?></span><a data-toggle="collapse" data-target="#tindak_ljt_<?php echo $i;?>"> Readmore..</a></td><?php
								}else{
									?> <td><?php echo nl2br($key->tindak_ljt);?></td><?php 
								}
							?>
							<?php 
								if (strlen($key->masalah) > 300) {
									?><td><?php echo substr(nl2br($key->masalah), 0,300);?><span id="masalah_<?php echo $i;?>" class="collapse"><?php echo substr(nl2br($key->masalah), 300) ?></span><a data-toggle="collapse" data-target="#masalah_<?php echo $i;?>"> Readmore..</a></td><?php
								}else{
									?> <td><?php echo nl2br($key->masalah);?></td><?php 
								}
							?>
							<td>
								<?php if ($key->dokumentasi1 != "") {
									?><a href="<?php echo base_url();?>assets/images/uploads/<?php echo $key->dokumentasi1;?>" data-lightbox="<?php echo $key->dokumentasi1?>" data-title="<?php echo $key->dokumentasi2;?>">
								<img style="width:90px;" src="<?php echo base_url();?>assets/images/uploads/<?php echo $key->dokumentasi1;?>"></img></a><?php
								}
								if ($key->dokumentasi2 != "") {
									?>
									<a href="<?php echo base_url();?>assets/images/uploads/<?php echo $key->dokumentasi2;?>" data-lightbox="<?php echo $key->dokumentasi1?>" data-title="<?php echo $key->dokumentasi1;?>">
								<img style="width:90px;" src="<?php echo base_url();?>assets/images/uploads/<?php echo $key->dokumentasi2;?>"></img>
								</a>
									<?php
								}
								?>
							</td>
                            <?php 
								if (strlen($key->hasil) > 200) {
									?><td><?php echo substr(nl2br($key->hasil), 0,200);?><span id="hasil_<?php echo $i;?>" class="collapse"><?php echo substr(nl2br($key->hasil), 200) ?></span><a data-toggle="collapse" data-target="#masalah_<?php echo $i;?>"> Readmore..</a></td><?php
								}else{
									?> <td><?php echo nl2br($key->hasil);?></td><?php 
								}
							?>
						</tr>
						<?php
						$i++;}
					 ?>
					</tbody>
				</table>
	<ol class="breadcrumb" style="margin-top: 30px;">
		<li class="breadcrumb-item active">Agenda</li>
		<li class="pull-right">
                        <div class="btn-group">
                          <button type="button" class="btn btn-xs btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Export <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url();?>beranda/excels/agenda/asdep1">Asdep1</a></li>
                            <li><a href="<?php echo base_url();?>beranda/excels/agenda/asdep2">Asdep2</a></li>
                            <li><a href="<?php echo base_url();?>beranda/excels/agenda/asdep3">Asdep3</a></li>
                            <li><a href="<?php echo base_url();?>beranda/excels/agenda/asdep4">Asdep4</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url();?>beranda/excels/agenda">Semua Agenda</a></li>
                          </ul>
                        </div>
                    </li>
	</ol>
	<table id="agenda" class="table table-bordered" >
		<thead valign="middle" ">
			<tr>
				<th>No.</th>
				<th>Narasi</th>
              	<th>Tanggal Pengajuan</th>
				<th>Rencana Tanggal Pelaksanaan Kegiatan</th>
              	<th width="20%">Kegiatan</th>
              	<th width="13%">Anggaran (Rp)</th>
                <th>Tanggal Pengajuan SP2D</th>
                <th>Tanggal SP2D</th>
                <th>Tanggal Pencairan</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$i=1;
				foreach ($agenda as $key) {
				?>
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $key->narasi;?></td>
			        <td><?php if($key->tglPengajuan != '0000-00-00'){echo date("d-m-Y",strtotime($key->tglPengajuan));}else{echo "-";}?></td>
              		<td><?php echo $key->tanggal;?></td>
			        <td><?php echo $key->uraian;?></td>
			        <td><?php echo "Rp " .number_format($key->anggaran);?></td>
              <?php 
              //if ($this->session->userdata('session')) {
                //if ($this->session->userdata('session')[0]->role == 'sesdep' or $this->session->userdata('session')[0]->role == 'admin') {
                      ?>
                      <td><?php if($key->tglPengajuanSpd != '0000-00-00'){echo date("d-m-Y",strtotime($key->tglPengajuanSpd));}else{echo "-";}?></td>
                      <td><?php if($key->tglSpd != '0000-00-00'){echo date("d-m-Y",strtotime($key->tglSpd));}else{echo "-";}?></td>
                      <td><?php if($key->tglPencairan != '0000-00-00'){echo date("d-m-Y",strtotime($key->tglPencairan));}else{echo "-";}?></td>
                      <?php
                    //}
              //}
                
              ?>	
						</tr>
						<?php
						$i++;}
					 ?>
					</tbody>
				</table>
				<?php
				}
				?>
				</div>
			</div>
</div>
</div>
</div>
<script type="text/javascript">
            $(document).ready(function() {
              $('#kebijakan').DataTable();
              $('#agenda').DataTable();
              $('#progress').DataTable();
              // Configure/customize these variables.

          } );
</script>
<script type="text/javascript">
	//datatables
    //table = $('#kebijakan').DataTable();
</script>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Agenda</h4>
                            </div>
                        
                            <div class="modal-body">
                                <p>Anda ingin menghapus?</p>
                                Agenda Kegiatan :  <strong><span class="debug-url"></span></strong>
                            </div>
                            
                            <div class="modal-footer">
                                <a class="btn btn-danger btn-ok">Hapus</a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Gagal</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $('#confirm-delete').on('show.bs.modal', function(e) {
                        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
                        $('.debug-url').html($(e.relatedTarget).data('book'));
                    });
                </script>
