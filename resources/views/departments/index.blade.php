<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Departments
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('departments.create') }}"
               class="mb-4 inline-block bg-blue-600 text-black px-4 py-2 rounded">
                Add Department
            </a>

            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 shadow rounded p-4">
                <table class="w-full border">
                    <thead>
                        <tr class="border-b">
                            <th>#</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($departments as $dept)
                        <tr class="border-b">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dept->code }}</td>
                            <td>{{ $dept->name }}</td>
                            <td>
                                <a href="{{ route('departments.edit', $dept) }}"
                                   class="text-blue-600">Edit</a>

                                <form action="{{ route('departments.destroy', $dept) }}"
                                      method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600"
                                            onclick="return confirm('Delete?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
