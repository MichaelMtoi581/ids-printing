<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Dashboard
        </h2>
    </x-slot>

    <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Total Staff -->
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-gray-500">Total Staff</h3>
            <p class="text-3xl font-bold">{{ $totalStaff }}</p>
        </div>

        <!-- Active Staff -->
        <div class="bg-green-100 p-6 rounded shadow">
            <h3 class="text-gray-600">Active Staff</h3>
            <p class="text-3xl font-bold">{{ $activeStaff }}</p>
        </div>

        <!-- Inactive Staff -->
        <div class="bg-red-100 p-6 rounded shadow">
            <h3 class="text-gray-600">Inactive Staff</h3>
            <p class="text-3xl font-bold">{{ $inactiveStaff }}</p>
        </div>

        <!-- Departments -->
        <div class="bg-blue-100 p-6 rounded shadow">
            <h3 class="text-gray-600">Departments</h3>
            <p class="text-3xl font-bold">{{ $departments }}</p>
        </div>

        <!-- Designations -->
        <div class="bg-purple-100 p-6 rounded shadow">
            <h3 class="text-gray-600">Designations</h3>
            <p class="text-3xl font-bold">{{ $designations }}</p>
        </div>

        <!-- Quick Action -->
        <div class="bg-gray-100 p-6 rounded shadow">
            <h3 class="text-gray-600 mb-3">Quick Actions</h3>
            <a href="{{ route('staff.index') }}"
               class="inline-block bg-blue-600 text-black px-4 py-2 rounded">
               Manage Staff
            </a>
        </div>

    </div>
</x-app-layout>
