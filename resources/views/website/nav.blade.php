<div class="md:flex md:flex-row md:justify-between text-center text-sm sm:text-base">
  <div class="flex flex-row justify-center">
    <div class="w-30 h-20">
      <img src="{{asset('assets/images/3.png')}}" class="hue-rotate-30 w-60" />
    </div>
  </div>

  <div class="mt-1">
    <form class="flex">
          <input type="text" placeholder="Search.." name="search" autocomplete="off" required  value="{{ $search ?? '' }}" class="border border-gray-300 rounded-full px-4 py-2 mx-2 focus:outline-none text-lg focus:ring-1 focus:ring-yellow-600 focus:border focus:border-transparent" />


    <a href="{{url('/')}}" class="text-gray-600 hover:text-purple-600 p-4 px-3 sm:px-4">Home</a>

    <a href="#" class="text-gray-600 hover:text-purple-600 p-4 px-3 sm:px-4">Near you</a>
    <a href="#" class="text-gray-600 hover:text-purple-600 p-4 px-3 sm:px-4">recent</a>
    @if(!Auth::check())
    <a href="{{route('register')}}" class="text-gray-600 hover:text-purple-600 p-4 px-3 sm:px-4">register</a>
    <a href="#" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class=" text-gray-50 bg-gradient-to-r from-pink-400 to-yellow-600 hover:bg-purple-700 p-3 px-3 sm:px-5 rounded-full">
      <i class="fa-solid fa-right-to-bracket"></i>
      Login
    </a>
    @else
        <a href="{{url('chat')}}" class="text-gray-600 hover:text-purple-600 p-4 px-3 sm:px-4"><i class="fa-solid fa-comments"></i></a>
        <a href="{{url('/posts')}}" class="text-gray-600 hover:text-purple-600 p-4 px-3 sm:px-4">my posts</a>

        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-gray-600 hover:text-purple-600 p-4 px-3 sm:px-4">logout</a>

    @endif

    </form>

  </div>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
</div>
