@push('all')
<div class="my-20">
  {{-- {{dd($posts_array)}} --}}
        <div class="flex flex-row justify-between my-5">
          <h2 class="text-3xl">All posts</h2>
          <a href="#" class="flex flex-row text-lg hover:text-purple-700">
            View All
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-5 ml-1" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
          </a>
        </div>
        <div class="grid grid-flow-row mb-4 grid-cols-1 md:grid-cols-3 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">
          @forelse($posts as $post)
          <div class="shadow-lg rounded-lg">
            <a href="#">
              <img src="{{ $post->image ? url(\Storage::url($post->image)) : '' }}"
               width="280" title="{{Str::limit($post->title,10) ?? '-'}}" height="350" class="rounded-tl-lg rounded-tr-lg transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110" />
            </a>
            <div class="p-5">
              <h3 class="bg-gray-1 border-yellow- font-extrabold"><a href="#">{{Str::limit($post->title,24) ?? '-'}}</a></h3>
              <div
                class="wrapper p-1 rounded-lg border-gray-300 bg-pink-50 shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                <div class="flex flex-row my-3">
                  <div class="size mr-2">size: large</div>
                  <div class="color">color: white/black</div>
                </div>
                <div class="flex flex-row my-3">
                  <p>{{Str::limit($post->description,50) ?? '-'}}</p>
                </div>
              </div>
      
              <div class="flex flex-col xl:flex-row justify-between">
                <a class="bg-gradient-to-r from-red-600 to-pink-500 rounded-full py-2 px-4 my-2 text-sm text-white hover:bg-pink-600 hover:from-pink-600 hover:to-pink-600 flex flex-row justify-center"
                  href="#">
                  <i class="h-5 w-5 mr-1 mt-1 fa-solid fa-comment-dots"></i>
                  chat
                </a>
                <a class="bg-purple-600 rounded-full py-2 px-4 my-2 text-sm text-white hover:bg-purple-700 flex flex-row justify-center"
                  href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                      d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                      clip-rule="evenodd" />
                  </svg>
                  View Details
                </a>
              </div>
            </div>
          </div>
          @empty
          <div class="flex flex-col justify-center items-center">
            <h1 class="text-3xl">No posts found</h1>
            <a href="{{route('posts.create')}}" class="bg-purple-600 rounded-full py-2 px-4 my-2 text-sm text-white hover:bg-purple-700 flex flex-row justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                  d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                  clip-rule="evenodd" />
              </svg>
              Create Post
            </a>

        </div>
          @endforelse
      </div> 
      {!! $posts->render() !!}

@endpush