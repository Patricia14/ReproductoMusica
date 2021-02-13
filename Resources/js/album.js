function lista_libros(valor){
	$.ajax({
		url:'../Controllers/album.php',
		type:'POST',
		data:'valor='+valor+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);
		html="<table class='table table-bordered'><thead><tr><th>#</th><th>Nombre del Album</th><th>Artista</th></tr></thead><tbody>";
		for(i=0;i<valores.length;i++){
			datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][0]+"*"+valores[i][4]+"*"+valores[i][5]+"*"+valores[i][6]+"*"+valores[i][7];
			html+="<tr><td>"+(i+1)+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][2]+"</tr>";
		}
		html+="</tbody></table>"
		$("#lista").html(html);
	});
}
function guardar(){
	var datosform=$("#formLibro").serialize();
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		data:datosform+"&boton=actualizar"
	}).done(function(resp){
		if(resp==='exito'){
			$('#exito').show();
			lista_libros('');
		}
		else{
			alert(resp);
		}
		
	});
	
}
function mostrar(datos){
	//alert(datos);
	var d=datos.split("*");
	//alert(d.length);
	$("#idlib").val(d[0]);
	$("#isbn").val(d[1]);
	$("#titulo").val(d[2]);
	$("#autor").val(d[3]);
	$("#añop").val(d[4]);
	$("#nrop").val(d[5]);
	$("#ediccion").val(d[6]);
	$("#idioma").val(d[7]);
}
function eliminar(id){
	//alert(id);
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		data:'idlib='+id+'&boton=eliminar'
	}).done(function(resp){
		alert(resp);
		lista_libros('');
	});
	
}