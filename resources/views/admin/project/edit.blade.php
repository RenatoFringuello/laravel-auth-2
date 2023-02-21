@extends('layouts.app')

@section('content')
    {{-- fai il form --}}
    <form class="w-50 mx-auto" action="{{route('admin.project.update', $project)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$project->title}}">
        </div>
        <div class="mb-3">
            <label for="author_name" class="form-label">Author Name</label>
            <input type="text" class="form-control" id="author_name" name="author_name" value="{{$project->author_name}}">
        </div>
        <div class="mb-3">
            <label for="author_lastname" class="form-label">Author Lastname</label>
            <input type="text" class="form-control" id="author_lastname" name="author_lastname" value="{{$project->author_lastname}}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content">{{$project->content}}"</textarea>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="datetime" class="form-control" id="start_date" name="start_date" value="{{$project->start_date}}">
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="datetime" class="form-control" id="end_date" name="end_date" value="{{$project->end_date}}">
        </div>
        <button class="btn btn-primary" type="submit">Send</button>
    </form>
@endsection