
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <?php //$this->load->view('admin/include/adm-head');?>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>DAIDAN | Administrator &amp; Website</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url(); ?>adminassets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url(); ?>adminassets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>adminassets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>adminassets/img/favicons/favicon.ico">
    <link rel="manifest" href="../adminassets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="<?= base_url(); ?>adminassets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="<?= base_url(); ?>adminassets/js/config.js"></script>
    <script src="<?= base_url(); ?>adminassets/vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="../adminassets/vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
    <link href="../adminassets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="../adminassets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="../adminassets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="../adminassets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <script>
      var isRTL = JSON.parse(localStorage.getItem('isRTL'));
      if (isRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>
	

 
 </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container" data-layout="container">

        <nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
          
        <?php $this->load->view('admin/include/adm-logo');?>  
        <?php $this->load->view('admin/include/adm-leftmenu');?>  
		
        </nav>
        <div class="content">
		<?php $this->load->view('admin/include/adm-topmenu');?>
		
		<div class="card mb-3">
            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(<?= base_url(); ?>adminassets/img/icons/spot-illustrations/corner-4.png);">
            </div>
            <!--/.bg-holder-->

            <div class="card-body position-relative">
              <div class="row">
                <div class="col-md-12 col-lg-12">
                  <h3><?= $title; ?></h3>
				  
				  <div style="text-align: right; padding-right:60px;">
				  <a href="https://www.embed-map.com" class="btn btn-outline-danger rounded-pill me-1 mb-1" type="button" target="_blank"> <span class="fas fa-map-marked-alt me-2" data-fa-transform="shrink-1"></span>Link Generate Map</a>
				  </div>
				  <hr/>
                  
					<div class="hide-it">
					<!-- Menampilkan flashh data (pesan saat data berhasil disimpan)-->
					<?php if ($this->session->flashdata('message')) :
						echo $this->session->flashdata('message');
					endif; ?>
					</div>
					
					<div class="container">
					

								
								<form action="<?php echo base_url('Admin/simpanmap'); ?>" method="post" enctype="multipart/form-data">
									<div class="row">
								
										<div class="row mb-3">
										  <label class="col-sm-2 col-form-label col-form-label-sm" for="colFormLabelSm">Pilih Bahasa</label>
										  <div class="col-sm-10">
										  
											
											<div class="form-check form-check-inline">
											  <input class="form-check-input" id="inlineRadio1" type="radio" name="bhs" value="IDN" checked=""/>
											  <label class="form-check-label" for="inlineRadio1">Bahasa Inggris</label>
											</div>
											<div class="form-check form-check-inline">
											  <input class="form-check-input" id="inlineRadio2" type="radio" name="bhs" value="ENG" />
											  <label class="form-check-label" for="inlineRadio2">Bahasa Indonesia</label>
											</div>
											
										  </div>
										</div>
										
										<div class="row mb-3">
										  <label class="col-sm-2 col-form-label col-form-label-sm" for="ins">Title</label>
										  <div class="col-sm-10">
											<input class="form-control form-control-sm" id="ins" type="text" placeholder="Title lokasi" name="title" value="" />
										  </div>
										</div>
										
										<div class="row mb-3">
											  
										<label class="col-sm-2 col-form-label col-form-label-sm" for="exampleFormControlTextarea1">Embeded Map</label>
										<div class="col-sm-10">

										<textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="embed"></textarea>

										</div>
										</div>
										
									
										
										
									
										

										<div class="row mb-3">
										  <div class="col-sm-2"></div>
										 <div class="col-sm-3 d-grid gap-2"> 
										   <a class="btn btn-outline-primary me-1 mb-1" type="icon" href="<?= base_url('Admin/mn4f'); ?>">Kembali</a>
										   </div>
											
											<div class="col-sm-7 d-grid gap-2">  
											<button class="btn btn-outline-danger me-1 mb-1" type="submit" value="Simpan">Simpan</button>									
										  </div>
										</div>

									</div>
								</form>	
								
					</div>
					
                </div>
              </div>
            </div>
          </div>
		  
		  
		  
          <footer class="footer">
            <?php $this->load->view('admin/include/footer');?>
          </footer>
        </div>
        
      </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->
 <?php $this->load->view('admin/include/adm-custom');?>




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
  	<?php $this->load->view('admin/include/adm-javascriptdefault'); ?>


<!-- 		
	<script src="../adminassets/vendors/popper/popper.min.js"></script>
    <script src="../adminassets/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="../adminassets/vendors/anchorjs/anchor.min.js"></script>
    <script src="../adminassets/vendors/is/is.min.js"></script>
    <script src="../adminassets/vendors/echarts/echarts.min.js"></script>
    <script src="../adminassets/vendors/fontawesome/all.min.js"></script>
    <script src="./adminassets/vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="../adminassets/vendors/list.js/list.min.js"></script>
    <script src="../adminassets/js/theme.js"></script> -->
	
	<script src="../adminassets/vendors/tinymce/tinymce.min.js"></script>
	<script>
		tinymce.init({
		  selector: 'textarea#default',
		  menubar: false,
		  plugins: [
		 'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
			   'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
			   'powerpaste','fullscreen','formatpainter','insertdatetime','table','help','wordcount'
			 ],
		  
		  powerpaste_word_import: 'clean',
		  powerpaste_html_import: 'clean',
		  branding: false,
		  statusbar: false,
		});
	</script>
	
	<script type="text/javascript">			
		var timeout = 4000;
		$('.hide-it').delay(timeout).fadeOut(300);
	</script>
	
	

  </body>

</html>
