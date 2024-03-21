<div class="col-span-full  bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
    <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
        <h2 class="font-semibold text-slate-800 dark:text-slate-100">{{$tabletitle}}</h2>
    </header>
    <div class="p-3">
        
        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <!-- Table header -->
                <thead class="text-xs font-semibold uppercase text-slate-400 dark:text-slate-500 bg-slate-50 dark:bg-slate-700 dark:bg-opacity-50">
                    <tr>
                        @foreach ($header as $head)
                            
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">{{$head}}</div>
                        </th>
                        @endforeach
                        <th>Action</th>
                       
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody class="text-sm divide-y divide-slate-100 dark:divide-slate-700">
                    @forelse($tabledata as $item)
                    <tr>
                        @foreach ($header as $column)
                        <td class="p-2 whitespace-nowrap">
                            @if(isset($item[$column]))
                                <div>{{ $item->$column }}</div>
                            @endif
                        </td>
                        @endforeach
                        <td class="p-2 whitespace-nowrap flex justify-center items-center gap-1">
                            <a href="{{ $action }}/edit" class="px-4 py-2 rounded-md bg-yellow-300 hover:bg-yellow-400 text-white sm:mt-0">Edit</a>
                            <form action="{{ $action }}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="p-2 rounded-md bg-red-600 hover:bg-red-500 text-white sm:mt-0" onclick="return confirm('Yakin akan menghapus data?')"> Hapus </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="{{ count($header) + 1 }}" class="text-center p-4">No Data found</td>
                    </tr>
                    @endforelse
                </tbody>
                
            </table>
        
        </div>
    
    </div>
</div>