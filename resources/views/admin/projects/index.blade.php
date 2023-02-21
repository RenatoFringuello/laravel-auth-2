@extends('layouts.app')

@section('content')
    {{-- homepage --}}
    <table class="table">
        <thead class="bg-dark text-white">
            <tr class="align-middle">
                <th class="text-center">Title</th>
                <th class="text-center">Author</th>
                <th class="text-center">Start Date</th>
                <th class="text-center">End Date</th>
                <th class="text-center"><a class="text-decoration-none btn btn-primary" href="{{route('admin.projects.create')}}">Add Project</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr class="align-middle">
                    <td class="text-center">{{ $project->title }}</td>
                    <td class="text-center">{{ $project->author_name . ' ' . $project->author_lastname }}</td>
                    <td class="text-center">{{ $project->start_date->format('Y-m-d') }}</td>
                    <td class="text-center text-success {{ $project->end_date ?? 'text-danger' }}">{{ isset($project->end_date) ? $project->end_date->format('Y-m-d'): 'work in progress' }}</td>
                    <td class="text-center">
                        <div class="btn-container">
                            <a href="{{route('admin.projects.show', $project)}}" class="text-decoration-none btn btn-primary">Show</a>
                            <a href="{{route('admin.projects.edit', $project)}}" class="text-decoration-none btn btn-warning">Edit</a>
                            @include('layouts.partials.form', ['method' => 'DELETE', 'route' => 'admin.projects.destroy', 'project' => $project, 'extraClasses' => 'btn p-0'])
                        </div>
                    </td>
                </tr>
            @endforeach   
        </tbody>
    </table>
@endsection
