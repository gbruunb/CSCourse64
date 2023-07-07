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

        <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
        <div class="container mx-auto my-6">
            <h2 class="text-2xl">เพิ่มรายวิชาที่ผ่านแล้ว</h2>
        </div>
        <form action="{{route('addCheckSubject')}}" method="post">
            @csrf
            <div class="container mx-auto">
                <label for="price" class="block text-sm font-medium leading-6 text-gray-900">รหัสวิชา</label>
                <div class="relative mt-2 rounded-md shadow-sm">
                    
                    <input type="text" name="subject_id" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="เช่น 05506002">

                </div>
                <input type="hidden" class="" value="{{$user -> student_id}}" name="student_id">
                <!-- <button type="submit" class="mt-10 flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">เพิ่มรายวิชา</button> -->
                <button type="submit">เพิ่มรายวิชา</button>
            </div>
        </form>


        <div class="container mx-auto my-6">
            <h2 class="text-2xl">ก. หมวดวิชาศึกษาทั่วไป (30 หน่วยกิต)</h2>
            <h2 class="text-2xl">เหลืออีก 30 หน่วยกิต</h2>
        </div>

        <div class="container mx-auto my-6">
            <h3 class="text-xl">ก.1 กลุ่มรายวิชาในกลุ่มวิชาพื้นฐาน ( 6 หน่วยกิต )</h3>
            <h3 class="text-xl">เหลืออีก 6 หน่วยกิต</h3>
        </div>
        <div class="flex flex-col container mx-auto my-auto">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-2 py-4 text-lg">รหัสวิชา</th>
                                    <th scope="col" class="px-8 py-4 text-lg">ชื่อวิชา</th>
                                    <th scope="col" class="px-2 py-4 text-lg">หน่วยกิต</th>
                                    <th scope="col" class="px-6 py-4 text-lg">Check!</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($subjects as $row)
                                @if($row -> subject_type == "ก.1")
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-2 py-4 font-medium">{{$row -> subject_id}}</td>
                                    <td class="whitespace-nowrap px-8 py-4">{{$row -> subject_th_name}}<br>{{$row -> subject_en_name}}</td>
                                    <td class="whitespace-nowrap px-2 py-4">{{$row -> credit}} ({{$row -> des_credit}})</td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @foreach($check_subject as $check)
                                        @if(($check -> student_id == $user -> student_id) && ($check -> subject_id == $row -> subject_id) && ($check -> isComplete == 1))
                                        ผ่าน
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto my-6">
            <h3 class="text-xl">ก.2 กลุ่มรายวิชาในกลุ่มวิชาด้านภาษาและการสื่อสาร ( 9 หน่วยกิต )</h3>
            <h3 class="text-xl">เหลืออีก 9 หน่วยกิต</h3>
        </div>
        <div class="container mx-auto my-6">
            <h3 class="text-xl">รายวิชาบังคับเลือก ( 3 หน่วยกิต )</h3>
            <h3 class="text-xl">เหลืออีก 3 หน่วยกิต</h3>
        </div>
        <div class="flex flex-col container mx-auto my-auto">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-2 py-4 text-lg">รหัสวิชา</th>
                                    <th scope="col" class="px-8 py-4 text-lg">ชื่อวิชา</th>
                                    <th scope="col" class="px-2 py-4 text-lg">หน่วยกิต</th>
                                    <th scope="col" class="px-6 py-4 text-lg">Check!</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($subjects as $row)
                                @if($row -> subject_type == "ก.2-FE")
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-2 py-4 font-medium">{{$row -> subject_id}}</td>
                                    <td class="whitespace-nowrap px-8 py-4">{{$row -> subject_th_name}}<br>{{$row -> subject_en_name}}</td>
                                    <td class="whitespace-nowrap px-2 py-4">{{$row -> credit}} ({{$row -> des_credit}})</td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @foreach($check_subject as $check)
                                        @if(($check -> student_id == $user -> student_id) && ($check -> subject_id == $row -> subject_id) && ($check -> isComplete == 1))
                                        ผ่าน
                                        @endif
                                        @endforeach
                                    </td>

                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto my-6">
            <h3 class="text-xl">รายวิชาเลือก ( 3 หน่วยกิต )</h3>
            <h3 class="text-xl">เหลืออีก 3 หน่วยกิต</h3>
        </div>
        <div class="flex flex-col container mx-auto my-auto">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-2 py-4 text-lg">รหัสวิชา</th>
                                    <th scope="col" class="px-8 py-4 text-lg">ชื่อวิชา</th>
                                    <th scope="col" class="px-2 py-4 text-lg">หน่วยกิต</th>
                                    <th scope="col" class="px-6 py-4 text-lg">Check!</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($subjects as $row)
                                @if($row -> subject_type == "ก.2-elective")
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-2 py-4 font-medium">{{$row -> subject_id}}</td>
                                    <td class="whitespace-nowrap px-8 py-4">{{$row -> subject_th_name}}<br>{{$row -> subject_en_name}}</td>
                                    <td class="whitespace-nowrap px-2 py-4">{{$row -> credit}} ({{$row -> des_credit}})</td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @foreach($check_subject as $check)
                                        @if(($check -> student_id == $user -> student_id) && ($check -> subject_id == $row -> subject_id) && ($check -> isComplete == 1))
                                        ผ่าน
                                        @endif
                                        @endforeach
                                    </td>

                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>






        <div class="container mx-auto my-6">
            <h3 class="text-xl">ก.3 กลุ่มวิชาตามเกณฑ์ของคณะวิทยาศาสตร์ (แทนที่ด้วยวิชาเลือกหมวดวิชาศึกษาทั่วไป) ( 9 หน่วยกิต )</h3>
            <h3 class="text-xl">เหลืออีก 9 หน่วยกิต</h3>
        </div>
        <div class="flex flex-col container mx-auto my-auto">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-2 py-4 text-lg">รหัสวิชา</th>
                                    <th scope="col" class="px-8 py-4 text-lg">ชื่อวิชา</th>
                                    <th scope="col" class="px-2 py-4 text-lg">หน่วยกิต</th>
                                    <th scope="col" class="px-6 py-4 text-lg">Check!</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($subjects as $row)
                                @if($row -> subject_type == "ก.3")
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-2 py-4 font-medium">{{$row -> subject_id}}</td>
                                    <td class="whitespace-nowrap px-8 py-4">{{$row -> subject_th_name}}<br>{{$row -> subject_en_name}}</td>
                                    <td class="whitespace-nowrap px-2 py-4">{{$row -> credit}} ({{$row -> des_credit}})</td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @foreach($check_subject as $check)
                                        @if(($check -> student_id == $user -> student_id) && ($check -> subject_id == $row -> subject_id) && ($check -> isComplete == 1))
                                        ผ่าน
                                        @endif
                                        @endforeach
                                    </td>

                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto my-6">
            <h3 class="text-xl">ก.4 รายวิชาในกลุ่มวิชาเลือกหมวดวิชาศึกษาทั่วไป ( 6 หน่วยกิต )</h3>
            <h3 class="text-xl">เหลืออีก 9 หน่วยกิต</h3>
        </div>
        <div class="flex flex-col container mx-auto my-auto">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-2 py-4 text-lg">รหัสวิชา</th>
                                    <th scope="col" class="px-8 py-4 text-lg">ชื่อวิชา</th>
                                    <th scope="col" class="px-2 py-4 text-lg">หน่วยกิต</th>
                                    <th scope="col" class="px-6 py-4 text-lg">Check!</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($subjects as $row)
                                @if($row -> subject_type == "ก.4")
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-2 py-4 font-medium">{{$row -> subject_id}}</td>
                                    <td class="whitespace-nowrap px-8 py-4">{{$row -> subject_th_name}}<br>{{$row -> subject_en_name}}</td>
                                    <td class="whitespace-nowrap px-2 py-4">{{$row -> credit}} ({{$row -> des_credit}})</td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @foreach($check_subject as $check)
                                        @if(($check -> student_id == $user -> student_id) && ($check -> subject_id == $row -> subject_id) && ($check -> isComplete == 1))
                                        ผ่าน
                                        @endif
                                        @endforeach
                                    </td>

                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>








        <div class="container mx-auto my-6">
            <h2 class="text-2xl">ข. หมวดวิชาเฉพาะ (99 หน่วยกิต)</h2>
            <h2 class="text-2xl">เหลืออีก 99 หน่วยกิต</h2>
        </div>

        <div class="container mx-auto my-6">
            <h3 class="text-xl">กลุ่มวิชาบังคับ ( 75 หน่วยกิต )</h3>
            <h3 class="text-xl">เหลืออีก 75 หน่วยกิต</h3>
        </div>

        <div class="container mx-auto my-6">
            <h3 class="text-xl">วิชาบังคับทางคณิตศาสตร์และสถิติ ( 18 หน่วยกิต )</h3>
            <h3 class="text-xl">เหลืออีก 18 หน่วยกิต</h3>
        </div>
        <div class="flex flex-col container mx-auto my-auto">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-2 py-4 text-lg">รหัสวิชา</th>
                                    <th scope="col" class="px-8 py-4 text-lg">ชื่อวิชา</th>
                                    <th scope="col" class="px-2 py-4 text-lg">หน่วยกิต</th>
                                    <th scope="col" class="px-6 py-4 text-lg">Check!</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($subjects as $row)
                                @if($row -> subject_type == "math")
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-2 py-4 font-medium">{{$row -> subject_id}}</td>
                                    <td class="whitespace-nowrap px-8 py-4">{{$row -> subject_th_name}}<br>{{$row -> subject_en_name}}</td>
                                    <td class="whitespace-nowrap px-2 py-4">{{$row -> credit}} ({{$row -> des_credit}})</td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @foreach($check_subject as $check)
                                        @if(($check -> student_id == $user -> student_id) && ($check -> subject_id == $row -> subject_id) && ($check -> isComplete == 1))
                                        ผ่าน
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="container mx-auto my-6">
            <h3 class="text-xl">วิชาบังคับทางวิทยาการคอมพิวเตอร์ ( 57 หน่วยกิต )</h3>
            <h3 class="text-xl">เหลืออีก 57 หน่วยกิต</h3>
        </div>
        <div class="container mx-auto my-6">
            <h3 class="text-xl">กลุ่มประเด็นด้านองค์การและระบบสารสนเทศ ( 6 หน่วยกิต )</h3>
            <h3 class="text-xl">เหลืออีก 6 หน่วยกิต</h3>
        </div>
        <div class="flex flex-col container mx-auto my-auto">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-2 py-4 text-lg">รหัสวิชา</th>
                                    <th scope="col" class="px-8 py-4 text-lg">ชื่อวิชา</th>
                                    <th scope="col" class="px-2 py-4 text-lg">หน่วยกิต</th>
                                    <th scope="col" class="px-6 py-4 text-lg">Check!</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($subjects as $row)
                                @if($row -> subject_type == "information")
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-2 py-4 font-medium">{{$row -> subject_id}}</td>
                                    <td class="whitespace-nowrap px-8 py-4">{{$row -> subject_th_name}}<br>{{$row -> subject_en_name}}</td>
                                    <td class="whitespace-nowrap px-2 py-4">{{$row -> credit}} ({{$row -> des_credit}})</td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @foreach($check_subject as $check)
                                        @if(($check -> student_id == $user -> student_id) && ($check -> subject_id == $row -> subject_id) && ($check -> isComplete == 1))
                                        ผ่าน
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="container mx-auto my-6">
            <h3 class="text-xl">กลุ่มเทคโนโลยีเพื่องานประยุกต์ ( 12 หน่วยกิต )</h3>
            <h3 class="text-xl">เหลืออีก 12 หน่วยกิต</h3>
        </div>
        <div class="flex flex-col container mx-auto my-auto">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-2 py-4 text-lg">รหัสวิชา</th>
                                    <th scope="col" class="px-8 py-4 text-lg">ชื่อวิชา</th>
                                    <th scope="col" class="px-2 py-4 text-lg">หน่วยกิต</th>
                                    <th scope="col" class="px-6 py-4 text-lg">Check!</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($subjects as $row)
                                @if($row -> subject_type == "itforapply")
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-2 py-4 font-medium">{{$row -> subject_id}}</td>
                                    <td class="whitespace-nowrap px-8 py-4">{{$row -> subject_th_name}}<br>{{$row -> subject_en_name}}</td>
                                    <td class="whitespace-nowrap px-2 py-4">{{$row -> credit}} ({{$row -> des_credit}})</td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @foreach($check_subject as $check)
                                        @if(($check -> student_id == $user -> student_id) && ($check -> subject_id == $row -> subject_id) && ($check -> isComplete == 1))
                                        ผ่าน
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="container mx-auto my-6">
            <h3 class="text-xl">กลุ่มเทคโนโลยีและวิธีการทางซอฟต์แวร์ ( 24 หน่วยกิต )</h3>
            <h3 class="text-xl">เหลืออีก 24 หน่วยกิต</h3>
        </div>
        <div class="flex flex-col container mx-auto my-auto">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-2 py-4 text-lg">รหัสวิชา</th>
                                    <th scope="col" class="px-8 py-4 text-lg">ชื่อวิชา</th>
                                    <th scope="col" class="px-2 py-4 text-lg">หน่วยกิต</th>
                                    <th scope="col" class="px-6 py-4 text-lg">Check!</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($subjects as $row)
                                @if($row -> subject_type == "sw")
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-2 py-4 font-medium">{{$row -> subject_id}}</td>
                                    <td class="whitespace-nowrap px-8 py-4">{{$row -> subject_th_name}}<br>{{$row -> subject_en_name}}</td>
                                    <td class="whitespace-nowrap px-2 py-4">{{$row -> credit}} ({{$row -> des_credit}})</td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @foreach($check_subject as $check)
                                        @if(($check -> student_id == $user -> student_id) && ($check -> subject_id == $row -> subject_id) && ($check -> isComplete == 1))
                                        ผ่าน
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <div class="container mx-auto my-6">
            <h3 class="text-xl">กลุ่มโครงสร้างพื้นฐานระบบ ( 12 หน่วยกิต )</h3>
            <h3 class="text-xl">เหลืออีก 12 หน่วยกิต</h3>
        </div>
        <div class="flex flex-col container mx-auto my-auto">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-2 py-4 text-lg">รหัสวิชา</th>
                                    <th scope="col" class="px-8 py-4 text-lg">ชื่อวิชา</th>
                                    <th scope="col" class="px-2 py-4 text-lg">หน่วยกิต</th>
                                    <th scope="col" class="px-6 py-4 text-lg">Check!</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($subjects as $row)
                                @if($row -> subject_type == "systemstruc")
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-2 py-4 font-medium">{{$row -> subject_id}}</td>
                                    <td class="whitespace-nowrap px-8 py-4">{{$row -> subject_th_name}}<br>{{$row -> subject_en_name}}</td>
                                    <td class="whitespace-nowrap px-2 py-4">{{$row -> credit}} ({{$row -> des_credit}})</td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @foreach($check_subject as $check)
                                        @if(($check -> student_id == $user -> student_id) && ($check -> subject_id == $row -> subject_id) && ($check -> isComplete == 1))
                                        ผ่าน
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <div class="container mx-auto my-6">
            <h3 class="text-xl">กลุ่มฮาร์ดแวร์และสถาปัตยกรรมคอมพิวเตอร์ ( 3 หน่วยกิต )</h3>
            <h3 class="text-xl">เหลืออีก 3 หน่วยกิต</h3>
        </div>
        <div class="flex flex-col container mx-auto my-auto">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-2 py-4 text-lg">รหัสวิชา</th>
                                    <th scope="col" class="px-8 py-4 text-lg">ชื่อวิชา</th>
                                    <th scope="col" class="px-2 py-4 text-lg">หน่วยกิต</th>
                                    <th scope="col" class="px-6 py-4 text-lg">Check!</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($subjects as $row)
                                @if($row -> subject_type == "comor")
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-2 py-4 font-medium">{{$row -> subject_id}}</td>
                                    <td class="whitespace-nowrap px-8 py-4">{{$row -> subject_th_name}}<br>{{$row -> subject_en_name}}</td>
                                    <td class="whitespace-nowrap px-2 py-4">{{$row -> credit}} ({{$row -> des_credit}})</td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @foreach($check_subject as $check)
                                        @if(($check -> student_id == $user -> student_id) && ($check -> subject_id == $row -> subject_id) && ($check -> isComplete == 1))
                                        ผ่าน
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <div class="container mx-auto my-6">
            <h3 class="text-xl">กลุ่มวิชาเลือก ( 18 หน่วยกิต )</h3>
            <h3 class="text-xl">เหลืออีก 18 หน่วยกิต</h3>
        </div>
        <div class="flex flex-col container mx-auto my-auto">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-2 py-4 text-lg">รหัสวิชา</th>
                                    <th scope="col" class="px-8 py-4 text-lg">ชื่อวิชา</th>
                                    <th scope="col" class="px-2 py-4 text-lg">หน่วยกิต</th>
                                    <th scope="col" class="px-6 py-4 text-lg">Check!</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($subjects as $row)
                                @if($row -> subject_type == "cs-elective")
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-2 py-4 font-medium">{{$row -> subject_id}}</td>
                                    <td class="whitespace-nowrap px-8 py-4">{{$row -> subject_th_name}}<br>{{$row -> subject_en_name}}</td>
                                    <td class="whitespace-nowrap px-2 py-4">{{$row -> credit}} ({{$row -> des_credit}})</td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @foreach($check_subject as $check)
                                        @if(($check -> student_id == $user -> student_id) && ($check -> subject_id == $row -> subject_id) && ($check -> isComplete == 1))
                                        ผ่าน
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="container mx-auto my-6">
            <h3 class="text-xl">กลุ่มวิชาการศึกษาทางเลือก ( 6 หน่วยกิต )</h3>
            <h3 class="text-xl">เหลืออีก 6 หน่วยกิต</h3>
        </div>
        <div class="flex flex-col container mx-auto my-auto">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-2 py-4 text-lg">รหัสวิชา</th>
                                    <th scope="col" class="px-8 py-4 text-lg">ชื่อวิชา</th>
                                    <th scope="col" class="px-2 py-4 text-lg">หน่วยกิต</th>
                                    <th scope="col" class="px-6 py-4 text-lg">Check!</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($subjects as $row)
                                @if($row -> subject_type == "year4")
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-2 py-4 font-medium">{{$row -> subject_id}}</td>
                                    <td class="whitespace-nowrap px-8 py-4">{{$row -> subject_th_name}}<br>{{$row -> subject_en_name}}</td>
                                    <td class="whitespace-nowrap px-2 py-4">{{$row -> credit}} ({{$row -> des_credit}})</td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @foreach($check_subject as $check)
                                        @if(($check -> student_id == $user -> student_id) && ($check -> subject_id == $row -> subject_id) && ($check -> isComplete == 1))
                                        ผ่าน
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto my-6">
            <h2 class="text-2xl">ค. หมวดวิชาเลือกเสรี (6 หน่วยกิต)</h2>
            <h2 class="text-2xl">เหลืออีก 6 หน่วยกิต</h2>
        </div>
        <div class="flex flex-col container mx-auto my-auto">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-2 py-4 text-lg">รหัสวิชา</th>
                                    <th scope="col" class="px-8 py-4 text-lg">ชื่อวิชา</th>
                                    <th scope="col" class="px-2 py-4 text-lg">หน่วยกิต</th>
                                    <th scope="col" class="px-6 py-4 text-lg">Check!</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($subjects as $row)
                                @if($row -> subject_type == "freedom")
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-2 py-4 font-medium">{{$row -> subject_id}}</td>
                                    <td class="whitespace-nowrap px-8 py-4">{{$row -> subject_th_name}}<br>{{$row -> subject_en_name}}</td>
                                    <td class="whitespace-nowrap px-2 py-4">{{$row -> credit}} ({{$row -> des_credit}})</td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @foreach($check_subject as $check)
                                        @if(($check -> student_id == $user -> student_id) && ($check -> subject_id == $row -> subject_id) && ($check -> isComplete == 1))
                                        ผ่าน
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



    </body>
</x-app-layout>


</html>