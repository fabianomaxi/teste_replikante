@extends('layout')

@section('titulo')
	Gestão de Produtos
@endsection

@section('subtitulo')
	Cadastro de Produtos
@endsection

@section('conteudo')

	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<a href="/produtos" class="btn btn-primary mb-2">Voltar</a>

	<form method="post" action="/produtos/save/" onsubmit="return validaProdutos()">
		@csrf 
		<input type="hidden" name="id_produtos" id="id_produtos" value="{{$produto->id_produtos}}">
	  <div class="form-row">
	    <div class="col">
	      <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do produto" value="{{$produto->nome}}">
	    </div>
	    <div class="col">
	      <input type="text" class="form-control" value="{{ number_format($produto->preco, 2, ',', '.') }}" id="preco" name="preco" placeholder="Preço do produto" onKeyPress="return(moeda(this,'.',',',event))">
	    </div>
	    <div class="col">
	    	<select class="form-control" name="id_tipo_produtos" id="id_tipo_produtos">
	    		<option value="">Tipo do Produto</option>
			    	@foreach ( $tipo_produtos as $tipo ) 
			    		<option {{ $tipo->id_tipo_produtos == $produto->id_tipo_produtos ? 'selected' : '' }} value="{{$tipo->id_tipo_produtos}}">{{$tipo->tipo_produto}}</option>
			    	@endforeach
	    	</select>
	    </div>
	  </div>
	  <div class="form-row">
	  	<div class="col">
	      <button type="submit" class="btn btn-primary btn-lg btn-block mt-2">Salvar Produto</button>
	    </div>
	  </div>
	</form>

@endsection