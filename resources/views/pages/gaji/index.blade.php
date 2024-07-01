<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                <!-- Filter button -->
                <x-dropdown-filter align="left" />
                <!-- Datepicker built with flatpickr -->
                <x-datepicker />
                <!-- Add view button -->

            </div>
        </div>
        <!-- Cards -->
        <a href="/gaji/create" class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
            <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                <path
                    d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
            </svg>
            <span class="ml-2">Tambah Gaji</span>
        </a>
        <div class="grid grid-cols-12 gap-6 mt-2">
                <div
                    class="col-span-full  bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
                    <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                        <h2 class="font-semibold text-slate-800 dark:text-slate-100">Gaji</h2>
                    </header>
                    <div class="p-3">

                        <!-- Table -->
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full">
                                <!-- Table header -->
                                <thead
                                    class="text-xs font-semibold uppercase text-slate-400 dark:text-slate-500 bg-slate-50 dark:bg-slate-700 dark:bg-opacity-50">
                                    <tr>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">No</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Pegawai</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Tanggal</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Gaji Pokok</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Tunjangan Jabatan</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Tunjangan Anak</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Tunjangan Nikah</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Potongan</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Pajak</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Total Gaji</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-center">Aksi</div>
                                        </th>

                                    </tr>
                                </thead>
                                <!-- Table body -->
                                <tbody class="text-sm divide-y divide-slate-100 dark:divide-slate-700">
                                    <tr>
                                        @forelse ($gajis as $item)
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="flex items-center">

                                                    <div class="font-medium text-slate-800">{{ $loop->iteration }}</div>
                                                </div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left">{{ $item->pegawai->nama_lengkap }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left">{{ $item->tanggal }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left">{{ $item->gaji_pokok }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left">{{ $item->tunjangan_jabatan }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left">{{ $item->tunjangan_anak }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left">{{ $item->tunjangan_nikah }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left">{{ $item->potongan }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left">{{ $item->pajak }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left">{{ $item->total_gaji }}</div>
                                            </td>

                                            <td class="p-2 whitespace-nowrap flex justify-center items-center gap-1">
                                                <a href="{{ route('gaji.edit', $item->id_gaji) }}"
                                                    class="px-4 py-2 rounded-md bg-yellow-300 hover:bg-yellow-400 text-white sm:mt-0">Edit</a>
                                                <form action="{{ route('gaji.destroy', $item->id_gaji) }}"
                                                    method="post" class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"
                                                        class="p-2 rounded-md bg-red-600 hover:bg-red-500 text-white sm:mt-0"
                                                        onclick="return confirm('Yakin akan menghapus data?')"> Hapus
                                                    </button>
                                                </form>
                                            </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td class="p-2 whitespace-nowrap" colspan="2">
                                            <div class="text-sm text-center text-slate-500 dark:text-slate-400">No Data
                                                found</div>
                                        </td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>

                        </div>

                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
