<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyUnity;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class CompanyUnityController extends Controller
{

    protected function index(){
        $CompanyUnity = new CompanyUnity();
        $items = [];

        foreach($CompanyUnity->getCompanyUnity() as $comps_u){
            array_push($items,(object)[
                'id'          => $comps_u->id,
                'description' => $comps_u->description,
                'created_at'  => $comps_u->created_at,
            ]);
        }
        return view('company_unity.list',compact('items'));
    }

    protected function create(){
        return view('company_unity.create');
    }

    protected function store(Request $request){
        
        $CompanyUnity = CompanyUnity::all();
        $Company      = Company::all();

        $this->validate($request,[
            'description' => 'required',
        ],
        [
         'description.required' => 'Campo Unidade esta vazio!',
        ]);
        
        if(CompanyUnity::where('description','=',$request->description)->first()){
             Toastr::error('Unidade já cadastrada','Erro');
             return redirect()->back();
        }else{
            if(CompanyUnity::create([
                'description' =>$request->description,
                'created_at'  =>\Carbon\Carbon::now(),
            ])){
                Toastr::success('Unidade Cadastrada com sucesso','Sucesso');
                return redirect()->route('index', compact('CompanyUnity','Company'));
            }else{
                Toastr::error('Erro ao cadastrar a Unidade','Erro');
                return redirect()->back();
            }
        }
    }

    protected function edit($id){

        $CompanyUnity = CompanyUnity::find($id);
        return view('company_unity.alter', compact('CompanyUnity'));
    }

    protected function update(Request $request, $id){

        $CompanyUnity = CompanyUnity::all();
        $Company      = Company::all();

        if($CompanyUnity = CompanyUnity::where('id','=',$id)->first()){
            $CompanyUnity->description  = $request->description;
            $CompanyUnity->updated_at   = \Carbon\Carbon::now();
            $CompanyUnity->save();
            Toastr::success('Unidade Alterada com sucesso','Sucesso');
            return redirect()->route('index', compact('CompanyUnity','Company'));
        }else{
            Toastr::error('Erro ao localizar a Unidade','Erro');
            return redirect()->back();
        }
    }

    protected function destroy($id){
        
        if($CompanyUnity = CompanyUnity::where('id','=',$id)->first()){
            $CompanyUnity->delete();
            Toastr::success('Unidade excluida com sucesso','Sucesso');
            return redirect()->back();
        }else{
            Toastr::error('Erro ao encontar a Unidade','Erro');
            return redirect()->back();
        }
    }
}
