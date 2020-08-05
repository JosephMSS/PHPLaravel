@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col">
        <h1>Send Mail Report</h1>
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
        <form action="/expense_reports/{{ $report->id }}/sendMail" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Type a email" value="{{ old('email') }}">
            </div>
            <button class="btn btn-primary" type="submit">Send email</button>
        </form>
    </div>
</div>

@endsection