<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imovel;
use Illuminate\Support\Facades\Auth;

class ImovelController extends Controller
{
	public function index()
	{
		$imoveis = Imovel::orderBy('created_at', 'desc')->paginate(10);
		return view('imoveis.index',['imoveis' => $imoveis]);
	}
	
	public function create()
	{
		return view('imoveis.create');
	}
	
	public function store(Request $request)
	{
		$this->validate($request, [
				'nome' => 'required|unique:imoveis|max:255',
				'tipo' => 'required',
		]);
		$imovel = new Imovel;
		$imovel->user_id     = Auth::user()->id;
		$imovel->nome        = $request->nome;
		$imovel->tipo        = $request->tipo;
		$imovel->save();
		return redirect()->to('imoveis')->with('success', 'Imóvel cadastrado!');
	}
	
	public function show($id)
	{
		//
	}
	
	public function edit($id)
	{
		$imovel = Imovel::findOrFail($id);
		return view('imoveis.edit',compact('imovel'));
	}
	
	public function update(Request $request, $id)
	{
		$this->validate($request, [
				'nome' => 'required|unique:imoveis|max:255',
				'tipo' => 'required',
		]);
		$imovel = Imovel::findOrFail($id);
		$imovel->nome        = $request->nome;
		$imovel->tipo        = $request->tipo;
		$imovel->save();
		return redirect()->to('imoveis')->with('success', 'Imóvel atualizado!');
	}
	
	public function delete($id)
	{
		$imovel = Imovel::findOrFail($id);
		$imovel->delete();
		return redirect()->to('imoveis')->with('success','Imóvel deletado!');
	}
}
