<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Pengaturan Profil</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow sm:rounded-lg">

                <!-- Pesan sukses -->
                @if(session('success'))
                    <div class="mb-4 p-2 bg-green-200 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('settings.update') }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Nama Lengkap -->
                    <div>
                        <x-input-label for="name" :value="__('Nama Lengkap')" />
                        <x-text-input name="name" type="text" class="mt-1 block w-full"
                            :value="$settings['name'] ?? ''" />
                    </div>

                    <!-- Jabatan / Status -->
                    <div>
                        <x-input-label for="job_title" :value="__('Jabatan / Status')" />
                        <x-text-input name="job_title" type="text" class="mt-1 block w-full"
                            :value="$settings['job_title'] ?? ''" />
                    </div>

                    <!-- Bio Singkat -->
                    <div>
                        <x-input-label for="bio" :value="__('Bio Singkat')" />
                        <textarea name="bio" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ $settings['bio'] ?? '' }}</textarea>
                    </div>

                    <x-primary-button>Simpan Perubahan</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>