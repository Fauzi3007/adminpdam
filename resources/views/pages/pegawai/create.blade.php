<x-app-layout>

    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <form action="/pegawai" method="post" class="grid grid-cols-2 gap-6 mt-2">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <x-label for="id_user">{{ __('ID User') }} </x-label>
                <x-input id="id_user" type="text" name="id_user" disabled :value="old('id_user')" required />
               
                <x-label for="nama_lengkap">{{ __('Nama Lengkap') }}</x-label>
                <x-input id="nama_lengkap" type="text" name="nama_lengkap" :value="old('nama_lengkap')"
                    required />

                <x-label for="jenis_kelamin">{{ __('Jenis Kelamin') }} </x-label>
                <x-input id="jenis_kelamin" type="text" name="jenis_kelamin" :value="old('jenis_kelamin')"
                    required />

                <x-label for="tgl_lahir">{{ __('Tanggal Lahir') }} </x-label>
                <x-input id="tgl_lahir" type="date" name="tgl_lahir" :value="old('tgl_lahir')" required />

                <x-label for="telepon">{{ __('Telepon') }} </x-label>
                <x-input id="telepon" type="text" name="telepon" :value="old('telepon')" required />

                <x-label for="alamat">{{ __('Alamat') }} </x-label>
                <x-input id="alamat" type="text" name="alamat" :value="old('alamat')" required />

            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <x-label for="status_nikah">{{ __('Status Nikah') }} </x-label>
                <x-input id="status_nikah" type="text" name="status_nikah" :value="old('status_nikah')"
                    required />

                <x-label for="jumlah_anak">{{ __('Jumlah Anak') }} </x-label>
                <x-input id="jumlah_anak" type="number" name="jumlah_anak" :value="old('jumlah_anak')"
                    required />

                <x-label for="kantor_cabang">{{ __('Kantor Cabang') }} </x-label>
                <x-input id="kantor_cabang" type="number" name="kantor_cabang" :value="old('kantor_cabang')"
                    required />

                <x-label for="jabatan">{{ __('Jabatan') }} </x-label>
                <x-input id="jabatan" type="number" name="jabatan" :value="old('jabatan')" required />

                <x-label for="gaji">{{ __('Gaji') }} </x-label>
                <x-input id="gaji" type="number" name="gaji" :value="old('gaji')" required />

                <x-label for="foto">{{ __('Foto') }} </x-label>
                <x-input id="foto" type="file" name="foto" :value="old('foto')" required />
            </div>

            <div class="flex items-center justify-between mt-6 col-span-2">
                <x-button type="submit">
                    {{ __('Simpan') }}
                </x-button>
            </div>
        </form>
    </div>

</x-app-layout>
