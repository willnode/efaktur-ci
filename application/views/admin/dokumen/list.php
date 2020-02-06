<?php if (isset($profile)) : ?>
<h1><?=$profile->name?></h1>
<p class='text-muted'><?=$profile->hp?></p>

<div id="toolbar">
  <a href="create?login_id=<?=$profile->login_id?>" class="btn btn-success ml-2"><i class="fa fa-plus mr-2"></i> Tambah Baru</a>
</div>
<?php endif ?>

<table
  id="table"
  data-toggle="table"
  data-toolbar="#toolbar"
  data-toolbar-align="right"
  data-search="true"
  data-side-pagination="server"
  data-pagination="true"
  data-url="get?login_id=<?=$this->input->get('login_id')?>"
  class="table-sm"
  >
  <thead>
    <tr>
	  <th data-field="dokumen_tgl" data-width="200">Upload</th>
      <th data-field="dokumen_nama">Nama</th>
      <th
        data-field="dokumen_id"
        data-formatter="actionFormat"
        data-width="150"
        data-align="center"
        >Aksi</th>
    </tr>
  </thead>
</table>

<script>
function actionFormat(value, data) {
	return `
	<a download href="<?=base_url('uploads/dokumen/${data.dokumen_file}')?>" class="btn btn-sm btn-success"><i class="fa fa-download"></i></a>
	<a href="delete/${value}" onclick="return confirm('Apakah Anda Yakin ?')"
	class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
	`;
}
</script>