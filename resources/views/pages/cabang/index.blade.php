<x-app-layout>
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
      <a href="/cabang/create" class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
          <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
              <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
          </svg>
          <span class="ml-2">Tambah Cabang</span>
      </a>
      <div class="grid grid-cols-12 gap-6 mt-2">
          <x-dashboard.table :tabletitle='$title' :header='$header' :action='$actionId' :tabledata='$data'/>
      </div>
  </div>
</x-app-layout>
