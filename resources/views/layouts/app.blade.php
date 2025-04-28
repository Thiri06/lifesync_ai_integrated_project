<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'LifeSync') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="icon" type="image/svg+xml" href="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAzMiAzMiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTYgMkM4LjI2OCAyIDIgOC4yNjggMiAxNkMyIDIzLjczMiA4LjI2OCAzMCAxNiAzMEMyMy43MzIgMzAgMzAgMjMuNzMyIDMwIDE2QzMwIDguMjY4IDIzLjczMiAyIDE2IDJaIiBmaWxsPSIjNTkyZmRlIiBmaWxsLW9wYWNpdHk9IjAuMSIvPjxwYXRoIGQ9Ik0xNiA2QzEwLjQ3NyA2IDYgMTAuNDc3IDYgMTZDNiAyMS41MjMgMTAuNDc3IDI2IDE2IDI2QzIxLjUyMyAyNiAyNiAyMS41MjMgMjYgMTZDMjYgMTAuNDc3IDIxLjUyMyA2IDE2IDZaIiBmaWxsPSIjNTkyZmRlIiBmaWxsLW9wYWNpdHk9IjAuMiIvPjxwYXRoIGQ9Ik0xNiAxMEMxMi42ODYgMTAgMTAgMTIuNjg2IDEwIDE2QzEwIDE5LjMxNCAxMi42ODYgMjIgMTYgMjJDMTkuMzE0IDIyIDIyIDE5LjMxNCAyMiAxNkMyMiAxMi42ODYgMTkuMzE0IDEwIDE2IDEwWiIgZmlsbD0iIzU5MmZkZSIvPjxwYXRoIGQ9Ik0xNiAxNEMxNC44OTUgMTQgMTQgMTQuODk1IDE0IDE2QzE0IDE3LjEwNSAxNC44OTUgMTggMTYgMThDMTcuMTA1IDE4IDE4IDE3LjEwNSAxOCAxNkMxOCAxNC44OTUgMTcuMTA1IDE0IDE2IDE0WiIgZmlsbD0id2hpdGUiLz48cGF0aCBkPSJNMjQgOUMyNyAxMC4xMDQ2IDIzLjEwNDYgMTEgMjIgMTFDMjAuODk1NCAxMSAyMCAxMC4xMDQ2IDIwIDlDMjAgNy44OTU0MyAyMC44OTU0IDcgMjIgN0MyMy4xMDQ2IDcgMjQgNy44OTU0MyAyNCA5WiIgZmlsbD0iI2Q5NTllNSIvPjxwYXRoIGQ9Ik0xMiAyM0MxMiAyNC4xMDQ2IDExLjEwNDYgMjUgMTAgMjVDOC44OTU0MyAyNSA4IDI0LjEwNDYgOCAyM0M4IDIxLjg5NTQgOC44OTU0MyAyMSAxMCAyMUMxMS4xMDQ2IDIxIDEyIDIxLjg5NTQgMTIgMjNaIiBmaWxsPSIjZDM4ZGVkIi8+PC9zdmc+" />


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
