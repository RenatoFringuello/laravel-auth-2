@extends('layouts.app')

@section('content')
    {{-- fai il form --}}
    @include('layouts.partials.form', ['method' => 'post', 'route' => 'admin.projects.store', 'project'])
@endsection