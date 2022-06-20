@extends('welcome')
@section('content')
</div>
<section class="food_section layout_padding">
    <div class="container">
      <section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@if(Session::has('cart'))
						@foreach(Session::get('cart') as $p)
						<tr>
							<td class="cart_product">
								<a href="#"><img src="../images/{{$p['image']}}" style="width:90px; height:90px;"alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="#">{{ $p['name'] }}</a></h4>
							
							</td>
							<td class="cart_price">
								<p>{{ $p['price'] }} DT</p>
								
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form method="post" action="{{route('edit_product_quantity')}}">
										@csrf
									<input type="submit" class="cart_quantity_down" name="up_prod" value="+">
									<input type="hidden" name="id" value="{{ $p['id'] }}">
									<input  type="text" name="quantity" value="{{ $p['quantity']}}" readonly size="1">
									<input type="submit" class="cart_quantity_up" name="down_prod" value="-">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$p['price'] * $p['quantity']}} DT</p>
							</td>
							<td class="cart_delete">
								<form method="post" action="{{route('remove_from_cart')}}">
									@csrf
							
								<input type="hidden" name="id" value="{{ $p['id'] }}">
								<input class="cart_quantity_delete" class="btn btn-danger" type="submit" value="x">
								</form>
							</td>
						</tr>
						
						@endforeach
						@endif
					
					</tbody>

				

				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<hr class="mb-5">
	<div class="row">
		@if(Session::has('cart'))
	<div class="col-10"></div>
	@if(Session::has('total'))
	<div class="col-2"><span class="alert alert-info">Total :{{Session::get('total')}} DT</span></div>
	@endif
	</div>
	@endif
	<div class="row mt-5">
	<div class="col-10"></div>
	<div class="col-2">
		@if(Session::has('total'))  <!-- itha fama total -->
			@if(Session::get('total') != null) <!-- nrecuperiw total w ntastiw 3lih -->
		<form action="{{route('checkout')}}" method="GET">
		<input type="submit" class="btn btn-success btn-block" value="checkout">
		</form>
		@endif
		@endif
	</div>
	</div>
	
    </div>
  </section>

  @endsection