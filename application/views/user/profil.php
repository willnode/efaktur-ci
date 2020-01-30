<?= form_open_multipart("user/profil/update/", ['autocomplete'=>'off']) ?>
<?php control_input(['name'=>'name', 'label'=>'Name', 'value'=>$data->name]) ?>
<?php control_input(['name'=>'hp', 'label'=>'HP', 'value'=>$data->hp]) ?>
<?php control_image(['name'=>'avatar', 'label'=>'Avatar', 'folder'=>'avatar', 'value'=>$data->avatar]) ?>
<hr>
<?php control_input(['disabled'=>'y', 'label'=>'Username', 'value'=>$data->username]) ?>
<?php control_input(['name'=>'password', 'label'=>'Password', 'value'=>'', 'type'=>'password', 'autocomplete'=>"new-password"]) ?>
<?php control_input(['name'=>'passconf', 'label'=>'Password Confirmation', 'value'=>'', 'type'=>'password']) ?>
<?php control_submit() ?>
<?= form_close() ?>