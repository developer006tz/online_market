<div class="md:flex md:flex-row md:justify-between text-center text-sm sm:text-base">
  <div class="flex flex-row justify-center">
    <div class="w-30 h-20">
      <img src="{{asset('assets/images/3.png')}}" class="hue-rotate-30 w-60" />
    </div>
  </div>
@php 
$categories = \App\Models\PostCategory::all();

@endphp
  <div class="mt-4">
          {{-- <input type="text" placeholder="Search.." name="search" autocomplete="off" required  value="{{ $search ?? '' }}" class="border border-gray-300 rounded-full px-4 py-2 mx-2 focus:outline-none text-lg focus:ring-1 focus:ring-yellow-600 focus:border focus:border-transparent" /> --}}

 <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="{{route('website.index')}}" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent  hover:text-purple-600" aria-current="page">Home</a>
        </li>
        <li>
            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Categories <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
            <!-- Dropdown menu -->
            <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                  @forelse($categories as $category)
                  <li >
                    <a href="{{route('category.posts', ['post'=>$category->id, 'title'=>$category->title])}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{$category->title}}</a>
                  </li>
                  @empty
                  <li >
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">No Categories</a>
                  </li>
                  @endforelse
                </ul>
            </div>
        </li>
        <li>
          <a href="{{route('recent.posts')}}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">recent</a>
        </li>
        @if(!Auth::check())
        <li>
          <a href="{{route('register')}}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Register</a>
        </li>
        <li>

          <a href="#" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class=" text-gray-50 bg-gradient-to-r from-pink-400 to-yellow-600 hover:bg-purple-700 p-3 px-3 sm:px-5 rounded-full">
          <i class="fa-solid fa-right-to-bracket"></i>
          Login
        </a>
        </li>
        @else
        <li>
          <a href="{{route('dashboard')}}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">my Posts</a>
        </li>
        <li>
    @php
        $chatify = new App\Http\Controllers\Notifications();
        $unread = $chatify->countUnseenMessages(auth()->user()->id);
    @endphp
    <a href="{{ url('chat') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
        <i class="fa-solid fa-comments"></i>Chats
        @if($unread > 0)
            <span class="bg-red-500 text-white rounded-full px-2 py-1 text-xs font-bold">{{ $unread }}</span>
        @endif
    </a>
</li>

        @endif

      </ul>
    </div>

  </div>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
</div>
