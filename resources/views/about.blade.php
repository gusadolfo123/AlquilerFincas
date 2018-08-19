@extends('layouts.app')

@section('content')


<div class="row-fluid myBody">
    <div class="container">
        <div class="row align-items-center justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="card border-success mb-3 my-5">
                        <div class="card-header" style="font: normal normal normal 40px/1.1em Niconne,fantasy"><p class="h2">Alquilamos Fincas S.A.S</p></div>
                        <div class="card-body text-success">
                            <p class="card-text">
                                <strong>ALQUILAMOS FINCAS S.A.S</strong>, es una empresa que tiene como objetivo brindar a nuestros clientes comodidad, 
                                y confiabilidad en todos nuestros servicios de alquileres, ofreciendo un extenso portafolio de propiedades 
                                en todo el territorio nacional, brindando la calidad que nuestros clientes meren para que disfruten de un 
                                descanso inolvidable en cualquier lugar del país.
                            </p>
                        </div>
                    </div>

                </div>
        </div>
    </div>
</div>

<!-- <div class="container text-center my-3">
    <h2>Bootstrap 4 Multiple Item Carousel</h2>
    <div class="row mx-auto my-auto">
        <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item carousel-item-about active">
                    <img class="d-block col-1 img-fluid" src="http://placehold.it/350x180?text=1">
                </div>
                <div class="carousel-item carousel-item-about">
                    <img class="d-block col-1 img-fluid" src="http://placehold.it/350x180?text=2">
                </div>
                <div class="carousel-item carousel-item-about">
                    <img class="d-block col-1 img-fluid" src="http://placehold.it/350x180?text=3">
                </div>
                <div class="carousel-item carousel-item-about">
                    <img class="d-block col-1 img-fluid" src="http://placehold.it/350x180?text=4">
                </div>
                <div class="carousel-item carousel-item-about">
                    <img class="d-block col-1 img-fluid" src="http://placehold.it/350x180?text=5">
                </div>
                <div class="carousel-item carousel-item-about">
                    <img class="d-block col-1 img-fluid" src="http://placehold.it/350x180?text=6">
                </div>
            </div>
            <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <h4>Advances one slide at a time</h4>
</div>

@section('scripts')
    <script>
        $('.carousel .carousel-item').each(function(){
            var next = $(this).next();
            if (!next.length) {
            next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));
            
            if (next.next().length>0) {
            next.next().children(':first-child').clone().appendTo($(this));
            }
            else {
            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
            }
        });
    </script>
@endsection -->
    
@endsection
