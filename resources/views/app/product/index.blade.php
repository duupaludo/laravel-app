@extends('layouts.app')

@section('content')
    <h3>Listagem de produtos</h3>
    <table class="table table-striped">
        <thead>
        <tr>
            <td>
                <a class="btn btn-primary" href="{{ route('app.products.create') }}">Criar novo</a>
            </td>
        </tr>
        <tr>
            <th>Nome</th>
            <th>Preço</th>
            <th>Imagem</th>
            <th>Categoria</th>
            <th>Status</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td><img src="https://www.sccpre.cat/mypng/full/69-692552_hallingdal-egg-office-chair.png" width="80"/></td>
                <td>{{ $product->category->name }}</td>
                <td><span class="badge badge-success">Secondary</span></td>
                <td>
                    <a href="{{route('app.products.edit',['product' => $product->uuid])}}">Editar</a> |
                    <a href="{{route('app.products.show',['product' => $product->uuid])}}">Ver</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection