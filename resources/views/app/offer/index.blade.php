@extends('layouts.app')

@section('content')
    <h3>Listagem de ofertas</h3>
    <table class="table table-striped">
        <thead>
        <tr>
            <td>
                <a class="btn btn-primary" href="{{ route('app.offers.create') }}">Criar novo</a>
            </td>
        </tr>
        <tr>
            <th>Nome</th>
            <th>Preço</th>
            <th>Produto Relacionado</th>
            <th>Status</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        @forelse($offers as $offer)
            <tr>
                <td>{{ $offer->name }}</td>
                <td>{{ $offer->price }}</td>
                <td>{{ $offer->product->name }}</td>
                <td><span class="badge badge-success">Ativa</span></td>
                <td>
                    <a href="{{route('app.offers.edit',['offer' => $offer->uuid])}}">Editar</a> |
                    <a href="{{route('app.offers.show',['offer' => $offer->uuid])}}">Ver</a>
                </td>
            </tr>
        @empty
            <p>Você não possui ofertas cadastradas</p>
        @endforelse
        </tbody>
    </table>
@endsection