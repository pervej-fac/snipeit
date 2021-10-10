<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use App\Http\Traits\UniqueUndeletedTrait;
// use App\Models\Traits\Searchable;
// use Illuminate\Database\Eloquent\SoftDeletes;
// use Watson\Validating\ValidatingTrait;

class ProcessDetail extends Model
{
    protected $table = 'process_details';

    // protected $injectUniqueIdentifier = true;
    // use ValidatingTrait;
    // use UniqueUndeletedTrait;

    // use Searchable;

    // protected $searchableAttributes = ['name'];

    // protected $searchableRelations = [];

    
    public $timestamps = false;

    protected $fillable = ['process_id','user_id','level'];

}
