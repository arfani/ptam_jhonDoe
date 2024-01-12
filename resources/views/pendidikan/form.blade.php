<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pendidikan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
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
                    <form action="{{route('pendidikan.store')}}" method="POST">
                        @csrf
                        <div class="flex flex-col mb-2">
                            <label for="name">Nama</label>
                            <input type="text" id="name" name="name" 
                            class="w-fit border-t-transparent border-l-transparent border-r-transparent focus:ring-0 border-b border-teal-600" value="{{old('name', '')}}"
                                required>
                        </div>
                        <button type="submit" class="py-2 px-4 bg-teal-500 my-2 rounded">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>