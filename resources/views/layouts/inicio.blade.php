<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hogar Hermano Pedro</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>
<body id="page-top" class="landing-page no-skin-config">
<div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--<a class="navbar-brand" href="index.html">WEBAPPLAYERS</a>-->
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="page-scroll" href="#page-top">Inicio</a></li>
                        <li><a class="page-scroll" href="#features">Quiénes somos</a></li>
                        <li><a class="page-scroll" href="#bienechor">Sé parte de nosotros</a></li>
                        <li><a class="page-scroll" href="#contact">Contáctenos</a></li>
                        <li><a class="page-scroll" href="{{ url('/login') }}">Iniciar sesión</a></li>

                    </ul>
                </div>
            </div>
        </nav>
</div>
<div id="inSlider" class="carousel carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#inSlider" data-slide-to="0" class="active"></li>
        <li data-target="#inSlider" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="container">
                <div class="carousel-caption">
                <!--
                    <h1>We craft<br/>
                        brands, web apps,<br/>
                        and user interfaces<br/>
                        we are IN+ studio</h1>
                    <p>Lorem Ipsum is simply dummy text of the printing.</p>
                    <p>
                        <a class="btn btn-lg btn-primary" href="#" role="button">READ MORE</a>
                        <a class="caption-link" href="#" role="button">Inspinia Theme</a>
                    </p>
                  -->
                </div>
                <div class="carousel-image wow zoomIn">
                    <img src="img/landing/laptop.png" alt="laptop"/>
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back one"></div>

        </div>
        <div class="item">
            <div class="container">
                <div class="carousel-caption blank">
                <!--
                    <h1>We create meaningful <br/> interfaces that inspire.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                -->
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back two"></div>
        </div>
    </div>
    <a class="left carousel-control" href="#inSlider" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="right carousel-control" href="#inSlider" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
    </a>
</div>



<section id="features" class="container services">
    <div class="row">
    

        <div class="col-sm-12">
            <div class="col-lg-10" align="center">

            <h2><strong>Quiénes somos</strong></h2>

            <h3>
            	Hogar del Niño Minusválido “Hermano Pedro”, obra caritativa que vive de la Divina Providencia, fue fundado por el franciscano P. José Baldán (de Sossano – Vicenza- Italia) a comienzo del 1,989. <br>
            	<br>
			
				El Hogar se dedica a albergar niños con capacidades distintas, abandonados o de familias muy pobres brindándoles todos los cuidados de acuerdo a sus necesidades. En sí, no es una guardería, ni tampoco un hospital, sino un Hogar en el cual se formó una familia en la que los niños se sienten en total confianza, tratados con cariño y pueden manifestarse con alegría espontánea, dichosos de sentirse bien entre nosotros. <br><br>
				
				El Hogar en la actualidad, cuenta con una población de 70 niños y niñas con diferentes problemas de minusvalías, todos provenientes de familias muy pobres y de diferentes departamentos de Guatemala. <br><br>
				
				Esta obra vive de la caridad, ningún niño por ser todos de familias paupérrimas, paga algo. No tenemos ninguna ayuda del gobierno como tampoco de instituciones privadas guatemaltecas o internacionales que nos aseguren sus aportes con periodicidad. Pero agradecemos la ayuda generosa de personas particulares que amorosamente llegan al Hogar llevando su aporte económico o en especies. Algunos colegios/escuelas colaboran con nosotros con varios tipos de aportes
			</h3>
			</div>
        </div>
    </div>
</section>

