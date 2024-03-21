<x-app-layout >
    
        
         

        <div class="my-2">
          <a href="/jabatan/create" class="px-4 py-2 rounded-md bg-green-600  text-white  sm:mt-0">Tambah jabatan</a>
        </div>

       
                    <td class="border py-2 px-3 flex gap-2">
                      <a href="/jabatan/{{$item->id_jabatan}}/edit" class="px-4 py-2 rounded-md bg-yellow-300  text-white  sm:mt-0">Edit</a>
                      <form action="/jabatan/{{$item->id_jabatan}}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="px-4 py-2 rounded-md bg-red-600  text-white  sm:mt-0" onclick="return confirm('Yakin akan menghapus data?')"> Hapus </button>
                    </form>
                    </td>
                  </tr>

                  @endforeach
               
                </tbody>
              </table>
              
              
        </div>
     

    </div>
</x-app-layout>
