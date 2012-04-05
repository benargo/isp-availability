$(function() {
	$(".members select").change(function() {
		$(".members form").submit();
	});
	
	$("a.day").click(function(event) {
		
		event.preventDefault();
		
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
		
		if($(this).hasClass("false")) {
			var newStatus = "true";
		}
		
		if($(this).hasClass("true")) {
			var newStatus = "false";
		}
		
		$.ajax({
			url: "update.php?day="+ day +"&member="+ member +"&newstatus="+ newStatus,
			context: document.body
		}).done(function() {
			location.reload();
		});
		
	});
});