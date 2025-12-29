<x-app-layout>
    <x-slot name="header">
        <h2>Add Staff</h2>
    </x-slot>

    <div class="p-6">
        <form method="POST"
              action="{{ route('staff.store') }}"
              enctype="multipart/form-data">
            @csrf

            <input name="file_no" placeholder="File No" required><br><br>

            <input name="full_name" placeholder="Full Name" required><br><br>

            <input name="email" type="email" placeholder="Email" required><br><br>

            <select name="department_id" required>
                <option value="">Select Department</option>
                @foreach($departments as $d)
                    <option value="{{ $d->id }}">{{ $d->name }}</option>
                @endforeach
            </select><br><br>

            <select name="designation_id" required>
                <option value="">Select Designation</option>
                @foreach($designations as $d)
                    <option value="{{ $d->id }}">{{ $d->name }}</option>
                @endforeach
            </select><br><br>

            <input type="file" name="photo" accept="image/*"><br><br>

            <button type="submit">Save</button>
        </form>
    </div>
</x-app-layout>
