<div class="row" >
	<div class="col-md-4">
	<h4 class="head-date">Asistencia SOLNET</h4>
	</div>
	<div class="col-md-8">
		<h4 class="head-date">Fecha Actual: <span id="FechaActualMostrar"></span> </h4>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-container">

					<div class="row">
						<div class="col-md-12">
							<div class="carousel slide" id="carousel-personal" data-interval="false">
								<ol class="carousel-indicators" hidden="hidden">
									<li class="active" data-slide-to="0" data-target="#carousel-personal">
									</li>
									<li data-slide-to="1" data-target="#carousel-personal">
									</li>
									<li data-slide-to="2" data-target="#carousel-personal">
									</li>
								</ol>
								<div class="carousel-inner">
									
										<?php 
										$ii = 0;
										$max = 18;
										$control = 18;
										include('mdl/m_get_personal.php');
										include('ctrl/error2.php');
										if ($errorCode == 0){

											$record = $result -> getRecords();
												
											/*-?> <div class="row"> <?php*/
											foreach ($record as $rec) {
												if ($ii == 0) { ?> <div class="item active"> <?php }
												if ($ii == $max) { $max = $max + $control; ?> </div><div class="item"> <?php }
												?>
												<div class="col-xs-4 col-sm-2 col-md-2 profile-img" id="<?php echo $rec->getField('RUT1 2'); ?>">
												<img id="<?php echo trim($rec->getField('Nombre')); ?>" class="profile-img-card on-panel" src="data:image/png;base64, <?php echo trim($rec->getField('FotoB64')); ?>"/>
												</div>
												<?php
												$ii++;
											}
											/*?> </div> <?php*/
										} ?> </div>
								</div> 
								<a id=carpv class="left carousel-control" href="#carousel-personal" data-slide="prev" hidden="hidden">
									<span class="glyphicon glyphicon-chevron-left"></span>
								</a>
								<a id=carnx class="right carousel-control" href="#carousel-personal" data-slide="next" hidden="hidden">
									<span class="glyphicon glyphicon-chevron-right"></span>
								</a>
							</div>
						</div>
					</div>

					
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-xs-12 col-md-12 btn-group">
				<button type="button" id="prevCarousel" class="col-sm-6 col-xs-6 btn btn-step btn-lg col-md-6"><span class="glyphicon glyphicon-circle-arrow-left"></span> ANTERIOR</button>
				<button type="button" id="nextCarousel" class="col-sm-6 col-xs-6 btn btn-step btn-lg col-md-6">SIGUIENTE <span class="glyphicon glyphicon-circle-arrow-right"></span></button>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<a name="timeStamp"></a>
				<input type="hidden" id="rut_ctrl" name="rut_ctrl">
				<input type="hidden" id="name_ctrl" name="name_ctrl">
				<input type="hidden" id="personal_ctrl" name="personal_ctrl">
				<h3 id="rut_selected"></h3>
				<h4 id="nombre_selected"></h4>
				<button type="button" class="btn btn-primary" id="ficha" style="display: none;"><span class="glyphicon glyphicon-print"></span> FICHA DE ASISTENCIA</button> 
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="InHour">Hora de Entrada</label>
					<input class="form-control input-lg" id="InHour" type="text" placeholder="00:00:00" readonly="readonly">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="OutHour">Hora de Salida</label>
					<input class="form-control input-lg" id="OutHour" type="text" placeholder="00:00:00" readonly="readonly">
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-12 col-xs-12 col-md-4 button-attendance-panel">
		<div class="col-sm-12 col-xs-12 col-md-12 button-attendance-div">
			<button type="button" id="entrada" class="col-sm-12 col-xs-12 btn btn-success btn-lg col-md-12 button-attendance">
				ENTRADA <span class="glyphicon glyphicon-log-in"></span>
			</button>
		</div>
		<div class="col-sm-12 col-xs-12 col-md-12 button-attendance-div">
			<button type="button" id="salida" class="col-sm-12 col-xs-12 btn btn-danger btn-lg col-md-12 button-attendance">
				SALIDA <span class="glyphicon glyphicon-log-out"></span>
			</button>
		</div>
		<div class="col-sm-12 col-xs-12 col-md-12 button-attendance-div">
			<button type="button" id="manual" class="col-sm-12 col-xs-12 btn btn-primary btn-lg col-md-12 button-attendance">
				INGRESO MANUAL <span class="glyphicon glyphicon-hand-up"></span>
			</button>
		</div>
		<div class="col-sm-12 col-xs-12 col-md-12 button-attendance-div">
			<button type="button" id="reporte" class="col-sm-12 col-xs-12 btn btn-info btn-lg col-md-12 button-attendance">
				REPORTE SEMANAL <span class="glyphicon glyphicon-eye-open"></span>
			</button>
		</div>
		<div class="col-sm-12 col-xs-12 col-md-12 button-attendance-div">
			<br><br>
			<button type="button" id="cerrar-sesion" class="col-sm-12 col-xs-12 btn btn-default btn-lg col-md-12 button-attendance">
				CERRAR SESI&Oacute;N <span class="glyphicon glyphicon-remove-sign"></span> 
			</button>
		</div>
	</div>
