<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyUnity;
use App\UnityRelationship;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class UnityRelationshipController extends Controller
{
    protected function get(Request $request){ // efetua pesquisa
        $UnityRelationship = new UnityRelationship();
        $UnityRelationship->id          = $request->id;
        $UnityRelationship->comp_uni_id = $request->comp_uni_id;
        return response()->json($UnityRelationship->getUnityRelationship());
    }

    protected function show($id){

      $company_unity = CompanyUnity::find($id);

      $getUnityRelationship = new UnityRelationship();
      $getUnityRelationship->comp_uni_id = $id;
      $companies = $getUnityRelationship->getUnityRelationship();
      $company        = new Company();
      $company_select = $company->getCompany();
      return view('unity_relationship.create',compact('company_unity','companies','company_select'));
    }

    protected function store(Request $request){
        if(CompanyUnity::where('id','=',$request->id_comp)->first()){ //validando se a unidade existe
            if(UnityRelationship::where('company_id','=',$request->company_id)->first()){  //verificando se company ja foi cadastrado
                Toastr::error('Empresa já foi vinculada a uma das unidades','Erro');
                return redirect()->back();
            }else{
                if(UnityRelationship::create([ //se estiver tudo ok  efetua o vinculo
                    'company_id'        => $request->company_id,
                    'company_unity_id'  => $request->company_unity_id,
                    'created_at'        => \Carbon\Carbon::now(),
                ])){
                    Toastr::success('Vinculo efetuado com sucesso','Sucesso');
                    return redirect()->back();
                }else{
                    Toastr::error('Erro ao Vincular','Erro');
                    return redirect()->back();
                }
            }
        }else{
            Toastr::error('Erro ao Localizar','Erro');
            return redirect()->back();
        }
    }
    protected function destroy($id){
        if($UnityRelationship = UnityRelationship::where('id','=',$id)->first()){ //verifica se o id existe
            $UnityRelationship->delete();
            Toastr::success('Vinculo excluido com sucesso','Erro');
            return redirect()->back();
        }else{
            Toastr::error('Erro ao Localizar','Erro');
            return redirect()->back();
        }
    }
}
