<x-app-layout>
    <div class="mx-auto w-[1000px] shadow-xl p-14 mt-20">
        <h1 class="text-[50px] font-bold text-slate-900 text-center mb-[40px]" >Update <span class="text-[50px] font-bold text-yellow-600 ">Post</span></h1>
        <div class="w-[700px] mx-auto">
            <form method="post" action="{{ route('admin.updateadmin', ["id"=>$admins->id]) }}">
                @method('put')
                @csrf
                <div class="flex">
                    <label for="nama" class="text-slate-900 font-bold mr-[50px]"> Nama </label>
                    <input type="text" name="nama" id="nama" value="{{ $admins->nama }}" class="border-2 w-full"/>
                </div>
                <br>
                <div class="flex">
                    <label for="email" class="text-slate-900 font-bold mr-[35px]"> Email </label>
                    <input type="text" name="email" id="email" value="{{ $admins->email }}" class="border-2 w-full"/>
                </div>
                <br>
                <div class="flex">
                    <label for="password" class="text-slate-900 font-bold mr-[40px]"> Password </label>
                    <input type="password" name="password" id="password" class="border-2 w-full"/>
                </div>
                <br>
                <div class="flex gap-4 mt-[40px] justify-center">
                    <div class="w-[200px] bg-cyan-600 p-2 rounded-lg text-center text-white">
                        <button type="submit" @class(['btn', 'btn-primary'])>Update</button>
                    </div>
                </div>
            </form>
            <div class="flex gap-4 mt-[10px] justify-center">
                <div class="w-[200px] bg-stone-700 p-2 rounded-lg text-center text-white">
                    <a href="{{ route('admin.listadmin') }}"><button>Back To List</button></a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
