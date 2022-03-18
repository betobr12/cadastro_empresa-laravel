<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Segment extends Model
{
    use SoftDeletes;

    protected $table = 'segments';
    public $timestamps = true;
    protected $fillable = [
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getSegment(){
        return DB::table('segments')
        ->selectRaw("
            id,
            description
        ")
        ->get();
    }
}
