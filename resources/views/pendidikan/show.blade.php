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
                    <h2 class="text-xl uppercase mb-4">Data Pendidikan {{$pendidikan->name}}</h2>
                    
                    <div>Nama : {{$pendidikan->name}}</div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>