<section id="bienechor" class="gray-section team">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1><strong>Sé parte de nosotros.</strong></h1>
                <p></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 wow fadeInLeft">
                <div class="team-member">
                    <h3><strong>Italia</strong></h3>
                    <p>Dati per versamenti bancari in Italia</p>
                    <ul class="list-inline social-icon">
                    	<address>
                    	Carissimi, non senza un pó di disagio, ma animato dallo stesso nostro Padre San Francesco che ci comanda di "chiedere di porta in porta", mi son deciso di comunicare anche a voi come collaborare con il nostro Hogar, in maniera piú spedita e sicura. Lo faccio soprattutto perché ogni tanto qualcuno mi chiede gli estremi per inviarci un bonifico. E allora: indirizzare l'eventuale offerta a: <br/><br/>

                    	MISSIONI FRANCESCANE <br/>
                    	VIA SAN GIACOMO, 17 <br/>
                    	35043 - MONSELICE (PADOVA), ITALIA <br/>
                    	CONTO CORRENTE POSTALE: No: 10.53.53 <br>

                    	Indicando che l'aiuto é per l'HOGAR DEL NIÑO MINUSVÁLIDO "HERMANO PEDRO" di Quetzaltenango - Guatemala. <br>

                    	<strong>Fin d'ora, con i nostri bambini, desidero ringraziare e invocare per voi e i vostri cari, le piú belle grazie del Cielo. </strong><br>
                    	P. Gian Luigi Lazzaro ofm.


		                </address>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member wow zoomIn">
                    <h3><strong>Guatemala</strong></h3>
                    <p>Datos bancarios para los bienhechores de Guatemala.</p>
                    <ul class="list-inline social-icon">
	                    <address>
		                    <strong>Banco: Refomador (Bancor)</strong> <br/>
		                    Depósito de ahorro<br/>
		                    Cuenta No. 44-50651-62 <br>
		                    A nombre de: Hogar del Niño Minusválido "Hermano Pedro" <br>
		                    <strong>POR FAVOR: HECHO EL DEPÓSITO COMUNICARNOS: <br>
		                    SU NOMBRE, LA FECHA DEL DEPÓSITO Y EL MONTO <br>
		                    </strong>
		                    
		                    <abbr title="Telefono"><strong>Por Teléfono:</strong></abbr> (502) 7763-1821 <br/>
		                    <abbr title="Fax"><strong>Por Fax:</strong></abbr> (502) 7763-3827 <br>
		                    <abbr title="Correo Electronico"><strong>Por Correo Electrónico:</strong></abbr> hnito.pedro@gmail.com
		                </address>
                    </ul>
                </div>
            </div>

            <div class="col-sm-4 wow fadeInRight">
                <div class="team-member">
                    <h3><strong>Para los bienhechores de España, USA y otros paises</strong></h3>
                    <p>EL DEPOSITO TIENE QUE SER EN DOLARES USA.</p>
                    <ul class="list-inline social-icon">
                    	<strong>BENEFICIARY BANK:</strong>  BANK OF AMÉRICA <br>
                                          100 West 33rd Street 4th. Floor <br>
                                          NEW YORK CITY, NY 10001 United States <br>
                        <strong>FED WIRE, ABA:</strong>026009593 <br>	
                        <strong>SWIFT: </strong> BOFAUS3N	<br>
                        <strong>BENEFICIARY ACCOUNT NO:</strong>1901910160 <br>
                        <strong>BENEFICIARY ACCOUNT NAME:</strong>WESTRUST BANK <br>
                                                                  Via 5, 5-34 Zona 04, Centro
                                                                  Torre III, Penthouse Nivel 12
                        <strong>MUY IMPORTANTE:</strong><br>
                        <strong>BENEFICIARY INFO: </strong><br>
                        <strong>FINAL BENEFICIARY ACCT NO: </strong>200033131-4 <br>
                        <strong>FINAL BENEFICIARY ACCT NAMNE:</strong>HOGAR DEL NIÑO MINUSVÁLIDO HERMANO PEDRO <br>

                        <strong>POR FAVOR: HECHO EL DEPÓSITO COMUNICARNOS: <br>
		                    SU NOMBRE, LA FECHA DEL DEPÓSITO Y EL MONTO <br>
		                </strong>    
		                    <abbr title="Telefono"><strong>Por Teléfono:</abbr></strong> (502) 7763-1821 <br/>
		                    <abbr title="Fax"><strong>Por Fax:</abbr></strong> (502) 7763-3827 <br>
		                    <abbr title="Correo Electronico"><strong>Por Correo Electrónico:</abbr></strong> hnito.pedro@gmail.com

                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="contact" class="gray-section contact">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1> <strong>Contáctos</strong></h1>
            </div>
        </div>
        <div class="row m-b-lg">
            <div class="col-lg-5 col-lg-offset-5">
                <address>
                    <!--<strong><span class="navy">Company name, Inc.</span></strong><br/> -->
                    <abbr title="Dirección"><strong>Dirección:</strong></abbr> 8 calle 0-50, zona 4 Quetzaltenango,Guatemala C.A.<br/>
                    <abbr title="Telefono"><strong>Teléfono:</abbr></strong> (502) 7763-1821 <br/>
                    <abbr title="Fax"><strong>Fax:</strong></abbr> (502) 7763-3827 <br/>
                    <abbr title="Correo Electronico"><strong>Correo Electrónico:</strong></abbr> hnito.pedro@gmail.com

                </address>
            </div>
        </div>
    </div>
</section>

<!-- Mainly scripts -->
<script src="{{asset('assets/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('assets/js/inspinia.js')}}"></script>
<script src="{{asset('assets/js/plugins/pace/pace.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/wow/wow.min.js')}}"></script>


<script>

    $(document).ready(function () {

        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });

    var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
                header = document.querySelector( '.navbar-default' ),
                didScroll = false,
                changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

</script>

</body>
</html>
