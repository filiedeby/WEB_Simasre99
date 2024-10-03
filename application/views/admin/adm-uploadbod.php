
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <?php $this->load->view('admin/include/adm-head');?>
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
				  <hr/>
                  
					<div class="hide-it">
					<!-- Menampilkan flashh data (pesan saat data berhasil disimpan)-->
					<?php if ($this->session->flashdata('message')) :
						echo $this->session->flashdata('message');
					endif; ?>
					</div>
					
					<div class="container">
								<?php foreach($c_bod as $u){ 
								
								$bh = $u->bahasa;
								
								
								if($bh == 'IDN'){
									$bahasa = 'Bahasa Indonesia';
								}
								else {
									$bahasa = 'Bahasa Inggris';
								}
								
								
								
								?>
								<form action="<?php echo base_url('Admin/aksi_insertbod'); ?>" method="post" enctype="multipart/form-data">
									<div class="row">
										<input type="hidden" name="id" value="<?php echo $u->id; ?>">

										<input type="hidden" name="keytype" value="<?php echo $u->typekey; ?>">
										<input type="hidden" name="grouptype" value="<?php echo $u->type_group; ?>">
								
										
										<div class="row mb-3">
										  <label class="col-sm-3 col-form-label col-form-label-sm" for="languageDropdown">Pilih Bahasa</label>
										  <div class="col-sm-9">
										  
											<select class="form-select form-select-sm" aria-label=".form-select-sm" name="bahasa" id="languageDropdown" required="" />
											<option selected="" disabled="" value="<?php echo $u->bahasa; ?>"><?php echo $bahasa; ?></option>
											<option value="IDN">Bahasa Indonesia</option>
											<option value="ENG">Bahasa English</option>
											</select>
											
										  </div>
										</div>
										
										
										
										<div class="row mb-3">
										  <label class="col-sm-3 col-form-label col-form-label-sm" for="colFormLabelSm"></label>
										  <div class="col-sm-4">
										  
											 <!--
											 <img src="<?= base_url('assets/img/bod/').$u->poto; ?>" alt="flow<?= $u->poto; ?>" height="250" data-bs-toggle="tooltip" data-bs-placement="top" title="Diharuskan upload gambar baru uk. 1024 x 1024 pixel">	
											-->											 
										  </div>
										  
										  
										  <label class="col-sm-5 col-form-label col-form-label-sm" for="colFormLabelSm">Status Jabatan : <br/><b style="font-size: 30px; color: red;"><?php echo $u->type_group; ?></b></label>
																 
										</div>
										
										<!--
										<div class="row mb-3">
										  <label class="col-sm-3 col-form-label col-form-label-sm" for="colFormLabelSm" data-bs-toggle="tooltip" data-bs-placement="top" title="Diharuskan upload gambar baru uk. 1024 x 1024 pixel">Upload Gambar Baru</label>
										  <div class="col-sm-9">

											<input class="form-control" type="file" name="berkasdata" data-bs-toggle="tooltip" data-bs-placement="top" title="Diharuskan upload Poto baru uk. 1024 x 1024 pixel" required />
											 
											 
										  </div>
										</div>
										  -->
										
										<div class="row mb-3">
										  <label class="col-sm-3 col-form-label col-form-label-sm" for="colFormLabelSm">Nama Direksi / Team</label>
										  <div class="col-sm-9">
											<input class="form-control form-control-sm" id="colFormLabelSm" type="text" placeholder="col-form-label-sm" name="nama" value="<?php echo $u->name ?>"  />
										  </div>
										</div>
										
										<div class="row mb-3">
	
										  <label for="titleDropdown" class="col-sm-3 col-form-label col-form-label-sm">Pilih Jabatan Direksi / Team</label>
										  <div class="col-sm-3">										  
											<select id="titleDropdown" class="form-control" name="title" required="">
												<option value="<?php echo $u->title ?>"><?php echo $u->title ?></option>
											</select>
											
										  </div>
										  
										   <label class="col-sm-2 col-form-label col-form-label-sm" for="colFormLabelSm">Detail Jabatan</label>
										   
										    <div class="col-sm-4">
											<input class="form-control form-control-sm" id="colFormLabelSm" type="text" placeholder="(optional) masukan detail title jabatan" name="detgelar" value="<?php echo $u->det_title ?>"  />
										  </div>
										  
										  
										  
										  
										  
										</div>
										
							
																
										
																
										

										<div class="row mb-3">
										  <div class="col-sm-3"></div>
										  <div class="col-sm-9 d-grid gap-2"> 
											<button class="btn btn-outline-danger me-1 mb-1" type="submit" value="Simpan">Simpan</button>									
										  </div>
										</div>

									</div>
								</form>	
								<?php } ?>
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
	<script src="<?= base_url(); ?>adminassets/vendors/tinymce/tinymce.min.js"></script>
	<script>
	
	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

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
	
	<!--
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>	
	-->
	<script src="<?= base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
	<script>
        $(document).ready(function() {
            // Titles in Indonesian
            var titlesInd = [
                {value: 'Komisaris Utama', text: 'Komisaris Utama'},
                {value: 'Komisaris', text: 'Komisaris'},
                {value: 'Asisten komisaris', text: 'Asisten komisaris'},
				
                {value: 'Direktur Utama', text: 'Direktur Utama'},
                {value: 'Direktur', text: 'Direktur'},
                {value: 'Asisten Direktur', text: 'Asisten Direktur'},
				
                {value: 'Manager', text: 'Manager'},
                {value: 'Manager Umum', text: 'Manager Umum'},
                {value: 'Asisten Manager', text: 'Asisten Manager'}

            ];

            // Titles in English
            var titlesEng = [
                {value: 'President Commissioner', text: 'President Commissioner'},
                {value: 'Commissioner', text: 'Commissioner'},
                {value: 'Associate Commissioner', text: 'Associate Commissioner'},
				
				{value: 'President Director', text: 'President Director'},
                {value: 'Director', text: 'Director'},
                {value: 'Associate Director', text: 'Associate Director'},
				
				{value: 'Manager', text: 'Manager'},
				{value: 'General Manager', text: 'General Manager'},
				{value: 'Associate Manager', text: 'Associate Manager'}
            ];

            $('#languageDropdown').change(function() {
                var selectedLanguage = $(this).val();
                var $titleDropdown = $('#titleDropdown');

                // Clear previous options
                $titleDropdown.empty();
                $titleDropdown.append('<option value="">-- Select Title --</option>');

                if (selectedLanguage == 'IDN') {
                    // Populate titles in Indonesian
                    titlesInd.forEach(function(title) {
                        $titleDropdown.append('<option value="' + title.value + '">' + title.text + '</option>');
                    });
                } else if (selectedLanguage == 'ENG') {
                    // Populate titles in English
                    titlesEng.forEach(function(title) {
                        $titleDropdown.append('<option value="' + title.value + '">' + title.text + '</option>');
                    });
                }
            });
        });
    </script>
	

  </body>

</html>