$(document).ready(function(){
	$('#regione').change(function(){
		var elem = $(this).val();
		
		$.ajax({
			type: 'POST',
			url:'ajax/select.php',
			dataType: 'json',
			data: {'regione':elem},
			success: function(res){
				$('#provincia option').each(function(){$(this).remove()});
				$('#provincia').append('<option selected="selected">Seleziona...</option>');
				$('#comune option').each(function(){$(this).remove()});
				$('#comune').append('<option selected="selected">Seleziona...</option>');
				$('#cap').attr('value','');
				$.each(res, function(i, e){
					$('#provincia').append('<option value="' + e.codice + '">' + e.nome + '</option>');
				});
			}
		});
	});
	
	$('#provincia').change(function(){
		var elem = $(this).val();
		
		$.ajax({
			type: 'POST',
			url:'ajax/select.php',
			dataType: 'json',
			data: {'provincia':elem},
			success: function(res){
				$('#comune option').each(function(){$(this).remove()});
				$('#comune').append('<option selected="selected">Seleziona...</option>');
				$('#cap').attr('value','');
				$.each(res, function(i, e){
					$('#comune').append('<option value="' + e.codice + '">' + e.nome + '</option>');
				});
			}
		});
	});
	
	$('#comune').change(function(){
		var elem = $(this).val();
		
		$.ajax({
			type: 'POST',
			url:'ajax/select.php',
			dataType: 'json',
			data: {'cod_istat':elem},
			success: function(res){
				$('#cap').attr('value',res);
			}
		});
	});
});