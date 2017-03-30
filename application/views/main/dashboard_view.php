 		<script type="text/javascript" class="init">
			$(document).ready(function() {
			$('#example').DataTable();
			} );
			
			$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
		</script>
		 <div class="panel panel-primary">
      <div class="panel-heading">Dashboard</div>
      <div class="panel-body">
<div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-th-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php 
									foreach($query->result() as $data1){
										echo $data1->jumlahdok;
									}
									?></div>
                                    <div>Dokumen</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="<?php echo base_url();?>index.php/admin">View Details</a></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
<div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php 
									foreach($querymaster->result() as $data2){
										echo $data2->jummaster;
									}
									?></div>
                                    <div>Master Kategori</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="<?php echo base_url();?>index.php/admin/master_kategori">View Details</a></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
			<div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php 
									foreach($querysubkat1->result() as $data3){
										echo $data3->jumsubkat1;
									}
									?></div>
                                    <div>Sub Kategori 1</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="<?php echo base_url();?>index.php/admin/sub_kategori">View Details</a></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
				<div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php 
									foreach($querysubkat2->result() as $data4){
										echo $data4->jumsubkat2;
									}
									?></div>
                                    <div>Sub Kategori 2</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="<?php echo base_url();?>index.php/admin/sub_kategori2">View Details</a></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
				<div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php 
									foreach($querysubkat3->result() as $data5){
										echo $data5->jumsubkat3;
									}
									?></div>
                                    <div>Sub Kategori 3</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="<?php echo base_url();?>index.php/admin/sub_kategori3">View Details</a></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                 </div>
                </div>				
				
				
				<div class="col-lg-12 col-md-6">
				  <div class="panel panel-primary">
      <div class="panel-heading">Daftar Kategori Hirarkis</div>
      <div class="panel-body">
		<ul class="list-group">
<?php foreach($dt as $key => $val){?>
  <li class="list-group-item list-group-item-success"><a href="#"><span class="glyphicon glyphicon-folder-open"></span> <?php echo $val['nama'];?></a></li>
  <?php for ($y=0;$y<(count($val)-1);$y++){?>
	<li class="list-group-item list-group-item-info"><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-folder-open"></span> <?php echo $val[$y]['nama'];?></a></li>  
	<?php for($z=0;$z<(count($val[$y])-1);$z++) {?>
		<li class="list-group-item list-group-item-warning"><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-folder-open"></span> <?php echo $val[$y][$z]['nama'];?></a> </li> 
	<?php for($x=0;$x<(count($val[$y][$z])-1);$x++) {?>
		<li class="list-group-item list-group-item-danger"><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-folder-open"></span> <?php echo $val[$y][$z][$x];?></a> </li> 	
 <?php 
			}
		}
	}
 } ?>
 </ul>
</div>
</div>
</div>


<!--
				<div class="col-lg-10 col-md-6">
				<div id="test" class=""></div>
				<script type="text/javascript">
				
					$.ajax({
					url         : "<?php echo base_url();?>index.php/dashboard/get_master",//lokasi dokumen yang berisi data json
					type        : "GET",
					dataType    : "json",//format dokumen
					data        : {get_param : 'value'},
					success     : function(data){
								
						jmlData = data.length;
						var buatTree = "[";
						
						for(a=0;a<jmlData;a++){
							var master = data[a]["mstkat"];
							var subkat1 = data[a]["subkat1"];
							var subkat2 = data[a]['subkat2'];
							var subkat3 = data[a]['subkat3'];
							
						buatTree +=	'{' +
									'"text": "'+master+'"' +
							'}';
							
							if(a!=data.length-1)
							buatTree += ", ";						
							
						}
						
						buatTree += "]";
						
						
					 var $tree = $('#test').treeview({
							color: "#428bca",
							expandIcon: "glyphicon glyphicon-stop",
							collapseIcon: "glyphicon glyphicon-unchecked",
							nodeIcon: "glyphicon glyphicon-user",
							showTags: true,
							enableLinks: true,
							data: buatTree
						});
					}
				});			
				
				</script>			
				
				</div>
				-->
				
