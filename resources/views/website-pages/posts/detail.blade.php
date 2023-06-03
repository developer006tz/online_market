@extends('website.app')

@section('content')
 <div class="md:flex md:flex-row mt-20">

            <div class="md:w-3/5 mr-4">
                <div class="flex flex-col lg:flex-row rounded-lg overflow-hidden shadow-lg">
                    <div class="w-full lg:w-1/2 h-96 lg:h-auto">
                        <img class="object-cover w-full h-full" src="{{asset('assets/images/products/men/product1.jpg')}}" alt="Kitten">
                    </div>
                    <div class="bg-white w-full lg:w-1/2 p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h2 class="text-gray-900 font-bold text-2xl">{{ $post->title ?? '-' }}</h2>
                        </div>
                        <h3 class="text-gray-700 flex flex-row font-semibold text-xl mb-2"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0z" fill="none"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/><path d="M12.5 7H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() ?? '-' }}</h3>
                        <p class="text-gray-700 text-base">{{ $post->description ?? '-' }}</p>

                    </div>
                </div>
            </div>
            <div class="md:w-2/5 flex flex-col justify-items-start items-left">
                <!-- card -->
                <div class="flex flex-col lg:flex-row rounded-lg overflow-hidden shadow-lg">
                    <div class="bg-white w-full lg:w-2/2 p-6">
                        <div class="flex justify-between items-center mb-2">

                            <img class="w-12 h-12 rounded-full"  src="{{ $post->user->photo ? url(\Storage::url($post->user->photo)) : asset('user.png') }}" alt="User Profile Image">
                            <h2 class="text-gray-900 font-bold text-2xl"><i class="fa-solid fa-user-check"></i> client</h2>

                        </div>
                        <h3 class="text-gray-700 font-semibold text-xl mb-2">{{ $post->user->name ?? '-' }}</h3>
                        <span>member since: {{ \Carbon\Carbon::parse($post->user->created_at)->diffForHumans() ?? '-' }}</span>
                        <div class="mt-3 flex justify-center">
                            <a href="{{ route('chat', ['user' => $post->user_id]) }}"
                                class="w-full bg-gradient-to-r from-red-600 to-pink-500 rounded-full text-white font-bold py-2 px-4  transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                                <i class="fa-solid fa-comments"></i> Chat with {{ $post->user->name ?? '-' }} </a>
                        </div>
                        <div class="mt-4 flex justify-between">
                            <a href="#"
                                class="bg-yellow-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                                view  all posts </a>
                            <a href="{{url('/')}}"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                                Back </a>
                        </div>
                    </div>
                </div>
                <div class="flex mt-3 flex-col lg:flex-row rounded-lg overflow-hidden shadow-lg">
                    <div class="bg-white w-full lg:w-2/2 p-6">
                        <div class="flex justify-between items-center mb-2">

                            <h2 class="text-gray-900 font-bold text-2xl"><i class="fa-solid fa-map-location-dot"></i> location details</h2>
                            <div class="location-wraper flex flex-col">
                                <div class="region">
                                    <p>{{ $post->user->location ?? '-' }}</p>
                                </div>
                                <div class="map iframe google">
                                </div>

                            </div>

                        </div>

                    </div>
                </div>


                <!-- card end  -->
                <!-- tailwind card with large image a bout 500px width and 600px height card detail at the right of the image -->

            </div>
        </div>

@endsection
