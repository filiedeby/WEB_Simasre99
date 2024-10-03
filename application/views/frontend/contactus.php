<?php

if(get_cookie('lang_is') === 'en'){

				$jdl = 'Lihat Lokasi';
				$gett = '<h2>Dapatkan <b style="color:red;">Info </b> dari kami</h2>';
				$gettx = '<h3>Kami siap membantu dan menolong mengenai asuransi yang kamu butuhkan.</h3>';

				$kontaxus	= "Kontak Kami ";
				$kontaxinf	= "Lokasi Kantor Kami ";
				$set_nama	= "Nama";
				$set_email	= "Email";
				$set_company= "Nama Perusahaan";
				$set_ph		= "No Telp";
				$set_note	= "Catatan/Komentar/Saran";
				$set_cpt	= "Kode CAPTCHA";
				$set_infcpt	= "input captcha di sini, huruf & angka & besar maupun kecil harus sama";

			}else{
				$jdl = 'contact';	
				$gett = '<h2>Get In <b style="color:red;">Touch</b> With Us</h2>';	
				$gettx = '<h3>We are ready to help and support your insurance need.</h3>';	

				$kontaxus	= "Contact Us ";
				$kontaxinf	= "Office Locations ";
				$set_nama	= "Name";
				$set_email	= "Email";
				$set_company= "Company Name";
				$set_ph		= "Phone No";
				$set_note	= "Notes/Comments/Suggests";
				$set_cpt	= "CAPTCHA Code";
				$set_infcpt	= "insert and enter captcha in here, upper & lower case letters & numbers must match";
			
			}
			
	?>	
	
<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('frontend/include/head-oth'); ?>

<style>
.ptop10 {
	padding-top:10px !important;
}
.pbot10 {
	padding-bottom:10px !important;
}	

.ptop20 {
	padding-top:20px !important;
}
.pbot20 {
	padding-bottom:20px !important;
}

.ptop40 {
	padding-top:40px !important;
}
.pbot40 {
	padding-bottom:40px !important;
}	

.fab, .fa,.fa-brands {
  padding-top: 7px;
}



</style>
<style>
        .spinner {
            display: none;
            width: 40px;
            height: 40px;
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-radius: 50%;
            border-top-color: #000;
            animation: spin 1s linear infinite;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            z-index: 1000;
        }

		span img {
			width: 57% !important;
			height: 20% !important;
		}

		.form-control::placeholder {
			font-size: 9.5px !important;
		}
    </style>


</head>
<body oncopy="return false" oncut="return false" onpaste="return false">
<div class="mask-l" style="background-color: #fff; width: 100%; height: 100%; position: fixed; top: 0; left:0; z-index: 9999999;"></div> <!--removed by integration-->
<?php $this->load->view('frontend/include/headermenu'); ?>


<div class="j-menu-container"></div>

<div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page2">
  <div class="b-inner-page-header__content">
    <div class="container">
      <h2 class="f-primary-l " style="color:#fff;"><?= $jdl; ?></h2>
    </div>
  </div>
</div>

<div class="l-main-container">
<div class="b-breadcrumbs f-breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="<?= base_url(); ?>"> <i class="fa fa-home"> </i> Home</a></li>
            <li><i class="fa fa-angle-right"></i><span> <?= $jdl; ?></span></li>
        </ul>
    </div>
</div>




