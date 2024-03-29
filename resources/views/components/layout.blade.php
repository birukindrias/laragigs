<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/storage/logo/icon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d"
                    , }
                , }
            , }
        , };

    </script>
    <title>LaraGigs | Find Laravel Jobs & Projects</title>
</head>

<body class="mb-48">
    <nav class="flex justify-between items-center mb-4">
        <a href="/"><img class="w-24" src="/images/logo.png" alt="" class="logo" /></a>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
            <li>
                <a href="" class="hover:text-laravel"> Wellcome {{auth()->user()->name}}</a>
            </li>
            <li>
                <a href="/listings/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"></i> Manage Gigs</a>

            </li>
            <li>
                <form action="/logout" method="post">
                    @csrf
                    <button>
                        <i class="fa-solid fa-door-closed"></i> Logout
                    </button>
                </form>
            </li>
            @else
            <li>
                <a href="/user/login" class="hover:text-laravel"><i class="fa-solid fa-gear"></i> login</a>
            </li>
            <li>
                <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-gear"></i> Register</a>
            </li>
            @endauth


        </ul>
    </nav>
    <main>
        {{$slot}}
    </main>
    <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

        <a href="/listings/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Post Job</a>
    </footer>

    @if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3">
        <p>
            {{session('message')}}
        </p>
    </div>
    @endif

</body>

</html>
