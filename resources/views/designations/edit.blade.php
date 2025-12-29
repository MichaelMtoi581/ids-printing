<x-app-layout>
    <div class="p-6">
        <form method="POST" action="{{ route('designations.update', $designation) }}">
            @csrf @method('PUT')
            <input type="text" name="name"
                   value="{{ $designation->name }}"
                   class="border w-full" required>
            <button class="mt-3 bg-blue-600 text-black px-4 py-2">
                Update
            </button>
        </form>
    </div>
</x-app-layout>
