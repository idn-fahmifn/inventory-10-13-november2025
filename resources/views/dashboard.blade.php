<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard Administrator
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg border-l-4 border-indigo-500 hover:shadow-xl transition duration-300">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Semua Aset</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">1,250</p>
                    <p class="text-xs text-indigo-600 dark:text-indigo-400 mt-2">Termasuk semua kondisi</p>
                </div>
                
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg border-l-4 border-green-500 hover:shadow-xl transition duration-300">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Aset Kondisi Baik</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">980</p>
                    <p class="text-xs text-green-600 dark:text-green-400 mt-2">+5 dalam 7 hari terakhir</p>
                </div>
                
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg border-l-4 border-red-500 hover:shadow-xl transition duration-300">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Aset Rusak / Perbaikan</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">125</p>
                    <p class="text-xs text-red-600 dark:text-red-400 mt-2">Prioritas Cepat!</p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg border-l-4 border-yellow-500 hover:shadow-xl transition duration-300">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Ruangan Terdaftar</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">45</p>
                    <p class="text-xs text-yellow-600 dark:text-yellow-400 mt-2">Data Master</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                <div class="lg:col-span-2 bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 border-b dark:border-gray-700 pb-2">Ruangan baru ditambahkan</h3>
                    <ul class="space-y-3 text-gray-600 dark:text-gray-400 text-sm">
                        <li class="p-2 hover:bg-gray-50 dark:hover:bg-gray-700 rounded transition duration-150">
                            [09:30] **R-01** (Lab Komputer) mencapai kapasitas penuh.
                        </li>
                        <li class="p-2 hover:bg-gray-50 dark:hover:bg-gray-700 rounded transition duration-150">
                            [Kemarin] Petugas **Budi** menginput 12 item baru.
                        </li>
                        <li class="p-2 hover:bg-gray-50 dark:hover:bg-gray-700 rounded transition duration-150">
                            [Kemarin] Barang **Server Blade** diubah statusnya menjadi 'Sedang Diperbaiki'.
                        </li>
                    </ul>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 border-b dark:border-gray-700 pb-2">Petugas & Akses Cepat</h3>
                    
                    <div class="space-y-3">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Total Petugas Aktif: <span class="font-bold text-lg text-indigo-600 dark:text-indigo-400">15</span></p>
                        
                        <x-primary-button class="w-full justify-center bg-green-600 hover:bg-green-700">
                            Kelola Petugas
                        </x-primary-button>
                        
                        <a href="" class="inline-flex items-center justify-center w-full px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Kelola Data Ruangan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>