<x-layout>
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Register
                </h2>
                <p class="mb-4">Create an account to post gigs</p>
            </header>

            <form action="user" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="name" class="inline-block text-lg mb-2">
                        Name
                    </label>
                    <input value="{{old ('name')}}" type="text" class="border border-gray-200 rounded p-2 w-full" name="name" />
                    <p class="text-red-500 text-xs mt-1">


                        @error('name')
                        {{$message}}
                        @enderror
                    </p>

                </div>


                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2">Email</label>
                    <input value="{{old ('email')}}" type="email" class="border border-gray-200 rounded p-2 w-full" name="email" />
                    <!-- Error Example -->
                    <p class="text-red-500 text-xs mt-1">
                        @error('email')
                        {{$message}}
                        @enderror

                    </p>
                </div>

                <div class="mb-6">
                    <label for="password" class="inline-block text-lg mb-2">
                        Password
                    </label>
                    <input value="{{old ('password')}}" type="password" class="border border-gray-200 rounded p-2 w-full" name="password" />
                              <p class="text-red-500 text-xs mt-1">
                                  @error('password')
                                  {{$message}}
                                  @enderror

                              </p>

                </div>

                <div class="mb-6">
                    <label for="password2" class="inline-block text-lg mb-2">
                        Confirm Password
                    </label>
                    <input value="{{old ('password_confirmation')}}" type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation" />
                              <p class="text-red-500 text-xs mt-1">
                                  @error('password_confirmation')
                                  {{$message}}
                                  @enderror

                              </p>

                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        Sign Up
                    </button>
                </div>

                <div class="mt-8">
                    <p>
                        Already have an account?
                        <a href="/user/login" class="text-laravel">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-layout>
