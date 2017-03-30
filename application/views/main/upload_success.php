<h3>File Sukses di Upload</h3>

<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>

<p><?php echo anchor('dashboard/upload_dokumen', 'Upload File Lain ?'); ?></p>