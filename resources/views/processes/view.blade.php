

<div class="col-md-6{{  ((isset($required)) && ($required=='true')) ? ' required' : '' }}">
    <select class="js-data-ajax" data-endpoint="users" data-placeholder="{{ trans('general.select_user') }}" name="{{ $fieldname }}" style="width: 100%" id="assigned_user_select" aria-label="{{ $fieldname }}">
        @if ($user_id = old($fieldname, (isset($item)) ? $item->{$fieldname} : ''))
            <option value="{{ $user_id }}" selected="selected" role="option" aria-selected="true"  role="option">
                {{ (\App\Models\User::find($user_id)) ? \App\Models\User::find($user_id)->present()->fullName : '' }}
            </option>
        @else
            <option value=""  role="option">{{ trans('general.select_user') }}</option>
        @endif
    </select>
</div>  