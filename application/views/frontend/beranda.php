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
                    <li class="breadcrumb-item active">Progres Kebijakan Strategis</li>
					<li class="pull-right">
                        <div class="btn-group">
                          <button type="button" class="btn btn-xs btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Export <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url();?>beranda/excels/kebijakanstrategis">Semua Kebijakan Strategis</a></li>
                          </ul>
                        </div>
                    </li>
                </ol>
                <?php 
    //             $array = ['1','2','3','6'];
    //            //array_push($array,'5');
                
    //             print_r($array);die();
    //             for ($i=0; $i <=6; $i++) { 
    //               if (in_array($i, $array)) {
    //                 echo "ada<br/>";
    //               }else{
    //                 echo "kosong<br/>";
    //               }
    //             }
    // die();
                $array = [];
	//print_r($kprogress->num_rows());die();
	$z=1;
  $j=0;
	$data = $kprogress->result();
  //print_r($data);
	for ($i=0; $i < $kprogress->num_rows() ; $i++) { 
    if (in_array($data[$i]->narasiKebijakan, $array)) {
      //echo "string";die();
    }
    else{
      //echo "kosong";die();
      # code...
      // echo $data[$i]->narasiKebijakan." <br/>";
      // print_r($array);echo "<br/>";
      array_push($array, $data[$i]->narasiKebijakan);
      $hsl = $this->M_progress->getProgressKebijakan_id($data[$i]->narasiKebijakan)->result();
      $dua = $this->M_progress->getTindakMasalah($data[$i]->narasiKebijakan)->result();
      foreach ($hsl as $z) {
        $baris[$j][0] = $i+1;
        $baris[$j][1] = nl2br($z->narasi);
        $baris[$j][2] = nl2br($z->uraian);
        $baris[$j][3] = nl2br($dua[0]->tindak_ljt);
        $baris[$j][4] = nl2br($dua[0]->masalah);
        $baris[$j][5] = date("d-M-Y",strtotime($z->tanggal1));
        $baris[$j][6] = nl2br($z->arahan);  
        $baris[$j][7] = $z->narasiKebijakan;
        //print_r($baris);
        $j++;
      }
    }
	}
  //print_r($baris);
	?>
