<x-app-layout>
    <x-slot name="header">
       <div class="flex justify-between>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Courses') }}
        </h2>

        </div>
        <a href="{{route('course.create')}}"> Add A Course</a>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <livewire:course-index/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
