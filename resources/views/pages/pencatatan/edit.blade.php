<x-app-layout>

  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
      <form action="/pencatatan" method="post" class="grid grid-cols-2 gap-6 mt-2">
        @method('PUT')
        @csrf
          <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

              <x-label for="nomor_pelanggan">{{ __('Nomor Pelanggan') }} </x-label>
              <x-input id="nomor_pelanggan" type="text" name="nomor_pelanggan" :value="old('nomor_pelanggan')" required />

              <x-label for="meteran_lama">{{ __('Meteran Lama') }} </x-label>
              <x-input id="meteran_lama" type="text" name="meteran_lama" :value="old('meteran_lama')" required />
             
              <x-label for="meteran_baru">{{ __('Meteran Baru') }} </x-label>
              <x-input id="meteran_baru" type="text" name="meteran_baru" :value="old('meteran_baru')" required />

              <x-label for="tanggal">{{ __('Tanggal') }} </x-label>
              <x-input id="tanggal" type="date" name="tanggal" :value="old('tanggal')" required />
             
              <x-label for="id_pegawai">{{ __('ID Pegawai') }} </x-label>
              <x-input id="id_pegawai" disabled type="text" name="id_pegawai" :value="old('id_pegawai')" required />

          </div>

          <div class="flex items-center justify-between mt-6 col-span-2">
              <x-button type="submit">
                  {{ __('Simpan') }}
              </x-button>
          </div>
      </form>
  </div>

</x-app-layout>
