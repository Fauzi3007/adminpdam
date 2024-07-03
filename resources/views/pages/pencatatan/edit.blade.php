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
            document.getElementById('foto_meteran').onchange = function (e) {
                previewImage(this);
            };
        });
    </script>
  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
      <form action="{{route('pencatatan.update',$pencatatan->id_pencatatan)}}" method="post" class="grid grid-cols-2 gap-6 mt-2" enctype="multipart/form-data">
        @method('PUT')
        @csrf
          <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

              <x-label for="nomor_pelanggan">{{ __('Nomor Pelanggan') }} </x-label>
              <x-input id="nomor_pelanggan" type="text" name="id_pelanggan" :value="old('nomor_pelanggan',$pencatatan->id_pelanggan)" readonly required />

              <x-label for="tanggal">{{ __('Tanggal') }} </x-label>
              <x-input id="tanggal" type="date" name="tanggal" :value="old('tanggal',$pencatatan->tanggal)" required />

              <x-label for="meteran_lama">{{ __('Meteran Lama') }} </x-label>
              <x-input id="meteran_lama" type="text" name="meteran_lama" :value="old('meteran_lama',$pencatatan->meteran_lama)" required />

              <x-label for="meteran_baru">{{ __('Meteran Baru') }} </x-label>
              <x-input id="meteran_baru" type="text" name="meteran_baru" :value="old('meteran_baru',$pencatatan->meteran_baru)" required />


                  <x-label for="id_pegawai">{{ __('Pegawai') }} </x-label>
                  <select name="id_pegawai" id="id_pegawai" class="px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                      @foreach($pegawais as $item)
                      <option value="{{$item->id_pegawai}}" {{ $pencatatan->id_pegawai === $item->id_pegawai ? 'selected' : '' }}>{{$item->nama_lengkap}}</option>
                      @endforeach
                    </select>
                    <x-label for="foto_meteran">{{ __('Foto Meteran') }} </x-label>
                    <x-input id="foto_meteran" type="file" name="foto_meteran" :value="old('foto_meteran')"  />
                    <img id="preview" src="#" alt="Preview" style="display: none; max-width: 200px; max-height: 200px;" />
                    <img id="old" src="{{ asset('storage/images/' . $pencatatan->foto_meteran) }}" alt="old" style="max-width: 200px; max-height: 200px;" />

          </div>

          <div class="flex items-center justify-between mt-6 col-span-2">
              <x-button type="submit">
                  {{ __('Simpan') }}
              </x-button>
          </div>
      </form>
  </div>

</x-app-layout>
