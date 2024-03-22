<x-app-layout>

  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
      <form action="/jabatan" method="post" class="grid grid-cols-2 gap-6 mt-2">
        @method('PUT')
        @csrf
          <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

              <x-label for="nama_jabatan">{{ __('Nama Jabatan') }} </x-label>
              <x-input id="nama_jabatan" type="text" name="nama_jabatan" :value="old('nama_jabatan')" required />

              <x-label for="tunjangan_jabatan">{{ __('Tunjangan Jabatan') }} </x-label>
              <x-input id="tunjangan_jabatan" type="number" name="tunjangan_jabatan" :value="old('tunjangan_jabatan')" required />
            
          </div>

          <div class="flex items-center justify-between mt-6 col-span-2">
              <x-button type="submit">
                  {{ __('Simpan') }}
              </x-button>
          </div>
      </form>
  </div>

</x-app-layout>
