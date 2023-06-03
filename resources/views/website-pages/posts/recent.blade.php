@push('recent')
<div class="my-20">
  {{-- {{dd($posts_array)}} --}}
        <div class="flex flex-row justify-between my-5">
          <h2 class="text-3xl">Recent Posts</h2>
          <a href="{{route('all-post.show')}}" class="flex flex-row text-lg hover:text-purple-700">
            View All
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-5 ml-1" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
          </a>
        </div>
        <div class="grid grid-flow-row mb-4 grid-cols-1 md:grid-cols-3 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">
          @forelse($recent_posts as $post)
          <div class="shadow-lg rounded-lg">
            <a href="#">
              <img src="{{ $post->image ? url(\Storage::url($post->image)) : '' }}"
               width="280" alt="{{Str::limit($post->title,20) ?? '-'}}" height="350" class="rounded-tl-lg w-full rounded-tr-lg transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110" />
            </a>
            <div class="p-5">
              <h3 class="bg-gray-1 border-yellow- font-extrabold"><a href="#">{{Str::limit($post->title,24) ?? '-'}}</a></h3>
              <div
                class="wrapper p-1 rounded-lg border-gray-300 bg-pink-50 shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">

                <div class="flex flex-row my-3">
                  <p>{{Str::limit($post->description,50) ?? '-'}}</p>
                </div>
              </div>

              <div class="flex flex-col xl:flex-row justify-between">
                <a class="bg-gradient-to-r from-red-600 to-pink-500 rounded-full py-2 px-4 my-2 text-sm text-white hover:bg-pink-600 hover:from-pink-600 hover:to-pink-600 flex flex-row justify-center"
                  href="{{ route('chat', ['user' => $post->user_id]) }}">
                  <i class="h-5 w-5 mr-1 mt-1 fa-solid fa-comment-dots"></i>
                  chat
                </a>
                <a class="bg-purple-600 rounded-full py-2 px-4 my-2 text-sm text-white hover:bg-purple-700 flex flex-row justify-center"
                  href="{{ route('web_post.show', $post) }}">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                      d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                      clip-rule="evenodd" />
                  </svg>
                  View Details
                </a>
              </div>
                <span class="flex flex-row" ><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0z" fill="none"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/><path d="M12.5 7H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() ?? '-' }}</span>
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
      @endpush
