<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class CompanyUnity extends Model
{
    use SoftDeletes;

    protected $table = 'company_unities';
    public $timestamps = true;
    protected $fillable = [
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getCompanyUnity(){
        return DB::table('company_unities as comp_u')
        ->selectRaw("
            comp_u.id,
            comp_u.description,
            comp_u.created_at,
            comp_u.deleted_at
        ")
        ->whereNull('comp_u.deleted_at')
        ->get();
    }


}
