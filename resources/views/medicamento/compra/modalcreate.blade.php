<form role="form" id="formAgregarCompra">
        <div class="modal-header">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="medi">
                <label class="col-md-2">Medicamento</label>
                <div class="col-md-6">
                    <input type="text" name="" placeholder="Medicamento a comprar" class="form-control" disabled="">
                </div>

                <div class="col-md-4">
                    <a href="javascript:void(0);" onclick="cargarbusqueda(2);">
                        <button type="button" class="btn btn-info btn-md" id="buscarmedicamento" title="Buscar medicamento" value=""><i class="fa fa-search"></i></button>
                    </a>
                    <a href="javascript:void(0);" onclick="cargarmodal(2);">
                        <button type="button" class="btn btn-primary btn-md" id="nuevomedicamento" title="Nuevo medicamento" value=""><i class="fa fa-plus-square"></i></button>
                    </a>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="prov">
                <div><br></div>
                
                <label class="col-md-2">Proveedor</label>
                <div class="col-md-6">
                    <input type="text" name="" placeholder="Proveedor..." class="form-control" disabled="" id="provee">
                    <input type="hidden" id="idproveedor">                
                </div>

                <div class="col-md-4">
                    <a href="javascript:void(0);" onclick="cargarbusqueda(6);">
                        <button type="button" class="btn btn-info btn-md" id="buscarproveedor" title="Buscar Proveedor" value=""><i class="fa fa-search"></i></button>
                    </a>
                    <a href="javascript:void(0);" onclick="cargarmodal(6);">
                        <button type="button" class="btn btn-primary btn-md" id="nuevoproveedor" title="Nuevo Proveedor" value=""><i class="fa fa-plus-square"></i></button>
                    </a>
                </div>
            </div>
        </div>

        <div class="modal-header">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ubic">
                <label class="col-md-2">Ubicación</label>
                <div class="col-md-6">
                    <input type="text" name="" id="ubicacion" placeholder="Habitacion-Estanteria-Coordenada" class="form-control" disabled="">
                    <input type="hidden" id="idubicacion">  
               </div>

                <div class="col-md-4">
                    <a href="javascript:void(0);" onclick="cargarbusqueda(7);">
                        <button type="button" class="btn btn-info btn-md" id="buscarubicación" title="Buscar ubicacion" value=""><i class="fa fa-search"></i></button>
                    </a>
                    <a href="javascript:void(0);" onclick="cargarmodal(7);">
                        <button type="button" class="btn btn-primary btn-md" id="nuevaubicación" title="Nueva ubicacion" value=""><i class="fa fa-plus-square"></i></button>
                    </a>
                </div>
            </div>
        </div>

        <div class="modal-header">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label">Fecha compra</label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="buy_date" type="text" class="form-control" placeholder="dd/mm/yyyy">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label">Fecha vencimiento</label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="expiration_date" type="text" class="form-control" placeholder="dd/mm/yyyy">
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-header">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Precio</label>
                <input type="number" id="precio" class="form-control" placeholder="Q00.00">
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Cantidad</label>
                <input type="number" id="cantidad" class="form-control" placeholder="0">
            </div>
        </div>
    </form>