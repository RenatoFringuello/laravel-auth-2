@extends('layouts.app')

@section('content')
    {{-- fai il form --}}
    @include('layouts.partials.form', ['method' => 'PUT', 'route' => 'admin.projects.update', 'project' => $project])
@endsection