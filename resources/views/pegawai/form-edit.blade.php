<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pendidikan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-xl uppercase mb-4">Isi Data Pendidikan</h2>
                    @if ($errors->any())
                    <div class="text-red-500">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('pegawai.update', $pegawai->id)}}" method="POST">
                        @csrf
                        @method("PUT")
                        
                        <div class="flex flex-col mb-2">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama"
                                class="w-fit border-t-transparent border-l-transparent border-r-transparent focus:ring-0 border-b border-teal-600"
                                value="{{old('nama', $pegawai->nama)}}" required>
                        </div>

                        <div class="flex flex-col mb-2">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="30" rows="2"
                                class="w-fit border-t-transparent border-l-transparent border-r-transparent focus:ring-0 border-b border-teal-600">{{old('alamat', $pegawai->alamat)}}</textarea>
                        </div>

                        <div class="flex flex-col mt-6 mb-2">
                            <label for="tgl_lahir">Tanggal lahir</label>
                            <input type="date" id="tgl_lahir" name="tgl_lahir"
                                class="w-fit border-t-transparent border-l-transparent border-r-transparent focus:ring-0 border-b border-teal-600"
                                value="{{old('tgl_lahir', $pegawai->tgl_lahir)}}" required>
                        </div>

                        <div class="flex flex-col mt-6 mb-2">
                            <label>Status</label>
                            <label for="is_active">
                                <input type="radio" id="is_active" name="is_active" class="inline-block"
                                    value="{{old('is_active', 1)}}" required @if($pegawai->is_active) checked @endif>
                                Aktif
                            </label>
                            <label for="is_not_active">
                                <input type="radio" id="is_not_active" name="is_active" class="inline-block"
                                    value="{{old('is_active', 0)}}" required @if (!$pegawai->is_active) checked @endif>
                                Tidak Aktif
                            </label>
                        </div>

                        <div class="flex flex-col mb-2 mt-4">
                            <label for="pajak">Pajak</label>
                            <input type="text" id="pajak" name="pajak"
                                class="w-fit border-t-transparent border-l-transparent border-r-transparent focus:ring-0 border-b border-teal-600"
                                value="{{old('pajak', $pegawai->pajak)}}" required>
                        </div>


                        <div class="flex flex-col mb-2 mt-4 [&_option]:text-black">
                            <label for="pendidikan">Pilih Pendidikan</label>
                            {{-- <input type="text" id="pendidikan" name="pendidikan[]" list="pendidikan"
                                class="w-fit border-t-transparent border-l-transparent border-r-transparent focus:ring-0 border-b border-teal-600" " required multiple>

                                <datalist id=" pendidikan">
                            @foreach ($pendidikan as $item)
                            <option value="{{$item->id}}">
                            @endforeach
                            </datalist> --}}
                            <select id="pendidikan" name="pendidikan[]" multiple>
                                @foreach ($pendidikan as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <button type="submit" class="py-2 px-4 bg-teal-500 my-2 rounded">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>