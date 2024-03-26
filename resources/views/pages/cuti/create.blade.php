<x-app-layout>

  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
      <form action="{{route('cuti.store')}}" method="post" class="grid grid-cols-2 gap-6 mt-2">
        @csrf
          <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

              <x-label for="id_pegawai">{{ __('Peminta Cuti') }} </x-label>
              <select name="id_pegawai" id="id_pegawai" class="px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @foreach($pegawais as $item)
                <option value="{{$item->id_pegawai}}" {{ old('id_pegawai') === $item->id_pegawai ? 'selected' : '' }}>{{$item->nama_lengkap}}</option>
                @endforeach
            </select>    

              <x-label for="tanggal_mulai">{{ __('Tanggal Mulai') }} </x-label>
              <x-input id="tanggal_mulai" type="date" name="tanggal_mulai" :value="old('tanggal_mulai')" required />

              <x-label for="tanggal_selesai">{{ __('Tanggal Selesai') }} </x-label>
              <x-input id="tanggal_selesai" type="date" name="tanggal_selesai" :value="old('tanggal_selesai')" required />
              
              <x-label for="keterangan">{{ __('Keterangan') }} </x-label>
              <x-input id="keterangan" type="text" name="keterangan" :value="old('keterangan')" required />
              
              <x-input id="status" type="text" name="status" value="Menunggu" class="hidden" disabled required />
          </div>

          <div class="flex items-center justify-between mt-6 col-span-2">
              <x-button type="submit">
                  {{ __('Simpan') }}
              </x-button>
          </div>
      </form>
  </div>

</x-app-layout>
