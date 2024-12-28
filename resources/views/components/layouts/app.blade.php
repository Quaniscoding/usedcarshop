<!DOCTYPE html>
<html lang="en" @if (session('theme') === 'dark') class="dark" @endif>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Used Shop Cars' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.core.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/nouislider@15.7.0/distribute/nouislider.min.css">
</head>

<body class="bg-slate-200 dark:bg-slate-700">
    @livewire('partials.navbar')
    <main>
        {{ $slot }}
    </main>
    @livewire('partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/nouislider@15.7.0/distribute/nouislider.min.js"></script>
    <x-livewire-alert::scripts />
    @livewireScripts
</body>

</html>