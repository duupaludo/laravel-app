@extends('layouts.app')

@section('content')
    <h3>Editar product</h3>
    @include('form._form_errors')
    {{ Form::model($product,['route' => ['app.offers.update',$product->uuid], 'method' => 'PUT' ]) }}
        @include('app.offers._form')
        <button type="submit" class="btn btn-primary">Salvar</button>
    {{ Form::close() }}
@endsection