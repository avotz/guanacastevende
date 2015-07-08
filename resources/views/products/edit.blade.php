@extends('layouts.layout')
@section('meta-title')Guanacaste Vende | Editando producto: {!!  $product->name !!}@stop
@section('meta-description'){!! trim(strip_tags( $product->description ))!!} | @foreach ($product->tags as $tag)
{!! trim($tag->name) !!}@endforeach
@stop
@section('content')
	
	{!! Form::model($product, ['method' => 'put', 'route' => ['products.update', $product->id],'files'=> true,'class'=>'form-horizontal' ]) !!}
		
		@include('products/partials/_form', ['buttonText' => 'Actualizar Producto'])
	 
	{!! Form::close() !!}
    <div class="clear"></div>
@stop
@section('scripts')
    <!--<script src="/vendor/ckeditor/ckeditor.js"></script>
    <script>

        CKEDITOR.replace( 'ckeditor' , {
            uiColor: '#FAFAFA',
            forcePasteAsPlainText : true,
            removePlugins : 'sourcearea'
        });
    </script>-->
@stop