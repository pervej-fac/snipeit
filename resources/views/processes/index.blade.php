@extends('layouts/default')

{{-- Page title --}}
@section('title')
{{ trans('admin/processes/table.processes') }}
@parent
@stop

{{-- Page content --}}
@section('content')

@section('header_right')
  @can('create', \App\Models\Process::class)
    <a href="{{ route('processes.create') }}" class="btn btn-primary pull-right"> {{ trans('general.create') }}</a>
  @endcan
@stop