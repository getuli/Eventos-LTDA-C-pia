@extends('layout')

@section('title', 'Criar Evento')

@section('content')

<link rel="stylesheet" href="/css/dashboard.css">
<div>
    <h1>Meus Eventos:</h1>
</div>

<div >
    @if(isset($banco) && count($banco) > 0)
    <table class="table">
        <thead>
            <th scope="row">#</th>
            <th scope="row">Nome</th>
            <th scope="row">Participantes</th>
            <th scope="row">Ações</th>
        </thead>
        <tbody>
            @foreach($banco as $evento)
            <tr>
                <td scope="row">{{ $loop->index + 1 }}</td>
                <td><a href="/view/{{ $evento->id }}">{{ $evento->title }}</a></td>
                <td>{{ count($evento->users) }}</td>
                <td><a href="/edit/{{ $evento->id }}">Editar</a></td>
                <td>
                    <form action="/destroy/{{ $evento->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Deletar</button>
                    </form>
                </td>
                <td>{{ isset($evento->user) ? $evento->user->name : 'N/A' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Você ainda não tem eventos.</p>
    @endif
</div>

<div>
    <h1>Eventos que participo:</h1>
</div>
@if(count($eventosAsParticipant) > 0)
<div >
    @if(isset($eventosAsParticipant) && count($eventosAsParticipant) > 0)
    <table class="table">
        <thead>
            <th scope="row">#</th>
            <th scope="row">Nome</th>
            <th scope="row">Participantes</th>
            <th scope="row">Ações</th>
        </thead>
        <tbody>
            @foreach($eventosAsParticipant as $evento)
            <tr>
                <td scope="row">{{ $loop->index + 1 }}</td>
                <td><a href="/view/{{ $evento->id }}">{{ $evento->title }}</a></td>
                <td>{{ count($evento->users) }}</td>
                <td><a href="/edit/{{ $evento->id }}">Editar</a></td>
                <td>
                    <form action="/leave/{{ $evento->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" >Sair do evento</button>
                </form>
                </td>
                <td>{{ isset($evento->user) ? $evento->user->name : 'N/A' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Você ainda não tem eventos.</p>
    @endif
</div>
@else
<p>Você nâo participa de nenhum evento</p>
@endif

@endsection
