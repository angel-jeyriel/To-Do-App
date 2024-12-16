<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} | {{Auth::user()->name}} </title>
    @livewireStyles
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div>
        @livewire('todo-list')
    </div>

    @livewireScripts
</body>

</html>