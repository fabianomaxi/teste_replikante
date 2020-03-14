@extends('layout')

@section('titulo')
	Gestão de Produtos
@endsection

@section('subtitulo')
	Lista de Produtos
@endsection

@section('conteudo')

@if( ! empty($mensagem_status) ) 
  <div class="alert alert-primary" role="alert">
     {{$mensagem_status}}
  </div>
@endif 

<a href="{{route('frm_novo_produto')}}" class="btn btn-primary mb-2">Adicionar Produto</a>

<table class="table">
  
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Preço</th>
      <th scope="col">Tipo</th>
      <th scope="col" colspan="2">&nbsp;</th>
    </tr>
  </thead>

  <tbody>
    
    @foreach ( $produtos as $produto ) 
	    <tr>
	      <th scope="row">{{$produto->id_produtos}}</th>
	      <td>{{$produto->nome}}</td>
	      <td>{{  'R$ '.number_format($produto->preco, 2, ',', '.') }} </td>
	      <td>{{$produto->tipo_produto}}</td>
        <td>
            <form method="post" action="/produtos/criar/{{$produto->id_produtos}}">
              @csrf
              <button class="btn btn-info btn-sm" type="submit">Editar</button>
            </form>
        </td>
        <td>  
          <form method="post" action="/produtos/remover/{{$produto->id_produtos}}" onsubmit="return confirm('Tem certeza que deseja remover o produto?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" type="submit">Excluir</button>
          </form>
        </td>
	    </tr>
	@endforeach
    
  </tbody>
</table>

</div>    
@endsection
