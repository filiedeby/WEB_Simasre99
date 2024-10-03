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
        <script>
          // var isFluid = JSON.parse(localStorage.getItem('isFluid'));
          // if (isFluid) {
            // var container = document.querySelector('[data-layout]');
            // container.classList.remove('container');
            // container.classList.add('container-fluid');
          // }
        </script>
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
                  
					<div>
					<!-- Menampilkan flashh data (pesan saat data berhasil disimpan)-->
					<?php if ($this->session->flashdata('message')) :
						echo $this->session->flashdata('message');
					endif; ?>
					</div>
					
					<div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr class="table-info">
                                    <th></th>
                                    <th>title</th>
                                    <th>detail</th>
                                    <th>Bahasa</th>
                                    <th>stat</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($c_history as $row) : 
								$bhs = $row->bahasa;
								
								if($bhs == 'IDN'){
									$flg = 'us.png';
								}
								else if($bhs == 'ENG'){
									$flg = 'id.png';
								}
								else{
									$flg = '';
								}
								
								?>
                                    <tr>
                                        <td>
                                            <a href="<?= site_url('admin/edithistory/' . $row->id_history) ?>" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"><i class="fa fa-edit"></i> </a>
                                           
                                        </td>
                                        <td><?= $row->title ?></td>
                                        <td><?= $row->isi ?></td>
                                        <td>
										<img src="<?= base_url('assets/img/flags/').$flg; ?>" alt="<?= $bhs ?>" width="50">
										</td>
                                        <td><?= $row->status ?></td>

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
			<script type="text/javascript">			
		var timeout = 4000; // in miliseconds (3*1000)
		$('.hide-it').delay(timeout).fadeOut(300);

		</script>


  </body>

</html>