<script type="text/javascript">
	$(document).ready( function () {
	//console.log(data);
	 var table = $('#example').DataTable({
    rowsGroup: [
      0,1,4,5,6
    ],
    pageLength: '10'
    });
});
</script>
	<table id="example" class="table table-bordered">
			   <thead>
              <tr>
                <th style="vertical-align:middle">No.</th>
                <th style="vertical-align:middle" width="15%">Kegiatan</th>
                <th style="vertical-align:middle" width="20%">Capaian</th>
                <th style="vertical-align:middle"width="15%">Tanggal</th>
                <th style="vertical-align:middle" width="20%">Kendala</th>
                <th style="vertical-align:middle">Tindak Lanjut</th>
                <th style="vertical-align:middle">Arahan yang Diperlukan Menko Kemaritiman</th>
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
                    if (strlen($key[2]) > 100) {
                      ?><td><?php echo substr(nl2br($key[2]), 0,100);?><span id="k_uraian_<?php echo $i;?>" class="collapse"><?php echo substr(nl2br($key[2]), 200) ?></span><a data-toggle="collapse" data-target="#k_uraian_<?php echo $i;?>"> Readmore..</a></td><?php
                    }else{
                      ?> <td><?php echo nl2br($key[2]);?></td><?php 
                    }
                  ?>
                  <td><?php echo $key[5];?></td>
                  <td><?php echo $key[4];?></td>
                  <td><?php echo $key[3];?></td>
                  <?php
                  /* 
                  if (strlen($key[4]) > 200) {
                      ?><td><?php echo substr(nl2br($key[4]), 0,200);?><span id="k_masalah_<?php echo $i;?>" class="collapse"><?php echo substr(nl2br($key[4]), 200) ?></span><a data-toggle="collapse" data-target="#k_masalah_<?php echo $i;?>"> Readmore..</a></td><?php
                    }else{
                      ?> <td><?php echo nl2br($key[4]);?></td><?php 
                    }
                  ?>

                  <?php
                  /* 
                    if (strlen($key[3]) > 200) {
                      ?><td><?php echo substr(nl2br($key[3]), 0,200);?><span id="k_tdklanjut_<?php echo $i;?>" class="collapse"><?php echo substr(nl2br($key[3]), 200) ?></span><a data-toggle="collapse" data-target="#k_tdklanjut_<?php echo $i;?>"> Readmore..</a></td><?php
                    }else{
                      ?> <td><?php echo nl2br($key[3]);?></td><?php 
                    }*/
                  ?>
                  <td><?php echo $key[6];?></td>
                </tr>
                <?php 
                $i++;
              }
           ?>
         </tbody>
				</table>
	<br/>
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
							<th style="vertical-align:middle">No.</th>
							<th style="vertical-align:middle" width="15%">Narasi</th>
							<th style="vertical-align:middle">Waktu/Tanggal</th>
							<th style="vertical-align:middle" width="20%">Uraian</th>
							<th style="vertical-align:middle" width="20%">Tindak Lanjut</th>
							<th style="vertical-align:middle" width="20%">Masalah</th>
							<th style="vertical-align:middle">Dokumentasi</th>
              <th style="vertical-align:middle">Arahan Untuk Kemenko Maritim</th>
              <th style="vertical-align:middle" width="10%">Output</th>
							<?php 
							if ($this->uri->segment(3)) {
								?><th style="vertical-align:middle">Action</th><?php
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
              if ($key->tanggal1 != $key->tanggal2) {
                  $jam1 = substr($key->tanggal1, 11,5);
                  $jam2 = substr($key->tanggal2, 11,5);
              }else{
                  //$tanggal2 = substr($data[0]->tanggal2, 5,2)."/".substr($data[0]->tanggal2, 8,2)."/".substr($data[0]->tanggal2, 0,4);
                  $jam1 = substr($key->tanggal1, 11,5);
              }
						?>
						<tr>
							<td><?php echo $i;?></td>
							<td ><?php echo nl2br($key->narasi);?></td>
							<td><?php 
                            if ($key->lokasi == '') {
                              $tempat = '';
                            }else{
                              $tempat = " Di ".$key->lokasi;
                            }

                            if ($key->tanggal1 == $key->tanggal2) {
                               echo date("d-M-Y",strtotime($key->tanggal1));
                            }else{
                                //echo date("d-M-Y",strtotime($key->tanggal1))." "."s/d ".date("d-M-Y",strtotime($key->tanggal2))." ".$tempat;
                              echo date("d-M-Y",strtotime($key->tanggal1));
                            }
                            ?></td>
							<?php 
								if (strlen($key->uraian) > 100) {
									?><td><?php echo substr(nl2br($key->uraian), 0,100);?><span id="uraian_<?php echo $i;?>" class="collapse"><?php echo substr(nl2br($key->uraian), 200) ?></span><a data-toggle="collapse" data-target="#uraian_<?php echo $i;?>"> Readmore..</a></td><?php
								}else{
									?> <td><?php echo nl2br($key->uraian);?></td><?php 
								}
							?>
							<?php 
								if (strlen($key->tindak_ljt) > 100) {
									?><td><?php echo substr(nl2br($key->tindak_ljt), 0,100);?><span id="tindak_ljt_<?php echo $i;?>" class="collapse"><?php echo substr(nl2br($key->tindak_ljt), 300) ?></span><a data-toggle="collapse" data-target="#tindak_ljt_<?php echo $i;?>"> Readmore..</a></td><?php
								}else{
									?> <td><?php echo nl2br($key->tindak_ljt);?></td><?php 
								}
							?>
							<?php 
								if (strlen($key->masalah) > 100) {
									?><td><?php echo substr(nl2br($key->masalah), 0,100);?><span id="masalah_<?php echo $i;?>" class="collapse"><?php echo substr(nl2br($key->masalah), 300) ?></span><a data-toggle="collapse" data-target="#masalah_<?php echo $i;?>"> Readmore..</a></td><?php
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
                if (strlen($key->arahan) > 200) {
              ?><td><?php echo substr(nl2br($key->arahan), 0,200);?><span id="arahan_<?php echo $i;?>" class="collapse"><?php echo substr(nl2br($key->arahan), 200) ?></span><a data-toggle="collapse" data-target="#arahan_<?php echo $i;?>"> Readmore..</a></td><?php
              }else{
              ?> <td><?php echo nl2br($key->arahan);?></td><?php 
              }
              ?>
              <?php 
								if (strlen($key->hasil) > 100) {
									?><td><?php echo substr(nl2br($key->hasil), 0,100);?><span id="hasil_<?php echo $i;?>" class="collapse"><?php echo substr(nl2br($key->hasil), 200) ?></span><a data-toggle="collapse" data-target="#hasil_<?php echo $i;?>"> Readmore..</a></td><?php
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
		<thead valign="middle" >
			<tr>
              <th>No.</th>
              <th>Tanggal Kegiatan</th>
              <th>Pukul</th>
              <th width="20%">Kegiatan</th>
              <th width="15%">Dari</th>
              <th>Peserta Kegiatan</th>
            </tr>
		</thead>
		<tbody>
			<?php
				$i=1;
				foreach ($agenda as $key) {
				if (date('N',strtotime($key->tanggal)) == 1) {$hari = 'Senin';}
              if (date('N',strtotime($key->tanggal)) == 2) {$hari = 'Selasa';}
              if (date('N',strtotime($key->tanggal)) == 3) {$hari = 'Rabu';}
              if (date('N',strtotime($key->tanggal)) == 4) {$hari = 'Kamis';}
              if (date('N',strtotime($key->tanggal)) == 5) {$hari = 'Jumat';}
              if (date('N',strtotime($key->tanggal)) == 6) {$hari = 'Sabtu';}
              if (date('N',strtotime($key->tanggal)) == 7) {$hari = 'Minggu';}
            ?>
            <tr>
              <td><?php echo $i;?></td>
              <!-- <td><?php echo $key->kegiatan;?></td> -->
              <!-- <td><?php if($key->tglPengajuan != '0000-00-00'){echo date("d-M-Y",strtotime($key->tglPengajuan));}else{echo "-";}?></td> -->
              <td><?php echo $hari.", ".date("d-M-Y",strtotime($key->tanggal));?></td>
              <td><?php echo date("G:i",strtotime(substr($key->tanggal, 10)));?></td>
              <td><?php echo $key->kegiatan;?></td>
              <td><?php echo $key->dari;?></td>
              <td><?php 
              if ($key->asdep1 == 1) { echo "ASDEP 1<br/>";}
              if ($key->asdep2 == 1) { echo "ASDEP 2<br/>";}
              if ($key->asdep3 == 1) { echo "ASDEP 3<br/>";}
              if ($key->asdep4 == 1) { echo "ASDEP 4<br/>";}
              if ($key->sesdep == 1) { echo "SESDEP <br/>";}
              if ($key->deputi == 1) { echo "DEPUTI <br/>";}?></td>
             
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
              $('#progress').DataTable({
                order : [3, 'ASC']
              });
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
                <script type="text/javascript">
                  $(function() {

                    $('input[name="datefilter"]').daterangepicker({
                        autoUpdateInput: false,
                        locale: {
                            cancelLabel: 'Clear'
                        }
                    });

                    $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
                        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
                    });

                    $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
                        $(this).val('');
                    });

                  });
                  </script>
