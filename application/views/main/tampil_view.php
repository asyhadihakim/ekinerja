<ul class="breadcrumb">
  <li><a href="<?php echo base_url();?>">Home</a></li>
  <li class="active">Tampil</li> 
</ul>

<div class="col-lg-12 col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">Daftar Kategori & SubKategori</div>
<div class="panel-body">
<ul class="list-group">

<?php foreach($dt as $key => $val){?>
  <li class="list-group-item list-group-item-success"><a href="#"><?php echo $val['nama'];?></a></li>
  <?php for ($y=0;$y<(count($val)-1);$y++){?>
	<li class="list-group-item list-group-item-info"><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;- <?php echo $val[$y]['nama'];?></a></li>  
	<?php for($z=0;$z<(count($val[$y])-1);$z++) {?>
		<li class="list-group-item list-group-item-warning"><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- <?php echo $val[$y][$z]['nama'];?></a> </li> 
	<?php for($x=0;$x<(count($val[$y][$z])-1);$x++) {?>
		<li class="list-group-item list-group-item-warning"><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- <?php echo $val[$y][$z][$x];?></a> </li> 	
 <?php 
			}
		}
	}
 } ?>
 </ul>

</div>
</div>
</div>

<script>
$(document).ready(function(){
    $("#hide").click(function(){
        $("#list").hide(1000);
    });
    $("#show").click(function(){
        $("#list").show(1000);
    });
});
</script>

		