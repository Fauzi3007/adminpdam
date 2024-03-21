<x-app-layout >
  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto " id="atas">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Entri Satker</h1>
      </div>
      <form method="post" action="/satker">
          @csrf
          <input type="text" class="border form-input border-gray-300 rounded-md px-4 py-2"  name="id_satker" value="{{ old('id_satker',$id_satker)}}" hidden>
          <div class="mt-2">
      
            <label for="nama_satker" class="form-label">Nama Satker</label>
            <input type="text"  placeholder="ex : PROVINSI JAWA TENGAH" class=" border w-1/2 form-input uppercase border-gray-300 rounded-md px-4 py-2  @error('nama_satker') is-invalid @enderror" name="nama_satker" value="{{ old('nama_satker')}}">
           
          </div>
          <x-jet-validation-errors class="mt-4" />  

            <button type="submit" class="mt-3 px-4 py-2 rounded-md bg-blue-500 text-white">Submit</button>
        </form>
  </div>  
</x-app-layout>
