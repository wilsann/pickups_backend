<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>
    <!-- This example requires Tailwind CSS v2.0+ -->
  <nav class="bg-gray-800">
      <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
          <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            <!-- Mobile menu button-->
            <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <!--
                Icon when menu is closed.
    
                Heroicon name: outline/menu
    
                Menu open: "hidden", Menu closed: "block"
              -->
              <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
              <!--
                Icon when menu is open.
    
                Heroicon name: outline/x
    
                Menu open: "block", Menu closed: "hidden"
              -->
              <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
          <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
            <div class="flex-shrink-0 flex items-center">
              <img class="block lg:hidden h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
              <img class="hidden lg:block h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg" alt="Workflow">
            </div>
            <div class="hidden sm:block sm:ml-6">
              <div class="flex space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="#" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Dashboard</a>
    
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Team</a>
    
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Projects</a>
    
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Calendar</a>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      <!-- Mobile menu, show/hide based on menu state. -->
      <div class="sm:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
          <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Dashboard</a>
    
          <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a>
    
          <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a>
    
          <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>
        </div>
      </div>
    </nav>
    
    {{-- Banner --}}
  <div class="w-full bg-cover bg-center container mx-auto">
      <img src="img/Banner.png" style="max-width: 1536px;" class="container mx-auto" alt="">
  </div>

  {{-- Card --}}
  <div class="w-full mx-auto py-10 items-center justify-center bg-indigo-50">
    <div class="text-gray-700 font-bold text-center mb-10 text-4xl">
      Yuk pilah sampah sebelum dibuang!
    </div>
    <div class="flex-wrap flex gap-4 items-center justify-center">

      <div class="grid gap-4">
        <div class="max-w-xl overflow-hidden mx-auto rounded-xl py-10 bg-white shadow-md duration-200 hover:scale-105 hover:shadow-xl">
          <div class="p-5">
            <p class="text-green-600 font-semibold py-2 px-4 text-xl">Sampah organik</p>
            <p class="px-4">Jenis sampah basah seperti sisa makanan, kulit buah, dan sayuran ini dapat dipilah dengan mengumpulkannya di suatu wadah khusus atau menguburnya ke dalam tanah. <br>Kamu juga bisa memanfaatkannya kembali, seperti kulit buah yang dijadikan eco-enzyme, sisa sayur menjadi veggie stock, hingga mengubahnya menjadi kompos.
              </p>
          </div>
        </div>
    
        <div class="max-w-xl overflow-hidden mx-auto rounded-xl py-10 bg-white shadow-md duration-200 hover:scale-105 hover:shadow-xl">
          <div class="p-5">
            <p class="text-green-600 font-semibold py-2 px-4 text-xl">Sampah plastik, kaleng, dan gelas</p>
            <p class="px-4">Sebelum didaur ulang, sampah plastik, kaleng, botol, dan gelas perlu dipisahkan dan dipilah dengan benar.<br> Kamu dapat mencuci setiap kemasan tersebut hingga bersih dan kering untuk kemudian dibawa ke bank sampah agar dapat didaur ulang dengan mudah.<br> Jika ingin memanfaatkannya sendiri, kamu dapat menggunakan kembali plastik, kaleng, dan gelas bekas yang telah bersih sebagai wadah penyimpanan hingga pot tanaman.
              </p>
          </div>
        </div>
      </div>

      <div class="grid gap-4">
        <div class="max-w-xl flex-initial mb-6 overflow-hidden mx-auto rounded-xl py-10 bg-white shadow-md duration-200 hover:scale-105 hover:shadow-xl">
          <div class="p-5">
            <p class="text-green-600 font-semibold py-2 px-4 text-xl">Sampah elektronik dan B3</p>
            <p class="px-4">Cara memilah sampah elektronik dan sampah B3 yang telah rusak dan tidak lagi bisa digunakan adalah dengan tidak membuangnya langsung ke tempat sampah.<br> Kamu dapat membawanya ke bank sampah khusus limbah elektronik (e-waste)
              </p>
          </div>
        </div>
    
        <div class="max-w-xl flex-initial mb-6 overflow-hidden mx-auto rounded-xl py-10 bg-white shadow-md duration-200 hover:scale-105 hover:shadow-xl">
          <div class="p-5">
            <p class="text-green-600 font-semibold py-2 px-4 text-xl">Sampah obat-obatan</p>
            <p class="px-4">Obat-obatan di rumah yang sudah kadaluwarsa dapat kamu pilah untuk tidak langsung dibuang ke tempat sampah biasa.<br> Kamu dapat membawa obat-obat kadaluwarsa ke puskesmas atau rumah sakit terdekat untuk nantinya jenis sampah ini dibakar atau dimusnahkan demi menghindari penyalahgunaan.
              </p>
          </div>
        </div>
      </div>

    </div>
  </div>
  
</body>
</html>