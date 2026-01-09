<html>
    <title>KMC-ID CARD SYSTEM</title>
</html>
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 flex items-center gap-3">
                    <div class="p-2 bg-blue-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-10A5.5 5.5 0 0121 8.5m-18 0a5.5 5.5 0 118 4.5M3 8.5h18" />
                        </svg>
                    </div>
                    Staff Management
                </h2>
                <p class="text-gray-500 text-sm mt-1">Manage all staff members and their information</p>
            </div>
            <div class="mt-4 sm:mt-0 flex items-center space-x-3">
                <a href="{{ route('staff.create') }}" 
                   class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-purple-600 to-indigo-600 text-gray-800 font-bold rounded-lg hover:from-purple-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 shadow-md hover:shadow-lg transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add New Staff
                </a>
                <button  onclick="document.getElementById('staffImportInput').click()" class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-green-600 to-emerald-600 text-black-500 font-bold rounded-lg hover:from-green-700 hover:to-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 shadow-md hover:shadow-lg transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                    </svg>
                    Import
                </button>
                <form id="staffImportForm"
      action="{{ route('staff.import') }}"
      method="POST"
      enctype="multipart/form-data"
      class="hidden">
    @csrf
    <input type="file"
           id="staffImportInput"
           name="file"
           accept=".xls,.xlsx"
           onchange="document.getElementById('staffImportForm').submit();">
