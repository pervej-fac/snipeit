<!-- Order Number -->
<div class="form-group {{ $errors->has('total_levels') ? ' has-error' : '' }}">
   <label for="total_levels" class="col-md-3 control-label">{{ $translated_name }}</label>

   <div class="col-md-7 col-sm-12{{  (\App\Helpers\Helper::checkIfRequired($item, 'total_levels')) ? ' required' : '' }}">
       <input class="form-control" type="number" name="total_levels" id="total_levels" aria-label="total_levels" id="total_levels" value="{{ old('total_levels', $item->total_levels) }}" {!!  (\App\Helpers\Helper::checkIfRequired($item, 'name')) ? ' data-validation="required" required' : '' !!}/>
       {!! $errors->first('total_levels', '<span class="alert-msg" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i> :message</span>') !!}
   </div>
</div>

