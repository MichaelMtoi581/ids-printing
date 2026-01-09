<html>
    <title>KMC-ID CARD SYSTEM</title>
</html>
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 flex items-center gap-3">
                    <div class="p-2 bg-green-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    Add New Staff Member
                </h2>
                <p class="text-gray-500 text-sm mt-1">Create a new staff record</p>
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
                    <h3 class="font-semibold text-gray-800">Staff Information</h3>
                    <p class="text-sm text-gray-600 mt-1">Fill in the details below to add a new staff member</p>
                </div>
                
                <form method="POST" action="{{ route('staff.store') }}" enctype="multipart/form-data" class="p-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Personal Information -->
                        <div class="space-y-6">
                            <h4 class="font-medium text-gray-800 border-b pb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Personal Information
                            </h4>
                            
                            <div>
                                <label for="file_no" class="block text-sm font-medium text-gray-700 mb-2">
                                    File Number *
                                </label>
                                <input type="text" 
                                       name="file_no" 
                                       id="file_no"
                                       required
                                       class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors duration-200 @error('file_no') border-red-500 @enderror"
                                       placeholder="E.g., FN11145656"
                                       value="{{ old('file_no') }}">
                                @error('file_no')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="full_name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Full Name *
                                </label>
                                <input type="text" 
                                       name="full_name" 
                                       id="full_name"
                                       required
                                       class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors duration-200 @error('full_name') border-red-500 @enderror"
                                       placeholder="E.g., Hanifa Hamza"
                                       value="{{ old('full_name') }}">
                                @error('full_name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email Address *
                                </label>
                                <input type="email" 
                                       name="email" 
                                       id="email"
                                       required
                                       class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors duration-200 @error('email') border-red-500 @enderror"
                                       placeholder="E.g., hanifa@example.com"
                                       value="{{ old('email') }}">
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Professional Information -->
                        <div class="space-y-6">
                            <h4 class="font-medium text-gray-800 border-b pb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                Professional Information
                            </h4>
                            
                            <div>
                                <label for="department_id" class="block text-sm font-medium text-gray-700 mb-2">
                                    Department *
                                </label>
                                <select name="department_id" 
                                        id="department_id"
                                        required
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors duration-200 @error('department_id') border-red-500 @enderror">
                                    <option value="">Select Department</option>
                                    @foreach($departments as $d)
                                        <option value="{{ $d->id }}" {{ old('department_id') == $d->id ? 'selected' : '' }}>
                                            {{ $d->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="designation_id" class="block text-sm font-medium text-gray-700 mb-2">
                                    Designation *
                                </label>
                                <select name="designation_id" 
                                        id="designation_id"
                                        required
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors duration-200 @error('designation_id') border-red-500 @enderror">
                                    <option value="">Select Designation</option>
                                    @foreach($designations as $d)
                                        <option value="{{ $d->id }}" {{ old('designation_id') == $d->id ? 'selected' : '' }}>
                                            {{ $d->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('designation_id')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">
                                    Staff Photo
                                </label>
                                <div class="mt-1 flex items-center">
                                    <div class="relative">
                                        <input type="file" 
                                               name="photo" 
                                               id="photo"
                                               accept="image/*"
                                               class="hidden"
                                               onchange="previewImage(this)">
                                        <label for="photo" class="cursor-pointer">
                                            <div class="w-32 h-32 border-2 border-dashed border-gray-300 rounded-lg flex flex-col items-center justify-center hover:border-blue-400 hover:bg-blue-50 transition-colors duration-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <span class="mt-2 text-sm text-gray-500">Upload Photo</span>
                                            </div>
                                        </label>
                                        <div id="image-preview" class="hidden absolute top-0 left-0 w-32 h-32 rounded-lg overflow-hidden">
                                            <img id="preview" class="w-full h-full object-cover">
                                        </div>
                                    </div>
                                    <div class="ml-4 text-sm text-gray-500">
                                        <p>• Recommended size: 300x300px</p>
                                        <p>• Max file size: 2MB</p>
                                        <p>• Formats: JPG, PNG, GIF</p>
                                    </div>
                                </div>
                                @error('photo')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <!-- Status Section -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <h4 class="font-medium text-gray-800 mb-4 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Account Status
                        </h4>
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center">
                                <input type="radio" id="status_active" name="status" value="active" checked class="h-4 w-4 text-green-600 focus:ring-green-500">
                                <label for="status_active" class="ml-2 text-sm text-gray-700">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" id="status_inactive" name="status" value="inactive" class="h-4 w-4 text-red-600 focus:ring-red-500">
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
                                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-gray-700 font-bold rounded-lg hover:from-green-700 hover:to-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 shadow-md hover:shadow-lg transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Staff Member
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function previewImage(input) {
            const preview = document.getElementById('preview');
            const imagePreview = document.getElementById('image-preview');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    @endpush
</x-app-layout>