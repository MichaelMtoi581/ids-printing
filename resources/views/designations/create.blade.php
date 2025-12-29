<x-app-layout>
    <div class="p-6">
        <form method="POST" action="{{ route('designations.store') }}">
            @csrf
            <input type="text" name="name"
                   placeholder="Designation name"
                   class="border w-full" required>
            <button class="mt-3 bg-green-600 text-black px-4 py-2">
                Save
            </button>
        </form>
    </div>
</x-app-layout>
