<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pegawai') }}
        </h2>
        @if (Session::get('success'))
        <div class="text-green-500">{{Session::get('success')}}</div>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{route('pegawai.create')}}" class="bg-teal-500 rounded px-4 py-2 mb-4 inline-block">Tambah data</a>
                    <table class="table table-auto w-full mb-4">
                        <thead>
                            <tr class="text-left">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Tangal lahir</th>
                                <th>Aktif</th>
                                <th>Pajak</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pegawai as $item)
                            <tr>
                                <td>{{++$indexNumber}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->alamat}}</td>
                                <td>{{$item->tgl_lahir}}</td>
                                <td>{{$item->is_active}}</td>
                                <td>{{$item->pajak}}</td>
                                <td>
                                    <form action="{{route('pegawai.destroy', $item->id)}}" method="post" class="inline-block">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="underline">Hapus</button>
                                    </form>
                                    <a href="{{route('pegawai.edit', $item->id)}}" class="underline">Ubah</a>
                                    <a href="{{route('pegawai.show', $item->id)}}" class="underline">Lihat</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {!! $pegawai->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>