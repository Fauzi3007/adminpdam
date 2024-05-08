<x-app-layout>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Kode JavaScript untuk pratinjau gambar
            function previewImage(input) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var preview = document.getElementById('preview');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            }

            // Menambahkan event listener ke input file
            document.getElementById('foto').onchange = function (e) {
                previewImage(this);
            };
        });
    </script>

    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <form action="{{route('pegawai.store')}}" method="post" class="grid grid-cols-2 gap-6 mt-2" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <x-label for="id_user">{{ __('ID Pengguna') }} </x-label>
                <x-input id="id_user" type="text" name="id_user"   :value="old('id_user')" required />

                <x-label for="nama_lengkap">{{ __('Nama Lengkap') }}</x-label>
                <x-input id="nama_lengkap" type="text" name="nama_lengkap" :value="old('nama_lengkap')"
                    required />

                <x-label for="jenis_kelamin">{{ __('Jenis Kelamin') }} </x-label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="L" {{ old('jenis_kelamin') === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin') === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>

                <x-label for="tgl_lahir">{{ __('Tanggal Lahir') }} </x-label>
                <x-input id="tgl_lahir" type="date" name="tgl_lahir" :value="old('tgl_lahir')" required />

                <x-label for="telepon">{{ __('Telepon') }} </x-label>
                <x-input id="telepon" type="text" name="telepon" :value="old('telepon')" required />

                <x-label for="alamat">{{ __('Alamat') }} </x-label>
                <x-input id="alamat" type="text" name="alamat" :value="old('alamat')" required />

            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <x-label for="status_nikah">{{ __('Status Nikah') }} </x-label>
                <select name="status_nikah" id="status_nikah" class="px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="Belum Menikah" {{ old('status_nikah') === 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                    <option value="Menikah" {{ old('status_nikah') === 'Menikah' ? 'selected' : '' }}>Menikah</option>
                    <option value="Janda" {{ old('status_nikah') === 'Janda' ? 'selected' : '' }}>Janda</option>
                    <option value="Duda" {{ old('status_nikah') === 'Duda' ? 'selected' : '' }}>Duda</option>
                </select>

                <x-label for="jumlah_anak">{{ __('Jumlah Anak') }} </x-label>
                <x-input id="jumlah_anak" type="number" name="jumlah_anak" :value="old('jumlah_anak')"
                    required />

                <x-label for="gaji_pokok">{{ __('Gaji Pokok') }} </x-label>
                <x-input id="gaji_pokok" type="number" step="any" name="gaji_pokok" :value="old('gaji_pokok')"
                    required />

                <x-label for="kantor_cabang">{{ __('Kantor Cabang') }} </x-label>
                <select name="kantor_cabang" id="kantor_cabang" class="px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($cabangs as $item)
                        <option value="{{ $item->id_cabang }}">{{ $item->nama_cabang }}</option>
                    @endforeach
                </select>

                <x-label for="jabatan">{{ __('Jabatan') }} </x-label>
                <select name="jabatan" id="jabatan" class="px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($jabatans as $item)
                        <option value="{{ $item->id_jabatan }}">{{ $item->nama_jabatan }}</option>
                    @endforeach
                </select>

                <x-label for="foto">{{ __('Foto') }} </x-label>
                <x-input id="foto" type="text" name="foto" :value="old('foto')"  />
                <img id="preview" src="#" alt="Preview" style="display: none; max-width: 200px; max-height: 200px;" />
            </div>

            <div class="flex items-center justify-between mt-6 col-span-2">
                <x-button type="submit">
                    {{ __('Simpan') }}
                </x-button>
            </div>
        </form>
    </div>

</x-app-layout>
