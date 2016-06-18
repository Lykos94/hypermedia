$(document).ready(function(){
	$.get("devices.php?category=\"Smartphone\"",function(data, status) {
		if(status == "success") {
			result = JSON.parse(data);
			for (i = 0; i < result.length; i++) {
				$('#smartphones').append(
					"<a href=\"device.html?id=" + result[i]["ID"] + "\">" +
						"<div class=\"col-sm-6\">" + 
							result[i]["Name"] +
							"<img class=\"img-responsive\" src=\"images\/" + result[i]["ImageURL"] + "\" alt=\"" + result[i]["Name"] + "\">" +
						"</div>" +
					"</a>"
				)
			}
		}
		else if(status == "error") {
			alert("Error"); //stampare un errore in modo migliore
		}
	});
});