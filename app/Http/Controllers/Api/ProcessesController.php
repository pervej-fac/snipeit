<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Transformers\SelectlistTransformer;
use App\Http\Transformers\SuppliersTransformer;
use App\Models\Supplier;
use App\Models\Process;
use Illuminate\Http\Request;
use App\Http\Requests\ImageUploadRequest;
use Illuminate\Support\Facades\Storage;

class ProcessesController extends Controller
{
  public function selectlist(Request $request)
    {

        $processes = Process::select([
            'id',
            'name'
        ]);

        if ($request->filled('search')) {
            $processes = $processes->where('processes.name', 'LIKE', '%'.$request->get('search').'%');
        }

        $processes = $processes->orderBy('name', 'ASC')->paginate(50);

        // Loop through and set some custom properties for the transformer to use.
        // This lets us have more flexibility in special cases like assets, where
        // they may not have a ->name value but we want to display something anyway
        foreach ($processes as $process) {
            $process->use_text = $process->name;
        }

        return (new SelectlistTransformer)->transformSelectlist($processes);

    }

}
