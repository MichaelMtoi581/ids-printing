<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Staff List
        </h2>
    </x-slot>

    <div class="p-6">
        <a href="{{ route('staff.create') }}"
           class="bg-blue-600 text-black px-4 py-2 rounded">
             Add Staff
        </a>

        <table class="mt-4 w-full border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2">File No</th>
                    <th class="border p-2">Name</th>
                    <th class="border p-2">Department</th>
                    <th class="border p-2">Designation</th>
                    <th class="border p-2">Photo</th>
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staff as $s)
                <tr>
                    <td class="border p-2">{{ $s->file_no }}</td>
                    <td class="border p-2">{{ $s->full_name }}</td>
                    <td class="border p-2">{{ $s->department->name ?? '-' }}</td>
                    <td class="border p-2">{{ $s->designation->name ?? '-' }}</td>
                    <td>
    @if($s->photo_path)
        <img src="{{ asset('storage/'.$s->photo_path) }}"
             width="60">
    @endif
</td>

                    <td class="border p-2">
    <form method="POST"
          action="{{ route('staff.toggleStatus', $s->id) }}">
        @csrf
        @method('PATCH')

        <button type="submit"
            class="px-3 py-1 rounded text-black
            {{ $s->status === 'active'
                ? 'bg-green-500'
                : 'bg-red-500' }}">
            {{ ucfirst($s->status) }}
        </button>
    </form>
</td>

                    <td class="border p-2 space-x-2">

    <a href="{{ route('staff.edit', $s->id) }}"
       class="text-blue-600">
       Edit
    </a>

    <a href="{{ route('staff.id-card', $s->id) }}"
       target="_blank"
       class="text-green-600">
       Print ID
    </a>

    <form action="{{ route('staff.destroy', $s->id) }}"
          method="POST"
          class="inline">
        @csrf
        @method('DELETE')
        <button class="text-red-600"
                onclick="return confirm('Delete staff?')">
            Delete
        </button>
    </form>

</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
