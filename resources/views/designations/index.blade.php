<x-app-layout>
    <x-slot name="header">Designations</x-slot>

    <div class="p-6">
        <a href="{{ route('designations.create') }}"
           class="bg-blue-600 text-black px-4 py-2 rounded">
             Add Designation
        </a>

        <table class="mt-4 w-full border">
            @foreach($designations as $d)
            <tr>
                <td class="border p-2">{{ $d->name }}</td>
                <td class="border p-2">
                    <a href="{{ route('designations.edit', $d) }}">Edit</a>
                    |
                    <form method="POST"
                          action="{{ route('designations.destroy', $d) }}"
                          class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>
