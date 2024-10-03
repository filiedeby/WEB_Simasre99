
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
					<a href="<?= site_url('admin/tambahmap') ?>" class="btn btn-outline-success me-1 mb-1" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah Data"><i class="fas fa-plus-circle" style="color:blue"></i> &nbsp;&nbsp;&nbsp; Tambah Data&nbsp;&nbsp;&nbsp;</a>
					</div>
					
					
					
					<div class="table-responsive">
                       <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr class="table-info">
                                    <th width="5%">No</th>
                                    <th width="20%"></th>
                                    <th width="20%">Title</th>
                                    <th width="15%">Map(embed code) uk. 500 x 400px</th>
                                    <th width="10%">Bahasa</th>
                                    <th width="10%">Status</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php 
								
								$nox = '1';
								foreach ($c_map as $row) : 
								
								// var_dump($row);
								$bhs = $row['bahasa'];
								if ($bhs == 'ENG'){
									$lang = "id.png";
								}
								else{
									$lang = "us.png";
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
                                            <a href="<?= site_url('admin/editmap/' . $row['id']) ?>" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"><i class="fa fa-edit"></i> </a>
											
											
											<a href="<?= site_url('admin/hapusmap/' . $row['id']) ?>" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data"><i class="far fa-trash-alt"></i> </a>
																					

											
												<div class="btn-group" role="group">
												<button class="btn btn-primary btn-sm dropdown-toggle" id="btnGroupVerticalDrop1" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-toggle="tooltip" data-bs-placement="top" title="Ganti Status"><i class="far fa-check-circle"></i> </button>
												<div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
													<a class="dropdown-item" href="<?= site_url('admin/edit_statusmap/'.$row['id'].'/akt') ?>">On</a>
													<a class="dropdown-item" href="<?= site_url('admin/edit_statusmap/'.$row['id'].'/off') ?>">Off</a>
												</div>
												</div>
											
											
                                        </td>
                                        
                                        <td style="font-size:11px;"><?= $row['titlemap']; ?></td>
                                        <td style="font-size:11px;"><?= $row['embed_map']; ?></td>
                                        <td>
										<img src="<?= base_url('assets/img/flags/').$lang; ?>" alt="<?= $lang; ?>" height="15">
										
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