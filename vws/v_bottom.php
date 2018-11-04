					<div class="row" id="footer_row">
						<footer>
							<div class="col-md-3">
								<div class="logo"><img src="images/logos.png"></div> <!-- width="136" height="36" -->
							</div>
							<div class="col-md-6">
								<div id="dir">
								<p></p>
								</div>
							</div>
							<div class="col-md-3">
							</div>
						</footer>
					</div>
				</div>
				<!--<div class="col-md-1"></div>-->
			</div>
		</div> <!-- /container -->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.Rut.js"></script> 
		<script type="text/javascript" language="javascript" src="js/jquery.validate.js"></script>
		<script type="text/javascript" language="javascript" src="js/additional-methods.js"></script>
		<script type="text/javascript" language="javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" src="js/dataTables.bootstrap.js"></script>
		<script type="text/javascript" language="javascript" src="js/date-euro.js"></script>
		<script type="text/javascript" language="javascript" src="js/pdfmake.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/vfs_fonts.js"></script>
		<script type="text/javascript" language="javascript" src="js/jszip.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/buttons.html5.js"></script>
		<script type="text/javascript" language="javascript" src="js/datatables.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/dataTables.buttons.js"></script>
		<script type="text/javascript" language="javascript" src="js/buttons.bootstrap.js"></script>
		<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/linq.js/2.2.0.2/linq.js"></script>
		<!-- datetimepicker -->
		<script type="text/javascript" src="js/moment.js"></script>
		<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript" src="js/es.js"></script>
		<script type="text/javascript" src="js/sweetalert.min.js"></script>
		
		<script>
		$(document).ready(function(){
			var _url = "ajax/ajax_get_personal.php";
			$.ajax({
				url: _url,
				type: "GET",
				dataType: "JSON",
				success: function(data){
					var rut_personal = data.rut_personal;
					$( "#rutManualCompleto" ).autocomplete({
						source: rut_personal
					});
				}
			});

			$('#prevCarousel').click(function(){
				$('#carpv').click();
			});
			$('#nextCarousel').click(function(){
				$('#carnx').click();
			});

			function capitalizeFirstLetter(string) {
				return string.charAt(0).toUpperCase() + string.slice(1);
			}

			function digito_verificador (rut) {
				// type check
				if (!rut || !rut.length || typeof rut !== 'string') {
					return -1;
				}
				// serie numerica
				var secuencia = [2,3,4,5,6,7,2,3];
				var sum = 0;
				//
				for (var i=rut.length - 1; i >=0; i--) {
					var d = rut.charAt(i)
					sum += new Number(d)*secuencia[rut.length - (i + 1)];
				};
				// sum mod 11
				var rest = 11 - (sum % 11);
				// si es 11, retorna 0, sino si es 10 retorna K,
				// en caso contrario retorna el numero
				return rest === 11 ? 0 : rest === 10 ? "K" : rest;
			};

			var Opciones = { weekday: "long", year: 'numeric', month: 'long', day: 'numeric' };
			var FechaActual = new Date();
			var FechaActualMostrar = FechaActual.toLocaleDateString("es-ES",Opciones);
			$('#FechaActualMostrar').html(capitalizeFirstLetter(FechaActualMostrar));

			$.validator.addMethod("rut", function(value, element){
				return this.optional(element) || $.Rut.validar(value);
			}, "Este campo debe ser un rut válido.");

			$("#myform").validate();
			$('#rutManualCompleto').Rut({
				validation: false
				});

			$('#rutManualCompleto').change(function(){
				var rutmcomp = $('#rutManualCompleto').val();
				rut_ = rutmcomp.split("-");
				rutt = rut_[0].split('.').join("");
				rut = parseInt(rutt);
				dv = rut_[1];
				$('#rutManual').val(rut);
				$('#dvManual').val(dv);
				});

			$('#horaEntradaManual').change(function(){
				var horamanual = $('#horaEntradaManual').val();
				var hora_onlynumbers = horamanual.replace(/[^0-9.,]+/g, '');
				var hora_array = hora_onlynumbers.match(/.{1,2}/g);
				for (var i = 0; i < 3; i++) {
					if (i == 0 && hora_array[i]>23) hora_array[i] = "23";
					if (i > 0 && hora_array[i]>59) hora_array[i] = "59";
					if (hora_array[i]<10) hora_array[i] = "0"+hora_array[i];
					if (hora_array[i] != null) {
						if (hora_array[i].length > 2 ) hora_array[i] = hora_array[i].substr(1);
					}else{
						hora_array[i] = "00";
					}
				}
				var horatransformada = hora_array[0]+":"+hora_array[1]+":"+hora_array[2];
				$('#horaEntradaManual').val(horatransformada);
			});

			$('#horaSalidaManual').change(function(){
				var horamanual = $('#horaSalidaManual').val();
				var hora_onlynumbers = horamanual.replace(/[^0-9.,]+/g, '');
				var hora_array = hora_onlynumbers.match(/.{1,2}/g);
				for (var i = 0; i < 3; i++) {
					if (i == 0 && hora_array[i]>23) hora_array[i] = "23";
					if (i > 0 && hora_array[i]>59) hora_array[i] = "59";
					if (hora_array[i]<10) hora_array[i] = "0"+hora_array[i];
					if (hora_array[i] != null) {
						if (hora_array[i].length > 2 ) hora_array[i] = hora_array[i].substr(1);
					}else{
						hora_array[i] = "00";
					}
				}
				var horatransformada = hora_array[0]+":"+hora_array[1]+":"+hora_array[2];
				$('#horaSalidaManual').val(horatransformada);
			});

			jQuery.validator.addMethod("horaManual", function(value, element) {
				return this.optional( element ) || /((?:[01]\d|2[0-3]):[0-5]\d:[0-5]\d$)/.test( value );
			}, 'debe escribir la hora con el siguiente formato: 00:00:00.');

			jQuery.validator.addMethod("fechaManual", function(value, element) {
				return this.optional( element ) || /\d{2}-\d{2}-\d{4}/.test( value );
			}, 'debe escribir la fecha con el siguiente formato: DD-MM-YYYY.');

			$(".profile-img").click(function(){
				$('#loading').attr('style','display:block;');
				var attendant_RUT = this.id;
				var attendant_name = $($(this).find('img'))[0].id.replace("_", " ");;
				var _url = "ajax/ajax_select_asistente.php?rut="+attendant_RUT;
				$.ajax({
					url: _url,
					type: "GET",
					dataType: "JSON",
					success: function(data){
						$('#nombre_selected').html(data.nombre.toUpperCase());
						$('#rut_selected').html(data.rutcompl);
						$('#ficha').attr('style','display:block;');
						$('#rut_ctrl').val(attendant_RUT);
						$('#name_ctrl').val(data.nombre);
						$('#InHour').val(data.horain);
						$('#OutHour').val(data.horaout);
						$('#loading').attr('style','display:none;');
					}
				});
			});
			
			$("#entrada").click(function(){
				var curdate = new Date();
				var curtime = curdate.toTimeString().split(' ')[0];
				var ctime = parseTime(curtime);
				var seven = parseTime("7:00:00");
				var trece = parseTime("13:00:00");
				var rut_ctrl = $('#rut_ctrl').val();
				if (rut_ctrl == "") {
					swal("Debe seleccionar a un miembro del personal.");
				}else{
					if ($('#InHour').val() != "" ) {
						swal("Ya ha registrado la hora de entrada");
					}else{
						if(ctime>seven && ctime<trece){ // si hace entrada entre las 7 y las 13
							$('#loading').attr('style','display:block;');
							var _url = "ajax/ajax_marcar_entrada.php?rut="+rut_ctrl;
							$.ajax({
								url: _url,
								type: "GET",
								dataType: "JSON",
								success: function(data){
									$('#InHour').val(data.horain);
									document.location = 'index.php#timeStamp';
									$('#loading').attr('style','display:none;');
									//swal("Entrada marcada con exito.");
								}
							});
						}else{
							swal("La hora de ingreso es entre las 7:00 y las 13:00 horas");
						}
					}
				}
			});

			$("#cerrar-sesion").click(function(){
				window.location = 'index.php?p=close_session';
			});

			$("#salida").click(function(){
				var curdate = new Date();
				var curtime = curdate.toTimeString().split(' ')[0];
				var ctime = parseTime(curtime);
				var treceplus = parseTime("13:01:00");
				var veintitres = parseTime("23:0:00");
				var rut_ctrl = $('#rut_ctrl').val();
				if (rut_ctrl == "") {
					swal("Debe seleccionar a un miembro del personal.");
				}else{
					if ( $('#InHour').val() == "" ) {
						swal("No ha registrado la hora de entrada");
					}else{
						if ( $('#OutHour').val() != "" ){
							swal("Ya ha registrado la hora de salida");
						}else{
							if(ctime>treceplus && ctime<veintitres){ // si hace entrada entre las 13:01 y las 23
								$('#loading').attr('style','display:block;');
								var _url = "ajax/ajax_marcar_salida.php?rut="+rut_ctrl;
								$.ajax({
									url: _url,
									type: "GET",
									dataType: "JSON",
									success: function(data){
										$('#OutHour').val(data.horaout);
										document.location = 'index.php#timeStamp';
										$('#loading').attr('style','display:none;');
										//swal("Salida marcada con exito.");
									}
								});
							}else{
								swal("La hora de salida tiene un rango comprendido entre las 13:01 y las 23:00 horas");
							}
						}
					}
				}
			});

			$("#manual").click(function(){
				var rut_ctrl = $('#rut_ctrl').val();
				var name_ctrl = $('#name_ctrl').val();
				var options = { year: 'numeric', month: 'numeric', day: 'numeric' };
				var curdate = new Date();
				var cdatear = curdate.toLocaleDateString("es-ES",options).split("/");
				if (cdatear[1] < 10) cdatear[1] = "0"+cdatear[1];

				if (rut_ctrl == "") {
					$('#modal-manual').click();
					$('#ingresoFecha').val(cdatear.join("-"));
					//swal("Debe seleccionar a un miembro del personal.");
				}else{
					$('#modal-manual').click();
					$('#ingresoFecha').val(cdatear.join("-"));
					$('#rutManual').val(rut_ctrl);
					$('#dvManual').val(digito_verificador(rut_ctrl));
					$('#rutManualCompleto').val(rut_ctrl+"-"+digito_verificador(rut_ctrl));
					$('#rutManualCompleto').attr('disabled','disabled');
					$('#nameManual').html('<div class="alert alert-success name-manual-display">'+name_ctrl.toUpperCase()+'</div>');
					$('#boRutM').attr('style','display: block;');
				}
			});

			$('.input-group-addon').click(function(){
				$(this).prev('input').focus();
			});

			$("#boRutM").click(function(){
				$('#rutManual').val("");
				$('#dvManual').val("");
				$('#rutManualCompleto').val("");
				$('#nameManual').html("");
				$('#rutManualCompleto').removeAttr('disabled');
				/*new*/
				$('#boRutM').attr('style',"display: none;");
			});
			
			$("#rutManualCompleto").change(function(){
				var search_RUT = $('#rutManual').val();
				var get_DV = digito_verificador($('#rutManual').val());
				var generated_DV = get_DV.toString();
				var search_DV = $('#dvManual').val();
				if (search_RUT != "") {
					if(search_DV.toUpperCase() == generated_DV.toUpperCase()){
						$('#loading').attr('style','display:block;');
						var _url = "ajax/ajax_select_asistente.php?rut="+search_RUT;
						$.ajax({
							url: _url,
							type: "GET",
							dataType: "JSON",
							success: function(data){
								if (data.found == true) {
									$('#rutManualCompleto').attr('disabled','disabled');
									$('#nameManual').html('<div class="alert alert-success name-manual-display">'+data.nombre.toUpperCase()+'</div>');
									$('#boRutM').attr('style','display: block;');
									$('#loading').attr('style','display:none;');
								}else{
									swal("El RUT no se encuentra en la base de datos, por favor escriba un RUT que si exista.");
								}
							}
						});
					}else{
						swal("Debe ingresar un RUT que sea válido.");
						$('#rutManualCompleto').focus();

					}
				}else{
					swal("Debe ingresar un RUT y luego oprimir buscar RUT.");
					$('#rutManualCompleto').focus();
				}
			});

			$('#asistenciaFecha').focusout(function(){
				var attendant_RUT = $('#rutManual').val();
				var date = $('#asistenciaFecha').val();
				if (attendant_RUT != ""){
					var _url = "ajax/ajax_select_time.php?rut="+attendant_RUT+"&date="+date;
					$.ajax({
						url: _url,
						type: "GET",
						dataType: "JSON",
						success: function(data){
							$('#horaEntradaManual').val(data.horain);
							$('#horaSalidaManual').val(data.horaout);
						}
					});
				}
			});

			$("#guardar-manual").click(function(){
				var form = $('#form-ingreso-manual');
				form.validate({
					rules: {
						asistenciaFecha: {
							fechaManual: true
						},
						horaEntradaManual: {
							horaManual: true
						},
						horaSalidaManual: {
							horaManual: true
						}
					}
				});
				if (form.valid() == true){
					var rutManual = $('#rutManual').val();
					var ingresoFecha = $('#ingresoFecha').val();
					var asistenciaFecha = $('#asistenciaFecha').val();
					var horaEntradaManual = $('#horaEntradaManual').val();
					var horaSalidaManual = $('#horaSalidaManual').val();
					var obsManual = $('#obsManual').val();
					// transform data for validation
					var inputdate = asistenciaFecha.split("-");
					if ($('#rutManualCompleto').attr('disabled') == "disabled"){
						if (inputdate[0] >31 || inputdate[1] >12 || inputdate[2] < 1900 ){
							swal("Debe indicar la fecha en el formato correspondiente");
						}else{
							var inputintime = horaEntradaManual.split(":");
							if (inputintime[0] < 07 || inputintime[0] > 13 ){
								swal("La hora de ingreso es entre las 7:00 y las 13:00 horas");
							}else{
								if (horaSalidaManual != "") {
									var inputouttime = horaSalidaManual.split(":");
									if (inputouttime[0] == 13 && inputouttime[1] < 01  ){
										swal("La hora de salida tiene un rango comprendido entre las 13:01 y las 23:00 horas");
									}else if (inputouttime[0] < 13 || inputouttime[0] > 23 ){
										swal("La hora de salida tiene un rango comprendido entre las 13:01 y las 23:00 horas");
									}else{
										$('#loading').attr('style','display:block;');
										var _url = "ajax/ajax_guardar_manual.php?rut="+rutManual+"&fi="+ingresoFecha+"&fa="+asistenciaFecha+"&he="+horaEntradaManual+"&hs="+horaSalidaManual+"&obs="+obsManual;
										$.ajax({
											url: _url,
											type: "GET",
											dataType: "JSON",
											success: function(data){
												$('#cerrar-modal').click();
												$('#loading').attr('style','display:none;');
												//swal("Ingreso manual realizado con exito.");
											}
										});
									}
								}else{
									$('#loading').attr('style','display:block;');
									var _url = "ajax/ajax_guardar_manual.php?rut="+rutManual+"&fi="+ingresoFecha+"&fa="+asistenciaFecha+"&he="+horaEntradaManual+"&hs="+horaSalidaManual+"&obs="+obsManual;
									$.ajax({
										url: _url,
										type: "GET",
										dataType: "JSON",
										success: function(data){
											$('#cerrar-modal').click();
											$('#loading').attr('style','display:none;');
											//swal("Ingreso manual realizado con exito.");
										}
									});
								}
							}
						}
					}else{
						swal("Debe buscar un RUT válido (sin el DV)");
					}
				}else{
					swal("Debe llenar los campos requeridos con la informacion correspondiente");
				}
			});

			$('#cerrar-modal').click(function(){
				$('#rutManual').val("");
				$('#rutManualCompleto').val("");
				$('#dvManual').val("");
				$('#ingresoFecha').val("");
				$('#asistenciaFecha').val("");
				$('#horaEntradaManual').val("");
				$('#horaSalidaManual').val("");
				$('#obsManual').val("");
			});

			$('#modal-manual').click(function(){
				$('#rutManual').val("");
				$('#rutManualCompleto').val("");
				$('#dvManual').val("");
				$('#ingresoFecha').val("");
				$('#asistenciaFecha').val("");
				$('#horaEntradaManual').val("");
				$('#horaSalidaManual').val("");
				$('#obsManual').val("");
			});

			$('#ficha').click(function(){
				$('#modal-ficha').click();
				$('#RUTficha').val($('#rut_selected').html());
				$('#nombreficha').val($('#nombre_selected').html());
				$('#fechaFicha').data("DateTimePicker").date(moment(new Date ).format('DD-MM-YYYY'));
				$('#loading').attr('style','display:block;');
				$.ajax({
					url: "ajax/ajax_get_ficha_asistente.php?rut="+$('#RUTficha').val()+"&nombre="+$('#nombreficha').val()+"&fecha="+$('#fechaFicha').val(),
					type: "GET",
					dataType: "JSON",
					success: function(data){
						if(data.foundTime != false) {
							$('#ficha-asistencia').prop('src',data.pdf);
							$('#loading').attr('style','display:none;');
						}
					}
				});
			});

			$('#fechaFicha').focusout(function(){
				$('#loading').attr('style','display:block;');
				$.ajax({
					url: "ajax/ajax_get_ficha_asistente.php?rut="+$('#RUTficha').val()+"&nombre="+$('#nombreficha').val()+"&fecha="+$('#fechaFicha').val(),
					type: "GET",
					dataType: "JSON",
					success: function(data){
						if(data.foundTime != false) {
							$('#ficha-asistencia').prop('src',data.pdf);
							$('#loading').attr('style','display:none;');
						}
					}
				});
			});

			$('#print-ficha').click(function(){
				var PDF = document.getElementById("ficha-asistencia");
				PDF.focus();
				PDF.contentWindow.print();
			});

			$('#reporte').click(function(){
				$('#modal-reporte').click();
			});

			var rut = '40070356-6';
			var fi = '01-01-2018';
			var ff = '01-02-2018';

			$('#reporte-semanal-table').DataTable({
				"ajax" : {
					"url": "./ajax/ajax_report.php?rut="+rut+"&fi="+fi+"&ff="+ff,
					"type": "GET",
					"error": function(jqXHR, textStatus, errorThrown){
						alert('Error adding / update data');
						$('#reporte-semanal-table').DataTable().clear().draw();
					}
				},
				'scrollX': false,
				responsive: true,
				'paging':   true,
				"pageLength": 7,
				'info':     false,
				processing: true,
				searching: true,
				language: {
					"sProcessing":     "Procesando...",
					"sLengthMenu":     "Mostrar _MENU_ registros",
					"sZeroRecords":    "No se encontraron resultados",
					"sEmptyTable":     "Ningún dato disponible en esta tabla",
					"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
					"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
					"sInfoPostFix":    "",
					"sSearch":         "Buscar:",
					"sUrl":            "",
					"sInfoThousands":  ",",
					"sLoadingRecords": "Cargando...",
					"oPaginate": {
						"sFirst":    "Primero",
						"sLast":     "Último",
						"sNext":     "Siguiente",
						"sPrevious": "Anterior"
					},    
					"oAria": {
						"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
						"sSortDescending": ": Activar para ordenar la columna de manera descendente"
					}
				}
			});

			function parseTime (time){
				var timearray = time.split(":");
				var timeparse = new Date(parseInt("2001",10),(parseInt("01",10))-1,parseInt("01",10),parseInt(timearray[0],10),parseInt(timearray[1],10),parseInt(timearray[2],10));
				return timeparse.valueOf();
			}
			
			// CALENDARIO
			$.datepicker.regional['es'] = {
				closeText: 'Cerrar',
				prevText: '< Ant',
				nextText: 'Sig >',
				currentText: 'Hoy',
				monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
				monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
				dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
				dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
				dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
				weekHeader: 'Sm',
				dateFormat: 'dd/mm/yy',
				firstDay: 1,
				isRTL: false,
				showMonthAfterYear: false,
				yearSuffix: ''
			};

			$.datepicker.setDefaults($.datepicker.regional['es']);
			var Today = new Date(); // fecha de hoy
			var inicio = new Date(Today.getYear()-100, Today.getMonth(), Today.getDate(), Today.getHours(), Today.getMinutes(), Today.getSeconds()); // Fecha de hoy menos 100 años

			$('.asistencia-fecha').datetimepicker({
				locale: 'es',
				minDate: inicio,
				maxDate: Today,
				format: 'DD-MM-YYYY',
				viewMode: 'days',
				ignoreReadonly: true,
				allowInputToggle: true
			});
			
		});
		</script>
		
	</body>
</html>