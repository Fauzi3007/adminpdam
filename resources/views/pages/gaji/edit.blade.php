<x-app-layout>

  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
      <form action="/gaji" method="post" class="grid grid-cols-2 gap-6 mt-2">
        @method('PUT')
        @csrf
          <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

              <x-label for="tanggal">{{ __('Tanggal') }} </x-label>
              <x-input id="tanggal" type="date" name="tanggal" :value="old('tanggal')"
                  required />

              <x-label for="gaji_pokok">{{ __('Gaji Pokok') }} </x-label>
              <x-input id="gaji_pokok" type="number" name="gaji_pokok" :value="old('gaji_pokok')" required />

              <x-label for="tunjangan_jabatan">{{ __('Tunjangan Jabatan') }} </x-label>
              <x-input id="tunjangan_jabatan" type="number" name="tunjangan_jabatan" :value="old('tunjangan_jabatan')" required />
              
              <x-label for="tunjangan_anak">{{ __('Tunjangan Anak') }} </x-label>
              <x-input id="tunjangan_anak" type="number" name="tunjangan_anak" :value="old('tunjangan_anak')" required />
              
              <x-label for="tunjangan_nikah">{{ __('Tunjangan Nikah') }} </x-label>
              <x-input id="tunjangan_nikah" type="number" name="tunjangan_nikah" :value="old('tunjangan_nikah')" required />
             
              <x-label for="potongan">{{ __('Potongan') }} </x-label>
              <x-input id="potongan" type="text" name="potongan" :value="old('potongan')" required />
             
              <x-label for="pajak">{{ __('Pajak') }} </x-label>
              <x-input id="pajak" type="text" name="pajak" :value="old('pajak')" required />
              
              <x-label for="total_gaji">{{ __('Total Gaji') }} </x-label>
              <x-input id="total_gaji" type="text" name="total_gaji" :value="old('total_gaji')" required />
          </div>

          <div class="flex items-center justify-between mt-6 col-span-2">
              <x-button type="submit">
                  {{ __('Simpan') }}
              </x-button>
          </div>
      </form>
  </div>

</x-app-layout>
