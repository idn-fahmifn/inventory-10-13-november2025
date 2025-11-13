<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8">
                    {{-- Grid utama untuk 2 kolom --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">

                        <div class="flex flex-col justify-center">
                            <div>
                                <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-gray-100">
                                    {{ $data->room_name }}
                                </h1>
                                <p class="text-md text-gray-900 dark:text-gray-400 mt-2">
                                    Penanggung Jawab : <span class="font-bold">{{ $data->user->name }}</span>
                                </p>
                                <p class="text-md text-gray-900 dark:text-gray-400 mt-2">
                                    Kode Ruangan : <span class="font-bold">{{ $data->room_code }}</span>
                                </p>
                                
                                <p class="text-md text-gray-900 dark:text-gray-400 mt-2">
                                    Deskripsi : <span class="font-bold">{{ $data->desc }}</span>
                                </p>

                                <form action="{{ route('ruangan.destroy', $data->id) }}" method="post" class="py-6">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('Yakin mau dihapus?')"
                                        class="rounded-md bg-red-500 px-2.5 py-1.5 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-white/20">Hapus</button>
                                    <button x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'show-edit')"
                                        class="rounded-md bg-yellow-500 px-2.5 py-1.5 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-white/20">Edit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg p-4">

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
