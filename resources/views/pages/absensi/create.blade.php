

<x-app-layout >


    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">


      <div class="gap-6 mt-2">

        <form action="{{route('absensi.store')}}" method="post">
            @csrf
            <x-label for="id_pegawai">{{ __('Pegawai') }} </x-label>
            <select name="id_pegawai" id="id_pegawai" class="px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option >Pilih Pegawai</option>
                @foreach($pegawais as $item)
                <option value="{{$item->id_pegawai}}" {{ isset($pegawai->id_pegawai) ? $pegawai->id_pegawai  === $item->id_pegawai ? 'selected' : '' : ''}}>{{$item->nama_lengkap}}</option>
                @endforeach
            </select>
            <div>
                <x-label for="tanggal">{{ __('Tanggal') }}</x-label>
                <x-input id="tanggal" type="date" name="tanggal" :value="old('tanggal')" required />
            </div>
            <div>
                <x-label for="waktu_masuk">{{ __('Waktu Masuk') }} </x-label>
                <x-input id="waktu_masuk" type="time" name="waktu_masuk"  :value="old('waktu_masuk')"  />
            </div>
            <div>
                <x-label for="waktu_keluar">{{ __('Waktu Keluar') }} </x-label>
                <x-input id="waktu_keluar" type="time" name="waktu_keluar" :value="old('waktu_keluar')"  />
            </div>
            <div>
                <x-label for="status">{{ __('Status') }} </x-label>
                <select name="status" id="status" class="px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="Hadir" {{ old('status') == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                    <option value="Sakit" {{ old('status') == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                    <option value="Izin" {{ old('status') == 'Izin' ? 'selected' : '' }}>Izin</option>
                    <option value="Cuti" {{ old('status') == 'Cuti' ? 'selected' : '' }}>Cuti</option>
                </select>
            </div>
            <div>
                <x-label for="keterangan">{{ __('Keterangan') }} </x-label>
                <x-input id="keterangan" type="text" name="keterangan" :value="old('keterangan')"  />
            </div>

            <div class="flex items-center justify-between mt-6">
                <x-button>
                    {{ __('Simpan') }}
                </x-button>
            </div>
            </form>

      </div>

  </div>


  </x-app-layout>
