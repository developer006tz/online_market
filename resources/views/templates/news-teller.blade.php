@push('news-teller')
<div class="rounded-lg shadow-lg my-20 flex flex-row">
        <div
          class="lg:w-3/5 w-full bg-gradient-to-r from-black to-purple-900 lg:from-black lg:via-purple-900 lg:to-transparent rounded-lg text-gray-100 p-12">
          <div class="lg:w-1/2">
            <h3 class="text-2xl font-extrabold mb-4">Register today to start finding your product easily</h3>
            <p class="mb-4 leading-relaxed">If you are seller you are also required to register in order to connect with
              clients</p>
            <div>
              <form action="">
                <input type="email" placeholder="Enter email address"
                  class="bg-gray-600 text-gray-200 placeholder-gray-400 px-4 py-3 w-full rounded-lg focus:outline-none mb-4" />
                <input type="password" placeholder="enter your password"
                  class="bg-gray-600 text-gray-200 placeholder-gray-400 px-4 py-3 w-full rounded-lg focus:outline-none mb-4" />
                <button type="submit"
                  class="bg-gradient-to-r from-red-600 to-pink-500 rounded-full py-3 w-full">register</button>
              </form>
      
      
            </div>
          </div>
        </div>
        <div class="lg:w-2/5 w-full lg:flex lg:flex-row hidden">
          <img src="{{asset('assets/images/products/men/product4.jpg')}}" class="h-96 w-full" />
        </div>
      </div>
      @endpush