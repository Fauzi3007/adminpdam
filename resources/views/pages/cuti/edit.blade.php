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
      <form action="{{route('cuti.update',$cuti->id_cuti)}}" method="post" enctype="multipart/form-data" class="grid grid-cols-2 gap-6 mt-2">
        @method('PUT')
        @csrf
          <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

            <x-label for="id_pegawai">{{ __('Peminta Cuti') }} </x-label>
            <select name="id_pegawai" id="id_pegawai" class="px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @foreach($pegawais as $item)
                <option value="{{$item->id_pegawai}}" {{ $cuti->id_pegawai === $item->id_pegawai ? 'selected' : '' }}>{{$item->nama_lengkap}}</option>
                @endforeach
            </select>

              <x-label for="tanggal_mulai">{{ __('Tanggal Mulai') }} </x-label>
              <x-input id="tanggal_mulai" type="date" name="tanggal_mulai" :value="old('tanggal_mulai',$cuti->tanggal_mulai)" required />

              <x-label for="tanggal_selesai">{{ __('Tanggal Selesai') }} </x-label>
              <x-input id="tanggal_selesai" type="date" name="tanggal_selesai" :value="old('tanggal_selesai',$cuti->tanggal_selesai)" required />

              <x-label for="keterangan">{{ __('Keterangan') }} </x-label>
              <x-input id="keterangan" type="text" name="keterangan" :value="old('keterangan',$cuti->keterangan)" required />

                <x-label for="foto">{{ __('Foto') }} </x-label>
                <x-input id="foto" type="file" name="bukti_foto" :value="old('foto')"  />
                <img id="preview" src="#" alt="Preview" style="display: none; max-width: 200px; max-height: 200px;" />

              <x-label for="status">{{ __('Status') }} </x-label>
                <x-select id="status" name="status" required>
                    <option value="disetujui" {{ $cuti->status === 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                    <option value="menunggu" {{ $cuti->status === 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="ditolak" {{ $cuti->status === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </x-select>
          </div>

          <x-label for="foto">{{ __('Foto') }} </x-label>
                <x-input id="foto" type="file" name="bukti_foto" :value="old('foto')"  />
                <img id="preview" src="#" alt="Preview" style="display: none; max-width: 200px; max-height: 200px;" />




          <div class="flex items-center justify-between mt-6 col-span-2">
              <x-button type="submit">
                  {{ __('Simpan') }}
              </x-button>
          </div>
      </form>
  </div>

</x-app-layout>
