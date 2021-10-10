@extends('layouts/edit-form', [
    'createText' => trans('admin/processes/table.create') ,
    'updateText' => trans('admin/processes/table.update'),
    'helpTitle' => trans('admin/processes/table.about_processes_title'),
    'helpText' => trans('admin/processes/table.about_processes_text'),
    'formAction' => (isset($item->id)) ? route('processes.update', ['process' => $item->id]) : route('processes.store'),
])

{{-- Page content --}}
@section('inputFields')
    @include ('partials.forms.edit.name', ['translated_name' => trans('admin/processes/table.name')])
    @include ('partials.forms.edit.total_levels', ['translated_name' => trans('admin/processes/table.total_levels')])
    {{-- @include ('partials.forms.edit.user-select', ['translated_name' => trans('admin/processes/table.user'),'fieldname'=>trans('admin/processes/table.fieldname')]) --}}
   
    {{-- <div class="col-md-3 text-right" style="padding-right: 10px;"> --}}
                            <button type="button" class="btn btn-primary" id="generate_levels">
                                {{-- <i class="fa fa-check icon-white" aria-hidden="true"></i> --}}
                                {{ trans('admin/processes/table.generate_row') }}
                            </button>
                        {{-- </div> --}}

{{-- @endsection('inputFields') --}}
    <div class="box box-default">
        <div class="box-body" id="user_levels">
            {{-- <select>
                @foreach ($users as $user)
                    <option value={{ $user->id }}> {{ $user->username }} </option>';
                @endforeach
            </select> --}}
        </div>
    </div>

@stop

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

    $(document).ready(function(){
        $("#generate_levels").click(function(){
            $("#user_levels").empty();
           var levels=document.getElementById('total_levels').value;
            
                for(var i=0; i<levels; i++){  
                    let lvl = parseInt(i)+1;                  
                    $("#user_levels").append("<p><div class='row'><div class='col-md-12'><label>Level-"+lvl+": <label> <select class='form-control select2' data-placeholder='{{ trans('general.select_user') }}' name='assigned_user["+i+"]' style='width: 100%' id='assigned_user_select' aria-label='assigned_user'><option value=''>Select User Level</option>@foreach($users as $user)<option value='{{ $user->id }}'> {{ $user->username }} </option>'; @endforeach</select></div></div><input type='hidden' name='level["+i+"]' value='"+lvl+"'></p>");
                }
            
        });
    });

</script>