$(document).ready(function() {

	$("#form").submit(function() {
		$.ajax({
			type: "POST",
			url: "mail/mail.php",
			data: $(this).serialize()
		}).done(function() {
			$(this).find("input").val("");
			alert("Ваше сообщение успешно отправлено!");
			$("#form").trigger("reset");
		});
		return false;
	});
	
});