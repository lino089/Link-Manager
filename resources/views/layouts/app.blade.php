<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Link Manager')</title>

    <!-- Tailwind CSS CDN untk styling cepat -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 font-sans antialiased min-h-screen flex flex-col">
    <!-- 1. Header & Navigasi  -->
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 flex justify-between items-center">
            <div>
                <a href="{{ url('/') }}"
                    class="text-xl font-bold text-indigo-600 hover:text-indigo-800 tracking-tight">LinkManager</a>
            </div>
            <nav class="flex space-x-4">
                <a href="{{ url('/') }}"
                    class="text-sm font-medium text-gray-600 hover:text-indigo-600 transition">Halaman Publik</a>
                <a href="{{ route('links.index') }}"
                    class="text-sm font-medium text-gray-600 hover:text-indigo-600 transition"> Kelola Tautan</a>
            </nav>
        </div>
    </header>

    <!-- 2. Kotak Notifikasi / flash message -->
    @if (session('success'))
        <div class="max-w-4xl mx-auto px-4 mt-6 w-full">
            <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-r shadow-sm flex items-center justify-between">
                <div class="flex items-center">
                    <span class="text-green-600 font-bold mr-2">Sukses: </span>
                    <span class="text-green-600 text-sm">{{ session('success') }}</span>
                </div>
            </div>
        </div>
    @endif

    <!-- 3. Konten Utama  -->
    <main class="flex-grow max-w-4xl mx-auto px-4 py-8 w-full">
        @yield('content')
    </main>

    <!-- 4.  Footer -->
    <footer class="bg-white border-t border-gray-200 py-6 text-center text-sm text-gray-500 mt-auto">
        <div class="max-w-4xl mx-auto px-4">
            <p>&copy; {{ date('Y') }} LinkManager - Belajart Mandiri Laravel</p>
        </div>
    </footer>
</body>

</html>