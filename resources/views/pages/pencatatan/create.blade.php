<x-app-layout>

  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
      <form action="{{route('pencatatan.store')}}" method="post" class="grid grid-cols-2 gap-6 mt-2" enctype="multipart/form-data">
        @csrf
          <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

              <x-label for="id_pelanggan">{{ __('Pelanggan') }} </x-label>
              <select name="id_pelanggan" id="id_pelanggan" class="px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @foreach($pelanggans as $item)
                <option value="{{$item->id_pelanggan}}" {{ old('id_pelanggan') === $item->id_pelanggan ? 'selected' : '' }}>{{$item->nama_pelanggan}}</option>
                @endforeach
              </select>

              <x-label for="tanggal">{{ __('Tanggal') }} </x-label>
              <x-input id="tanggal" type="date" name="tanggal" :value="old('tanggal',date('Y-m-d'))" required />

              <x-label for="meteran_lama">{{ __('Meteran Lama') }} </x-label>
              <x-input id="meteran_lama" type="text" name="meteran_lama" :value="old('meteran_lama')" required />

              <x-label for="meteran_baru">{{ __('Meteran Baru') }} </x-label>
              <x-input id="meteran_baru" type="text" name="meteran_baru" :value="old('meteran_baru')" required />

              <x-label for="foto_meteran">{{ __('Foto Meteran') }} </x-label>
              <x-input id="foto_meteran" type="text" name="foto_meteran" :value="old('foto_meteran')"  />

              <x-label for="id_pegawai">{{ __('Pegawai') }} </x-label>
              <select name="id_pegawai" id="id_pegawai" class="px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @foreach($pegawais as $item)
                <option value="{{$item->id_pegawai}}" {{ old('id_pegawai') === $item->id_pegawai ? 'selected' : '' }}>{{$item->nama_lengkap}}</option>
                @endforeach
            </select>
          </div>

          <div class="flex items-center justify-between mt-6 col-span-2">
              <x-button type="submit">
                  {{ __('Simpan') }}
              </x-button>
          </div>
      </form>
  </div>

</x-app-layout>
