<script type="text/javascript">		
	function validateCaptcha() {
		var captchaInput = $('#captcha_input').val();
		if (captchaInput === '') {
			$('#submit_btn').prop('disabled', true);
		} else {
			$('#submit_btn').prop('disabled', false);
		}
	}

	$(document).ready(function() {
		validateCaptcha(); 

		$('#captcha_input').on('input', function() {
			validateCaptcha();
		});
	});


	$(document).ready(function() {
		$('#note').on('input', function() {
			var validChars = /[^a-zA-Z0-9 .\-\"\",?]/g;
			var currentValue = $(this).val();
			if (validChars.test(currentValue)) {
				$(this).val(currentValue.replace(validChars, ''));
			}
		});
	});


	const element = document.getElementById("engine");
	element.style.fontSize = "12px";
	element.style.display = "none";

	const element = document.getElementById("propert");
	element.style.fontSize = "12px";


	//Add a JQuery click event handler onto our checkbox.
	$('#terms_and_conditions').click(function(){
		if($(this).is(':checked')){
			$('#submit_button').attr("disabled", false);
		} else{
			$('#submit_button').attr("disabled", true);
		}
	});

		
	var timeout = 7000;
	$('.hide-it').delay(timeout).fadeOut(300);


	$('body').bind('copy paste',function(e) {
		e.preventDefault(); return false; 
	});


	// validasi nomor telp
	function validatenmr(evt) {
	var theEvent = evt || window.event;

	// Handle paste
	if (theEvent.type === 'paste') {
		key = event.clipboardData.getData('text/plain');
	} else {
	// Handle key press
		var key = theEvent.keyCode || theEvent.which;
		key = String.fromCharCode(key);
	}
	var regex = /[0-9]|\./;
	if( !regex.test(key) ) {
		theEvent.returnValue = false;
		if(theEvent.preventDefault) theEvent.preventDefault();
	}
	}


	// validasi charkter dan number_format
			document.getElementById("yourID").onkeypress = function(e) {
			var chr = String.fromCharCode(e.which);
			if ("1234567890qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM".indexOf(chr) < 0)
				return false;
		};

	// validasi email	
	const validateEmail = (email) => {
		return email.match(
			/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
		);
	};

	const validate = () => {
	const $result = $('#result');
	const email = $('#email').val();
	$result.text('');

	if (validateEmail(email)) {
		$result.text(email + ' is valid :)');
		$result.css('color', 'green');
	} else {
		$result.text(email + ' is not valid :(');
		$result.css('color', 'red');
	}
	return false;
	}

	$('#email').on('input', validate);	
	
</script>

