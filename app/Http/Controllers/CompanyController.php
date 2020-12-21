<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyUnity;
use App\Libraries\Helpers;
use App\Segment;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class CompanyController extends Controller
{

    protected function get(Request $request){
        $company               = new Company();
        $company->id           = $request->id;
        $company->cnpj         = $request->cnpj;
        $company->fantasy_name = $request->fantasy_name;
        $items = [];
        $helpers               = new Helpers();
        foreach($company->getCompany() as $comps){
            array_push($items,(object)[
                'id'                        => $comps->id,
                'cnpj'                      => $helpers->mask_cpf_cnpj($comps->cnpj),
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

    protected function create(){
        $Segment      = new Segment();
        $getSegment   = $Segment->getSegment();
        return view('company.create', compact('getSegment'));
    }

    protected function store(Request $request){

        $CompanyUnity = CompanyUnity::all();
        $Company      = Company::all();
        $this->validate($request,[
            'cnpj'                      => 'required',
            'razao'                     => 'required',
            'fantasia'                  => 'required',
            'cep'                       => 'required',
            'logradouro'                => 'required',
            'numero'                    => 'required',
            'bairro'                    => 'required',
            'uf'                        => 'required',
            'email'                     => 'required',
            'fone1'                     => 'required',
            'complemento'               => 'required',
            'segment_id'                => 'required',
            'municipal_registration'    => 'required',
        ],
        [
            'cnpj.required'                     => 'Campo cnpj esta vazio!',
            'razao.required'                    => 'Campo razao esta vazio!',
            'fantasia.required'                 => 'Campo fantasia esta vazio!',
            'cep.required'                      => 'Campo cep esta vazio!',
            'logradouro.required'               => 'Campo logradouro esta vazio!',
            'numero.required'                   => 'Campo numero esta vazio!',
            'bairro.required'                   => 'Campo bairro esta vazio!',
            'uf.required'                       => 'Campo uf esta vazio!',
            'email.required'                    => 'Campo email esta vazio!',
            'fone1.required'                    => 'Campo telefone esta vazio!',
            'complemento.required'              => 'Campo complemento esta vazio!',
            'segment_id.required'               => 'Campo Seguimento esta vazio!',
            'municipal_registration.required'   => 'Campo Inscrição municipal esta vazio!',
        ]);

        $telefone = preg_replace("/[^0-9]/",'',$request->fone1);
        $cnpj     = preg_replace('/[^0-9]/', '',$request->cnpj);
        $cep      = preg_replace("/[^0-9]/",'',$request->cep);


        if(Company::where('cnpj','=',$cnpj)->first()){
            Toastr::error('Empresa ja foi cadastrada','Erro');
            return redirect()->back();
        }else{
            if(Company::create([
                'cnpj'                      =>$cnpj,
                'social_reason'             =>$request->razao,
                'fantasy_name'              =>$request->fantasia,
                'zip_code'                  =>$cep,
                'public_place'              =>$request->logradouro,
                'number'                    =>$request->numero,
                'district'                  =>$request->bairro,
                'state'                     =>$request->uf,
                'email'                     =>$request->email,
                'phone'                     =>$telefone,
                'complement'                =>$request->complemento,
                'segment_id'                =>$request->segment_id,
                'municipal_registration'    =>$request->municipal_registration,
                'state_registration'        =>$request->state_registration,
                'created_at'                =>\Carbon\Carbon::now(),
            ])){
                Toastr::success('Empresa Cadastrada com sucesso','Sucesso');
                return redirect()->route('index', compact('CompanyUnity','Company'));
            }else{
                Toastr::error('Erro ao cadastrar a Empresa','Erro');
                return redirect()->back();
            }
        }
    }

    protected function edit($id){
        $Company      = Company::find($id);
        $Segment      = new Segment();
        $getSegment   = $Segment->getSegment();
        return view('company.alter', compact('Company','getSegment'));

    }

    protected function update(Request $request, $id){
        $CompanyUnity = CompanyUnity::all();
        $Company      = Company::all();

        $telefone = preg_replace("/[^0-9]/",'',$request->fone1);
        $cnpj     = preg_replace('/[^0-9]/', '',$request->cnpj);
        $cep      = preg_replace("/[^0-9]/",'',$request->cep);

        if($Company = Company::where('id','=',$id)->first()){
            $Company->cnpj                   = $cnpj ;
            $Company->social_reason          = $request->razao;
            $Company->fantasy_name           = $request->fantasia;
            $Company->zip_code               = $cep;
            $Company->public_place           = $request->logradouro;
            $Company->number                 = $request->numero;
            $Company->phone                  = $telefone;
            $Company->email                  = $request->email;
            $Company->complement             = $request->complemento;
            $Company->district               = $request->bairro;
            $Company->state                  = $request->uf;
            $Company->segment_id             = $request->segment_id;
            $Company->municipal_registration = $request->municipal_registration;
            $Company->state_registration     = $request->state_registration;
            $Company->updated_at             = \Carbon\Carbon::now();
            $Company->save();
            Toastr::success('Empresa Alterada com sucesso','Sucesso');
            return redirect()->route('index', compact('CompanyUnity','Company'));
        }else{
            Toastr::error('Erro ao localizar a empresa','Erro');
            return redirect()->back();
    }
    }

    public function show(Request $request, $id){
        $company               = new Company();
        $company->id           = $id;
        $compsData             = $company->getCompany()->first();
        $helpers               = new Helpers();
         $company_data = (object) array(
            'id'                        => $id,
            'cnpj'                      => $helpers->mask_cpf_cnpj($compsData->cnpj),
            'social_reason'             => $compsData->social_reason,
            'fantasy_name'              => $compsData->fantasy_name,
            'public_place'              => $compsData->public_place,
            'zip_code'                  => $helpers->mask_cep($compsData->zip_code),
            'number'                    => $compsData->number,
            'district'                  => $compsData->district,
            'city'                      => $compsData->city,
            'complement'                => $compsData->complement,
            'phone'                     => $helpers->mask_phone($compsData->phone),
            'email'                     => $compsData->email,
            'seg_description'           => $compsData->seg_description,
            'municipal_registration'    => $compsData->municipal_registration,
            'state_registration'        => $compsData->state_registration,
            'created_at'                => $compsData->created_at,
        );
        return view('company.show', compact('company_data'));
    }

    protected function destroy($id){
        if($Company = Company::where('id','=',$id)->first()){
            $Company->delete();
            Toastr::success('Empresa excluida com sucesso','Sucesso');
            return redirect()->back();
        }else{
            Toastr::error('Erro ao localizar a empresa','Erro');
            return redirect()->back();
        }
    }
}
