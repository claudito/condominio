 var ruta  = "http://localhost/dev/condominio/";
//URL remoto:
//var URL  = "http://condominio.perutec.com.pe/";

function logout(){

	$.ajax({
		url:ruta+'controlador/logout.php',
		type:'POST',
		async:true,
		data:{accion:'logout'},
		success:function()
		{
			self.location=ruta;
		},
		error:function(xhr,status,error)
		{
			alert('ERROR: '+error);
		}


	});
}