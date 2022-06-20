@extends('welcome')
@section('content')
</div>
<section class="food_section layout_padding">
    <div class="container">
      <section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  
				  <li class="active">My orders</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">order id</td>
							<td class="description">info</td>
							<td class="price">cost</td>
                            <td class="price text-center">status</td>
							<td class="quantity">Date</td>
							<td class="total">details</td>
							
						</tr>
					</thead>
					<tbody>
					
						@foreach($user_orders as $u)

						<tr>
							<td class="cart_product">
								<p>{{ $u->id }} </p>
							</td>
							<td class="cart_description">
                                <p>{{ $u->name }} </p><br>
                                <small>{{ $u->address }}</small>
							
							</td>
							<td class="cart_price">
                                <p>{{ $u->cost }} </p>
								
							</td>
                            <td class="cart_price text-center">
                                @if ($u->status == 'paid')

                                <span class="badge badge-success">Paid</span>
                                @else
                                <span class="badge badge-danger">Not paid</span>
                                @endif
								
							</td>
                            <td class="cart_price">
                                <p>{{ $u->date }} </p>
								
							</td>
							
							
							<td class="cart_delete">
							<a href="{{route('user_orders_details',['id'=>$u->id])}}" class="btn btn-info">show items</a>
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