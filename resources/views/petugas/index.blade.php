<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Data Master Petugas
            </h2>
            {{-- Tombol 'Tambah' --}}
            <button onclick="document.getElementById('showModal').showModal()"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition duration-150 shadow-md">
                + Tambah Petugas
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">

                {{-- alert --}}

                @if ($errors->any())
                    <div class="bg-blue-100 border-t-4 border-red-500 rounded-b mb-4 text-red-900 px-4 py-3 shadow-md"
                        role="alert" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)">
                        <div class="flex">
                            <div>
                                <p class="font-bold">Data gagal dibuat.</p>
                                @foreach ($errors->all() as $item)
                                    <p class="text-sm">{{ $item }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif



                <div class="overflow-x-auto">
                    {{-- Tabel untuk menampilkan data ruangan (kosong) --}}
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Nama Petugas</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Email</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Aktivasi</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            <tr>
                                <td colspan="4"
                                    class="px-6 py-4 text-center text-sm italic text-gray-500 dark:text-gray-400">
                                    Belum ada data petugas.
                                </td>
                            </tr>
                            {{-- Loop data ruangan akan masuk di sini --}}
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    {{-- Modal Create Data Ruangan --}}
    <dialog id="showModal" class="p-0 backdrop:bg-black/50 rounded-lg shadow-2xl dark:bg-gray-900">
        <div class="p-6 w-[400px]">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 border-b pb-2 dark:border-gray-700">
                Input Petugas Baru</h3>
            <form method="POST" action="{{ route('petugas.store') }}">
                @csrf
                <div class="space-y-4">
                    <div>
                        <x-input-label value="Nama Petugas" />
                        <x-text-input name="nama_petugas" type="text" class="mt-1 block w-full"
                            placeholder="Contoh: Fahmi Nuradi" required />
                    </div>
                    <div>
                        <x-input-label value="Alamat Email" />
                        <x-text-input name="email" type="email" class="mt-1 block w-full"
                            placeholder="Contoh: fahmi@test.com " required />
                    </div>
                    <div>
                        <x-input-label value="Aktivasi" />
                        <select name="is_active" required
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="">-Pilih Aktivasi-</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                </div>

                <div class="mt-6 flex justify-end gap-3">
                    <button type="button" onclick="document.getElementById('showModal').close()"
                        class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                        Batal
                    </button>
                    <x-primary-button class="ml-3">
                        Simpan Ruangan
                    </x-primary-button>
                </div>
            </form>
        </div>
    </dialog>
</x-app-layout>
