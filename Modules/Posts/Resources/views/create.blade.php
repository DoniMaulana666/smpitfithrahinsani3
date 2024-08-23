<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('app.posts.create') }}" method="post">
                    @csrf
                        <input class="border" name="post_title" value="{{ old('post_title') }}" />
                        <input class="border" name="post_description" value="{{ old('post_description') }}" />
                        <button>Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
