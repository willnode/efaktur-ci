<div class="text-center">
	<p><img style="height:256px" src="<?=base_url($profile->avatar ? "uploads/avatar/$profile->avatar" : 'assets/user.png')?>"></p>
	<h1>Selamat Datang, <?= $profile->name ?></h1>
	<div class="btn-group">
		<a href="<?=base_url('user/profil')?>" class="btn btn-lg btn-primary">Edit Profil</a>
		<a href="<?=base_url('user/dokumen')?>" class="btn btn-lg btn-primary">Lihat Dokumen / Faktur</a>
	</div>
</div>