<section class="b-infoblock b-desc-section-container">
    <div class="container">
	
		<div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 40px;">
		<?= $gett; ?>
		<?= $gettx; ?>
		</div>

		<div class="col-md-6 col-sm-12 col-xs-12"><br/>
		<img src="<?= base_url('assets/images/recept_optimized.webp'); ?>" alt=" lobby KBRURe" width="100%;">
		<br/>
		<br/>
		<br/>
		
			<?php 
			foreach($c_map as $r){
			$ico 	= $r['titlemap'];
			$tit 	= $r['embed_map'];
			?>


			<iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="<?= $tit; ?>"></iframe> 

			<?php
			}
			?>



		</div>
	  
	  <div class="col-md-6 col-sm-12 col-xs-12">
        <h4 class="f-primary-b"><?= $kontaxinf; ?></h4>
        <div class="b-contacts-short-item-group">
          <div class="b-contacts-short-item col-md-12 col-sm-4 col-xs-12">

            <div class="b-remaining f-contacts-short-item__text">
			
			<?php 
			foreach($c_contact as $rx){
			$titx 	= $rx['title'];
			$isix 	= $rx['address'];
			?>
			
			<h2 style="padding:0px !mportant; margin:0px !mportant;">
			<b><?= $titx; ?></b>
			</h2>
			
			<h3 style="padding:0px !mportant; margin:0px !mportant;">
			<?= $isix; ?>

			<?php
			}
			?>
			 </h3>
            </div>
          </div>
		  
		  <?php 
			foreach($c_sosmed as $ri){
			$icoi 	= $ri['icon'];
			$tpi 	= $ri['type_sosmed'];
			$lki 	= $ri['link'];
			?>


			
          <div class="b-contacts-short-item col-md-12 col-sm-4 col-xs-12">
            <div class="b-contacts-short-item__icon f-contacts-short-item__icon b-left f-contacts-short-item__icon_md" style="line-height: 1 !important;">
              <i class="<?= $icoi; ?>"></i>
            </div>
            <div class="b-remaining f-contacts-short-item__text ">
               <a href="<?= $lki; ?>"><h5><?= $tpi; ?></h5></a>
            </div>
          </div>
          
		  <?php
			}
			?>
			
			
			
			
				<div class="b-contacts-short-item col-md-12 col-sm-4 col-xs-12">
					<div class="b-contacts-short-item__icon f-contacts-short-item__icon b-left f-contacts-short-item__icon_md" style="line-height: 1.5 !important;">
					</div>
					<h3>
					<b><i class="fa-solid fa-message"></i> &nbsp;&nbsp;<?= $kontaxus; ?> :</b>
					</h3>
					<br/>
					

					<div class="hide-it">
					<?php if ($this->session->flashdata('message')) :
						echo $this->session->flashdata('message');
					endif; ?>
					</div>
					


					
					<div class="col-md-12 col-sm-12 col-xs-12" style="line-height: 1 !important;">
					<form id="contact_form" action="<?php echo base_url('Main/quest'); ?>" method="post" enctype="multipart/form-data">
						<div class="row pbot10">
						 <div class="col-md-3 col-sm-6 col-xs-6">
							<?= $set_nama; ?>
						 </div>
						  <div class="col-md-9 col-sm-6 col-xs-6">
							<input type="text" id="yourID1" class="form-control" name="nama" required></input>
						 </div>
						</div>
						
						<div class="row pbot10">
						 <div class="col-md-3 col-sm-6 col-xs-6">
						 <?= $set_company; ?>
						 </div>
						  <div class="col-md-9 col-sm-6 col-xs-6">
							<input type="text" id="yourID2" class="form-control" name="company" placeholder="not required"></input>
						 </div>
						</div>
						
						<div class="row pbot10">
						 <div class="col-md-3 col-sm-6 col-xs-6">
						 <?= $set_email; ?>
						 </div>
						  <div class="col-md-9 col-sm-6 col-xs-6">
							<input type="email" id="email" class="form-control pbot10" name="mail" required></input><br/>
							<span id="result"></span>
						 </div>
						</div>
						
						<div class="row pbot10">
						 <div class="col-md-3 col-sm-6 col-xs-6">
						 <?= $set_ph; ?>
						 </div>
						  <div class="col-md-9 col-sm-6 col-xs-6">
							<input type='text' onkeypress='validatenmr(event)' class="form-control" name="ph" maxlength="13" required></input>
						 </div>
						</div>
						<div class="row pbot10">
						 <div class="col-md-3 col-sm-6 col-xs-6">
						 <?= $set_note; ?>
						 </div>
						  <div class="col-md-9 col-sm-6 col-xs-6">
							 <textarea class="form-control" id="note" rows="4" name="isi"></textarea>
						 </div>
						</div>
						
						<div class="row pbot10">
						 <div class="col-md-3 col-sm-6 col-xs-6">
						 <label for="captcha"><?= $set_cpt; ?> </label>
						 </div>
						 
						  <div class="col-md-9 col-sm-6 col-xs-6">
					
							<?php echo "<center><span>".$captcha."</span></center>"; ?><br><br>
							
							<input type="text" class="form-control" id="captcha_input" name="captcha" placeholder="<?= $set_infcpt; ?>" style="font-size:10px;" required><br>
							<br><br>
						
							<button class="g-recaptcha btn btn-lg btn-block btn-danger me-1 mb-1" id="submit_btn" type="submit" name="action" value="submit" disabled>Send</button>
							
							

						 </div>
						</div>
						
					</form>	

					</div>
					
					
					
				</div>
			
        </div>
      </div>
	  
	 
    </div>
  </section>
  



</div>
  <?php $this->load->view('frontend/footer'); ?>
  
    					<div class="overlay">
		
					<center style="margin-top:25% !important">
					 <img src="<?= base_url('assets/loading/loading.gif');?>" alt="loading...." width="120"> <br/>
					 <span style="color:orange; font-size:20px;font-weight:bold;"> Loading ...</span><br/>
					 <img src='https://simas-rb.co.id/assets/images/lgsimasre.png' alt='SimasRe' width='150'> 
					 </center>
					</div>
  <?php $this->load->view('frontend/javascript'); ?>
  <script src="<?= base_url('assets/js/js-vcntc.min.js'); ?>"></script>
  <script src="<?= base_url('assets/js/js-veCpt.min.js'); ?>"></script>
 



  <script type="text/javascript">	
        // function validateCaptcha() {
        //     var captchaInput = $('#captcha_input').val();
        //     if (captchaInput === '') {
        //         $('#submit_btn').prop('disabled', true);
        //     } else {
        //         $('#submit_btn').prop('disabled', false);
        //     }
        // }

        // $(document).ready(function() {
        //     validateCaptcha(); 

        //     $('#captcha_input').on('input', function() {
        //         validateCaptcha();
        //     });

		// 	$('#note').on('input', function() {
        //         var validChars = /[^a-zA-Z0-9 .\-\"\",?]/g;
        //         var currentValue = $(this).val();
        //         if (validChars.test(currentValue)) {
        //             $(this).val(currentValue.replace(validChars, ''));
        //         }
        //     });

		// 	$('#contact_form').on('submit', function(e) {
        //         $('.overlay').show();
        //     });


        // });

		// //Add a JQuery click event handler onto our checkbox.
		// $('#terms_and_conditions').click(function(){
		// 	if($(this).is(':checked')){
		// 		$('#submit_button').attr("disabled", false);
		// 	} else{
		// 		$('#submit_button').attr("disabled", true);
		// 	}
		// });
    </script>
		
<script>

		// const element = document.getElementById("engine");
		// element.style.fontSize = "12px";
		// element.style.display = "none";

		// const element = document.getElementById("propert");
		// element.style.fontSize = "12px";

</script>

<script type="text/javascript">			
	var timeout = 7000;
	$('.hide-it').delay(timeout).fadeOut(300);
</script>



		





</body>
</html>
