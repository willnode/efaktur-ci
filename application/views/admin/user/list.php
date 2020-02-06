
<div id="toolbar">
  <a href="create" class="btn btn-success ml-2"><i class="fa fa-plus mr-2"></i>New</a>
</div>

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
      <th data-field="name">Name</th>
      <th data-field="hp">HP</th>
      <th
        data-field="login_id"
        data-formatter="actionFormat"
        data-width="150"
        data-align="center"
        >Action</th>
    </tr>
  </thead>
</table>

<script>
function actionFormat(value) {
	return `
	<a href="detail/${value}" class="btn btn-sm btn-success"><i class="fa fa-external-link"></i></a>
	<a href="edit/${value}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
	<a href="delete/${value}" onclick="return confirm('Are you sure?')"
	class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
	`;
}
</script>