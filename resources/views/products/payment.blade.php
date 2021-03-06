@extends('layouts.layout')

@section('meta-title')Guanacaste Vende | Informacion de pago @stop
@section('meta-description')Informacion de pago @stop
@section('content')

    <div class="payment">

        {!! Form::open(['route'=>['product_payment.purchase',$product->id], 'class'=>'form-horizontal','id'=>'form-payment' ]) !!}
        <div class="left-section">
            <h1 class="payment__title">Opciones de pago</h1>

            <div class="payment__methods">
                <span class="pull-left left"><input id="payment_method_card" type="radio" value="1" name="payment_method" checked data-method="card" data-route="{!! route('product_payment.purchase',$product->id) !!}"> <label for="payment_method_card" title="Tarjeta de credito o debito"><img src="/img/visa-mastercard.png" alt="Tarjeta de credito o debito" /></label></span>
               <!--$currentUser-->
                <span class="pull-right right"><input id="payment_method_paypal" type="radio" value="2" name="payment_method" data-method="paypal" data-route="{!! route('product_payment.purchasePaypal',$product->id) !!}"><label for="payment_method_paypal" title="Paypal"> <img src="https://www.paypalobjects.com/webstatic/es_MX/mktg/logos-buttons/grey_btn-356x42.png" alt="PayPal Credit" /></label></span>
               
            </div>
            <section class="panel payment__method__card">

                <div class="form">

                    <!-- First name Form Input -->
                    <div class="form__group">
                        {!! Form::label('first_name', 'Nombre:') !!}
                        {!! Form::text('first_name', $currentUser->profile->first_name , ['class' => 'form__control','required' => 'required','maxlength'=>'30']) !!}
                        {!! errors_for('first_name',$errors) !!}
                    </div>
                    <!-- Last name Form Input -->
                    <div class="form__group">
                        {!! Form::label('last_name', 'Apellidos:') !!}
                        {!! Form::text('last_name', $currentUser->profile->last_name, ['class' => 'form__control','required' => 'required','maxlength'=>'50']) !!}
                        {!! errors_for('last_name',$errors) !!}
                    </div>
                    <!-- Address Form Input -->
                    <div class="form__group">
                        {!! Form::label('email', 'Email:') !!}
                        {!! Form::email('email', $currentUser->email, ['class' => 'form__control','required' => 'required']) !!}
                        {!! errors_for('email',$errors) !!}

                    </div>
                    <div class="form__group">
                        {!! Form::label('telephone', 'Teléfono:') !!}
                        {!! Form::text('telephone', str_limit($currentUser->profile->telephone, 15,''), ['class' => 'form__control','required' => 'required','maxlength'=>'15']) !!}
                        {!! errors_for('telephone',$errors) !!}
                    </div>
                    <div class="form__group">
                        {!! Form::label('address', 'Dirección:') !!}
                        {!! Form::text('address', str_limit($currentUser->profile->address, 50,''), ['class' => 'form__control','required' => 'required','maxlength'=>'50']) !!}
                        {!! errors_for('address',$errors) !!}
                    </div>
                    <div class="form__group">
                        {!! Form::label('city', 'Ciudad:') !!}
                        {!! Form::text('city', $currentUser->profile->city, ['class' => 'form__control','required' => 'required','maxlength'=>'50']) !!}
                        {!! errors_for('city',$errors) !!}
                    </div>
                    <div class="form__group">
                        {!! Form::label('state', 'Provincia:') !!}
                        {!! Form::select('state', ['' => ''], null,['class'=>'form__control','required' => 'required']) !!}
                        {!! errors_for('state',$errors) !!}
                    </div>
                    <div class="form__group">
                        {!! Form::label('country', 'Pais:') !!}
                        {!! Form::select('country', ['CR' => 'Costa Rica'], null,['class'=>'form__control','required' => 'required']) !!}
                        {!! errors_for('country',$errors) !!}
                    </div>
                    <div class="form__group">
                        {!! Form::label('zipcode', 'Codigo Postal:') !!}
                        {!! Form::text('zipcode', null, ['class' => 'form__control','maxlength'=>'10']) !!}

                        {{--!! Form::hidden('zipcode',  '50101', ['maxlength'=>'10']) --}}
                        {!! errors_for('zipcode',$errors) !!}
                    </div>



                    <div class="form__group">
                        {!! Form::submit('Siguiente Paso', ['class' => 'btn btn-primary']) !!}
                        <button type="submit" class="btn btn-gray" form="form-delete" formaction="{!! URL::route('products.destroy', [$product->id]) !!}">
                            Cancelar<i class="fa fa-trash-o"></i>
                        </button>

                    </div>

                </div>
            </section>
            <section class="panel payment__method__paypal">

            </section>

        </div>
        <div class="right-section">
            <h1 class="payment__title">Opciones seleccionadas</h1>
            {!! Form::hidden('product_id', $product->id,['class'=>'form__control', 'readonly']) !!}

            <div class="table-responsive payment__options-table">

                <table class="table table-striped  table-bordered table-responsive">
                    <thead>
                    <tr>
                        <th>Item</th>
                        <th>Precio</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($items as $item)
                        <tr>
                            <td>{!! $item['name'] !!}</td>
                            <td> {!! money($item['price'],'₡') !!}</td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
                <h1 class="payment__title">Total: {!! money($total, '₡') !!} </h1>
                <div class="logos-payment">
                    <a href="https://www.mastercard.us/en-us/merchants/safety-security/securecode.html" target="_blank"><img
                                src="/img/logo-mastercard.png" alt="Mastercard" /></a>
                    <a href="http://www.visalatam.com/s_verified/verified.jsp" target="_blank"><img
                                src="/img/logo-verified-by-visa.png" alt="Verified by Visa" /></a>
                    <a href="https://www.paypal.com/" target="_blank"><img src="https://www.paypalobjects.com/webstatic/es_MX/mktg/logos-buttons/aceptamos-145x47.png" alt="Paga con PayPal" /></a>
                </div>
            </div>


        </div>
        {!! Form::close() !!}

    </div>
    {!! Form::open(['method' => 'delete', 'id' =>'form-delete','data-confirm' => 'Estas seguro? Se eliminaran los datos del producto recien ingresado']) !!}{!! Form::close() !!}
@stop

@section('scripts')

@stop


		
		


