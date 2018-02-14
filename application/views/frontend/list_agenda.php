<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

<div class="well well-sm">
    <div class="container">
        <div class="row">
        	<div class="col-md-12">
                <ol class="breadcrumb" style="margin-bottom: 0;">
                    <li class="active">
                    <a href="<?php echo base_url();?>">
                        <span class="glyphicon glyphicon-home"></span> Beranda
                    </a>
                    </li>
                </ol>
        	</div>
        </div>
    </div>
</div>
<div class="container">
	<div class="collapse navbar-collapse">
        <ul class="nav navbar-nav" style="text-align:center">
            <a href="<?php echo base_url();?>agenda/asdep1" class="btn btn-default navbar-btn" style="background-color:#0067b5; color: #CCCCCC;">Agenda Asdep1</a>
            <a href="<?php echo base_url();?>agenda/asdep2" class="btn btn-default navbar-btn" style="background-color:#0067b5; color: #CCCCCC;">Agenda Asdep2</a>
            <a href="<?php echo base_url();?>agenda/asdep3" class="btn btn-default navbar-btn" style="background-color: #0067b5; color: #CCCCCC;">Agenda Asdep3</a>
            <a href="<?php echo base_url();?>agenda/asdep4" class="btn btn-default navbar-btn" style="background-color: #0067b5; color: #CCCCCC;">Agenda Asdep4</a>
            <a href="<?php echo base_url();?>agenda/deputi" class="btn btn-default navbar-btn" style="background-color: #0067b5; color: #CCCCCC;">Agenda Deputi</a>
            <a href="<?php echo base_url();?>Sesdep" class="btn btn-default navbar-btn" style="background-color: #0067b5; color: #CCCCCC;">Agenda Sesdep</a>
            <a href="<?php echo base_url();?>Sesdep" class="btn btn-default navbar-btn" style="background-color: #0067b5; color: #CCCCCC;">Login Agenda</a>
        </ul>
	</div>
	<div class="panel panel-default">
    	<div class="panel-body">
        <div class="well well-sm">
    <div class="container">

	
	<ol class="breadcrumb" style="margin-top: 30px;">
  <?php 
  
  if ($this->uri->segment(2) != null) {
    ?>
    <li class="breadcrumb-item"><a href="<?php echo base_url().$this->uri->segment(1);?>"><?php echo $this->uri->segment(1);?></a></li>
    <li class="breadcrumb-item active"><?php echo $this->uri->segment(2);?></li>
    <?php
  }else{
    ?>
    <li class="breadcrumb-item active"><?php echo $this->uri->segment(1);?></li>
    <?php
  }
  if ($this->uri->segment(2) != null) {
    ?>
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
                            <li><a href="<?php echo base_url();?>beranda/excels/agenda/deputi">Deputi</a></li>
                            <li><a href="<?php echo base_url();?>beranda/excels/agenda/sesdep">Sesdep</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url();?>beranda/excels/agenda">Semua</a></li>
                          </ul>
                        </div>
                    </li><?php
  }else{
    ?>
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
                            <li><a href="<?php echo base_url();?>beranda/excels/agenda/deputi">Deputi</a></li>
                            <li><a href="<?php echo base_url();?>beranda/excels/agenda/sesdep">Sesdep</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url();?>beranda/excels/agenda">Semua</a></li>
                          </ul>
                        </div>
                    </li>
    <?php
  }
  if ($this->session->userdata('session')) {
    if ($this->session->userdata('session')[0]->role == 'admin' or $this->session->userdata('session')[0]->role == 'sesdep') {
      echo '<li class="pull-right"><a href="'.base_url().'fagenda/index/'.$this->uri->segment(2).'" class="btn btn-xs btn-info">Tambah</a></li>';
    }
  }

  ?>
  
 
