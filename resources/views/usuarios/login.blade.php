<x-layout>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
        <form action="/login" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
                  Username
                </label>
                <input value="{{ old('username') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="username" name="username" type="text" placeholder="Username">
                @error('username')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
              <div class="mb-6">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                  Password
                </label>
                <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" name="password" type="password" placeholder="******************">
                <p class="text-red text-xs italic">Please choose a password.</p>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
              </div>
              <div class="flex items-center justify-between">
                <button class="bg-blue hover:bg-blue-dark text-black font-bold py-2 px-4 rounded" type="submit">
                  Sign In
                </button>
              </div>
        </form>
    </div>
</x-layout>
