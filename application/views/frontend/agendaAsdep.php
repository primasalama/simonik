<?php
	$nama_file = "Agenda_".$filename."_".date("Ymd").".xls";
	if ($filename == null) {
		$span = 9;
	}else{
		$span = 9;
	}
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
	header("Content-type: application/vnd-ms-excel");
	header("Content-Type: application/force-download");
	header("Content-Type: application/octet-stream");
	header("Content-Type: application/download");
	header("Content-Disposition: attachment;filename=".$nama_file."");
	header("Content-Transfer-Encoding: binary ");
?>
<table width="100%" border="1" cellpadding="5" cellspacing="0">
<tr>
	<td colspan="<?php echo $span;?>" align="center"><h2><strong>AGENDA RENCANA KEGIATAN KEBIJAKAN STRATEGIS TAHUN 2017</strong></h2></td>
</tr>
<tr>
<?php 
	if ($filename != null) {
		switch ($filename) {
			case 'asdep1':
				$title ="ASISTEN DEPUTI SUMBER DAYA HAYATI";
				echo '<td colspan="'.$span.'" align="center"><h2><strong>'.$title.'</strong></h2></td>';
				break;
			case 'asdep2':
				$title ="ASISTEN DEPUTI SUMBER DAYA MINERAL, ENERGI, DAN NON KONVESIONAL";
				echo '<td colspan="'.$span.'" align="center"><h2><strong>'.$title.'</strong></h2></td>';
				break;
			case 'asdep3':
				$title ="ASISTEN DEPUTI JASA KEMARITIMAN";
				echo '<td colspan="'.$span.'" align="center"><h2><strong>'.$title.'</strong></h2></td>';
				break;
			case 'asdep4':
				$title ="ASISTEN DEPUTI LINGKUNGAN DAN KEBENCANAAN MARITIM";
				echo '<td colspan="'.$span.'" align="center"><h2><strong>'.$title.'</strong></h2></td>';
				break;
			default:
				echo "a";
				break;
		}
	}
?>
</tr>
<tr>
	<td colspan="<?php echo $span;?>" align="center"><h2><strong>TAHUN <?php echo date("Y");?></strong></h2></td>
</tr>
<tr height="20">
</tr>
<tr>
	<th align="center" style="vertical-align:top;">NO</th>
	<th align="center" style="vertical-align:top;">Tanggal Kegiatan</th>
    <th align="center" style="vertical-align:top;">Pukul</th>
    <th align="center" style="vertical-align:top;">Kegiatan</th>
    <th align="center" style="vertical-align:top;">Dari</th>
    <th align="center" style="vertical-align:top;">Peserta Kegiatan</th>
	
</tr>
<tr>
	<th colspan="<?php echo $span;?>"><center><strong><?php echo $filename;?></strong></center></th>
</tr>
<?PHP
$data = $this->M_agenda->getAllExcel($filename);
// print_r($data->num_rows());die();
if ($data->num_rows() == 0) {
	# code...
	// exit();
}else{
	$i=1;
foreach($data->result() as $key){
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
    <td><?php echo $hari.", ".date("d-M-Y",strtotime($key->tanggal));?></td>
    <td><?php echo date("G:i",strtotime(substr($key->tanggal, 10)));?></td>
    <td><?php echo $key->kegiatan;?></td>
    <td><?php echo $key->dari;?></td>
    <td><?php 
              if ($key->asdep1 == 1) { echo "ASDEP 1<br/>";}
              if ($key->asdep2 == 1) { echo "ASDEP 2<br/>";}
              if ($key->asdep3 == 1) { echo "ASDEP 3<br/>";}
              if ($key->asdep4 == 1) { echo "ASDEP 4<br/>";}
              if ($key->sesdep == 1) { echo "SESDEP<br/>";}
              if ($key->deputi == 1) { echo "DEPUTI<br/>";}?></td>
</tr>
<?php
$i++;
}
}

?>	
</table>