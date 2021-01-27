jQuery(document).ready(function($) {

	$('#form-1, #form-2').find('.sendform').submit(function(event) {
		event.preventDefault();
		var formContainer = $(this).parent();
		submitForm(event, formContainer);
		$(this).slideUp();
	});

	function submitForm(e, fc){
		var currentForm = e.target;
		var name = currentForm[0].value;
		var email = currentForm[1].value;
		var tel = currentForm[2].value;
		var formContainer = fc;
		$.ajax({
			type: "POST",
			url: "mail/send.php",
			data: "name=" + name + "&email=" + email + "&tel=" + tel,
			success : function(text){
				if (text == 'success'){
					formContainer.find('.msgsuccess').removeClass('hidden');
				} else {
					formContainer.find('.msgerror')
						.removeClass('hidden')
						.append('<p class="text-centered">'+text+'</p>');
				}
			}
		});
	}
});