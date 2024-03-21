<x-app-layout >
  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto " id="atas">

    
      <div class="flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h3">Entri Direktorat</h1>
      </div>
      <form method="post" action="/direktorat">
        @csrf
            
            <input type="text" class="border form-input border-gray-300 rounded-md px-4 py-2"  name="id_direktorat" value="{{ old('id_direktorat',$id_direktorat)}}" hidden>
           
          
          <div class="mb-2">
            
            <label for="nama_direktorat" class="form-label">Nama Direktorat</label>
            <input type="text" placeholder="ex : PERBENDAHARAAN" class="border w-1/2 form-input uppercase border-gray-300 rounded-md px-4 py-2 ml-4 @error('nama_direktorat') is-invalid @enderror"  name="nama_direktorat" value="{{ old('nama_direktorat')}}">
          
          </div>
          
          <button type="submit" class="mt-3 px-4 py-2 rounded-md bg-blue-500 text-white">Submit</button>
        </form>

    </div>
</x-app-layout>
