<x-app-layout >
    
        
  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        
        
    <!-- Dashboard actions -->
    <div class="sm:flex sm:justify-between sm:items-center mb-8">


        

    </div>
    


    <div class="grid grid-cols-12 gap-6 mt-2">


       
      
       <x-app-layout >
    
        
  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        
        
    <!-- Dashboard actions -->
    <div class="sm:flex sm:justify-between sm:items-center mb-8">


        <!-- Right: Actions -->
        <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

            <!-- Filter button -->
            <x-dropdown-filter align="left" />

            <!-- Datepicker built with flatpickr -->
            <x-datepicker />

            <!-- Add view button -->
           
            
        </div>

    </div>
    
    <!-- Cards -->
    {{-- <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
        <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
            <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
        </svg>
        <span class="hidden xs:block ml-2">Tambah Pegawai</span>
    </button> --}}

    <div class="grid grid-cols-12 gap-6 mt-2">


      <form action="{{route('absensi')}}" method="post">
      
    <div>
        <x-label for="tanggal">{{ __('Tanggal') }} <span class="text-rose-500">*</span></x-label>
        <x-input id="tanggal" type="date" name="tanggal" :value="old('tanggal')" required />
    </div>
    <div>
        <x-label for="waktu_masuk">{{ __('Waktu Masuk') }} <span class="text-rose-500">*</span></x-label>
        <x-input id="waktu_masuk" type="time" name="waktu_masuk" :value="old('waktu_masuk')" required />
    </div>
    <div>
        <x-label for="waktu_keluar">{{ __('Waktu Masuk') }} <span class="text-rose-500">*</span></x-label>
        <x-input id="waktu_keluar" type="time" name="waktu_keluar" :value="old('waktu_keluar')" required />
    </div>
    <div>
        <x-label for="status">{{ __('Status') }} <span class="text-rose-500">*</span></x-label>
        <x-input id="status" type="text" name="status" :value="old('status')" required />
    <div>
        <x-label for="keterangan">{{ __('Keterangan') }} <span class="text-rose-500">*</span></x-label>
        <x-input id="keterangan" type="text" name="keterangan" :value="old('keterangan')" required />
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


       

    </div>

</div>

       
</x-app-layout>
