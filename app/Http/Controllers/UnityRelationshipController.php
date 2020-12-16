<?php

namespace App\Http\Controllers;

use App\CompanyUnity;
use App\UnityRelationship;
use Illuminate\Http\Request;

class UnityRelationshipController extends Controller
{
    protected function get(Request $request){ // efetua pesquisa
        $UnityRelationship = new UnityRelationship();
        $UnityRelationship->id          = $request->id;
        $UnityRelationship->comp_uni_id = $request->comp_uni_id;
        return response()->json($UnityRelationship->getUnityRelationship());
    }

    protected function create(Request $request){
        if(CompanyUnity::where('id','=',$request->company_unity_id)->first()){ //validando se a unidade existe
            if(UnityRelationship::where('company_id','=',$request->company_id)->first()){  //verificando se company ja foi cadastrado
                return response()->json(array('success' => 'Empresa já vinculada a unidade'));
            }else{  
                if(UnityRelationship::create([ //se estiver tudo ok  efetua o vinculo           
                    'company_unity_id'  =>$request->company_unity_id,               
                    'company_id'        =>$request->company_id,               
                    'created_at'        =>\Carbon\Carbon::now(),
                ])){
                    return response()->json(array('success' => 'Empresa vinculada a unidade com sucesso'));
                }else{
                    return response()->json(array('error' => 'Erro ao vicular'));
                } 
            }
        }else{
            return response()->json(array('error' => 'Erro ao localizar a unidade'));
        }                
    }
    protected function delete(Request $request){
        if($UnityRelationship = UnityRelationship::where('id','=',$request->id)->first()){ //verifica se o id exite
            $UnityRelationship->delete();
            return response()->json(array('success' => 'Vinculo excluido com sucesso'));
        }else{
            return response()->json(array('error' => 'Erro o vinculo'));
        }
    }
}
