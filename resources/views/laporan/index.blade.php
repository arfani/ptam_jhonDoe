<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table table-auto w-full mb-4">
                        <thead>
                            <tr class="text-left">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Pendidikan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan as $item)
                            <tr>
                                <td>{{++$indexNumber}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{'pendidikan'}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {!! $laporan->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>