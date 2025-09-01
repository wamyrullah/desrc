@php($active = request()->routeIs('dashboard'))

@include('partials.head')

<body class="bg-white dark:bg-gray-900 antialiased">

    <header>
        <x-layouts.app.navbar />
    </header>

    <main>
        <x-layouts.app.sidebar />
        <div class="p-4 sm:ml-64 mt-16">
            {{ $slot }}
        </div>
    </main>

</body>

</html>
