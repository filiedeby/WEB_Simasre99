<script>
	var navbarStyle = localStorage.getItem("navbarStyle");
	if (navbarStyle && navbarStyle !== 'transparent') {
	  document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
	}
  </script>
  <div class="d-flex align-items-center">
	<div class="toggle-icon-wrapper">

	  <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

	</div><a class="navbar-brand" href="<?= base_url(); ?>">
	  <div class="d-flex align-items-center py-3"><img class="me-2" src="<?= base_url(); ?>assets/images/lgsimasre.png" alt="" width="110" /><span class="font-sans-serif"></span>
	  </div>
	</a>
  </div>
