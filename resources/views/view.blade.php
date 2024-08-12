@extends('layout')

@section('title', 'Visualizar Evento')


@section('content')

<link rel="stylesheet" href="/css/view.css">
<div class="container">
    <h1>Evento: {{ $banco->title }}</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Cidade</th>
                <th>Data</th>
                <th>Privacidade</th>
                <th>Participantes</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><img style="height: 400px" src="/images/{{ $banco->image }}" alt="{{ $banco->title }}"></td>
                <td>{{ $banco->city }}</td>
                <td>{{ \Carbon\Carbon::parse($banco->data)->format('d/m/Y') }}</td>
                <td>{{ $banco->private == 1 ? 'privado' : 'público' }}</td>
                <td>{{ count($banco->users) }}</td>
                <td>
                    @if(!$presenca)
                        <form action="/join/{{ $banco->id }}" method="POST">
                            @csrf
                            <button type="submit">Confirmar Presença</button>
                        </form>
                    @else
                        <p>Você já está participando do evento</p>
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="7">
                    <h3>Dono do Evento: {{ $donoevento['name'] }}</h3>
                    <ul>
                        @foreach($banco->items as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                    <h3>Descrição:</h3>
                    <p>{{ $banco->describe }}</p>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
