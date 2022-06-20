@extends('welcome')
@section('content')
</div>
<section class="about_section layout_padding">
    <div class="container  ">
      
      <div class="row">
        @foreach($product as $product)
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="../../images/{{$product->image}}" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
               {{$product->name}}
              </h2>
            </div>
            <p>
            {{$product->description}}
            </p>
            <p>
                {{$product->price}} DT
                </p>
            <a href="">
              Add to cart
            </a>
          </div>
        </div> @endforeach
      </div>
     
    </div>
  </section>
@endsection