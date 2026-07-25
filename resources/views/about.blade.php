@extends('layouts.app')

@section('content')
    <div class="content">
        <h1>{{ $title }}</h1>
        <p>{{ $description }}</p>

        <div style="margin-top: 2rem;">
            <h2>About This Project</h2>
            <p>This is a Laravel project foundation set up with Blade templates. It includes:</p>

            <ul style="margin-left: 1.5rem; margin-top: 1rem;">
                <li>Basic project structure</li>
                <li>Blade template engine</li>
                <li>Sample controllers</li>
                <li>Web routes</li>
                <li>Layout inheritance</li>
            </ul>
        </div>

        <div style="margin-top: 2rem;">
            <h2>Getting Started</h2>
            <ol style="margin-left: 1.5rem; margin-top: 1rem;">
                <li>Run <code>composer install</code></li>
                <li>Copy <code>.env.example</code> to <code>.env</code></li>
                <li>Run <code>php artisan key:generate</code></li>
                <li>Configure your database in <code>.env</code></li>
                <li>Run <code>php artisan serve</code></li>
            </ol>
        </div>
    </div>
@endsection
