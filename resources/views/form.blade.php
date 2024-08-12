@extends('layout')
@section('title','Crie o seu Evento')
@section('content')
<link rel="stylesheet" href="/css/form.css">

<form class="form_name" action="/create" method="POST" enctype="multipart/form-data">
    @csrf

    <fieldset>
        <legend>Informações do Evento</legend>
        <p>O site não contém tratativa de erros, por favor preencha todos os campos 😊</p>

        <div class="form-group">
            <label for="image">Imagem</label>
            <input name="image" type="file" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="title">Título do Evento</label>
            <input name="title" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="city">Cidade</label>
            <input name="city" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="describe">Descrição</label>
            <textarea name="describe" class="form-control"></textarea> </div>
        <div class="form-group">
            <label for="data">Data</label>
            <input name="data" type="date" class="form-control">
        </div>
    </fieldset>

    <fieldset>
        <legend>Infraestrutura</legend>
        <ul>
            <li>
                <input type="checkbox" value="cadeiras" name="item[]" id="cadeiras"> Cadeiras
            </li>
            <li>
                <input type="checkbox" value="palco" name="item[]" id="palco"> Palco
            </li>
            <li>
                <input type="checkbox" value="cerveja grátis" name="item[]" id="cerveja"> Cerveja grátis
            </li>
            <li>
                <input type="checkbox" value="open food" name="item[]" id="open_food"> Open Food
            </li>
            <li>
                <input type="checkbox" value="brindes" name="item[]" id="brindes"> Brindes
            </li>
        </ul>
    </fieldset>

    <div class="form-group">
        <label for="private">O evento é privado?</label>
        <select name="private" id="private" class="form-control">
            <option value="0">Não</option>
            <option value="1">Sim</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Criar</button>
</form>

@endsection