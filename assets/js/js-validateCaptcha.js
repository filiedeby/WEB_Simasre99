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

	$('#note').on('input', function() {
		var validChars = /[^a-zA-Z0-9 .\-\"\",?]/g;
		var currentValue = $(this).val();
		if (validChars.test(currentValue)) {
			$(this).val(currentValue.replace(validChars, ''));
		}
	});

	$('#contact_form').on('submit', function(e) {
		$('.overlay').show();
	});


});

//Add a JQuery click event handler onto our checkbox.
$('#terms_and_conditions').click(function(){
	if($(this).is(':checked')){
		$('#submit_button').attr("disabled", false);
	} else{
		$('#submit_button').attr("disabled", true);
	}
});