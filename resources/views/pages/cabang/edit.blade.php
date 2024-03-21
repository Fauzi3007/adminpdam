<x-app-layout>

  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
      <form action="/cabang" method="post" class="grid grid-cols-2 gap-6 mt-2">
        @method('PUT')
        @csrf
          <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

              <x-label for="cabang">{{ __('Nama Cabang') }} </x-label>
              <x-input id="cabang" type="number" name="cabang" :value="old('cabang')"
                  required />

              <x-label for="latitude_cabang">{{ __('Latitude Cabang') }} </x-label>
              <x-input id="latitude_cabang" type="text" name="latitude_cabang" :value="old('latitude_cabang')" required />

              <x-label for="longitude_cabang">{{ __('Longitude Cabang') }} </x-label>
              <x-input id="longitude_cabang" type="text" name="longitude_cabang" :value="old('longitude_cabang')" required />
          </div>

          <div class="flex items-center justify-between mt-6 col-span-2">
              <x-button type="submit">
                  {{ __('Simpan') }}
              </x-button>
          </div>
      </form>
  </div>

</x-app-layout>
