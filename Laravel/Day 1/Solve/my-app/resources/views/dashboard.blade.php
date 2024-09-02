<!-- resources/views/dashboard.blade.php -->

<h1>Welcome to your Dashboard</h1>

@if(session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

<p>You are logged in!</p>
