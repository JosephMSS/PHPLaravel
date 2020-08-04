@extends('layouts.base')
@section('content')

<div class="row">
    <div class="col">
        <h1>Reports</h1>
    </div>
</div>

<div class="row">
    <a class="btn btn-primary" href="/expense_reports/create/">Create a new Reports</a>
</div>
<div class="row">

    <table class="table">
        @foreach($expenseReports as $expenseReport)
        <tr>
            <td><a href="/expense_reports/{{ $expenseReport->id }}">{{ $expenseReport->title }}</a></td>
            <td><a href="/expense_reports/{{ $expenseReport->id }}/edit">Edit</a></td>
            <td><a href="/expense_reports/{{ $expenseReport->id }}/confirmDelete">Confirm delete</a></td>

        </tr>
        @endforeach
    </table>
</div>

@endsection
