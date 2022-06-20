
@extends('welcome')
@section('content')
</div>
<div class="container mb-5">
 
    <div class="py-5 text-center">
      <h2>Checkout form</h2>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          <span class="badge bg-primary rounded-pill">{{Session::get('quantity')}}</span>
        </h4>
       <form action="{{route('place_order')}}" method="post"> 
        @csrf
        
        <ul class="list-group mb-3">
            @foreach(Session::get('cart') as $p)
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">{{ $p['name'] }}</h6>
              <small class="text-muted">{{ $p['price'] }} DT * {{$p['quantity']}} </small>
            </div>
            <span class="text-muted">{{$p['price'] * $p['quantity']}} DT</span>
          </li>
          @endforeach
         
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (DT)</span>
            <strong>{{Session::get('total')}} DT</strong>
          </li>
        </ul>

      
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Billing address</h4>
        {{-- <form class="needs-validation" novalidate> --}}
          <div class="row g-3">
            <div class="col-sm-12">
              <label for="firstName" class="form-label">First name and last name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="" required name="name">
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

          
     

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com" name="email">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-sm-6">
                <label for="lastName" class="form-label">City</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required name="city">
                <div class="invalid-feedback">
                  Valid City is required.
                </div>
              </div>

            <div class="col-sm-6">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required name="address">
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">Phone <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Phone" name="phone">
            </div>

  

          <hr class="my-4">
          @if(Session::has('total'))  
          @if(Session::get('total') != null) 
          <input class="w-100 btn btn-primary btn-lg mt-4" type="submit" value="Continue to checkout">
          @endif
          @endif
            </form>
      </div>
    </div>
 
	</section> <!--/#cart_items-->
	
	 </div>
    </div>

    @endsection