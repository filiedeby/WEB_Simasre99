
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
					
					<div class="table-responsive">
                       <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr class="table-info">
                                    <th width="10%">config</th>
                                    <th width="10%">Step Point</th>
                                    <th width="20%">Step Konten</th>
                                    <th width="15%">Gambar</th>
                                    <th width="30%">Isi Konten</th>
                                    <th width="5%">Bahasa</th>
                                    <th width="10%">status</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($c_clm as $row) : 
								
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
								
								$idpoint = $row['id_claim'];
								
								// var_dump($idpoint);
								if ($idpoint == '1' || $idpoint == '7'){
									$point = 'step 1';
								}
								if ($idpoint == '2' || $idpoint == '8'){
									$point = 'step 2';
								}
								if ($idpoint == '3' || $idpoint == '9'){
									$point = 'step 3';
								}
								if ($idpoint == '4' || $idpoint == '10'){
									$point = 'step 4';
								}
								if ($idpoint == '5' || $idpoint == '11'){
									$point = 'step 5';
								}
								if ($idpoint == '6' || $idpoint == '12'){
									$point = 'step 6';
								}
								
								
								
								
								?>
                                    <tr>
                                        <td style="font-size:11px;">
                                            <a href="<?= site_url('admin/editclm/' . $row['id_claim']) ?>" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"><i class="fa fa-edit"></i> </a>
                                        </td>
                                        <td style="font-size:11px;"><?= $point; ?></td>
										<td style="font-size:11px;"> <?= $row['point']; ?></td>
                                        <td> <img src="<?= base_url('assets/images/klaim/').$row['image']; ?>" alt="flow<?= $row['id_claim']; ?>" height="80"> </td>
                                        <td style="font-size:10px;"><?= $row['isi_kontak']; ?></td>
                                        <td>
										<img src="<?= base_url('assets/images/flags/').$lang; ?>" alt="<?= $lang; ?>" height="15">
										
										</td>
                                        <td><?= $stat; ?></td>

                                    </tr>
                                <?php endforeach; ?>
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
					order: [[1, 'asc']],
				});
			});
		</script>
		
		<script type="text/javascript">			
		var timeout = 4000;
		$('.hide-it').delay(timeout).fadeOut(300);
		</script>
		 



  </body>
</html>