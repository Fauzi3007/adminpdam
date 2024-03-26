<x-app-layout>

  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
      <form action="/pegawai/{{$pegawais->id_pegawai}}" method="post" class="grid grid-cols-2 gap-6 mt-2">
        @method('PUT')
          @csrf
          <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
              <x-label for="id_user">{{ __('ID User') }} </x-label>
              <x-input id="id_user" type="text" name="id_user" disabled :value="old('id_user',$pegawais->id_user)" required />
                
              <x-label for="nama_lengkap">{{ __('Nama Lengkap') }}</x-label>
              <x-input id="nama_lengkap" type="text" name="nama_lengkap" :value="old('nama_lengkap',$pegawais->nama_lengkap)"
                  required />

              <x-label for="jenis_kelamin">{{ __('Jenis Kelamin') }} </x-label>
              <select name="jenis_kelamin" id="jenis_kelamin" class="px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="L" {{ $pegawais->jenis_kelamin === 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ $pegawais->jenis_kelamin === 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>

              <x-label for="tgl_lahir">{{ __('Tanggal Lahir') }} </x-label>
              <x-input id="tgl_lahir" type="date" name="tgl_lahir" :value="old('tgl_lahir',$pegawais->tgl_lahir)" required />

              <x-label for="telepon">{{ __('Telepon') }} </x-label>
              <x-input id="telepon" type="text" name="telepon" :value="old('telepon',$pegawais->telepon)" required />

              <x-label for="alamat">{{ __('Alamat') }} </x-label>
              <x-input id="alamat" type="text" name="alamat" :value="old('alamat',$pegawais->alamat)" required />

          </div>

          <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
              <x-label for="status_nikah">{{ __('Status Nikah') }} </x-label>
              <select name="status_nikah" id="status_nikah" class="px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="Belum Menikah" {{ old('status_nikah') === 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                <option value="Menikah" {{ old('status_nikah') === 'Menikah' ? 'selected' : '' }}>Menikah</option>
                <option value="Cerai" {{ old('status_nikah') === 'Cerai' ? 'selected' : '' }}>Cerai</option>
            </select>   

              <x-label for="jumlah_anak">{{ __('Jumlah Anak') }} </x-label>
              <x-input id="jumlah_anak" type="number" name="jumlah_anak" :value="old('jumlah_anak',$pegawais->jumlah_anak)"
                  required />

                  <x-label for="kantor_cabang">{{ __('Kantor Cabang') }} </x-label>
                  <select name="kantor_cabang" id="kantor_cabang" class="px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                      @foreach ($cabangs as $item)
                          <option value="{{ $item->id_cabang }}"  {{ $pegawais->kantor_cabang === $item->id_cabang  ? 'selected' : '' }}>{{ $item->nama_cabang }}</option>
                      @endforeach
                  </select>
  
                  <x-label for="jabatan">{{ __('Jabatan') }} </x-label>
                  <select name="jabatan" id="jabatan" class="px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                      @foreach ($jabatans as $item)
                          <option value="{{ $item->id_jabatan }}"  {{ $pegawais->jabatan ===  $item->id_jabatan ? 'selected' : '' }}>{{ $item->nama_jabatan }}</option>
                      @endforeach
                  </select>

             
              <x-label for="foto">{{ __('Foto') }} </x-label>
              <x-input id="foto" type="text" name="foto" :value="old('foto',$pegawais->foto)"  />
          </div>

          <div class="flex items-center justify-between mt-6 col-span-2">
              <x-button type="submit">
                  {{ __('Simpan') }}
              </x-button>
          </div>
      </form>
  </div>

</x-app-layout>
