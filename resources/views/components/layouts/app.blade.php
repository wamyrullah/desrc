@php($active = request()->routeIs('dashboard'))

@include('partials.head')

<body class="bg-white dark:bg-gray-900 antialiased">

    <header>
        <livewire:partials.navbar />
    </header>

    <main>
        <x-layouts.app.sidebar />
        <div class="p-4 sm:ml-64 mt-16">
            {{ $slot }}
        </div>
    </main>

    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('close-modal', (data) => {
                const modalEl = document.getElementById(data.id);
                if (modalEl) {
                    const modal = new Modal(modalEl);
                    modal.hide();
                }
            });
        });
    </script>

</body>

</html>
