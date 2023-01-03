<x-app-layout>
    <div class="mx-auto w-[1000px] shadow-xl p-14 mt-20">
        <h1 class="text-[50px] font-bold text-slate-900 text-center mb-[40px]" >Login</h1>
        @if ($errors->any())
        <div class="w-[200px] p-2 bg-red-300 rounded-lg text-red-900 mt-10 text-center mx-auto">
            <h1 class="text-red-700">
                {{ $errors->first() }}
            </h1>
        </div>
        @endif
        <div class="w-[700px] mx-auto mt-6">
            <form method="post">
                @csrf
                <div class="mx-auto w-[400px]">
                <div class="flex justify-between">
                    <label for="email" class="text-slate-900 font-bold mr-[50px]"> Email </label>
                    <input type="text" name="email" id="email" class="border-2 w-[250px]" placeholder= "Masukan Email"/>
                </div>
                <br>
                <div class="flex justify-between">
                    <label for="password" class="text-slate-900 font-bold mr-[40px]"> Password </label>
                    <input type="password" name="password" id="password" class="border-2 w-[250px]" placeholder="Masukan Password"/>
                </div>
                <br>
                <div class="flex gap-4 mt-[40px] justify-center">
                    <div class="w-[200px] bg-cyan-600 p-2 rounded-lg text-center text-white">
                        <button type="submit" @class(['btn', 'btn-primary'])>Login</button>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
