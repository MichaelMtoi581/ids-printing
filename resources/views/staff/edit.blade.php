<html>
    <title>KMC-ID CARD SYSTEM</title>
</html>
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 flex items-center gap-3">
                    <div class="p-2 bg-blue-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    Edit Staff Member
                </h2>
                <p class="text-gray-500 text-sm mt-1">Update staff information</p>
            </div>
            <a href="{{ route('staff.index') }}" 
               class="inline-flex items-center px-4 py-2 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to List
            </a>
        </div>
    </x-slot>

    <div class="px-4 py-6 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-indigo-50">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            @if($staff->photo_path)
                                <img src="{{ asset('storage/'.$staff->photo_path) }}" 
                                     alt="{{ $staff->full_name }}"
                                     class="h-16 w-16 rounded-lg object-cover border-2 border-white shadow">
                            @else
                                <div class="h-16 w-16 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-lg flex items-center justify-center">
                                    <span class="text-blue-600 font-bold text-xl">{{ substr($staff->full_name, 0, 2) }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="ml-4">
                            <h3 class="font-semibold text-gray-800">{{ $staff->full_name }}</h3>
                            <p class="text-sm text-gray-600">File No: <span class="font-medium">{{ $staff->file_no }}</span></p>
                        </div>
                    </div>
                </div>
                
                <form method="POST" action="{{ route('staff.update', $staff->id) }}" enctype="multipart/form-data" class="p-6">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Personal Information -->
                        <div class="space-y-6">
                            <h4 class="font-medium text-gray-800 border-b pb-2">Personal Information</h4>
                            
                            <div>
                                <label for="file_no" class="block text-sm font-medium text-gray-700 mb-2">
                                    File Number *
                                </label>
                                <input type="text" 
                                       name="file_no" 
                                       id="file_no"
                                       required
                                       class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors duration-200"
                                       value="{{ old('file_no', $staff->file_no) }}">
                            </div>
                            
                            <div>
                                <label for="full_name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Full Name *
                                </label>
                                <input type="text" 
                                       name="full_name" 
                                       id="full_name"
                                       required
                                       class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors duration-200"
                                       value="{{ old('full_name', $staff->full_name) }}">
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email Address *
                                </label>
                                <input type="email" 
                                       name="email" 
                                       id="email"
                                       required
                                       class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors duration-200"
                                       value="{{ old('email', $staff->email) }}">
                            </div>
                        </div>
                        
                        <!-- Professional Information -->
                        <div class="space-y-6">
                            <h4 class="font-medium text-gray-800 border-b pb-2">Professional Information</h4>
                            
                            <div>
                                <label for="department_id" class="block text-sm font-medium text-gray-700 mb-2">
                                    Department *
                                </label>
                                <select name="department_id" 
                                        id="department_id"
                                        required
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors duration-200">
                                    <option value="">Select Department</option>
                                    @foreach($departments as $d)
                                        <option value="{{ $d->id }}" {{ $staff->department_id == $d->id ? 'selected' : '' }}>
                                            {{ $d->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div>
                                <label for="designation_id" class="block text-sm font-medium text-gray-700 mb-2">
                                    Designation *
                                </label>
                                <select name="designation_id" 
                                        id="designation_id"
                                        required
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors duration-200">
                                    <option value="">Select Designation</option>
                                    @foreach($designations as $d)
                                        <option value="{{ $d->id }}" {{ $staff->designation_id == $d->id ? 'selected' : '' }}>
                                            {{ $d->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <!-- Current Photo -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Current Photo
                                </label>
                                <div class="flex items-center space-x-4">
                                    @if($staff->photo_path)
                                        <div class="relative">
                                            <img src="{{ asset('storage/'.$staff->photo_path) }}" 
                                                 alt="{{ $staff->full_name }}"
                                                 class="h-24 w-24 rounded-lg object-cover border">
                                            <div class="absolute -top-2 -right-2 bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                                                Current
                                            </div>
                                        </div>
                                    @else
                                        <div class="h-24 w-24 bg-gradient-to-br from-gray-100 to-gray-200 rounded-lg flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="flex-1">
                                        <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">
                                            Change Photo
                                        </label>
                                        <input type="file" 
                                               name="photo" 
                                               id="photo"
                                               accept="image/*"
                                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                        <p class="text-xs text-gray-500 mt-1">Leave empty to keep current photo</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Status Section -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <h4 class="font-medium text-gray-800 mb-4">Account Status</h4>
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center">
                                <input type="radio" id="status_active" name="status" value="active" 
                                       {{ $staff->status === 'active' ? 'checked' : '' }} class="h-4 w-4 text-green-600 focus:ring-green-500">
                                <label for="status_active" class="ml-2 text-sm text-gray-700">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" id="status_inactive" name="status" value="inactive"
                                       {{ $staff->status === 'inactive' ? 'checked' : '' }} class="h-4 w-4 text-red-600 focus:ring-red-500">
                                <label for="status_inactive" class="ml-2 text-sm text-gray-700">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        Inactive
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end space-x-3">
                        <a href="{{ route('staff.index') }}" 
                           class="px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-gray-700 font-bold rounded-lg hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-md hover:shadow-lg transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                            </svg>
                            Update Staff
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>