<x-app-layout>
<form method="POST" action="{{ route('form.store') }}" enctype="multipart/form-data">
    @csrf
    <!--x-input-error  :message="$message" /-->
<div class="bg-indigo-50 min-h-screen md:px-20 pt-6">
    <div class=" bg-white rounded-md px-6 py-10 max-w-2xl mx-auto">
      <h1 class="text-center text-2xl font-bold text-gray-500 mb-10">ASPIRASI ANDA</h1>
      <div class="space-y-4">
        @if($errors->any())
          @foreach ($errors->all() as $e)
            <div class="bg-red-500 w-full p-2 mt-2">{{ $e }}</div>
          @endforeach
        @endif
        @if (session()->has('success'))
          <div class="bg-green-500 w-full p-2 mt-2">
            {{ session('success') }}
          </div>
        @endif
        <div class="py-2">
          <label for="topik" class="text-lx font-serif">Topik : </label>
          <input name="topik" type="text" placeholder="title" id="topik" class="ml-2 outline-none py-1 px-2 text-md border-2 rounded-md" value="{{ old('topik') }}"/>
        </div>
        <div class="py-2">
          <label for="jenis_laporan" class="text-lx font-serif">Jenis Laporan : </label>
          <select name="jenis_laporan" id="jenis_laporan" class="ml-2 outline-none py-1 px-2 text-md border-2 rounded-md" />
            <option selected disabled> -- select an option -- </option>
            <option value="1">Aspirasi</option>
            <option value="2">Pengaduan</option>
          </select>
        </div>
        <div class="py-2">
          <label for="alamat" class="text-lx font-serif">Alamat : </label>
          <input name="alamat" type="text" placeholder="title" id="alamat" class="ml-2 outline-none py-1 px-2 text-md border-2 rounded-md" value="{{ old('alamat') }}"/>
        </div>
        <div class="py-2">
          <label for="kecamatan" class="text-lx font-serif">Kecamatan : </label>
          <input name="kecamatan" type="text" placeholder="title" id="kecamatan" class="ml-2 outline-none py-1 px-2 text-md border-2 rounded-md" value="{{ old('kecamatan') }}"/>
        </div>
        <div class="py-2">
          <label for="kabupaten" class="text-lx font-serif">Kabupaten : </label>
          <input name="kabupaten" type="text" placeholder="title" id="kabupaten" class="ml-2 outline-none py-1 px-2 text-md border-2 rounded-md" value="{{ old('kabupaten') }}"/>
        </div>
        <div class="pt-3 pb-6">
          <label for="cerita" class="block mb-2 text-lg font-serif">Cerita : </label>
          <textarea name=cerita id="cerita" cols="30" rows="10" placeholder="Tulis disini aspirasi anda.." class="w-full font-serif  p-4 text-gray-600 bg-indigo-50 outline-none rounded-md">{{ old('cerita') }}</textarea>
        </div>
        <label for="foto">
            <span class="label">Choose file</span>
        </label>
        <input class="field-file" type="file" accept=".jpg, .jpeg, .png" id="foto" name="foto">
        <img src="" id="img" alt="">
        <button class=" px-6 py-2 mx-auto block rounded-md  font-semibold text-indigo-100 bg-blue-600  ">Sampaikan</button>
    </div>
    </div>
  </div>
</form>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(function(){
  $('#foto').change(function(){
    var input = this;
    var url = $(this).val();
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg"))
     {
        var reader = new FileReader();

        reader.onload = function (e) {
           $('#img').attr('src', e.target.result);
        }
       reader.readAsDataURL(input.files[0]);
    }
    else
    {
      $('#img').attr('src', '/assets/no_preview.png');
    }
  });

});
  </script>
@endpush
</x-app-layout>





