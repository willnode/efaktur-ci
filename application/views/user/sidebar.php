<div class="app-sidebar colored">
	<div class="sidebar-header">
		<a class="header-brand" href="<?=base_url('user/')?>">
			<div class="logo-img">
				<img src="<?=base_url('assets/logo.png')?>" class="header-brand-img w-100" alt="lavalite">
			</div>
			<span class="text">EFAKTUR</span>
		</a>
		<button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik toggle-icon ik-toggle-right"></i></button>
		<button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
	</div>

	<div class="sidebar-content">
		<div class="nav-container">
			<nav id="main-menu-navigation" class="navigation-main">
				<div class="nav-lavel"><?=$username ?> </div>
				<div class="nav-item">
					<a href="<?=base_url('user/')?>"><i class="ik ik-bar-chart-2"></i><span>Beranda</span></a>
				</div>
				<div class="nav-item">
					<a href="<?=base_url('user/profil/')?>"><i class="ik ik-users"></i><span>Profil</span></a>
				</div>
				<div class="nav-item">
					<a href="<?=base_url('user/dokumen/')?>"><i class="ik ik-file-text"></i><span>Dokumen</span></a>
				</div>
			</nav>
		</div>
	</div>
</div>