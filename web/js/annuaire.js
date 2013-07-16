$(document).ready(function() {
	$('#myTab a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});

	$('#departement-select').change(function() {
		var id = $(this).val();


		getVille(id);
	});
});

function getVille(id){
	$.getJSON('/app_dev.php/ajax/ville/'+id)
	.success(function(json) {
		var source   = $("#ville-template").html();
		var template = Handlebars.compile(source);
		var html = '';
		
		for(var i=0; i<json.length; i++) {
			var context = json[i];
			// console.log(context);
			html += template(context);
		}

		$('#ville-select').append(html);
		$('#ville-select').show('500');
	})
	.fail(function() { alert("error"); });
}
