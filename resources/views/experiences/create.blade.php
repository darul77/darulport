<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Riwayat Pengalaman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <form action="{{ route('experiences.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="company_name" :value="__('Nama Perusahaan / Organisasi')" />
                            <x-text-input id="company_name" name="company_name" type="text" class="mt-1 block w-full" required />
                        </div>

                        <div>
                            <x-input-label for="position" :value="__('Posisi / Jabatan')" />
                            <x-text-input id="position" name="position" type="text" class="mt-1 block w-full" required />
                        </div>

                        <div>
                            <x-input-label for="start_date" :value="__('Tanggal Mulai')" />
                            <x-text-input id="start_date" name="start_date" type="date" class="mt-1 block w-full" required />
                        </div>

                        <div>
                            <x-input-label for="end_date" :value="__('Tanggal Selesai (Kosongkan jika masih aktif)')" />
                            <x-text-input id="end_date" name="end_date" type="date" class="mt-1 block w-full" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="task_description" :value="__('Deskripsi Pencapaian & Tanggung Jawab')" />
                        <textarea id="task_description" name="task_description" rows="5" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="Sebutkan apa saja yang Anda kerjakan secara profesional..." required></textarea>
                    </div>

                    <div class="flex items-center gap-4 pt-4">
                        <x-primary-button>{{ __('Simpan Pengalaman') }}</x-primary-button>
                        <a href="{{ route('experiences.index') }}" class="text-sm text-gray-600 hover:underline">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>