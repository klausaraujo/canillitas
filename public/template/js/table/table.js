function tablePersonalized(table){
	
	var cols = [];
	var titles = [];
	
	//for (var i = 0; i < lista.length; i++){
	if(lista.length > 0){
		var obj = lista[0]; var j = 0;
		for (var key in obj){
			var value = obj[key];
			if(j < 7){
				cols.push({data:key});
				titles.push({title:key.toUpperCase(),targets:j});
			}
			j++;
		}
	}else
		console.log(lista);
	//}
	/*console.log(cols);
	console.log(titles);*/
	
	var columnas = [
				{data:'dni'},{data:'apellidos'},{data:'nombres'},{data:'fecnac'},{data:'domicilio'},{data:'correo'},{data:'sexo'},
				/*{
					data: null,
					render: function (data, type, row, meta) {
						
						return "<div style='display: flex;background:green'>Btn</div>";
					}
				}*/
			];
	var titulos = [{title:'DNI',targets: 0},{title:'APELLIDOS',targets: 1},{title:'NOMBRES',targets: 2},{title:'FECHA NAC',targets: 3},{title:'DIRECCION',targets: 4},
				{title:'CORREO',targets: 5},{title:'GENERO',targets: 6}];
	/*var datos = [{'ID': '0','DNI': '123456','Apellidos': 'paredes','Nombres': 'deight','Fec Nac': 'anio','Genero': 'Masculino','Estado Civil': 'Soltero'},
				{'ID': '1','DNI': '123456','Apellidos': 'paredes','Nombres': 'deight','Fec Nac': '32788','Genero': 'Masculino','Estado Civil': 'Soltero'},
				{'ID': '2','DNI': '123456','Apellidos': 'paredes','Nombres': 'deight','Fec Nac': '32788','Genero': 'Masculino','Estado Civil': 'Soltero'},
				{'ID': '3','DNI': '123456','Apellidos': 'paredes','Nombres': 'deight','Fec Nac': '32788','Genero': 'Masculino','Estado Civil': 'Soltero'}];*/


	const dataTable = $(table).DataTable({
		"data": lista,
		/*"bPaginate":false,
		"bInfo":false,
		"bFilter":false,
		"bScrollCollapse": false,
		"bJQueryUI": false,*/
		"bAutoWidth": true,
		"bDestroy": true,		
		//"responsive": true,
		"select": true,
		//"pageLength": "10",
		//dom: 'Bfrt<"col-sm-12 inline"i> <"col-sm-12 inline"p>',
		lengthMenu: [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, 'Todas']],
		
		"columns": lista.length > 0 ? cols : columnas,
		"columnDefs": lista.length > 0 ? titles : titulos,
		/*"buttons": {
			dom: {
			  container: {
				tag: 'div',
				className: 'flexcontent'
			  },
			  buttonLiner: {
				tag: null
			  }
			},
			buttons: [{
			  extend: 'copy',
			  title: 'Lista General de Canillitas',
			  exportOptions: { columns: [0, 1, 2, 3, 6] },
			},
			{
			  extend: 'csv',
			  title: 'Lista General de Canillitas',
			  exportOptions: { columns: [0, 1, 2, 3, 6] },
			},
			{
			  extend: 'excel',
			  title: 'Lista General de Canillitas',
			  exportOptions: { columns: [0, 1, 2, 3, 6] },
			},
			{
			  extend: 'pdf',
			  title: 'Lista General de Canillitas',
			  orientation: 'landscape',
			  exportOptions: { columns: [0, 1, 2, 3, 6] },
			},
			{
			  extend: 'print',
			  title: '',
			  exportOptions: { columns: [0, 1, 2, 3, 6] },
			  customize: function (win) {
				$(win.document.body).addClass('white-bg');
				$(win.document.body).css('font-size', '8px');

				$(win.document.body).find('table')
				  .addClass('compact')
				  .css('font-size', '8px');

				var css = '@page { size: landscape; }',
				  head = win.document.head || win.document.getElementsByTagName('head')[0],
				  style = win.document.createElement('style');

				style.type = 'text/css';
				style.media = 'print';

				if (style.styleSheet) {
				  style.styleSheet.cssText = css;
				}
				else {
				  style.appendChild(win.document.createTextNode(css));
				}

				head.appendChild(style);
			  }
			},
			{
			  extend: 'pageLength',
			  titleAttr: 'Registros a Mostrar',
			  className: 'selectTable'
			}]
		}*/
	});
	
	return dataTable;
}