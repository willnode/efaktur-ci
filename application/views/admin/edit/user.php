<?= form_open("admin/user/update/$data->login_id") ?>
<?php control_input(['name'=>'name', 'label'=>'Name', 'value'=>$data->name]) ?>
<?php control_input(['name'=>'hp', 'label'=>'HP', 'value'=>$data->hp]) ?>
<?php control_image(['name'=>'avatar', 'label'=>'Avatar', 'folder'=>'avatar', 'value'=>$data->avatar]) ?>
<hr>
<?php control_input(['name'=>'username', 'label'=>'Username', 'value'=>$data->username]) ?>
<?php control_input(['name'=>'password', 'label'=>'Password', 'value'=>'', 'type'=>'password', 'autocomplete'=>"new-password"]) ?>
<?php control_submit() ?>
<?= form_close() ?>