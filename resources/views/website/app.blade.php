<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   {{-- @vite('resources/css/app.css') --}}
  <title>show me where to buy it </title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
  <link rel="stylesheet" href="{{asset('assets/css/tailwind.css')}}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
  .pagination {
  @apply flex justify-center;
}

.page-item {
  @apply mx-1;
}

.page-link {
  @apply px-3 py-1 border rounded-md text-sm;
}

.page-item.disabled .page-link {
  @apply cursor-not-allowed opacity-50;
}

.page-item.active .page-link {
  @apply bg-blue-500 text-white;
}

</style>
<body>
@php

$user = Auth::user();

@endphp
  <div class="container mx-auto p-5">
    @include('website.nav')


    <!-- Main Navigation -->
    <!-- login modal -->

    <!-- end of login modal -->
    <!-- end of trigger login modal button -->

    <!-- Hero sectioin -->
    @stack('hero')
    @yield('content')

    @stack('recent')

    <!-- Men's Collection Section -->

      @stack('all')
      <!-- Women's Collection Section -->

      <!-- Newsletter Section -->
      @stack('news-teller')
      @include('website.footer')
      <!-- Footer Section -->
      </div>
      @include('website-pages.login-modal')
      @stack('modals')

        @livewireScripts

        @stack('scripts')

        <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

        @if (session()->has('success'))
        <script>
            var notyf = new Notyf({dismissible: true})
            notyf.success('{{ session('success') }}')
        </script>
        @endif
      <!-- Include Flowbite JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.js"
        integrity="sha512-CABi9vrtlQz9otMo5nT0B3nCBmn5BirYvO3oCnulsEzRDekxdMEZ2rXg85Is5pdnc9HNAcUEjm/7HagpqAFa1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script>
    //app level scripts gores in here

      </script>
      </body>

      </html>
