@extends('welcome')
@section('content')
</div>
<section class="food_section layout_padding">
    <div class="container">
      <section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  
				  <li class="active">Order n° {{$order_id}}</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">name</td>
							<td class="price">cost</td>
							<td class="quantity">Quantity</td>
							<td class="total">date</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						
						@foreach($details_array as $p)
						<tr>
							<td class="cart_product">
								<a href="#"><img src="../images/{{$p->product_image}}" style="width:90px; height:90px;"alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="#">{{ $p->product_name }}</a></h4>
							
							</td>
							<td class="cart_price">
								<p>${{ $p->product_price }} </p>
								
							</td>
							<td class="cart_quantity">
								<p>{{ $p->product_quantity }} </p>
							</td>
							
							<td class="cart_delete">
								<p>{{ $p->order_date }} </p>
							</td>
						</tr>
						
						@endforeach
						
					
					</tbody>

				

				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	
	
    </div>
  </section>

  @endsection