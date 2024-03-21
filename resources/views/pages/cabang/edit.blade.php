<x-app-layout >
  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto " id="atas">
        <p class="h3">Edit data Satker</p>
      <form method="post" action="/satker/{{ $satkers->id_satker }}">
          @method('PUT')
          @csrf
          <input type="text" class="border form-input border-gray-300 rounded-md px-4 py-2"  name="id_satker" value="{{ old('id_satker',$satkers->id_satker)}}" hidden>

          <div class="mt-2">
      
            <label for="nama_satker" class="form-label">Nama Satker</label>
            <input type="text"   class="border w-1/2 form-input border-gray-300 uppercase rounded-md px-4 py-2 @error('nama_satker') is-invalid @enderror" name="nama_satker" value="{{ old('nama_satker',$satkers->nama_satker)}}">
           
          </div>

            <button type="submit" class="mt-3 px-4 py-2 rounded-md bg-blue-500 text-white">Update</button>
        </form>
  </div>
</x-app-layout>