</form>

            </div>
        </div>
    </x-slot>

    <div class="px-4 py-6 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="mb-6 p-4 bg-gradient-to-r from-emerald-50 to-green-50 border border-emerald-200 rounded-xl shadow-sm">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-emerald-800">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Total Staff</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $staff->count() }}</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">
                <div class="flex items-center">
                    <div class="p-3 bg-emerald-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Active Staff</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $staff->where('status', 'active')->count() }}</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">
                <div class="flex items-center">
                    <div class="p-3 bg-red-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Inactive Staff</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $staff->where('status', 'inactive')->count() }}</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">
                <div class="flex items-center">
                    <div class="p-3 bg-purple-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">ID Cards Printed</p>
                        <p class="text-2xl font-bold text-gray-800">--</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Staff Table -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <h3 class="font-semibold text-gray-800 mb-4 sm:mb-0">Staff Members ({{ $staff->count() }} total)</h3>
                    <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input type="search" placeholder="Search staff..." 
                                   class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none text-sm w-full sm:w-auto">
                        </div>
                        <select class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none text-sm">
                            <option value="">All Departments</option>
                            @foreach($departments ?? [] as $dept)
                                <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                            @endforeach
                        </select>
                        <select class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none text-sm">
                            <option value="">All Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
            
            @if($staff->isEmpty())
            <div class="p-12 text-center">
                <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-10A5.5 5.5 0 0121 8.5m-18 0a5.5 5.5 0 118 4.5M3 8.5h18" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No staff members found</h3>
                <p class="text-gray-500 mb-6">Get started by adding your first staff member.</p>
                <a href="{{ route('staff.create') }}" 
                   class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-bold rounded-lg hover:from-green-700 hover:to-emerald-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add First Staff
                </a>
            </div>
            @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Staff Details
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Department & Designation
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($staff as $s)
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 font-medium">{{ $loop->iteration }}</div>
                                <div class="text-xs text-gray-500">{{ $s->file_no }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        @if($s->photo_path)
                                              <button onclick="openPhotoModal('{{ asset('storage/'.$s->photo_path) }}', '{{ $s->full_name }}')"
                                                   class="text-blue-600 hover:text-blue-800 text-sm font-medium underline">
                                                    View Photo
                                              </button>
                                        @else
                                        <span class="text-gray-400 text-sm italic">No photo</span>
                                        @endif
                                    </div>
                                    <!-- Photo Preview Modal -->
                                    <div id="photoModal"
                                        class="fixed inset-0 bg-black bg-opacity-60 hidden items-center justify-center z-50">
                                        <div class="bg-white rounded-xl shadow-xl  max-w-md max-h-[80vh] p-4 relative overflow-hidden">
                                            
                                            <button onclick="closePhotoModal()"
                                                    class="absolute top-2 right-2 text-gray-500 hover:text-red-600">
                                                ✕
                                            </button>

                                            <h3 id="photoModalName"
                                                class="text-sm font-semibold text-gray-700 mb-3 text-center"></h3>

                                            <img id="photoModalImg"
                                                src=""
                                                alt="Staff Photo"
                                                class="max-w-full max-h-[60vh] mx-auto rounded-lg object-contain border">

                                        </div>
                                    </div>


                                    <div class="ml-4">
                                        <div class="text-sm font-semibold text-gray-900">{{ $s->full_name }}</div>
                                        <div class="text-sm text-gray-500">{{ $s->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $s->department->name ?? '-' }}</div>
                                <div class="text-sm text-gray-500">{{ $s->designation->name ?? '-' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <form method="POST" action="{{ route('staff.toggleStatus', $s->id) }}" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" 
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $s->status === 'active' ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-red-100 text-red-800 hover:bg-red-200' }} transition-colors duration-200">
                                        <span class="w-2 h-2 rounded-full mr-1 {{ $s->status === 'active' ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                        {{ ucfirst($s->status) }}
                                    </button>
                                </form>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('staff.edit', $s->id) }}" 
                                       class="inline-flex items-center px-3 py-2 border  border-blue-300 text-blue-700 rounded-lg hover:bg-blue-50 hover:border-blue-400 transition-colors duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </a>
                                    <a href="{{ route('staff.id-card', $s->id) }}" 
                                       target="_blank"
                                       class="inline-flex items-center px-3 py-2 border  border-green-300 text-green-700 rounded-lg hover:bg-green-50 hover:border-green-400 transition-colors duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                        </svg>
                                        ID Card
                                    </a>
                                    <form action="{{ route('staff.destroy', $s->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDelete('{{ $s->full_name }}', '{{ $s->file_no }}', this)"
                                                class="inline-flex items-center px-3 py-2 border  border-red-300 text-red-700 rounded-lg hover:bg-red-50 hover:border-red-400 transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            @if($staff->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $staff->links() }}
            </div>
            @endif
            @endif
        </div>
    </div>

    @push('scripts')
    <script>
        function openPhotoModal(imageUrl, name) {
            document.getElementById('photoModalImg').src = imageUrl;
            document.getElementById('photoModalName').textContent = name;
            document.getElementById('photoModal').classList.remove('hidden');
            document.getElementById('photoModal').classList.add('flex');
            document.body.classList.add('overflow-hidden');
        }


        function closePhotoModal() {
            document.getElementById('photoModal').classList.add('hidden');
            document.getElementById('photoModal').classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }



        function confirmDelete(staffName, fileNo, button) {
            if (confirm(`Are you sure you want to delete "${staffName}" (File No: ${fileNo})?\n\n⚠️ This action cannot be undone.`)) {
                button.closest('form').submit();
            }
        }
        
        // Search functionality
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('input[type="search"]');
            const deptSelect = document.querySelector('select:nth-of-type(1)');
            const statusSelect = document.querySelector('select:nth-of-type(2)');
            
            function filterTable() {
                const searchTerm = searchInput.value.toLowerCase();
                const deptFilter = deptSelect.value;
                const statusFilter = statusSelect.value;
                const rows = document.querySelectorAll('tbody tr');
                
                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    const dept = row.querySelector('td:nth-child(3) div:first-child').textContent.trim();
                    const status = row.querySelector('td:nth-child(4) button').textContent.trim().toLowerCase();
                    
                    const matchesSearch = text.includes(searchTerm);
                    const matchesDept = !deptFilter || dept === deptSelect.options[deptSelect.selectedIndex].text;
                    const matchesStatus = !statusFilter || status === statusFilter;
                    
                    if (matchesSearch && matchesDept && matchesStatus) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }
            
            searchInput.addEventListener('keyup', filterTable);
            deptSelect.addEventListener('change', filterTable);
            statusSelect.addEventListener('change', filterTable);
        });
    </script>
    @endpush
</x-app-layout>