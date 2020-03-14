<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request ;
use App\TipoProduto ;

class TipoProdutosController extends Controller
{

	public function index() {

		return TipoProduto::all()->toJson() ;

	}

	public function store( Request $request ) {

		$tipoProduto = new TipoProduto() ;
		$tipoProduto->fill($request->all());
		$tipoProduto->save() ;

		return response()->json( $tipoProduto , 201 ) ;

	}

	public function show( $id ) {

		return TipoProduto::findOrFail($id)->toJson() ;

	}

	public function update( Request $request ) {

		$tipoProduto = TipoProduto::find( $request->id_tipo_produtos ) ;
		$tipoProduto->update($request->all()) ;

		return response()->json( $tipoProduto , 201 ) ;

	}

	public function destroy( $id ) {

		$tipoProduto = TipoProduto::find( $id ) ;
		$tipoProduto->delete() ;

		return TipoProduto::all()->toJson() ;

	}


}