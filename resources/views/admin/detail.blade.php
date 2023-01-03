<x-app-layout>
    <section class="w-full mx-auto md:w-2/3 flex flex-col items-center px-3">

        <article class="flex flex-col shadow my-4">
            <!-- Article Image -->
            <a href="#" class="hover:opacity-75">
                <img src="http://localhost:9000/{{ $aspirasi['foto'] }}" alt="tidak ada foto">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                <div class="flex justify-between">
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $aspirasi['topik'] }}</a>
                </div>
                <a href="#" class="text-yellow-600 text-sm font-bold uppercase pb-4">Jenis Laporan : 
                    @if ($aspirasi['jenis_laporan'] == 1)
                        Aspirasi
                    @else
                        Pengaduan
                    @endif
                </a>
                <p href="" class="text-sm pb-8">
                    Laporan dari : <a class="font-semibold hover:text-gray-800">{{ $aspirasi['alamat'] }}</a>
                </p>
                <p href="" class="text-sm pb-8">
                    Kecamatan : <a class="font-semibold hover:text-gray-800">{{ $aspirasi['kecamatan'] }}</a>
                </p>
                <p href="" class="text-sm pb-8">
                    Kabupaten : <a class="font-semibold hover:text-gray-800">{{ $aspirasi['kabupaten'] }}</a>
                </p>
                <p href="" class="text-sm pb-8">
                    Tanggal : <a class="font-semibold hover:text-gray-800">{{ date('d/m/y H:i:s', strtotime($aspirasi['created_at'])) }}</a>
                </p>
                <h1 class="text-2xl font-bold pb-3">Cerita</h1>
                <p class="pb-3">{{ $aspirasi['cerita'] }}</p>
            </div>
        </article>
    </section>
</x-app-layout>


