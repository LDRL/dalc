<form role="form" id="formAgregarRequisicion">
        <div class="modal-header">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="medi">
                <label class="col-md-2">Medicamento</label>
                <div class="col-md-6">
                    <input type="text" name="" placeholder="Medicamento a descargar" class="form-control" disabled="">
                </div>

                <div class="col-md-4">
                    <a href="javascript:void(0);" onclick="cargarbusqueda(2);">
                        <button type="button" class="btn btn-info btn-md" id="nuevotipomedicamento" title="Buscar ubicacion" value=""><i class="fa fa-search"></i></button>
                    </a>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="prov">
                <div><br></div>
                <label class="col-md-2">Paciente</label>
                <div class="col-md-6">
                    <input type="text" name="" placeholder="Paciente..." class="form-control" disabled="">
                
                </div>

                <div class="col-md-4">
                    <a href="javascript:void(0);" onclick="cargarbusqueda(6);">
                        <button type="button" class="btn btn-info btn-md" id="nuevotipomedicamento" title="Buscar Proveedor" value=""><i class="fa fa-search"></i></button>
                    </a>
                </div>
            </div>
        </div>

        <div class="modal-header">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Cantidad</label>
                <input type="number" id="cantidad" class="form-control" placeholder="0">
            </div>
        </div>
    </form>