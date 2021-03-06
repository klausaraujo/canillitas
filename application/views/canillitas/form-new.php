			<div class="container-fluid">
				<form id="formCanillita" name="formCanillita" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
					<div class="row">                 
						<div class="col-sm-12">
							<div class="iq-card">
								<div class="iq-card-header d-flex justify-content-between">
									<div class="iq-header-title">
										<h4 class="card-title">Datos Personales</h4>
									</div>
								</div>
								<div class="iq-card-body">
									  <div class="form-group row mt-0">
										 <div class="add-img-user profile-img-edit col-sm-2">
										 <input type="hidden" name="foto_dni_str" id="foto_dni_str" value="">
										 <img class="profile-pic img-fluid" id="blah" src="<?=base_url()?>public/template/images/camera.png" alt="profile-pic">
											<div class="p-image mt-0">
											   <input class="file-upload" type="file" accept="image/*">
											</div>
											<div class="custom-file">
												<input type="file" id="file" name="file" class="imgInp custom-file-input" aria-describedby="inputGroupFileAddon01">
												<label class="custom-file-label" for="file">Escoger Imagen</label>
											</div>
										 </div>
									  </div>
									  <? 
										$dtz = new DateTimeZone("America/Lima");
										$dt = new DateTime("now", $dtz);
										$fechaActual = $dt->format("Y-m-d");
										//$fechaActual = str_replace("-","/",$fechaActual);
										//echo $fechaActual;
									?>
									<br><hr class="mt-0">
									  <div class="form-group row">
											<label for="documento_numero" class="col-sm-3">Documento Identidad:</label>
											<input type="number" class="form-control col-sm-5" id="documento_numero" name="documento_numero" placeholder="Numero de identidad">
											<span class="input-group-btn col-sm-2">
												<button type="button" id="btn-buscar" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i>Buscar</button>
											</span>
									  </div>
									  <div class="form-group row">
											<label for="nombres" class="col-sm-3">Nombres:</label>
											<input type="text" class="form-control col-sm-7" id="nombres" name="nombres" placeholder="Nombres">
									  </div>
									  <div class="form-group row">
											<label for="apellidos" class="col-sm-3">Apellidos:</label>
											<input type="text" class="form-control col-sm-7" id="apellidos" name="apellidos" placeholder="Apellidos">
									  </div>
									  <div class="form-group row">
											<label for="FechaNac" class="col-sm-3">Fecha Nac.:</label>
											<input type="date" class="form-control col-sm-2" name="fechaNac" id="fechaNac" value="<?=$fechaActual?>"/>
											<span class="col-sm-1"></span>
											<label for="genero" class="col-sm-2">G&eacute;nero:</label>
											<select class="form-control col-sm-2" name="genero" id="genero">
												<option value="">-- Seleccione --</option>
												<option value="1">Masculino</option>
												<option value="2">Femenino</option>
												<option value="3">Otros</option>
											</select>
									  </div>
									  <div class="form-group row">
											<label for="edoCivil" class="col-sm-3">Edo. Civil:</label>
											<select class="form-control col-sm-2" name="edoCivil" id="edoCivil">
												<option value="">-- Seleccione --</option>
												<option value="1">Soltero</option>
												<option value="2">Casado</option>
												<option value="3">Viudo</option>
												<option value="4">Concubino</option>
												<option value="5">Otros</option>
											</select>
											<span class="col-sm-1"></span>
											<label for="condic" class="col-sm-2">Condici&oacute;n:</label>
											<select class="form-control col-sm-2" name="condic" id="condic">
												<option value="">-- Seleccione --</option>
												<option value="1">Uno</option>
												<option value="2">Dos</option>
												<option value="3">Tres</option>
											</select>
									  </div>
									  <div class="form-group row">
											<label for="domicilio" class="col-sm-3">Direcci&oacute;n:</label>
											<textarea type="text" class="form-control col-sm-7" id="domicilio" name="domicilio" placeholder="Direcci&oacute;n"></textarea>
									  </div>
									  <div class="form-group row">
											<label for="tlf1" class="col-sm-3">Tlfno. 01:</label>
											<input type="number" class="form-control col-sm-2" id="tlf1" name="tlf1" placeholder="Tel&eacute;fono 01">
											<span class="col-sm-1"></span>
											<label for="tlf2" class="col-sm-2">Tlfno. 02:</label>
											<input type="number" class="form-control col-sm-2" id="tlf2" name="tlf2" placeholder="Tel&eacute;fono 02">
									  </div>
									  <div class="form-group row">
											<label for="correo" class="col-sm-3">Email:</label>
											<input type="text" class="form-control col-sm-7" id="correo" name="correo" placeholder="Correo">
									  </div>
									  <div class="form-group row">
											<label for="observacion" class="col-sm-3">Observaciones:</label>
											<input type="text" class="form-control col-sm-7" id="observacion" name="observacion" placeholder="Observaciones">
									  </div>
								</div>
								<div class="col-sm-12 font-weight-bold"><h6 id="cargando" class="succes pt-2 pb-3" style="display:none"></h6></div>
								<div class="col-sm-12 font-weight-bold"><h6 id="message" class="succes pt-2 pb-3" style="display:none"></h6></div>
								<div class="col-sm-4 ml-auto mr-auto pb-3">
									<button type="submit" class="btn btn-primary mx-3" id="btnEnviar">Guardar registro</button>
									<button class="btn btn-primary" id="btnCancelar" name="btnCancelar" role="button" data-dismiss="modal" aria-pressed="true">Cancelar</button>
								</div>
							</div>
						</div>
					</div>
					
				</form>
			</div>