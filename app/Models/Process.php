<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\UniqueUndeletedTrait;
use App\Models\Traits\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Watson\Validating\ValidatingTrait;

class Process extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'processes';

    protected $rules = array(
        'name'              => 'required|min:1|unique_undeleted',
        'total_levels'      => 'max:50|nullable'
    );

    protected $injectUniqueIdentifier = true;
    use ValidatingTrait;
    use UniqueUndeletedTrait;

    use Searchable;

    protected $searchableAttributes = ['name'];

    protected $searchableRelations = [];

    protected $fillable = ['name','total_levels','created_by','updated_by'];


}
