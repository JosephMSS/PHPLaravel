@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="title m-b-md">
            Expense Reports
        </div>
        @if (Route::has('login'))
        <div class=" links">
            @auth
            <a href="{{ url('/expense_reports') }}">List Reports</a>
            <a href="{{ url('/expense_reports/create') }}">New Report</a>

            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a style="color:red" href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

    </div>
    </div>

@endsection