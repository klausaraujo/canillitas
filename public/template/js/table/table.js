function tablePersonalized(table){
	
	let cols = '[';
	let titles = '[';

	//for (var i = 0; i < lista.length; i++){
	if(lista.length > 0){
		let j = 0; cols = '[';
		lista.forEach(function(col){
			for(const [key, value] of Object.entries(col)){
				if(j < 7){
					cols += '{"data":"'+key+'"}';
					titles += '{"title":"'+key.toUpperCase()+'","targets":"'+j+'"}';
					/*cols.push({data:key});
					titles.push({title:key.toUpperCase(),targets:j});*/
				}
				j++;
			}			
		});
		cols = JSON.parse(cols += ']'); titles = JSON.parse(titles += ']');
		
	}else{
		cols = JSON.parse(cols += '{"data":"dni"},{"data":"apellidos"},{"data":"nombres"},{"data":"fecnac"},{"data":"sexo"},{"data":"domicilio"},{"data":"correo"}]');
		titles = (JSON.parse(titles += '{"title":"DNI","targets": 0},{"title":"APELLIDOS","targets": 1},{"title":"NOMBRES","targets": 2},{"title":"FECHA NAC","targets": 3},'+
				'{"title":"GENERO","targets": 4},{"title":"DIRECCION","targets": 5},{"title":"CORREO","targets": 6}]'));
	}
	
	//String JSON con su identificador
	//json = {"data":[{"name":"Tiger Nikon","position":"system"}]};
	//String JSON sin su identificador pero esperando mas datos [0],[1]...
	//json = [{"name":"Tiger Nikon","position":"system"}];
	//String JSON sin su identificador y solo una fila de datos
	//json = {"name":"Tiger Nikon","position":"system"};
	/*console.log(cols);
	console.log(titles);*/
	
	var columnas = [
				{data:'dni'},{data:'apellidos'},{data:'nombres'},{data:'fecnac'},{data:'sexo'},{data:'domicilio'},{data:'correo'},
				/*{
					data: null,
					render: function (data, type, row, meta) {
						
						return "<div style='display: flex;background:green'>Btn</div>";
					}
				}*/
			];


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
		
		"columns": cols,//lista.length > 0 ? cols : columnas,
		"columnDefs": titles,//lista.length > 0 ? titles : titulos,
		"dom": '<"row"<"col-sm-12 mb-2"B><"col-sm-6 float-left"l><"col-sm-6 float-right"f>>rtip',
		"buttons": [
			'copy','csv','excel','pdf','print'
		]
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