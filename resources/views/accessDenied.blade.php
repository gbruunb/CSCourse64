<!DOCTYPE html>
<html lang="en">
<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CS Course 2564</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    </head>

    <body style="font-family: 'Kanit', sans-serif;">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Course') }}
            </h2>
        </x-slot>

        <div class="container mx-auto my-6">
            <h2 class="text-2xl">คุณไม่มีสิทธิ์เข้าหน้านี้</h2>
        </div>


    </body>
</x-app-layout>


</html>