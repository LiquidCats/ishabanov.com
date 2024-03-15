@extends('.layouts.login')

@section('title', 'Sign In')

@section('content')
    <div class="mx-auto max-w-96 h-screen flex items-center">
        <form method="POST" action="{{ route('auth.sign-in') }}" class="bg-stone-800 p-4 rounded-4 rounded-lg w-full">
            @csrf
            <fieldset>
                <legend class="text-white text-center text-4xl mb-3">Login</legend>

                <div class="flex flex-col mb-3">
                    <label for="email" class="text-sm text-gray-300">Email address</label>
                    <input name="email"
                           type="email"
                           class="p-3 rounded ring-1 ring-stone-500 bg-stone-300 placeholder:text-gray-400 outline-none focus:ring-2 focus:ring-blue-500 duration-300"
                           id="email"
                           placeholder="name@example.com"
                           value="{{ old('email') }}">
                    @error('email')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>



                <div class="flex flex-col mb-3">
                    <label for="password" class="text-sm text-gray-300">Password</label>
                    <input name="password"
                           type="password"
                           class="p-3 rounded ring-1 ring-stone-500 bg-stone-300 placeholder:text-gray-400 outline-none focus:ring-2 focus:ring-blue-500 duration-300"
                           id="password"
                           placeholder="Password">
                    @error('password')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>



                <div class="flex flex-col mb-3">
                    <label for="totp" class="text-sm text-gray-300">One Time Password</label>
                    <input name="2fa_otp"
                           type="text"
                           class="p-3 rounded ring-1 ring-stone-500 bg-stone-300 placeholder:text-gray-400 outline-none focus:ring-2 focus:ring-blue-500 duration-300"
                           id="totp"
                           placeholder="TOTP">
                    @error('2fa_otp')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>



                <button class="w-full rounded bg-blue-600 hover:bg-blue-500 duration-300 text-white py-3 px-4" type="submit">Sign In</button>
                <div class="mt-3">
                    <a href="{{ route('pages.home') }}" class="text-white flex flex-row gap-1 items-center justify-center">
                        <x-heroicon-m-arrow-left class="size-4"/> to Homepage
                    </a>
                </div>
            </fieldset>
        </form>
    </div>
@endsection
