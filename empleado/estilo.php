<form action="guardar_citas.php" method="POST" onsubmit="return validarFormulario()">
                            <!-- Aquí van los otros elementos del formulario -->

                            <div class="row">
                                <div class="col-md-6">


                                    <div class="form-group">
                                        <label for="usuario">DOCTOR:</label>
                                        <input type="text" class="form-control" id="usuario" name="usuario"
                                            value="<?php echo htmlspecialchars($nombre_usuario); ?>" readonly>
                                    </div>

                                </div>
                                <div class="col-md-6">



                                    <div class="form-group">
                                        <label for="expediente">NUMERO DE EXPEDIENTE:</label>
                                        <input type="number" class="form-control" id="expediente" name="expediente"
                                            readonly>
                                    </div>




                                </div>
                            </div>
                            <button id="btn-registrar" type="submit" class="btn btn-primary">REGISTRAR CLIENTE</button>
                        </form>