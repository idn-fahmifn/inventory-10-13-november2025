<x-app-layout>
    <div class="py-12">
        <div class="p-6 bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg">
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

                        <div class="pt-4 flex space-x-3">
                            <button
                                class="px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700 transition duration-150 shadow-md">
                                Hapus
                            </button>

                        </div>
                    </div>

                    <div class="order-1 md:order-2">
                        <img src="{{ asset('storage/images/items/'.$data->image) }}" alt="Gambar Barang: Server Cisco"
                            class="w-[300px] h-auto object-cover rounded-lg shadow-xl border-4 border-gray-700 dark:border-gray-600">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <x-modal name="show-edit" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('ruangan.update', $data->id) }}" class="p-6">
            @csrf
            @method('put')




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
