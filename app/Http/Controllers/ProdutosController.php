<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request ;
use App\Produto ;
use App\TipoProduto ;
use App\Http\Requests\ProdutosFormRequest ;
use Illuminate\Support\Facades\DB;

class ProdutosController extends Controller
{

	public function index( Request $request ) {

		$produto = DB::table('produtos')
			->join('tipo_produtos', 'produtos.id_tipo_produtos', '=', 'tipo_produtos.id_tipo_produtos')
			->orderBy('nome')
			->get();

		$produtos = $produto->all() ;

		$mensagem_status = $request->session()->get('sucesso') ;

		return view( "produtos/index" , [ 
			"produtos" 	=> $produtos ,
			"mensagem_status"	=> $mensagem_status
		]) ;

	}

	public function create( Request $request ) {

		$tipoProduto = new TipoProduto() ;
		$tipos = $tipoProduto->all() ;

		if( ! empty( $request->id_produtos ) ) 
			$produto = Produto::find( $request->id_produtos ) ;
		else 
			$produto = new Produto() ;

		return view( "produtos/create" , [ 
			"tipo_produtos" => $tipos ,
			"produto" => $produto ,
		]) ;

	}

	public function save( ProdutosFormRequest $request ) {


		$produto = Produto::find( $request->id_produtos ) ;
		$produto->nome = $request->nome ;

		$produto->preco = $request->preco ;
		$produto->id_tipo_produtos = $request->id_tipo_produtos ;
		$produto->save() ;

		$request->session()->flash('sucesso','Produto '.$produto->nome.' atualizado com sucesso!') ;

		return redirect('/produtos') ;

	}

	public function store( ProdutosFormRequest $request ) {


		$request->preco = $this->formataMoeda( "real" , $request->preco ) ;
		#die($request->preco) ;

		if( $request->id_produtos != "" ) {
			return $this->save( $request ) ;
		} else {
			$produtos = Produto::create( 
			[
				'nome' 	=> $request->nome ,
				'preco'	=> $request->preco ,
				'id_tipo_produtos'	=> $request->id_tipo_produtos 
			]) ;
		}

		$request->session()->flash('sucesso','Produto '.$produtos->nome.' cadastrado com sucesso!') ;

		return redirect('/produtos') ;

	}

	public function destroy( Request $request ) {

		Produto::destroy( $request->id_produtos ) ;
		$request->session()->flash('sucesso','Produto deletado com sucesso!') ;
		return redirect('/produtos') ;

	}

	private function formataMoeda( $currency , $valor ) {

		if( $currency == "real" ) {
			$valor = str_replace(",", ".", str_replace(".", "", $valor) );
			return $valor ;
		}

	}

}