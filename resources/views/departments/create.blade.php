<x-app-layout>
    <x-slot name="header">
        <h2>Add Department</h2>
    </x-slot>

    <div class="py-6 max-w-xl mx-auto">
        <form method="POST" action="{{ route('departments.store') }}">
            @csrf

            <div class="mb-4">
                <label>Code</label>
                <input name="code" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label>Name</label>
                <input name="name" class="w-full border rounded p-2" required>
            </div>

            <button class="bg-green-600 text-black px-4 py-2 rounded">
                Save
            </button>
        </form>
    </div>
</x-app-layout>
