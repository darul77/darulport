<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white shadow sm:rounded-lg">

                <!-- Notifikasi sukses -->
                @if (session('status') === 'profile-updated')
                    <div class="mb-4 text-green-600 font-semibold">
                        Profile berhasil diperbarui.
                    </div>
                @endif

                <!-- FORM UPDATE PROFILE -->
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH') <!-- Pastikan PATCH -->

                    <!-- Foto Lama -->
                    @if(auth()->user()->photo)
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . auth()->user()->photo) }}"
                                 alt="Foto Profile"
                                 class="w-24 h-24 rounded-full object-cover border">
                        </div>
                    @endif

                    <!-- Upload Foto -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">
                            Foto Profile
                        </label>
                        <input type="file" name="photo"
                               class="mt-2 block w-full border rounded p-2">
                        @error('photo')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nama -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">
                            Nama
                        </label>
                        <input type="text" name="name"
                               value="{{ old('name', auth()->user()->name) }}"
                               class="mt-1 block w-full border rounded p-2"
                               required>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">
                            Email
                        </label>
                        <input type="email" name="email"
                               value="{{ old('email', auth()->user()->email) }}"
                               class="mt-1 block w-full border rounded p-2"
                               required>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tombol Submit -->
                    <div>
                        <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Update Profile
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>