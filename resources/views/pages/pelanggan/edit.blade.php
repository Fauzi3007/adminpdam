<x-app-layout>

  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
      <form action="{{route('pelanggan.update',$pelanggan->id_pelanggan)}}" method="post" class="grid grid-cols-2 gap-6 mt-2">
        @method('PUT')
        @csrf
          <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

              <x-label for="nomor_pelanggan">{{ __('Nomor Pelanggan') }} </x-label>
              <x-input id="nomor_pelanggan"  type="text" maxlength="16" name="nomor_pelanggan" :value="old('nomor_pelanggan',$pelanggan->nomor_pelanggan)" required />

              <x-label for="nama_pelanggan">{{ __('Nama Pelanggan') }} </x-label>
              <x-input id="nama_pelanggan" type="text" name="nama_pelanggan" :value="old('nama_pelanggan',$pelanggan->nama_pelanggan)" required />

              <x-label for="alamat">{{ __('Alamat') }} </x-label>
              <x-input id="alamat" type="text" name="alamat" :value="old('alamat',$pelanggan->alamat)" required />

              <x-label for="latitude">{{ __('Latitude') }} </x-label>
              <x-input id="latitude" type="number" name="latitude" :value="old('latitude',$pelanggan->latitude)" required />

              <x-label for="longitude">{{ __('Longitude') }} </x-label>
              <x-input id="longitude" type="number" name="longitude" :value="old('longitude',$pelanggan->longitude)" required />

              <x-label for="lingkup_cabang">{{ __('Lingkup Cabang') }} </x-label>
              <select id="lingkup_cabang" name="lingkup_cabang"  class="px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @foreach($cabangs as $item)
                    <option value="{{ $item->id_cabang }}" {{ $pelanggan->lingkup_cabang === $item->id_cabang ? 'selected' : '' }}>{{ $item->nama_cabang }}</option>
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
