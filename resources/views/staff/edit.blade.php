<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit Staff</h2>
    </x-slot>

    <div class="p-6">
       <form method="POST"
      action="{{ route('staff.update', $staff->id) }}"
      enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div>
                <label>Full Name</label>
                <input type="text" name="full_name"
                       value="{{ $staff->full_name }}"
                       class="border w-full" required>
            </div>

            <div class="mt-2">
                <label>Department</label>
                <select name="department_id" class="border w-full" required>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}"
                            {{ $staff->department_id == $department->id ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mt-2">
    <label>Designation</label>
    <select name="designation_id" class="border w-full" required>
        @foreach($designations as $designation)
            <option value="{{ $designation->id }}"
                {{ $staff->designation_id == $designation->id ? 'selected' : '' }}>
                {{ $designation->name }}
            </option>
        @endforeach
    </select>
</div>
@if($staff->photo_path)
    <div class="mt-4">
        <label>Current Photo</label><br>
        <img src="{{ asset('storage/'.$staff->photo_path) }}"
             class="h-24 w-24 object-cover border">
    </div>
@endif

<div class="mt-4">
    <label>Change Photo</label>
    <input type="file"
           name="photo"
           accept="image/*"
           class="border w-full">
</div>



            <div class="mt-4">
                <button class="bg-green-600 text-black px-4 py-2 rounded">
                    Update Staff
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
