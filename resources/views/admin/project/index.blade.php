@extends('layouts.app')

@section('content')
    {{-- homepage --}}
    <table class="table">
        <thead class="bg-dark text-white">
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th><a class="text-decoration-none btn btn-primary" href="#">Add Project</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->author_name . ' ' . $project->author_lastname }}</td>
                    <td>{{ $project->start_date->format('Y-m-d') }}</td>
                    <td class="text-success {{ $project->end_date ?? 'text-danger' }}">{{ isset($project->end_date) ? $project->end_date->format('Y-m-d'): 'work in progress' }}</td>
                    <td>
                        <div class="btn-container">
                            <a href="{{route('admin.project.show', $project)}}" class="text-decoration-none btn btn-primary">Show</a>
                            <a href="{{route('admin.project.edit', $project)}}" class="text-decoration-none btn btn-warning">Edit</a>
                            <a href="{{route('admin.project.show', $project)}}" class="text-decoration-none btn btn-danger">Delete</a>
                        </div>
                    </td>
                </tr>
            @endforeach   
        </tbody>
    </table>
    {{-- <div class="row g-3">
        @foreach ($projects as $project)
            <a href="{{route('project.show', $project)}}" class="col-12 col-sm-6 col-lg-4 col-xl-3 text-decoration-none text-black">
                <div class="card p-2">
                    <h4>{{ $project->title }}</h4>
                    <pre class="text-secondary">{{ $project->author_name . ' ' . $project->author_lastname }}</pre>
                    <div>{{ $project->start_date->format('Y-m-d') }}</div>
                    <div class="text-success {{ $project->end_date ?? 'text-danger' }}">{{ isset($project->end_date) ? $project->end_date->format('Y-m-d'): 'work in progress' }}</div>
                </div>
            </a>
        @endforeach     
    </div> --}}
@endsection
