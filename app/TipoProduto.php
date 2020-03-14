<?php

	namespace App ;

	use Illuminate\Database\Eloquent\Model ;

	class TipoProduto extends Model {

		protected $table = "tipo_produtos" ;

		public $timestamps = false ;
		protected $fillable = ['id_tipo_produtos','tipo_produto'];
		protected $primaryKey = 'id_tipo_produtos';

	}