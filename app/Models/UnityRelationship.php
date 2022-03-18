<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class UnityRelationship extends Model
{
    use SoftDeletes;

    protected $table = 'unity_relationships';
    public $timestamps = true;
    protected $fillable = [
        'company_unity_id',
        'company_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getUnityRelationship(){
        return DB::table('unity_relationships as unit_rel')
        ->leftJoin('company_unities  as comp_uni','comp_uni.id','=','unit_rel.company_unity_id')
        ->leftJoin('companies        as comp'    ,'comp.id'    ,'=','unit_rel.company_id')
        ->selectRaw("
            unit_rel.id,
            comp_uni.id              as comp_uni_id,
            comp_uni.description     as comp_uni_description,
            comp.id                  as comp_id,
            comp.cnpj                as comp_cnpj,
            comp.social_reason       as comp_social_reason,
            comp.fantasy_name        as comp_fantasy_name,
            unit_rel.deleted_at
        ")
        ->whereNull('unit_rel.deleted_at')
        ->when($this->id, function($query, $id){
            return $query->where('unit_rel.id','=',$id);
        })
        ->when($this->comp_uni_id, function($query, $comp_uni_id){
            return $query->where('comp_uni.id','=',$comp_uni_id);
        })
        ->when($this->description, function($query, $description){
            return $query->where('comp_uni.description','=',$description);
        })
        ->get();
    }
}
