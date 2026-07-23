@extends('layouts.app')

@section('content')
    <div class="content">
        <h1>{{ $title }}</h1>
        <p>{{ $message }}</p>
        
        <div style="margin-top: 2rem;">
            <h2>Features</h2>
            <ul style="margin-left: 1.5rem; margin-top: 1rem;">
                <li>Blade Templates</li>
                <li>Routing</li>
                <li>Controllers</li>
                <li>MVC Architecture</li>
            </ul>
        </div>

        <div style="margin-top: 2rem;">
            <p>Current Date: {{ date('F j, Y') }}</p>
            <p>Environment: {{ app()->environment() }}</p>
        </div>
    </div>
@endsection
