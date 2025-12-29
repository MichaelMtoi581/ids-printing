<x-app-layout>
    <x-slot name="header">
        <h2>Edit Department</h2>
    </x-slot>

    <div class="py-6 max-w-xl mx-auto">
        <form method="POST" action="{{ route('departments.update', $department) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label>Code</label>
                <input name="code" value="{{ $department->code }}"
                       class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label>Name</label>
                <input name="name" value="{{ $department->name }}"
                       class="w-full border rounded p-2" required>
            </div>

            <button class="bg-blue-600 text-black px-4 py-2 rounded">
                Update
            </button>
        </form>
    </div>
</x-app-layout>
