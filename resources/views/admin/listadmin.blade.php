<x-app-layout>
    <div class="w-[1250px] mx-auto shadow-xl mt-12 p-4">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-gray-800 font-bold text-[50px]">Admin<span class="text-[60px] text-yellow-500 font-bold">Q</span></h1>
            <div class=" bg-cyan-600 p-2 rounded-lg w-44 text-white text-center">
                <a href="{{ route('admin.storeadmin') }}"><button>Tambah Admin Baru</button></a>
            </div>
        </div>
        <table class="border mx-auto p-4 w-fit mt-6">
            <thead class="border bg-yellow-600">
                <tr class="border p-4">
                    <th class="border p-2">Nama</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Action</th>
                </tr>
            </thead>
            <tbody class="border overflow-hidden text-ellipsis">
                @foreach ($admins as $admin )
                    <tr class="border">
                        <td class="border p-2">{{ $admin->nama }}</td>
                        <td class="border p-2">{{ $admin->email }}</td>
                        <td class="flex gap-2 p-4 item-center">
                            @if($admin->nama == 'admin' && $admin->email == 'admin@gmail.com')
                            <div class="bg-cyan-800 p-2 rounded-lg w-full text-white text-center">
                                <a href=""><button>SUPER ADMIN</button></a>
                            </div>
                            @endif
                            @if($admin->nama != 'admin' && $admin->email != 'admin@gmail.com')
                            <div class="bg-green-800 p-2 rounded-lg w-32 text-white text-center">
                                <a href="{{ route("admin.showupdate", ["id"=>$admin->id]) }}"><button>Update</button></a>
                            </div>
                            <div class="bg-red-700 p-2 rounded-lg w-32 text-white text-center">
                                <a href="{{ route("admin.deleteadmin", ["id"=>$admin->id]) }}"><button>Delete</button></a>
                            </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
