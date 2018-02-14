<?php 
	if ($this->session->userdata('session')[0]->role == 'admin') {
		$action = base_url()."Agenda/add";
	}else{
		$action = base_url().$this->uri->Segment(1)."/add";
	}
?>
<div class="well well-sm">
    <div class="container">
        <div class="row">
        	<div class="col-md-8">
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
<div class="container" >
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url();?>agenda">Agenda</a></li>
        <li class="breadcrumb-item active">Tambah Agenda</li>
    </ol>
    <div class="panel panel-info">
                <div class="panel-heading">Form</div>
                <div class="panel-body">
                    <div id="FormLogin" class="col-sm-7">
                        <form action="<?php echo $action;?>" method="post" enctype="multipart/form-data">
                                   <!--  <div class="form-group">
                                        <label>Narasi</label>
                                        <select class="form-control" name="narasiKebijakan">
                                                <?php 
                                                foreach ($data as $key) {
                                                    ?>
                                                    <option value="<?php echo $key->no?>"><?php echo $key->narasi?></option>
                                                    <?php
                                                }
                                                ?>
                                        </select>
                                    </div> -->
                                    <div class="form-group">
                                        <label>Tanggal Awal Kegiatan : </label>
                                        <input type="text" name="tanggal" id="tanggal" class="form-control" placeholder="Tanggal Awal Penyelengaaraan" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Akhir Kegiatan : </label>
                                        <input type="text" name="tanggal1" id="tanggal1" class="form-control" placeholder="Tanggal Akhir Penyelengaaraan" >
                                    </div>
                                    <div class="form-group">
                                        <label>Waktu Kegiatan (pukul) : </label>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Jam</label>
                                                <select name="jam" class="form-control">
                                                <?php
                                                for ($i=0; $i <= 23; $i++) { 
                                                    echo "<option>".$i."</option>";
                                                }
                                                ?>
                                            </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Menit </label>
                                                <select name="menit" class="form-control">
                                                <?php
                                                for ($i=0; $i <= 59; $i++) { 
                                                    echo "<option>".$i."</option>";
                                                }
                                                ?>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Kegiatan : </label>
                                        <input type="text" name="tempat" class="form-control" placeholder="Tempat Kegiatan" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label>Kegiatan : </label>
                                        <textarea class="form-control" name="uraian" rows="5" placeholder="Uraian" required="true"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Penyelenggara Kegiatan (dari): </label>
                                        <textarea class="form-control" name="dari" rows="2" placeholder="Dari" required="true"></textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Peserta Kegiatan (yang menghadiri): </label>
                                        <!-- <textarea class="form-control" name="yg_menghadiri" rows="2" placeholder="yang menghadiri" required="true"></textarea> -->
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="asdep1" value="1">
                                                Asdep 1
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="asdep2" value="1">
                                                Asdep 2
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="asdep3" value="1">
                                                Asdep 3
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="asdep4" value="1">
                                                Asdep 4
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="sesdep" value="1">
                                                Sesdep
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="deputi" value="1">
                                                Deputi
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="submit" value="Submit" class="btn btn-primary">
                                        <input type="reset" value="Reset" class="btn btn-warning">
                                    </div>
                                </form>
                    </div>
                    <div class="col-sm-5 alert alert-success">
                        <p class="heading"><h4><b>Tata Cara Pengisian</b> : </h4></p>
                        <ol>
                            <li>Memilih narasi kebijakan sesuai dengan agenda yang akan dilakukan</li>
                            <li>Mengisi Waktu/Tanggal dengan format. Contoh: Minggu I Januari/ 04</li>
                            <li>Mengisi Uraian tentang isi dari agenda yang akan dilakukan</li>
                            <li>Mengisi Output dari agenda</li>
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
        $( '#tanggal1' ).datepicker();
        $( '#tglPengajuan' ).datepicker();
        $('#pukul').bootstrapMaterialDatePicker({
        	date: false,
        	format : 'HH:mm'
        });
      });
  </script>
