<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>
  <div class="py-2">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center text-center welcome-title semibold text-xl text-gray-800 leading-tight">
      {{-- <h2 class="bg-primary" >Welcome to ShowMeWheretoBuy  Dashboard</h2> --}}
    </div>
  </div>
</div>

@auth
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @can('view-any', App\Models\Posts::class)
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
         
<div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="{{route('posts.index')}}">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Posts</h5>
    </a>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Manage Posts Here</p>
    <a href="{{route('posts.index')}}" class="inline-flex button button-primary items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        manage
        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </a>
</div>

        </div>
        @endcan
       @can('view-any', App\Models\PostCategory::class)
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="{{route('post-categories.index')}}">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Post categories</h5>
    </a>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Manage Post categories</p>
    <a href="{{route('post-categories.index')}}" class="inline-flex button button-primary items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        manage
        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </a>
</div>
        </div>
        @endcan
 @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) || 
                    Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                    @can('view-any', Spatie\Permission\Models\Role::class)
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
         <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="{{route('roles.index')}}">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Roles and Permission</h5>
    </a>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Manage Roles and Permission Here</p>
    <a href="{{route('roles.index')}}" class="inline-flex button button-primary items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        manage
        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </a>
</div>
        </div>
        @endcan
        @endif
@can('view-any', App\Models\User::class)
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
         <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="{{route('users.index')}}">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Manage Users</h5>
    </a>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Manage Users Here</p>
    <a href="{{route('users.index')}}" class="inline-flex button button-primary items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        manage
        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </a>
</div>
        </div>
        @endcan
      </div>
    </div>
  </div>
  @endauth
</x-app-layout>


