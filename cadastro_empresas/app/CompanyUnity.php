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
        return DB::table('company_unities')
        ->selectRaw("
            id,
            description,
            created_at
        ")
        ->get();
    }

   
}
