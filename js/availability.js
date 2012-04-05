$(function() {
	$(".members select").change(function() {
		$(".members form").submit();
	});
	
	$(".day").click(function() {
		var day = $(this).attr("id");
		
		if($(this).hasClass("argo")) {
			var member = "argo";
		}
		
		if($(this).hasClass("arnett")) {
			var member = "arnett";
		}
		
		if($(this).hasClass("fursman")) {
			var member = "fursman";
		}
		
		if($(this).hasClass("jegtnes")) {
			var member = "jegtnes";
		}
		
		if($(this).hasClass("khatun")) {
			var member = "khatun";
		}
		
		if($(this).hasClass("money")) {
			var member = "money";
		}
		
		if($(this).hasClass("free")) {
			var newStatus = "false";
		}
		
		if($(this).hasClass("busy")) {
			var newStatus = "true";
		}
		
		$.ajax({
			url: "update.php?day="+ day +"&member="+ member +"&newstatus="+ newStatus,
			context: document.body
		}).done(function() {
			location.reload();
		});
		
	});
});