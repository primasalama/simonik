<?php 
	if ($this->session->userdata('session')[0]->role == 'admin') {
		$action = base_url()."Agenda/update/".$data[0]->no;
	}else{
		$action = base_url()."fagenda/update/".$data[0]->no;
	}
     //print_r($data);//die();
?>
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
<div class="container" >
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url();?>fagenda">Agenda</a></li>
        <li class="breadcrumb-item active">Ubah Agenda</a></li>
    </ol>
    <div class="panel panel-info">
                <div class="panel-heading">Form</div>
                <div class="panel-body">
                    <div id="FormLogin" class="col-sm-7">
                        <form action="<?php echo  $action;?>" method="post">
							<!-- <div class="form-group">
								<label>Narasi Kebijakan </label>
                                            <select class="form-control" name="narasiKebijakan">
                                                <?php 
                                                foreach ($data1 as $key) {
                                                    ?>
                                                    <option value="<?php echo $key->no?>" <?php 
                                                    if ($key->no == $data[0]->narasiKebijakan) {
                                                        echo "selected";
                                                    }
                                                    ?>><?php echo $key->narasi?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
							</div> -->
							<!-- <div class="form-group">
								<label>Tanggal Pengajuan : </label>
                                 <?php 
                                if ($data[0]->tglPengajuan != '0000-00-00') {
                                ?>
                                 <input type="text" name="tglPengajuan" id="tglPengajuan" class="form-control" value="<?php echo substr($data[0]->tglPengajuan, 5,2)."/".substr($data[0]->tglPengajuan, 8,2)."/".substr($data[0]->tglPengajuan, 0,4);?>">
                                <?php
                                }else{
                                ?>
                                <input type="text" name="tglPengajuan" id="tglPengajuan" class="form-control">
                                <?php
                                }
                                ?>
                               
							</div> -->
                           <div class="form-group">
                                        <label>Tanggal Kegiatan : </label>
                                        <input type="text" name="tanggal" value="<?php echo date("m/d/Y",strtotime($data[0]->tanggal)); ?>" id="tanggal" class="form-control" placeholder="Tanggal Penyelengaaraan" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label>Waktu Kegiatan (pukul) : </label>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Jam</label>
                                                <select name="jam" class="form-control">
                                                <?php
                                                for ($i=0; $i <= 23; $i++) { 
                                                    if (substr($data[0]->tanggal,12,2) == $i) {
                                                        echo "<option selected='true'>".$i."</option>";
                                                    }else{
                                                        echo "<option>".$i."</option>";
                                                    }
                                                    
                                                }
                                                ?>
                                            </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Menit </label>
                                                <select name="menit" class="form-control">
                                                <?php
                                                for ($i=0; $i <= 59; $i++) { 
                                                    if (substr($data[0]->tanggal,15,2) == $i) {
                                                        echo "<option selected='true'>".$i."</option>";
                                                    }else{
                                                        echo "<option>".$i."</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Kegiatan : </label>
                                        <input type="text" name="tempat" value="<?php echo $data[0]->tempat;?>" class="form-control" placeholder="Tempat Kegiatan" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label>Kegiatan : </label>
                                        <textarea class="form-control" name="uraian" rows="5" placeholder="Uraian" required="true"><?php echo $data[0]->kegiatan;?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Penyelenggara Kegiatan (dari): </label>
                                        <textarea class="form-control"  name="dari" rows="2" placeholder="Dari" required="true"><?php echo $data[0]->dari;?></textarea>
                                    </div>
                                   <div class="form-group">
                                        <label>Peserta Kegiatan (yang menghadiri): </label>
                                        <!-- <textarea class="form-control" name="yg_menghadiri" rows="2" placeholder="yang menghadiri" required="true"></textarea> -->
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="asdep1" value="1" <?php if ($data[0]->asdep1 == 1) {echo "checked";}?>>
                                                Asdep 1
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="asdep2" value="1" <?php if ($data[0]->asdep2 == 1) {echo "checked";}?>>
                                                Asdep 2
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="asdep3" value="1" <?php if ($data[0]->asdep3 == 1) {echo "checked";}?>>
                                                Asdep 3
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="asdep4" value="1"<?php if ($data[0]->asdep4 == 1) {echo "checked";}?>>
                                                Asdep 4
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="sesdep" value="1" <?php if ($data[0]->sesdep == 1) {echo "checked";}?>>
                                                Sesdep
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="deputi" value="1" <?php if ($data[0]->deputi == 1) {echo "checked";}?>>
                                                Deputi
                                            </label>
                                        </div>
                                    </div>
							
							
							<!--
							<div class="form-group">
								<label>Status : </label>
								<input type="text" name="status" class="form-control" placeholder="Status" required="true">
							</div>
							-->
							<div class="form-group">
								<input type="submit" value="Submit" class="btn btn-primary">
								<input type="reset" value="Reset" class="btn btn-warning">
							</div>
						</form>
                    </div>
                    <div class="col-sm-5 alert alert-success">
                        <p class="heading"><h4><b>Tata Cara Pengisian</b> : </h4></p>
                        <ol>
                            <li>Mengisi Nama Kegiatan sesuai Kegiatan yang bejalan</li>
                            <li>Mengisi Waktu pelaksanaan dengan Benar</li>
                        </ol>
                    </div>
                </div>
            </div>    
</div>
</body>
</html>
<script>
      $(function() {
        $( '#tanggal' ).datepicker();
        $( '#tglPengajuan' ).datepicker();
        $('#pukul').bootstrapMaterialDatePicker({
        	date: false,
        	format : 'HH:mm'
        });
      });
  </script>
