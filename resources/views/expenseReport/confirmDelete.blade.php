@extends('layouts.base')
@section('content')

<div class="row">
    <div class="col">
    <h1>Delete Report {{ $report->title }}</h1>
    </div>
</div>

<div class="row">
</div>
<div class="row">
    <div class="col">
        <form action="/expense_reports/{{$report->id}}" method="post">
            @csrf
            @method('delete')
            <a class="btn btn-secondary" href="/expense_reports/">Back</a>
        <button  class="btn btn-primary" type="submit">Confirm</button>
        </form>
    </div>
</div>

@endsection