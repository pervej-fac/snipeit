<div id="processes" class="form-group{{ $errors->has($fieldname) ? ' has-error' : '' }}">

    {{ Form::label($fieldname, $translated_name, array('class' => 'col-md-3 control-label')) }}

    <div class="col-md-7{{  ((isset($required)) && ($required=='true')) ? ' required' : '' }}">
        <select class="js-data-ajax" data-endpoint="processes" data-placeholder="{{ trans('general.select_process') }}" name="{{ $fieldname }}" style="width: 100%" id="process_select" aria-label="{{ $fieldname }}">
            @if ($process_id = old($fieldname, (isset($item)) ? $item->{$fieldname} : ''))
                <option value="{{ $process_id }}" selected="selected" role="option" aria-selected="true"  role="option">
                    {{ (\App\Models\Process::find($process_id)) ? \App\Models\Process::find($process_id)->name : '' }}
                </option>
            @else
                <option value=""  role="option">{{ trans('general.select_processes') }}</option>
            @endif
        </select>
    </div>

  

    {!! $errors->first($fieldname, '<div class="col-md-8 col-md-offset-3"><span class="alert-msg" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i> :message</span></div>') !!}

</div>
