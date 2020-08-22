@extends('layouts.app')
@section('content')

<style>
    body{margin-top:50px;
background:rgb(36, 32, 32);
}


/*
* @subsection Shop
*/
.product {
  padding-top: 5px;
  padding-bottom: 5px;
  margin-left: auto;
  margin-right: auto;
}

.product .caption {
  margin-top: 15px;
}

.product .caption h6 {
  color: #644549;
}

.product .caption .price + .price {
  margin-left: 15px;
}

.product.tumbnail {
  box-shadow: 0 5px 25px 0 transparent;
  transition: 0.3s linear;
  padding-top: 0;
}

.product.tumbnail img:hover {
  box-shadow: 0 5px 25px 0 rgba(0, 0, 0, 0.2);
}

.single-product span {
  display: inline-block;
}

.single-product .rating .fa-star, .single-product .rating .fa-star-o {
  font-size: 16px;
  color: #f7d4a0;
  margin-left: 2px;
}

.single-product .rating + * {
  margin-left: 15px;
}

.single-product h1.h1-variant-2 {
  margin-bottom: 20px;
}

.single-product .caption:before {
  content: '';
  height: 100%;
  display: inline-block;
  vertical-align: middle;
}

.single-product .caption span {
  display: inline-block;
  vertical-align: middle;
}

.single-product .caption .price {
  font-weight: 400;
}

.single-product .caption .price.sale {
  color: #e75854;
  font-size: 33px;
}

.single-product .caption * + .price {
  margin-left: 10.8%;
}

@media (max-width: 1199px) {
  .single-product .caption * + .price {
    margin-left: 7.8%;
  }
}

.single-product .caption * + .quantity {
  margin-left: 26px;
}

.single-product .caption .info-list {
  border-bottom: 1px solid #00ccff;
  border-top: 1px solid #dbdb23;
  font-family: Montserrat, sans-serif;
  padding-top: 26px;
  padding-bottom: 26px;
  text-align: left;
}

.single-product .caption .info-list dt, .single-product .caption .info-list dd {
  display: inline-block;
  line-height: 25px;
  padding-top: 10px;
  padding-bottom: 10px;
}

.single-product .caption .info-list dt {
  letter-spacing: 0.08em;
  font-size: 12px;
  color: #a7b0b4;
  width: 35%;
  text-transform: uppercase;
}

.single-product .caption .info-list dd {
  font-size: 15px;
  color: #dd7813;
  width: 62.5%;
}

.single-product .caption .share span.small {
  margin-top: 9px;
}

@media (max-width: 991px) {
  .single-product .caption .share span.small {
    display: block;
    margin-bottom: 15px;
  }
}

@media (max-width: 767px) {
  .single-product .table-mobile tr {
    padding-top: 0;
  }
  .single-product .table-mobile tr:before {
    display: none;
  }
}

.price {
  display: inline-block;
  font-size: 15px;
  font-family: Montserrat, sans-serif;
  font-weight: 700;
  letter-spacing: 0.02em;
  color: #1fff01;
}

.price.sale {
  color: #151615;
}

.price del {
  color: #d322ca;
}

.quantity {
  text-align: center;
  font-family: Montserrat, sans-serif;
  font-size: 12px;
  background: #000000;
  padding-top: 5px;
  padding-bottom: 5px;
  width: 82px;
  height: auto;
  display: inline-block;
}

.quantity span {
  display: inline-block;
}

.quantity .num {
  width: 26px;
}

.quantity [class*='fa-'] {
  padding-top: 4px;
  width: 22px;
  padding-bottom: 4px;
  color: #079ee9;
  cursor: pointer;
}

.quantity [class*='fa-']:hover {
  color: #f5f5f5;
}
</style>
@section("content")
<div class="container bootstrap snipets">
    <h1 class="text-center text-muted">productos de la tienda </h1>
    <div class="row flow-offset-1">
        @foreach ($datos as $item)

        <div class="col-xs-6 col-md-4">
            <div class="product tumbnail thumbnail-3"><a href="#"><img src="{{ asset('storage').'/'.$item->imagen}}" style="width:200px; height:200px;" alt=""></a>
            <div class="caption">
                <h6><a href="#">{{$item->Producto}}</a></h6><span class="price">
                </span><span class="price sale">{{$item->precio}}</span>
            </div>
            </div>
        </div>
        @endforeach

    </div>
  </div>
  {{ $datos->links() }}
  @endsection