</ol>


	<table id="agenda" class="table table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<!-- <th>kegiatan</th> -->
              <!-- <th>Tanggal Pengajuan</th> -->
							<th>Tanggal Kegiatan</th>
              <th>Pukul</th>
              <th>Tempat</th>
              <th width="20%">Kegiatan</th>
              <th width="15%">Dari</th>
              <th>Peserta Kegiatan</th>
              <?php 
              //if ($this->session->userdata('session'))
              //{
                //if ($this->session->userdata('session')[0]->role == 'sesdep' or $this->session->userdata('session')[0]->role == 'admin') {
                //?>
                <!-- <th>Tanggal Pengajuan SP2D</th>
                <th>Tanggal SP2D</th>
                <th>Tanggal Pencairan</th> -->
                  <?php
                //}
                ?>
                <?php 
                
              //}
              if ($this->session->userdata('session') ) {
                if ($this->session->userdata('session')[0]->role == 'admin' or $this->session->userdata('session')[0]->role == 'sesdep') {
                 ?><th>Action</th><?php
                }
								
							}
							?>
						</tr>
					</thead>
					<tbody>
					<?php
						$i=1;
						foreach ($data as $key) {
              if (date('N',strtotime($key->tanggal)) == 1) {$hari = 'Senin';}
              if (date('N',strtotime($key->tanggal)) == 2) {$hari = 'Selasa';}
              if (date('N',strtotime($key->tanggal)) == 3) {$hari = 'Rabu';}
              if (date('N',strtotime($key->tanggal)) == 4) {$hari = 'Kamis';}
              if (date('N',strtotime($key->tanggal)) == 5) {$hari = 'Jumat';}
              if (date('N',strtotime($key->tanggal)) == 6) {$hari = 'Sabtu';}
              if (date('N',strtotime($key->tanggal)) == 7) {$hari = 'Minggu';}
              if (date('N',strtotime($key->tanggal1)) == 1) {$hari1 = 'Senin';}
              if (date('N',strtotime($key->tanggal1)) == 2) {$hari1 = 'Selasa';}
              if (date('N',strtotime($key->tanggal1)) == 3) {$hari1 = 'Rabu';}
              if (date('N',strtotime($key->tanggal1)) == 4) {$hari1 = 'Kamis';}
              if (date('N',strtotime($key->tanggal1)) == 5) {$hari1 = 'Jumat';}
              if (date('N',strtotime($key->tanggal1)) == 6) {$hari1 = 'Sabtu';}
              if (date('N',strtotime($key->tanggal1)) == 7) {$hari1 = 'Minggu';}
						?>
						<tr>
							<td><?php echo $i;?></td>
              <td><?php  
              if ($key->tanggal1 == null) {
                echo $hari.", ".date("d-M-Y",strtotime($key->tanggal));
              }else{
                echo $hari.", ".date("d-M-Y",strtotime($key->tanggal))." s/d".$hari1.", ".date("d-M-Y",strtotime($key->tanggal1));
              }
              ?></td>
              <td><?php echo date("G:i",strtotime(substr($key->tanggal, 10)));?></td>
              <td><?php echo $key->tempat;?></td>
              <td><?php echo $key->kegiatan;?></td>
              <td><?php echo $key->dari;?></td>
              <td><?php 
              if ($key->asdep1 == 1) { echo "ASDEP 1<br/>";}
              if ($key->asdep2 == 1) { echo "ASDEP 2<br/>";}
              if ($key->asdep3 == 1) { echo "ASDEP 3<br/>";}
              if ($key->asdep4 == 1) { echo "ASDEP 4<br/>";}
              if ($key->sesdep == 1) { echo "SESDEP <br/>";}
              if ($key->deputi == 1) { echo "DEPUTI <br/>";}?></td>
              <?php 
              //if ($this->session->userdata('session')) {
                //if ($this->session->userdata('session')[0]->role == 'sesdep' or $this->session->userdata('session')[0]->role == 'admin') {
                      ?>
                      <!-- <td><?php if($key->tglPengajuanSpd != '0000-00-00'){echo date("d-M-Y",strtotime($key->tglPengajuanSpd));}else{echo "-";}?></td>
                      <td><?php if($key->tglSpd != '0000-00-00'){echo date("d-M-Y",strtotime($key->tglSpd));}else{echo "-";}?></td>
                      <td><?php if($key->tglPencairan != '0000-00-00'){echo date("d-M-Y",strtotime($key->tglPencairan));}else{echo "-";}?></td> -->
                      <?php
                    //}
              //}
                
              ?>
              
              <?php 
              if ($this->session->userdata('session')) {
               if ($this->session->userdata('session')[0]->role == 'admin' or $this->session->userdata('session')[0]->role == 'sesdep') {
                ?>
                <td>
                  <?php 
                  if ($this->session->userdata('session')[0]->role == 'admin') {
                    ?>
                    <a href="#" id="hapus" class="btn btn-md btn-danger"  data-href="<?php echo base_url();?>Agenda/delete/<?php echo $key->no;?>" data-book="<?php echo $key->kegiatan;?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Hapus"></span></a>
                    <?php
                  }else{
                    ?>
                    <a href="#" id="hapus" class="btn btn-md btn-danger"  data-href="<?php echo base_url();?>fagenda/delete/<?php echo $key->no;?>" data-book="<?php echo $key->kegiatan;?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Hapus"></span></a>
                    <?php
                  }
                    ?>
                    <a class="btn btn-warning" href="<?php echo base_url()."f".$this->uri->segment(1);?>/edit/<?php echo $key->no."/".$this->session->userdata('session')[0]->role;?>"><span class="glyphicon glyphicon-edit"></span></a>
                    <?php
                  // }
                  ?>
                  
                </td>
                <?php
              }
              }
							
							?>
						</tr>
						<?php
						$i++;}
					 ?>
					</tbody>
				</table>
				</div>
			</div>
</div>
</div>
</div>
<style>
.datepicker{z-index:1151 !important;}
</style>
<script type="text/javascript">
            $(document).ready(function() {
              $('#kebijakan').DataTable();
              $('#agenda').DataTable();
              $('#progress').DataTable();
              $('#myModal').on('shown.bs.modal', function () {
				  
				})
          } );
            $(function() {
			    $("body").delegate("#tanggal", function(){
			        $(this).datepicker();
			    });
});
</script>

<!-- Delete -->
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