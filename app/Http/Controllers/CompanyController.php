<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(){

        return view('index');
    }

    protected function get(Request $request){
        $company = new Company();
        $company->id           = $request->id;
        $company->cnpj         = $request->cnpj;
        $company->fantasy_name = $request->fantasy_name;
        $items = [];
        foreach($company->getCompany() as $comps){
            array_push($items,(object)[                
                'id'                        => $comps->id,
                'cnpj'                      => $comps->cnpj,
                'social_reason'             => $comps->social_reason,
                'fantasy_name'              => $comps->fantasy_name,
                'zip_code'                  => $comps->zip_code,
                'public_place'              => $comps->public_place,
                'number'                    => $comps->number,
                'phone'                     => $comps->phone,
                'email'                     => $comps->email,
                'complement'                => $comps->complement,
                'district'                  => $comps->district,
                'city'                      => $comps->city,
                'segment_id'                => $comps->segment_id,
                'municipal_registration'    => $comps->municipal_registration,
                'state_registration'        => $comps->state_registration,
                'seg_description'           => $comps->seg_description,
                'created_at'                => $comps->created_at,
                'updated_at'                => $comps->updated_at,
                'deleted_at'                => $comps->deleted_at,
            ]);
        }        
        return view('company.list',compact('items'));
    }

    protected function create(Request $request){

        if(Company::where('cnpj','=',$request->cnpj)->first()){
            return response()->json(array('error' => 'Empresa ja foi cadastrada'));
        }else{
            if(Company::create([
                'cnpj'                      =>$request->cnpj,
                'social_reason'             =>$request->social_reason,
                'fantasy_name'              =>$request->fantasy_name,
                'zip_code'                  =>$request->zip_code,
                'public_place'              =>$request->public_place,
                'number'                    =>$request->number,
                'phone'                     =>$request->phone,
                'email'                     =>$request->email,
                'complement'                =>$request->complement,
                'district'                  =>$request->district,
                'city'                      =>$request->city,
                'segment_id'                =>$request->segment_id,
                'municipal_registration'    =>$request->municipal_registration,
                'state_registration'        =>$request->state_registration,
                'created_at'                =>\Carbon\Carbon::now(),
            ])){
                return response()->json(array('success' => 'Empresa Cadastrada com sucesso'));
            }else{
                return response()->json(array('error' => 'Erro ao cadastrar a Empresa'));
            }

        }
    }

    protected function update(Request $request){
        if($Company = Company::where('id','=',$request->id)->first()){
            $Company->cnpj                   = $request->cnpj;
            $Company->social_reason          = $request->social_reason;
            $Company->fantasy_name           = $request->fantasy_name;
            $Company->zip_code               = $request->zip_code;
            $Company->public_place           = $request->public_place;
            $Company->number                 = $request->number;
            $Company->phone                  = $request->phone;
            $Company->email                  = $request->email;
            $Company->complement             = $request->complement;
            $Company->district               = $request->district;
            $Company->city                   = $request->city;
            $Company->segment_id             = $request->segment_id;
            $Company->municipal_registration = $request->municipal_registration;
            $Company->state_registration     = $request->state_registration;
            $Company->updated_at             = \Carbon\Carbon::now();
            $Company->save();

            return response()->json(array('success' => 'Empresa Alterada com sucesso'));
        }else{
            return response()->json(array('error' => 'Erro ao localizar a empresa'));
        }
    }

    protected function delete(Request $request){
        if($Company = Company::where('id','=',$request->id)->first()){
            $Company->delete();
            return response()->json(array('success' => 'Empresa excluida com sucesso'));
        }else{
            return response()->json(array('error' => 'Erro ao localizar a empresa'));
        }
    }
}
