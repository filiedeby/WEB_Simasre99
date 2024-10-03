
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <?php $this->load->view('admin/include/adm-head');?>

	<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">

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
            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(<?=base_url(); ?>adminassets/img/icons/spot-illustrations/corner-4.png);">
            </div>
            <!--/.bg-holder-->

            <div class="card-body position-relative">
              <div class="row">
                <div class="col-lg-12">
                  <h3><?= $title; ?></h3>
                  
					<div class="hide-it">
					<!-- Menampilkan flashh data (pesan saat data berhasil disimpan)-->
					<?php 
					if ($this->session->flashdata('message')) :
						echo $this->session->flashdata('message');
					endif; 
					?>
					</div>
					<div class="col text-end mb-3">
					<a href="<?= site_url('admin/tambahtesti') ?>" class="btn btn-outline-success me-1 mb-1" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah Data"><i class="fa fa-plus-circle" style="color:red"></i> &nbsp;&nbsp;&nbsp; Tambah Data&nbsp;&nbsp;&nbsp;</a>
					</div>
					
					
					<div class="table-responsive">
                       <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr class="table-info">
                                    <th width="5%">No</th>
                                    <th width="30%"></th>
                                    <th width="20%">Gambar</th>
                                    <th width="30%">Isi URL Konten</th>
                                    <th width="5%">Bahasa</th>
                                    <th width="10%">Status</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php 
								
								$nox = '1';
								foreach ($c_testi as $row) : 
								
								// var_dump($row);
								$bhs = $row['bahasa'];
								if ($bhs == 'ENG'){
									$lang = "us.png";
								}
								else{
									$lang = "id.png";
								}
								
								if ($row['status'] == 'akt'){
									$stat = '<div class="bg-success"><center><span class="fas fa-sun text-white"></span> <b class="text-white">ON</b></center></div>';
								}
								else{
									$stat = '<div class="bg-danger"><center><span class="far fa-moon text-white"></span> <b class="text-white">OFF</b></center></div>';
								}
								// var_dump(base_url('assets/img/flags/').$lang);
								
								$idpoint = $row['id'];
								
								
								
								
								?>
                                    <tr>
                                        
										<td style="font-size:11px;"><?= $nox; ?></td>
										
										
										<td style="font-size:11px;">
                                            <a href="<?= site_url('admin/edittesti/' . $row['id']) ?>" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"><i class="fa fa-edit"></i> </a>
											
											<a href="<?= site_url('admin/hapustesti/' . $row['id']) ?>" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data"><i class="far fa-trash-alt"></i> </a>
																						

											
												<div class="btn-group" role="group">
												<button class="btn btn-primary btn-sm dropdown-toggle" id="btnGroupVerticalDrop1" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-toggle="tooltip" data-bs-placement="top" title="Ganti Status"><i class="far fa-check-circle"></i> </button>
												<div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
													<a class="dropdown-item" href="<?= site_url('admin/edit_statustesti/'.$row['id'].'/akt') ?>">On</a>
													<a class="dropdown-item" href="<?= site_url('admin/edit_statustesti/'.$row['id'].'/off') ?>">Off</a>
												</div>
												</div>
											
											
                                        </td>
                                        <td> <img src="<?= base_url('assets/images/solution/').$row['gbr']; ?>" alt="flow<?= $row['id']; ?>" height="100"> </td>
                                        <td style="font-size:11px;"><?= $row['url']; ?></td>
                                        <td>
										<img src="<?= base_url('assets/images/flags/').$lang; ?>" alt="<?= $lang; ?>" height="15">
										
										</td>
                                        <td><?= $stat; ?></td>

                                    </tr>
                                <?php 
								$nox++;
								endforeach;
								
								?>
                            </tbody>
                        </table>
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

	
	<a class="card setting-toggle" href="#settings-offcanvas" data-bs-toggle="offcanvas">
      <div class="card-body d-flex align-items-center py-md-2 px-2 py-1">
        <div class="bg-soft-primary position-relative rounded-start" style="height:34px;width:28px">
          <div class="settings-popover"><span class="ripple"><span class="fa-spin position-absolute all-0 d-flex flex-center"><span class="icon-spin position-absolute all-0 d-flex flex-center">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.7369 12.3941L19.1989 12.1065C18.4459 11.7041 18.0843 10.8487 18.0843 9.99495C18.0843 9.14118 18.4459 8.28582 19.1989 7.88336L19.7369 7.59581C19.9474 7.47484 20.0316 7.23291 19.9474 7.03131C19.4842 5.57973 18.6843 4.28943 17.6738 3.20075C17.5053 3.03946 17.2527 2.99914 17.0422 3.12011L16.393 3.46714C15.6883 3.84379 14.8377 3.74529 14.1476 3.3427C14.0988 3.31422 14.0496 3.28621 14.0002 3.25868C13.2568 2.84453 12.7055 2.10629 12.7055 1.25525V0.70081C12.7055 0.499202 12.5371 0.297594 12.2845 0.257272C10.7266 -0.105622 9.16879 -0.0653007 7.69516 0.257272C7.44254 0.297594 7.31623 0.499202 7.31623 0.70081V1.23474C7.31623 2.09575 6.74999 2.8362 5.99824 3.25599C5.95774 3.27861 5.91747 3.30159 5.87744 3.32493C5.15643 3.74527 4.26453 3.85902 3.53534 3.45302L2.93743 3.12011C2.72691 2.99914 2.47429 3.03946 2.30587 3.20075C1.29538 4.28943 0.495411 5.57973 0.0322686 7.03131C-0.051939 7.23291 0.0322686 7.47484 0.242788 7.59581L0.784376 7.8853C1.54166 8.29007 1.92694 9.13627 1.92694 9.99495C1.92694 10.8536 1.54166 11.6998 0.784375 12.1046L0.242788 12.3941C0.0322686 12.515 -0.051939 12.757 0.0322686 12.9586C0.495411 14.4102 1.29538 15.7005 2.30587 16.7891C2.47429 16.9504 2.72691 16.9907 2.93743 16.8698L3.58669 16.5227C4.29133 16.1461 5.14131 16.2457 5.8331 16.6455C5.88713 16.6767 5.94159 16.7074 5.99648 16.7375C6.75162 17.1511 7.31623 17.8941 7.31623 18.7552V19.2891C7.31623 19.4425 7.41373 19.5959 7.55309 19.696C7.64066 19.7589 7.74815 19.7843 7.85406 19.8046C9.35884 20.0925 10.8609 20.0456 12.2845 19.7729C12.5371 19.6923 12.7055 19.4907 12.7055 19.2891V18.7346C12.7055 17.8836 13.2568 17.1454 14.0002 16.7312C14.0496 16.7037 14.0988 16.6757 14.1476 16.6472C14.8377 16.2446 15.6883 16.1461 16.393 16.5227L17.0422 16.8698C17.2527 16.9907 17.5053 16.9504 17.6738 16.7891C18.7264 15.7005 19.4842 14.4102 19.9895 12.9586C20.0316 12.757 19.9474 12.515 19.7369 12.3941ZM10.0109 13.2005C8.1162 13.2005 6.64257 11.7893 6.64257 9.97478C6.64257 8.20063 8.1162 6.74905 10.0109 6.74905C11.8634 6.74905 13.3792 8.20063 13.3792 9.97478C13.3792 11.7893 11.8634 13.2005 10.0109 13.2005Z" fill="#2A7BE4"></path>
                  </svg></span></span></span></div>
        </div><small class="text-uppercase text-primary fw-bold bg-soft-primary py-2 pe-2 ps-1 rounded-end">customize</small>
      </div>
    </a>
    


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <?php $this->load->view('admin/include/adm-javascriptdefault'); ?>

		 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
		 <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
		 <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
		 
		 <script>
			$(document).ready(function () {
				$('#example').DataTable({
					order: [[0, 'desc']],
				});
			});
		</script>
		
		<script type="text/javascript">			
		var timeout = 4000;
		$('.hide-it').delay(timeout).fadeOut(300);
		</script>
		 



  </body>
</html>