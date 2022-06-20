
@extends('welcome')
@section('content')
</div>
<section class="container mt-2 my-3 py-5">
    <div class="container mt-2 my-3 text-center">
<h1 text-align="center">Payment page</h1> <h2>    <span class="badge badge-primary mb-5"> Total : ${{ Session::get('total') }}</span></h2>
      {{--   @if(Session::has('total') && Session::get('total') != null)
        @if(Session::has('order_id') && Session::get('order_id') != null) --}}
        
        
        <div id="paypal-button-container"></div>
    {{--     @endif
        @endif --}}

</div>
</section>

<body>
    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=AbKyDfy3FcN7rwDbgqycZkOjYoxdaijGWeXU_jS40km67x-grUth2FVMMGLSUpvxi3iXqGUkWPbeHIL-&currency=USD"></script>
    <!-- Set up a container element for the button -->
   
    <script>
      paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '{{ Session::get('total') }}' // Can also reference a variable or function
              }
            }]
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            window.location.href = "/verify_payment/"+transaction.id
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
                // actions.redirect('/verify_payment/"${transaction.id}');
              // window.location.href = "/verify_payment/"+transaction.id;
             
             
          });
        }
      }).render('#paypal-button-container');
    </script>


@endsection