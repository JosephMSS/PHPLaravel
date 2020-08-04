@extends('layouts.base')
@section('content')

<div class="row">
    <div class="col">
        <h1>Create Expense</h1>
    </div>
</div>

<div class="row">
    <a class="btn btn-secondary" href="/expense_reports/">Back</a>
</div>
<div class="row">
    <div class="col">
        <div class="alert alert-danger">
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <ul>
                        <li>
                            {{ $error }}
                        </li>
                    </ul>
                @endforeach
    
            @endif
        </div>
        <form action="/expense_reports/{{ $report->id }}/expenses" method="post">
            @csrf
            <div class="form-group">
                <label for="description">Description</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="{{ old('description') }}">
                <label for="amount">Amount</label>
            <input type="number" class="form-control" name="amount" id="amount" placeholder="Amount" value="{{ old('amount') }}">
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</div>

@endsection