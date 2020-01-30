
<table
  id="table"
  data-toggle="table"
  data-toolbar="#toolbar"
  data-toolbar-align="right"
  data-search="true"
  data-side-pagination="server"
  data-pagination="true"
  data-url="get"
  class="table-sm"
  >
  <thead>
    <tr>
	  <th data-field="dokumen_tgl" data-width="100">Upload</th>
      <th data-field="dokumen_nama">Nama</th>
      <th
        data-field="id_dokumen"
        data-formatter="actionFormat"
        data-width="150"
        data-align="center"
        >Aksi</th>
    </tr>
  </thead>
</table>

<script>
function actionFormat(value) {
	return `
	<a download href="<?=base_url('dokumen/${value}')?>" class="btn btn-sm btn-success"><i class="fa fa-download"></i></a>
	<a href="delete/${value}" onclick="return confirm('Are you sure?')"
	class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
	`;
}
</script>