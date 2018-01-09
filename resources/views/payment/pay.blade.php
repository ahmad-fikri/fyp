@extends('master')
@section('title', 'Topup Credit')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">

            <div class="row">
                <div class="col-md-4">
                    <img src="images/rm10.jpg" class="img-responsive">
                    <form action="/charge10" method="POST">
                      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                      <script
                        src="https://checkout.stripe.com/checkout.js"
                        class="stripe-button"
                        data-key="pk_test_6pRNASCoBOKtIshFeQd4XMUh"
                        data-image="images/printer.png"
                        data-name="Topup Credit"
                        data-description="Topup your credit to pay your order"
                        data-amount="1000"
                        data-currency="MYR"
                        data-label="Topup RM10 Now"
                        data-email="{{ Auth::user()->email }}"
                        >
                      </script>
                    </form>
                </div>
                <div class="col-md-4">
                    <img src="images/rm20.jpg" class="img-responsive">
                    <form action="/charge20" method="POST">
                      <input type="hidden" name="_token" value="{!! csrf_token() !!}"> 
                      <script
                        src="https://checkout.stripe.com/checkout.js"
                        class="stripe-button"
                        data-key="pk_test_6pRNASCoBOKtIshFeQd4XMUh"
                        data-image="images/printer.png"
                        data-name="Topup Credit"
                        data-description="Topup your credit to pay your order"
                        data-amount="2000"
                        data-currency="MYR"
                        data-label="Topup RM20 Now"
                        data-email="{{ Auth::user()->email }}"
                        >
                      </script>
                    </form>
                </div>
                <div class="col-md-4">
                    <img src="images/rm50.jpg" class="img-responsive">
                    <form action="/charge50" method="POST">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                      <script
                        src="https://checkout.stripe.com/checkout.js"
                        class="stripe-button"
                        data-key="pk_test_6pRNASCoBOKtIshFeQd4XMUh"
                        data-image="images/printer.png"
                        data-name="Topup Credit"
                        data-description="Topup your credit to pay your order"
                        data-amount="5000"
                        data-currency="MYR"
                        data-label="Topup RM50 Now"
                        data-email="{{ Auth::user()->email }}"
                        >
                      </script>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection