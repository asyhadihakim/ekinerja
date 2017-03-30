<option value=''>PILIH</option>
<?php 
foreach($query->result() as $data)
{
  echo '<option value="'.$data->id.'">'.$data->nama_kategori.'</option>';
} 
?>