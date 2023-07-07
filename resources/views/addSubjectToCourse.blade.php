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
            <h2 class="text-2xl">เพิ่มรายวิชาที่ผ่านแล้ว</h2>
        </div>
        <form action="{{route('addSubjectToDB')}}" method="post">
            @csrf
            <div class="container mx-auto">
                <label for="price" class="block text-sm font-medium leading-6 text-gray-900">รหัสวิชา</label>
                <div class="relative mt-2 rounded-md shadow-sm">
                    
                    <input type="text" name="subject_id" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="เช่น 05506002">

                </div>

                <label for="price" class="block text-sm font-medium leading-6 text-gray-900">ประเภทของวิชา</label>
                <div class="relative mt-2 rounded-md shadow-sm">
                    
                    <input type="text" name="subject_type" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="เช่น ก.2">

                </div>

                <label for="price" class="block text-sm font-medium leading-6 text-gray-900">ชื่อวิชาภาษาไทย</label>
                <div class="relative mt-2 rounded-md shadow-sm">
                    
                    <input type="text" name="subject_th_name" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="เช่น การเขียนโปรแกรมขั้นพื้นฐาน">

                </div>

                <label for="price" class="block text-sm font-medium leading-6 text-gray-900">ชื่อวิชาภาษาอังกฤษ</label>
                <div class="relative mt-2 rounded-md shadow-sm">
                    
                    <input type="text" name="subject_en_name" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="เช่น PROGRAMMING FUNDAMENTAL">

                </div>

                <label for="price" class="block text-sm font-medium leading-6 text-gray-900">จำนวนหน่วยกิต</label>
                <div class="relative mt-2 rounded-md shadow-sm">
                    
                    <input type="number" name="credit" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="เช่น 3">

                </div>

                <label for="price" class="block text-sm font-medium leading-6 text-gray-900">รายละเอียดหน่วยกิต</label>
                <div class="relative mt-2 rounded-md shadow-sm">
                    
                    <input type="text" name="des_credit" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="เช่น 3-0-6">

                </div>
                



                <!-- <button type="submit" class="mt-10 flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">เพิ่มรายวิชา</button> -->
                <button type="submit">เพิ่มรายวิชา</button>
            </div>
        </form>



    </body>
</x-app-layout>


</html>