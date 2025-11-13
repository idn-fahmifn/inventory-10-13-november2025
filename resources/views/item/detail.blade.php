<x-app-layout>
    <div class="py-12">
        <div class="p-6 bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg">

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

            @if (session('success'))
                <div class="bg-blue-100 border-t-4 border-green-500 rounded-b mb-4 text-green-900 px-4 py-3 shadow-md"
                    role="alert" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
                    <div class="flex">
                        <div>
                            <p class="font-bold">Berhasil</p>
                            <p class="text-sm">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="max-w-4xl mx-auto">

                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 border-b border-gray-700 pb-2">
                    {{ $data->item_name }}
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-start">

                    <div class="order-2 md:order-1 space-y-4">
                        <p class="text-lg text-gray-700 dark:text-gray-300">
                            <span class="font-semibold text-gray-900 dark:text-white">Kode Barang:</span>
                            {{ $data->item_code }}
                        </p>

                        <p class="text-lg text-gray-700 dark:text-gray-300">
                            <span class="font-semibold text-gray-900 dark:text-white">Penyimpanan:</span>
                            {{ $data->room->room_name }}
                        </p>

                        <p class="text-lg text-gray-700 dark:text-gray-300">
                            <span class="font-semibold text-gray-900 dark:text-white">Harga:</span>
                            IDR. {{ number_format($data->price) }}
                        </p>

                        <div class="flex items-center space-x-2">
                            <span class="font-semibold text-gray-900 dark:text-white">Kondisi:</span>
                            <p class="text-lg text-gray-700 dark:text-gray-300">
                                @switch($data->condition)
                                    @case('good')
                                        <span class="bg-green-500 text-white text-xs ms-4 p-1 rounded-md">Baik</span>
                                    @break

                                    @case('broke')
                                        <span class="bg-red-500 text-white text-xs ms-4 p-1 rounded-md">Rusak</span>
                                    @break

                                    @default
                                        <span class="bg-gray-200 text-white text-xs ms-4 p-1 rounded-md">Sedang
                                            diperbaiki</span>
                                @endswitch
                            </p>
                        </div>

                        <form action="{{ route('barang.destroy', $data->id) }}" method="post" class="py-6">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('Yakin mau dihapus?')"
                                class="rounded-md bg-red-500 px-2.5 py-1.5 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-white/20">Hapus</button>
                            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'show-edit')"
                                class="rounded-md bg-yellow-500 px-2.5 py-1.5 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-white/20">Edit</button>
                        </form>
                    </div>

                    <div class="order-1 md:order-2">
                        <img src="{{ asset('storage/images/items/' . $data->image) }}" alt="Gambar Barang: Server Cisco"
                            class="h-auto object-cover rounded-lg shadow-xl border-4 border-gray-700 dark:border-gray-600"
                            width="300">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <x-modal name="show-edit" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('barang.update', $data->id) }}" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('put')

            <div class="space-y-4">
                <div>
                    <x-input-label value="Nama Barang" />
                    <x-text-input name="nama_barang" value="{{ $data->item_name }}" type="text"
                        class="mt-1 block w-full" placeholder="Contoh: Server Cisco" required />
                </div>
                <div>
                    <x-input-label value="Kode Barang" />
                    <x-text-input name="kode_barang" value="{{ $data->item_code }}" type="number"
                        class="mt-1 block w-full" placeholder="Contoh: 12345" required />
                </div>

                <div>
                    <x-input-label value="Penyimpanan" />
                    <select name="penyimpanan" required
                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="{{ $data->room_id }}">-{{ $data->room->room_name }}-</option>
                        @foreach ($room as $item)
                            <option value="{{ $item->id }}">{{ $item->room_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <x-input-label value="Kondisi Barang" />
                    <select name="kondisi" required
                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="{{ $data->condition }}">
                            @switch($data->condition)
                                @case('good')
                                    Baik
                                @break

                                @case('broke')
                                    Rusak
                                @break

                                @default
                                    Sedang Diperbaiki
                            @endswitch
                        </option>
                        <option value="good">Baik</option>
                        <option value="broke">Rusak</option>
                        <option value="maintenance">Perbaikan</option>
                    </select>
                </div>

                <div>
                    <x-input-label value="Harga Barang" />
                    <x-text-input name="harga" type="number" value="{{ $data->price }}" class="mt-1 block w-full"
                        placeholder="Contoh: 30000" required />
                </div>

                <div>
                    <x-input-label value="Gambar" />
                    <x-text-input name="gambar" accept="image/*" type="file"
                        class="mt-1 block w-full border p-4 border-dotted" placeholder="Contoh: 30000" />
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Keluar
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    Simpan
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</x-app-layout>
