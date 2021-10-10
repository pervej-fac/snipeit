<?php

namespace App\Http\Controllers\Processes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Process;
use App\Models\ProcessDetail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

class ProcessesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', Process::class);

        // Show the page
        return view('processes/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Process::class);
        $users = User::get();
        // $options = '';
        // foreach ($users as $user) {
        //     $options .= '<option value="'.$user->id.'">'.$user->username.'</option>';
        // }
        return view('processes/edit')->with('item', new Process)->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->authorize('create', Process::class);
        try{
        DB::beginTransaction();
        // Create a new supplier
        $process = new Process;
        // Save the location data
        $process->name                 = request('name');
        $process->total_levels         = request('total_levels');
        $process->created_by           = Auth::user()->username;
        
        $process->save();
        // dd("The last id id: ".$process->id);
        if(count($request->assigned_user)>0 && count($request->level)>0){
            for($i=0; $i<count($request->assigned_user); $i++){
                /*$data = new ProcessDetail;
                $data->process_id = $process->id;
                $data->user_id = (int) $request->assigned_user[$i];
                $data->level = (int) $request->level[$i]; */
                $data['process_id'] = $process->id;
                $data['user_id'] = $request->assigned_user[$i];
                $data['level'] = $request->level[$i]; 
                // $data['process_id'] = 1;
                // $data['user_id'] = 1;
                // $data['level'] = 1; 
// echo "1";
// $data = htmlspecialchars($data);
                ProcessDetail::create($data);
                // $data->save();
                // echo "2";
            }
        }
            // $data=$request->except('_token' , 'items', 'rcvby_designation', 'rcvby_department');
            DB::commit();
        }
        catch(Exception $exception){            
            DB::rollback();
            return redirect()->back()->withInput()->withErrors($exception->getMessage())." Error";
            // return redirect()->back()->withInput()->withErrors($exception->getMessage());
        }
        // if($dbprocess) {
            return redirect()->route('processes.index')->with('success', trans('admin/processes/message.create.success'));
        // }
        // return redirect()->back()->withInput()->withErrors($process->getErrors());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
