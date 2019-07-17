@extends('layouts.app')

@section('content')
    <h3>Nova oferta</h3>
    @include('form._form_errors')
    {{ Form::open(['route' => 'app.offers.store']) }}
        @include('app.offer._form')
        <button type="submit" class="btn btn-primary">Criar</button>
    {{ Form::close() }}
@endsection