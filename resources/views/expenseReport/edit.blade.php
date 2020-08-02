@extends('layouts.base')
@section('content')

<div class="row">
    <div class="col">
    <h1>Edit Report {{ $report->title }}</h1>
    </div>
</div>

<div class="row">
    <a class="btn btn-secondary" href="/expense_reports/">Back</a>
</div>
<div class="row">
    <div class="col">
    <form action="/expense_reports/{{$report->id}}" method="post">
            @csrf
            @method('put')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Type a title">
        </div>
        <button  class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</div>

@endsection