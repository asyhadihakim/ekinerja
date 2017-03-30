<option value=''>PILIH</option>
<?php 
foreach($query->result() as $data)
{
  echo '<option value="'.$data->idsubkat3.'">'.$data->namasubkategori3.'</option>';
} 
?>