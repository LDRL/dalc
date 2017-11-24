@extends ('layouts.index')

@section('estilos')
    @parent

    @endsection

@section ('contenido')
<!--
<div class="col-sm-12">
    <div class="card-box">
        <div class="row"> 
            <div class="col-md-12">
                @if (isset($tableroini))
                <div id="carousel-example-captions" data-ride="carousel" class="carousel slide">
                    <ol class="carousel-indicators">
                    @for($i =0; $i < count($tableroini); $i++)
                    @if($i == 0)
                        <li data-target="#carousel-example-captions" data-slide-to="0" class="active"></li>
                    @else
                        <li data-target="#carousel-example-captions" data-slide-to="' . $i . '"></li>
                    @endif
                    @endfor 
                    </ol>
                    <div role="listbox" class="carousel-inner">
                    @for($i =0; $i< count($tableroini); $i++)
                    @if($i == 0)
                        <div class="item active">
                    @else
                        <div class="item">
                    @endif
                        <img src="{{asset('tablero/'.$tableroini[$i]->imagen)}}" alt="First slide image">
                        </div>
                    @endfor
                        </div>
                    <a href="#carousel-example-captions" role="button" data-slide="prev" class="left carousel-control"> <span aria-hidden="true" class="fa fa-angle-left"></span> <span class="sr-only">Previous</span> </a>
                    <a href="#carousel-example-captions" role="button" data-slide="next" class="right carousel-control"> <span aria-hidden="true" class="fa fa-angle-right"></span> <span class="sr-only">Next</span> </a>
                    </div>
                @endif</div>
        </div>
    </div>
</div>
-->

<div class="col-sm-12">
    <div class="card-box">
        <div class="row"> 
            <div class="col-md-12">
                <div id="carousel-example-captions" data-ride="carousel" class="carousel slide">
                    <ol class="carousel-indicators">
                    	<li data-target="#carousel-example-captions" data-slide-to="0" class="active"></li>
                    	<li data-target="#carousel-example-captions" data-slide-to="1"></li> 
                    </ol>
                    <div role="listbox" class="carousel-inner">
                        <div class="item active">
                        	<img src="{{asset('assets/img/p_big3.jpg')}}" alt="First slide image">
                        </div>
            
                        <div class="item">
                        	<img src="{{asset('assets/img/p_big1.jpg')}}" alt="First slide image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<!-- blueimp gallery -->