</div>
<!-- modales -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<!-- modal para el ingreso manual -->
			<a id="modal-manual" href="#modal-container" role="button" class="btn" data-toggle="modal" style="display: none;"></a>
			<div class="modal fade" id="modal-container" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">Ingreso Manual</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" id="form-ingreso-manual">
								<fieldset>
									<div class="form-group">
										<label class="col-md-3 control-label" for="rutManualCompleto">RUT</label>  
										<div class="col-md-3">
											<input id="rutManualCompleto" name="rutManualCompleto" type="text" placeholder="RUT" class="form-control input-md" required>
											<input id="rutManual" name="rutManual" type="hidden">
											<input id="dvManual" name="rutManual" type="hidden">
										</div>
										<div class="col-md-3">
											<div id="nameManual"></div>
										</div>
										<div class="col-md-3">
											<button type="button" class="btn btn-danger" id="boRutM" style="display: none;">Limpiar RUT</button> 
											<button type="button" class="btn btn-primary" id="buRutM" style="display: none;">Buscar RUT</button> 
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label" for="ingresoFecha">Fecha de Creaci&oacute;n</label>  
										<div class="col-md-4">
											<div class='input-group'>
												<input id="ingresoFecha" name="ingresoFecha" type="text" placeholder="DD/MM/YYYY" class="form-control input-md" required disabled="">
												<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar"></span>
												</span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label" for="asistenciaFecha">Fecha de Asistencia Manual</label>  
										<div class="col-md-4">
											<div class='input-group'>
												<input id="asistenciaFecha" name="asistenciaFecha" type="text" placeholder="DD-MM-YYYY" class="form-control date-input asistencia-fecha" required readonly="readonly">
												<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar"></span>
												</span>
											</div>
											<label for="asistenciaFecha" class="error"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label" for="horaEntradaManual">Hora de Entrada</label>  
										<div class="col-md-3">
											<input id="horaEntradaManual" name="horaEntradaManual" type="text" placeholder="00:00:00" class="form-control input-md" required>
										</div>
										<label class="col-md-2 control-label" for="horaSalidaManual">Hora Salida</label>  
										<div class="col-md-3">
											<input id="horaSalidaManual" name="horaSalidaManual" type="text" placeholder="00:00:00" class="form-control input-md">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label" for="obsManual">Observaciones</label>
										<div class="col-md-8">                     
											<textarea class="form-control" id="obsManual" name="obsManual" placeholder="Observaciones"></textarea>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal" id="cerrar-modal">Cerrar</button> 
							<button type="button" class="btn btn-primary" id="guardar-manual">Guardar Cambios</button>
						</div>
					</div>
				</div>
			</div>
			<!-- modal para el reporte semanal -->
			<a id="modal-reporte" href="#modal-reporte-container" role="button" class="btn" data-toggle="modal" style="display: none;"></a>
			<div class="modal fade" id="modal-reporte-container" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								×
							</button>
							<h4 class="modal-title" id="myModalLabel">
								Reporte Semanal de Asistencia
							</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								
							</div>
							<div class="table-responsive">
								<table class="table" id="reporte-semanal-table">
									<thead>
										<th>Semana</th>
										<th>Lunes</th>
										<th>Martes</th>
										<th>Miercoles</th>
										<th>Jueves</th>
										<th>Viernes</th>
										<th>Sabado</th>
										<th>Domingo</th>
										<th>Horas Semanales</th>
									</thead>
									<tbody></tbody>
								</table>
							</div>
							<div>
								
							</div>
						</div>
						<div class="modal-footer">
							 
							<button type="button" class="btn btn-default" data-dismiss="modal">
								Cerrar
							</button> 
							<button type="button" class="btn btn-primary">
								Guardar Cambios?
							</button>
						</div>
					</div>
					
				</div>
			</div>
			<!-- modal para la ficha de asistencia -->
			<a id="modal-ficha" href="#modal-ficha-container" role="button" class="btn" data-toggle="modal" style="display: none;"></a>
			<div class="modal fade" id="modal-ficha-container" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								×
							</button>
							<h4 class="modal-title" id="myModalLabel">
								Imprimir Ficha de Asistencia
							</h4>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<h5>Debe indicar la fecha de Asistencia para imprimir su ficha.</h5>
								</div>
								<div class="form-group">
									<div class="col-md-4">
										<label class="control-label" for="RUTficha">RUT</label>
										<input id="RUTficha" name="RUTficha" type="text" class="form-control" required readonly="readonly">
									</div>
									<div class="col-md-4">
										<label class="control-label" for="nombreficha">Nombre</label>
										<input id="nombreficha" name="nombreficha" type="text" class="form-control" required readonly="readonly">
									</div>
									<div class="col-md-4">
										<label class="control-label" for="fechaFicha">Fecha de Asistencia</label>
										<div class='input-group'>
											<input id="fechaFicha" name="fechaFicha" type="text" placeholder="DD-MM-YYYY" class="form-control date-input asistencia-fecha" required readonly="readonly">
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
										<label for="fechaFicha" class="error"></label>
									</div>
									<div class="col-md-4"></div>
								</div>
							</div>
							<div class="row">
								<div class="embed-container">
									<iframe src="" frameborder="0" allowfullscreen id="ficha-asistencia"></iframe>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							 
							<button type="button" class="btn btn-default" data-dismiss="modal">
								Cerrar
							</button> 
							<button type="button" class="btn btn-primary" id="print-ficha">
								<span class="glyphicon glyphicon-print"></span> Imprimir Ficha
							</button>
						</div>
					</div>
					
				</div>
			</div>
			<!-- fin de los modales -->
		</div>
	</div>
</div>
<!-- /modales -->