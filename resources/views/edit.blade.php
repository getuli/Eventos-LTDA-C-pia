@extends('layout')
@section('title','Edite o seu Evento')
@section('content')
<link rel="stylesheet" href="/css/edit.css">

<form action="/edit/update/{{ $banco->id }}" method="POST" enctype="multipart/form-data">
    @csrf 
    @method('PUT')
    <div class="form">
        <img src="/images/{{ $banco->image }}" alt="123">
            <label for="image">Image</label>
            <input name="image" type="file" class="form-control-file">
            <label for="title">Adicine o título do seu evento:</label>
            <input name="title" type="text">
            <label for="city">Cidade:</label>
            <input name="city" type="text">
            <label for="describe">Descrição:</label>
            <input name="describe" type="text">
            <label for="data">Selecione a data</label>
            <input name="data" type="date">

           
            <label for="description">Adicione items de infraestrutura</label>
            <div class="form-group">
                <input type="checkbox" value="cadeiras" name="items[]" id=""> Cadeiras
            </div>
            <div class="form-group">
                <input type="checkbox" value="palco" name="items[]" id=""> Palco
            </div>
            <div class="form-group">
                <input type="checkbox" value="cerveja grátis" name="items[]" id=""> Cerveja grátis
            </div>
            <div class="form-group">
                <input type="checkbox" value="Open Food" name="items[]" id=""> Open Food
            </div>
            <div class="form-group">
                <input type="checkbox" value="Brindes" name="items[]" id=""> Brindes
            </div>

            <label for="title">O evento é privado?</label>
            <select name="private" id="private" class="form-control">
             <option value="0">Não</option>
             <option value="1">Sim</option>
            </select>
            <button class="btn-">Editar</button>
    </div>
    
 
    
</form>

@endsection