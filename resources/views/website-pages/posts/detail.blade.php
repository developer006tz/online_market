@extends('layout.app')

@section('content')
 <div class="md:flex md:flex-row mt-20">
           
            <div class="md:w-3/5 mr-4">
                <div class="flex flex-col lg:flex-row rounded-lg overflow-hidden shadow-lg">
                    <div class="w-full lg:w-1/2 h-96 lg:h-auto">
                        <img class="object-cover w-full h-full" src="{{asset('assets/images/products/men/product1.jpg')}}" alt="Kitten">
                    </div>
                    <div class="bg-white w-full lg:w-1/2 p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h2 class="text-gray-900 font-bold text-2xl">Card Title</h2>
                        </div>
                        <h3 class="text-gray-700 font-semibold text-xl mb-2">Card Sub Title</h3>
                        <p class="text-gray-700 text-base">Card Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <div class="mt-4 flex justify-between">
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                                Connect </button>
                            <button
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                                Back </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:w-2/5 flex flex-col justify-items-start items-left">
                <!-- card -->
                <div class="flex flex-col lg:flex-row rounded-lg overflow-hidden shadow-lg">
                    <div class="bg-white w-full lg:w-2/2 p-6">
                        <div class="flex justify-between items-center mb-2">
                           
                            <img class="w-12 h-12 rounded-full" src="https://placekitten.com/200/200" alt="User Profile Image">
                            <h2 class="text-gray-900 font-bold text-2xl"><i class="fa-solid fa-user-check"></i> client</h2>
                           
                        </div>
                        <h3 class="text-gray-700 font-semibold text-xl mb-2">Miss chambalo student</h3>
                        <span>member since: 2023</span>
                        <div class="mt-3 flex justify-center">
                            <button
                                class="w-full bg-gradient-to-r from-red-600 to-pink-500 rounded-full text-white font-bold py-2 px-4  transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                                <i class="fa-solid fa-comments"></i> Chat with miss. Chambalo </button>
                        </div>
                        <div class="mt-4 flex justify-between">
                            <button
                                class="bg-yellow-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                                view  all posts </button>
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
                                    <p>Dar es salaam</p>
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