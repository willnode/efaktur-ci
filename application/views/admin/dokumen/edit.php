<?= form_open("admin/user/update/$data->dokumen_id") ?>
<?php control_file(['name'=>'dokumen_file', 'label'=>'File', 'value'=>$data->dokumen_file, 'folder'=>'dokumen']) ?>
<?php control_input(['name'=>'dokumen_nama', 'label'=>'Nama', 'value'=>$data->dokumen_nama, 'placeholder'=>'']) ?>
<?php control_submit() ?>
<?= form_close() ?>
