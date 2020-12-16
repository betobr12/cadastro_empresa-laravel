<?php

namespace App\Http\Controllers;

use App\CompanyUnity;
use Illuminate\Http\Request;

class CompanyUnityController extends Controller
{
    protected function get(Request $request){
        $CompanyUnity = new CompanyUnity();
        $CompanyUnity->id           = $request->id;
        $CompanyUnity->description  = $request->description;
        return response()->json($CompanyUnity->getCompanyUnity());
    }

    protected function create(Request $request){
        if(CompanyUnity::where('description','=',$request->description)->first()){  
            return response()->json(array('success' => 'Unidade já cadastrada'));
        }else{  
            if(CompanyUnity::create([            
                'description' =>$request->description,               
                'created_at'  =>\Carbon\Carbon::now(),
            ])){
                return response()->json(array('success' => 'Unidade Cadastrada com sucesso'));
            }else{
                return response()->json(array('error' => 'Erro ao cadastrar a Unidade'));
            } 
        }         
    }

    protected function update(Request $request){
        if($CompanyUnity = CompanyUnity::where('id','=',$request->id)->first()){                             
            $CompanyUnity->description  = $request->description;         
            $CompanyUnity->updated_at   = \Carbon\Carbon::now();
            $CompanyUnity->save();
            return response()->json(array('success' => 'Unidade Alterada com sucesso'));
        }else{
            return response()->json(array('error' => 'Erro ao localizar a Unidade'));
        }
    }
    
    protected function delete(Request $request){
        if($CompanyUnity = CompanyUnity::where('id','=',$request->id)->first()){
            $CompanyUnity->delete();
            return response()->json(array('success' => 'Unidade excluida com sucesso'));
        }else{
            return response()->json(array('error' => 'Erro ao localizar a Unidade'));
        }
    }
}
