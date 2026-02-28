<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Manajemen Testimoni & Rating</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">Rating</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">Komentar</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($testimonials as $testi)
                        <tr>
                            <td class="px-6 py-4">{{ $testi->name }}</td>
                            <td class="px-6 py-4 text-yellow-500 font-bold">{{ $testi->rating }} ⭐</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ Str::limit($testi->comment, 50) }}</td>
                            <td class="px-6 py-4">
                                @if($testi->is_published)
                                    <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs">Published</span>
                                @else
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs">Pending</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 flex gap-2">
                                @if(!$testi->is_published)
                                    <form action="{{ route('testimonials.approve', $testi->id) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <button class="text-indigo-600 hover:underline text-sm">Approve</button>
                                    </form>
                                @endif
                                <form action="{{ route('testimonials.destroy', $testi->id) }}" method="POST" onsubmit="return confirm('Hapus testimoni ini?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 hover:underline text-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>