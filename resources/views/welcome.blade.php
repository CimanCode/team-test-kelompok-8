<x-app-layout>
    @push('styles')
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    @endpush
<div
    class="relative flex items-top justify-center min-h-screen dark:bg-gray-900 sm:items-center py-4 sm:pt-0">


    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="container p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                <h1 class="flex text-2xl font-bold pb-3">Background and Strategic Fit</h1>
                <p class="flex items-center pb-3">AspirasiQ digunakan untuk mempermudah Masyarakat dalam menyampaikan Aspirasi kepada
                    pemerintahan daerah. Selain itu, sistem ini juga diharapkan dapat mempermudah kinerja pegawai
                    pemerintahan daerah dalam menampung Aspirasi Masyarakat. Terdapat dua user yang akan
                    berinteraksi dalam Sistem Aspirasi ini, yaitu Masyarakat sebagai User dan Pegawai Pemerintahan
                    sebagai Admin.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="ml-12">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        <img src="{{ asset('img/1.jpeg') }}" alt="aspirasi kita" srcset="">
                    </div>
                </div>

                <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                    <div class="ml-12">
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                            <img src="{{ asset('img/2.png') }}" alt="" srcset="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@push('scripts')
<script>
    //Masukkan script anda
</script>

@endpush
</x-app-layout>
