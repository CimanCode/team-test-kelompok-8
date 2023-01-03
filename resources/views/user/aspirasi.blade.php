<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>ProductQ</title>
</head>
<body>
    <div class="mx-auto w-[1000px] shadow-xl p-14 mt-20">
        <h1 class="text-[50px] font-bold text-slate-900 text-center mb-[40px]" >Tambah <span class="text-[50px] font-bold text-yellow-600 ">Barang</span></h1>
        <div class="w-[450px] mx-auto">
            <form method="post" action="{{ route('product.create') }}" enctype="multipart/form-data">
                @csrf
                <div class="flex justify-between">
                    <label for="nama_barang" class="text-slate-900 font-bold"> Aspirasi </label>
                    <textarea type="text" name="nama_barang" id="nama_barang" class="border-2 w-[250px]"></textarea>
                </div>
                <br>
                <div class="flex justify-between">
                    <label for="harga_barang" class="text-slate-900 font-bold"> foto </label>
                    <input type="file" name="harga_barang" id="harga_barang" class="border-2 w-[250px]"/>
                </div>
                <br>
                <div class="flex gap-4 mt-[40px] justify-center">
                    <div class="w-[200px] bg-cyan-600 p-2 rounded-lg text-center text-white">
                        <button type="submit" @class(['btn', 'btn-primary'])>Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
