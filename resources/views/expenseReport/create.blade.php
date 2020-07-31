@extends('layouts.base')
@section('content')

<div class="row">
    <div class="col">
        <h1>Create Reports</h1>
    </div>
</div>

<div class="row">
    <a class="btn btn-secondary" href="/expense_reports/">Back</a>
</div>
<div class="row">
    <div class="col">
        <form action="/expense_repots" method="post">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Type a title">
        </div>
        <button  class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</div>

@endsection