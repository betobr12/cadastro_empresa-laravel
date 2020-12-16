<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    use SoftDeletes;

    protected $table = 'companies';
    public $timestamps = true;
    protected $fillable = [
        'cnpj',
        'social_reason',
        'fantasy_name',
        'zip_code',
        'public_place',
        'number',
        'phone',
        'email',
        'complement',
        'district',
        'city',
        'segment_id',
        'municipal_registration',
        'state_registration',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getCompany(){
        return DB::table('companies     as comp')
        ->leftJoin('segments            as seg',    'seg.id',   '=','comp.segment_id')
        ->selectRaw("
            comp.id,
            comp.cnpj,
            comp.social_reason,
            comp.fantasy_name,
            comp.zip_code,
            comp.public_place,
            comp.number,
            comp.phone,
            comp.email,
            comp.complement,
            comp.district,
            comp.city,
            comp.segment_id,
            seg.description as seg_description,
            comp.municipal_registration,
            comp.state_registration,
            comp.created_at,
            comp.updated_at,
            comp.deleted_at
        ")
        ->when($this->id, function($query, $id){
            return $query->where('comp.id','=',$id);
        })
        ->when($this->cnpj, function($query, $cnpj){
            return $query->where('comp.cnpj','=',$cnpj);
        })
        ->when($this->fantasy_name, function($query, $fantasy_name){
            return $query->where('comp.fantasy_name','=',$fantasy_name);
        })
        ->get();
    }


}


