<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pendidikan') }}
        </h2>
        @if (Session::get('success'))
        <div class="text-green-500">{{Session::get('success')}}</div>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{route('pendidikan.create')}}" class="bg-teal-500 rounded px-4 py-2 mb-4 inline-block">Tambah data</a>
                    <table class="table table-auto w-full mb-4">
                        <thead>
                            <tr class="text-left">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                            <tr>
                                <td>{{++$indexNumber}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    <form action="{{route('pendidikan.destroy', $item->id)}}" method="post" class="inline-block">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="underline">Hapus</button>
                                    </form>
                                    <a href="{{route('pendidikan.edit', $item->id)}}" class="underline">Ubah</a>
                                    <a href="{{route('pendidikan.show', $item->id)}}" class="underline">Lihat</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>