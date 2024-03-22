<x-app-layout>

  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
      <form action="/pelanggan" method="post" class="grid grid-cols-2 gap-6 mt-2">
        @csrf
          <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

              <x-label for="nomor_pelanggan">{{ __('Nomor Pelanggan') }} </x-label>
              <x-input id="nomor_pelanggan" type="text" maxlength="16" name="nomor_pelanggan" :value="old('nomor_pelanggan')" required />

              <x-label for="nama_pelanggan">{{ __('Nama Pelanggan') }} </x-label>
              <x-input id="nama_pelanggan" type="text" name="nama_pelanggan" :value="old('nama_pelanggan')" required />
             
              <x-label for="alamat">{{ __('Alamat') }} </x-label>
              <x-input id="alamat" type="text" name="alamat" :value="old('alamat')" required />

              <x-label for="latitude">{{ __('Latitude') }} </x-label>
              <x-input id="latitude" type="number" step="any" name="latitude" :value="old('latitude')" required />
             
              <x-label for="longitude">{{ __('Longitude') }} </x-label>
              <x-input id="longitude" type="number" step="any" name="longitude" :value="old('longitude')" required />

              <x-label for="lingkup_cabang">{{ __('Lingkup Cabang') }} </x-label>
              <x-input id="lingkup_cabang" type="text" name="lingkup_cabang" :value="old('lingkup_cabang')" required />
            
          </div>

          <div class="flex items-center justify-between mt-6 col-span-2">
              <x-button type="submit">
                  {{ __('Simpan') }}
              </x-button>
          </div>
      </form>
  </div>

</x-app-layout>
