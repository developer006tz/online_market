@push('hero')
<div class="md:flex md:flex-row mt-20">
      <div class="md:w-2/5 flex flex-col justify-center items-center mr-1">
        <h2 class="font-serif text-5xl text-gray-600 mb-4 text-center md:self-start md:text-left">Post, Describe  and wait for Response</h2>
        <p class="uppercase text-gray-600 tracking-wide text-center md:self-start md:text-left">Most secure marketplace.</p>
        <p class="uppercase text-gray-600 tracking-wide text-center md:self-start md:text-left">from market to your home.</p>
         @if(!Auth::check())
         <a href="#" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="bg-gradient-to-r from-pink-400 to-yellow-600 rounded-full py-4 px-8 text-gray-50 uppercase text-xl md:self-start my-5">Post now</a>
         @else
         <a href="{{url('/posts/create')}}" class="bg-gradient-to-r from-pink-400 to-yellow-600 rounded-full py-4 px-8 text-gray-50 uppercase text-xl md:self-start my-5">Post now</a>
         @endif
        
      </div>
      <div class="md:w-3/5 ml-2">
        <div id="default-carousel" class="relative w-full carousel slide">
          <!-- Carousel wrapper -->
          <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            <!-- Item 1 -->
            @isset($recent_posts)
            @forelse($recent_posts as $post)
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
              <img src="{{ $post->image ? url(\Storage::url($post->image)) : '' }}"
                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-2/2 left-2/2" alt="{{str_replace('.jpg','',$post->image)}}">
                <div
                  class="absolute bottom-0 left-0 right-0 flex flex-col items-center justify-center p-4 text-center text-white bg-black bg-opacity-50">
                  <h3 class="text-lg font-semibold animate-bounce">{{Str::limit($post->title,30) ?? '-'}}</h3>
                  <p>{{Str::limit($post->description,60) ?? '-'}}</p>
                </div>
            </div>
            @empty
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
              <img src="{{ asset('img/hero.jpg') }}"
                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-2/2 left-2/2" alt="hero">
                <div
                  class="absolute bottom-0 left-0 right-0 flex flex-col items-center justify-center p-4 text-center text-white bg-black bg-opacity-50">
                  <h3 class="text-lg font-semibold animate-bounce">No carousel</h3>
                  <p>no carousel.</p>
                </div>
            </div>
            @endforelse
            @endisset

          </div>

          <!-- Slider controls -->
          <button type="button"
            class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
              class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
              <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
              </svg>
              <span class="sr-only">Previous</span>
            </span>
          </button>
          <button type="button"
            class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
              class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
              <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
              </svg>
              <span class="sr-only">Next</span>
            </span>
          </button>
        </div>

      </div>
    </div>
    @endpush
    @push('scripts')
    <script>
  $(document).ready(function(){
    
    $('#default-carousel').attr('data-carousel', 'slide');
  
  });
</script>
    @endpush