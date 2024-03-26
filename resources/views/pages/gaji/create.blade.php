<x-app-layout>

    <script>
        document.getElementById('id_pegawai').addEventListener('change', function() {
            var selectedOption = this.value;
            window.location.href = "{{ route('hitung-gaji', ['id' => ':id']) }}".replace(':id', selectedOption);
        });
    </script>
    

  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
      <form action="{{route('gaji.store')}}" method="post" class="grid grid-cols-2 gap-6 mt-2">
        @csrf
          <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <x-label for="id_pegawai">{{ __('Pegawai') }} </x-label>
            <select name="id_pegawai" id="id_pegawai" class="px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @foreach($pegawais as $item)
                <option value="{{$item->id_pegawai}}" {{ old('id_pegawai') === $item->id_pegawai ? 'selected' : '' }}>{{$item->nama_lengkap}}</option>
                @endforeach
            </select>    
                     
              <x-label for="tanggal">{{ __('Tanggal') }} </x-label>
              <x-input id="tanggal" type="date" name="tanggal" :value="old('tanggal', date('Y-m-d'))"
                  required />

              <x-label for="gaji_pokok">{{ __('Gaji Pokok') }} </x-label>
              <x-input id="gaji_pokok" type="number" name="gaji_pokok" :value="old('gaji_pokok',isset($pegawai) ? $pegawai->gaji_pokok : '')" required />

              <x-label for="tunjangan_jabatan">{{ __('Tunjangan Jabatan') }} </x-label>
              <x-input id="tunjangan_jabatan" type="number" name="tunjangan_jabatan" :value="old('tunjangan_jabatan',isset($tunjangan_jabatan) ? $tunjangan_jabatan : '')" required />
              
              <x-label for="tunjangan_anak">{{ __('Tunjangan Anak') }} </x-label>
              <x-input id="tunjangan_anak" type="number" name="tunjangan_anak" :value="old('tunjangan_anak',isset($tunjangan_anak) ? $tunjangan_anak : '')" required />
          </div>
          <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
              
              <x-label for="tunjangan_nikah">{{ __('Tunjangan Nikah') }} </x-label>
              <x-input id="tunjangan_nikah" type="number" name="tunjangan_nikah" :value="old('tunjangan_nikah',isset($tunjangan_nikah) ? $tunjangan_nikah : '')" required />
             
              <x-label for="potongan">{{ __('Potongan') }} </x-label>
              <x-input id="potongan" type="text" name="potongan" :value="old('potongan',isset($potongan) ? $potongan : '')" required />
             
              <x-label for="pajak">{{ __('Pajak') }} </x-label>
              <x-input id="pajak" type="text" name="pajak" :value="old('pajak',isset($pajak) ? $pajak : '')" required />
              
              <x-label for="total_gaji">{{ __('Total Gaji') }} </x-label>
              <x-input id="total_gaji" type="text" name="total_gaji" :value="old('total_gaji',isset($total_gaji) ? $total_gaji : '')" required />
          </div>

          <div class="flex items-center justify-between mt-6 col-span-2">
              <x-button type="submit">
                  {{ __('Simpan') }}
              </x-button>
          </div>
      </form>
  </div>

</x-app-layout>
