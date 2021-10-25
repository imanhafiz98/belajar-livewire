<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <title>Livewire</title>

    @livewireStyles

    @livewireScripts

    <script src="{{asset('js/app.js')}}"></script>

</head>

<body class="flex flex-wrap justify-center">

    <div class="flex w-full justify-left px-4 bg-purple-900 text-white">

        <a class="mx-3 py-4" href="/">Home</a>
        <a class="mx-3 py-4" href="/login">Login</a>
        
    </div>

    <div class="my-10">

        @yield('content')

    </div>

</body>

</html>
