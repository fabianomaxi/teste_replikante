<?php

	namespace App ;

	use Illuminate\Database\Eloquent\Model ;

	class Produto extends Model {

		public $timestamps = false ;
		protected $fillable = ['nome','preco','id_tipo_produtos','id_produtos'];
		protected $primaryKey = 'id_produtos';

	}