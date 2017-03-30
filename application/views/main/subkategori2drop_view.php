<option value=''>PILIH</option>
<?php 
foreach($query->result() as $data)
{
  echo '<option value="'.$data->idsubkat2.'">'.$data->namasubkategori2.'</option>';
} 
?>