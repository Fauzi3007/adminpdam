<x-app-layout>

    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <form action="/user/{{$penggunas->id_user}}" method="post" class="grid grid-cols-2 gap-6 mt-2">
            @method('PUT')
              @csrf
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
  
            
                  <x-label for="email">{{ __('Email') }} <span class="text-rose-500"></span></x-label>
                  <x-input id="email" type="email" name="email" :value="old('email',$penggunas->email)" required />
             
                  <x-label for="password" value="{{ __('Password') }}" />
                  <x-input id="password" type="password" name="password" required autocomplete="new-password" />
              
                  <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                  <x-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
                  
                  <x-label for="hak_akses" value="{{ __('Hak Akses') }}" />
                <select name="hak_akses" id="hak_akses" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring focus:ring-rose-500 focus:ring-opacity-50">
                    <option value="super admin" {{ $penggunas->hak_akses === 'super admin' ? 'selected' : '' }}>Super Admin</option>
                    <option value="admin keuangan" {{ $penggunas->hak_akses === 'admin keuangan' ? 'selected' : '' }}>Admin Keuangan</option>
                    <option value="admin administratif" {{ $penggunas->hak_akses === 'admin administratif' ? 'selected' : '' }}>Admin Administratif</option>
                    <option value="pegawai" {{ $penggunas->hak_akses === 'pegawai' ? 'selected' : '' }}>Pegawai</option>
                </select>

            </div>
  
            <div class="flex items-center justify-between mt-6 col-span-2">
                <x-button type="submit">
                    {{ __('Simpan') }}
                </x-button>
            </div>
        </form>
    </div>
  
  </x-app-layout>
  