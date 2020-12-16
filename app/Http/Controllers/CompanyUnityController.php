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
        return view('');
    }

    protected function store(Request $request){
        
        if(CompanyUnity::where('description','=',$request->description)->first()){  
             response()->json(array('success' => 'Unidade já cadastrada'));
             return redirect()->back();
        }else{  
            if(CompanyUnity::create([            
                'description' =>$request->description,               
                'created_at'  =>\Carbon\Carbon::now(),
            ])){
                response()->json(array('success' => 'Unidade Cadastrada com sucesso'));
                return view('index');
            }else{
                response()->json(array('error' => 'Erro ao cadastrar a Unidade'));
                return redirect()->back();
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
