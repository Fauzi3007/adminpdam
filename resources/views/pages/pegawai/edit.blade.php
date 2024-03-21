<x-app-layout >
  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto " id="atas">

   
      <p class="h3">Edit data Direktorat</p>
      <form method="post" action="/direktorat/{{ $direktorats->id_direktorat }}">
          @method('PUT')
          @csrf
          <input type="text" class="border form-input  border-gray-300 rounded-md px-4 py-2"  name="id_direktorat" value="{{ old('id_direktorat',$direktorats->id_direktorat)}}" hidden>
          <div class="mt-2">
      
            <label for="nama_direktorat" class="form-control">Nama direktorat</label>
            <input type="text"  class="border form-input w-1/2 uppercase border-gray-300 rounded-md px-4 py-2 ml-4 @error('nama_direktorat') is-invalid @enderror" name="nama_direktorat" value="{{ old('nama_direktorat',$direktorats->nama_direktorat)}}">
          
          </div>
          <x-validation-errors class="mt-4" />  

            <button type="submit" class="mt-3 px-4 py-2 rounded-md bg-blue-500 text-white">Update</button>
        </form>
      </div>
    
    </x-app-layout>
