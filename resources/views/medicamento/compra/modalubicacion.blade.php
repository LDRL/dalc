<label class="col-md-2">Ubicacion</label>
                <div class="col-md-6">
                @if (isset($ubicacion))
                    <input type="text" id="ubicacion" value="{{$ubicacion->habitacion.' '.$ubicacion->estanteria.' '. $ubicacion->coordenada}}" class="form-control" disabled=""> 
                    <input type="hidden" name="" value="{{$ubicacion->idubicacion}}" id="idubicacion">
                @endif
               </div>

                <div class="col-md-4">
                    <a href="javascript:void(0);" onclick="cargarbusqueda(7);">
                        <button type="button" class="btn btn-info btn-md" id="buscarubicacion" title="Buscar ubicación" value=""><i class="fa fa-search"></i></button>
                    </a>
                    <a href="javascript:void(0);" onclick="cargarmodal(7);">
                        <button type="button" class="btn btn-primary btn-md" id="nuevaubicacion" title="Nueva ubicación" value=""><i class="fa fa-plus-square"></i></button>
                    </a>
                </div> 
