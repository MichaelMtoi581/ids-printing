<html>
    <title>KMC-ID CARD SYSTEM</title>
</html>
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    Dashboard Overview
                </h2>
                <p class="text-gray-500 text-sm mt-1">Welcome back, {{ Auth::user()->name }}! Here's your system summary.</p>
            </div>
            <div class="mt-4 md:mt-0">
                <div class="text-sm text-gray-500">Last updated: {{ now()->format('M d, Y h:i A') }}</div>
            </div>
        </div>
    </x-slot>

    <div class="px-4 py-6 md:px-6 lg:px-8">
        <!-- Stats Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-6 mb-8">
            <!-- Total Staff Card -->
            <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-blue-50 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-10A5.5 5.5 0 0121 8.5m-18 0a5.5 5.5 0 118 4.5M3 8.5h18" />
                        </svg>
                    </div>
                    <span class="text-xs font-semibold px-2 py-1 rounded-full bg-blue-100 text-blue-800">Total</span>
                </div>
                <h3 class="text-gray-500 text-sm font-medium mb-2">Total Staff</h3>
                <p class="text-3xl font-bold text-gray-800 mb-1">{{ $totalStaff }}</p>
                <div class="h-2 w-full bg-gray-200 rounded-full overflow-hidden">
                    <div class="h-full bg-blue-500 rounded-full" style="width: {{ ($activeStaff/$totalStaff)*100 }}%"></div>
                </div>
            </div>

            <!-- Active Staff Card -->
            <div class="bg-gradient-to-br from-white to-emerald-50 rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-emerald-50 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="text-xs font-semibold px-2 py-1 rounded-full bg-emerald-100 text-emerald-800">Active</span>
                </div>
                <h3 class="text-gray-500 text-sm font-medium mb-2">Active Staff</h3>
                <p class="text-3xl font-bold text-gray-800 mb-1">{{ $activeStaff }}</p>
                <p class="text-sm text-emerald-600 font-medium">
                    <span class="inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        {{ number_format(($activeStaff/$totalStaff)*100, 1) }}% of total
                    </span>
                </p>
            </div>

            <!-- Inactive Staff Card -->
            <div class="bg-gradient-to-br from-white to-rose-50 rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-rose-50 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="text-xs font-semibold px-2 py-1 rounded-full bg-rose-100 text-rose-800">Inactive</span>
                </div>
                <h3 class="text-gray-500 text-sm font-medium mb-2">Inactive Staff</h3>
                <p class="text-3xl font-bold text-gray-800 mb-1">{{ $inactiveStaff }}</p>
                <p class="text-sm text-rose-600 font-medium">
                    <span class="inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                        </svg>
                        {{ number_format(($inactiveStaff/$totalStaff)*100, 1) }}% of total
                    </span>
                </p>
            </div>

            <!-- Departments Card -->
            <div class="bg-gradient-to-br from-white to-indigo-50 rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-indigo-50 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <span class="text-xs font-semibold px-2 py-1 rounded-full bg-indigo-100 text-indigo-800">Departments</span>
                </div>
                <h3 class="text-gray-500 text-sm font-medium mb-2">Departments</h3>
                <p class="text-3xl font-bold text-gray-800 mb-1">{{ $departments }}</p>
                <div class="flex items-center text-sm text-gray-600">
                    <span class="inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        Manage departments
                    </span>
                </div>
            </div>

            <!-- Designations Card -->
            <div class="bg-gradient-to-br from-white to-purple-50 rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-purple-50 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <span class="text-xs font-semibold px-2 py-1 rounded-full bg-purple-100 text-purple-800">Roles</span>
                </div>
                <h3 class="text-gray-500 text-sm font-medium mb-2">Designations</h3>
                <p class="text-3xl font-bold text-gray-800 mb-1">{{ $designations }}</p>
                <div class="flex items-center text-sm text-gray-600">
                    <span class="inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        View all roles
                    </span>
                </div>
            </div>

            <!-- Quick Stats Card -->
            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl shadow-lg border border-blue-100 p-6 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-white rounded-xl shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <span class="text-xs font-semibold px-2 py-1 rounded-full bg-white text-blue-800">Quick Stats</span>
                </div>
                <h3 class="text-gray-500 text-sm font-medium mb-4">Staff Activity</h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Active Rate</span>
                        <span class="font-semibold text-blue-600">{{ number_format(($activeStaff/$totalStaff)*100, 1) }}%</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Department Avg.</span>
                        <span class="font-semibold text-blue-600">{{ $totalStaff > 0 ? ceil($totalStaff / $departments) : 0 }} per dept.</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Section & Recent Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Quick Actions Card -->
            <div class="lg:col-span-2">
                <div class="bg-gradient-to-r from-gray-50 to-white rounded-2xl shadow-lg border border-gray-100 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="font-bold text-lg text-gray-800 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            Quick Actions
                        </h3>
                        <span class="text-sm text-gray-500">Manage your system</span>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a href="{{ route('staff.index') }}" class="group">
                            <div class="bg-white border border-gray-200 rounded-xl p-5 hover:border-blue-300 hover:shadow-md transition-all duration-300 group-hover:-translate-y-1">
                                <div class="flex items-center gap-4">
                                    <div class="p-3 bg-blue-50 rounded-lg group-hover:bg-blue-100 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-10A5.5 5.5 0 0121 8.5m-18 0a5.5 5.5 0 118 4.5M3 8.5h18" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">Manage Staff</h4>
                                        <p class="text-sm text-gray-500 mt-1">View, add, or edit staff members</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('staff.create') }}" class="group">
                            <div class="bg-white border border-gray-200 rounded-xl p-5 hover:border-emerald-300 hover:shadow-md transition-all duration-300 group-hover:-translate-y-1">
                                <div class="flex items-center gap-4">
                                    <div class="p-3 bg-emerald-50 rounded-lg group-hover:bg-emerald-100 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800 group-hover:text-emerald-600 transition-colors">Add New Staff</h4>
                                        <p class="text-sm text-gray-500 mt-1">Create new staff account</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('departments.index') }}" class="group">
                            <div class="bg-white border border-gray-200 rounded-xl p-5 hover:border-purple-300 hover:shadow-md transition-all duration-300 group-hover:-translate-y-1">
                                <div class="flex items-center gap-4">
                                    <div class="p-3 bg-purple-50 rounded-lg group-hover:bg-purple-100 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800 group-hover:text-purple-600 transition-colors">Departments</h4>
                                        <p class="text-sm text-gray-500 mt-1">Manage organization units</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="group">
                            <div class="bg-white border border-gray-200 rounded-xl p-5 hover:border-amber-300 hover:shadow-md transition-all duration-300 group-hover:-translate-y-1">
                                <div class="flex items-center gap-4">
                                    <div class="p-3 bg-amber-50 rounded-lg group-hover:bg-amber-100 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800 group-hover:text-amber-600 transition-colors">Reports</h4>
                                        <p class="text-sm text-gray-500 mt-1">Generate staff analytics</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- System Status Card -->
            <div>
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                    <h3 class="font-bold text-lg text-gray-800 mb-6 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        System Status
                    </h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Database</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <span class="w-2 h-2 bg-green-500 rounded-full mr-1"></span>
                                Operational
                            </span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Storage</span>
                            <span class="text-sm font-semibold text-gray-800">74% used</span>
                        </div>
                        
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: 74%"></div>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Active Sessions</span>
                            <span class="text-sm font-semibold text-blue-600">3</span>
                        </div>
                        
                        <div class="pt-4 border-t border-gray-200">
                            <div class="text-center">
                                <a href="#" class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800">
                                    View system logs
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="mt-8">
            <div class="bg-gradient-to-r from-gray-50 to-white rounded-2xl shadow-lg border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="font-bold text-lg text-gray-800">Recent Activity</h3>
                    <button class="text-sm text-blue-600 font-medium hover:text-blue-800">
                        View all activities →
                    </button>
                </div>
                
                <div class="space-y-4">
                    <div class="flex items-center gap-3 p-3 hover:bg-gray-50 rounded-lg transition-colors">
                        <div class="p-2 bg-blue-50 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-800">New staff member added</p>
                            <p class="text-xs text-gray-500">2 hours ago</p>
                        </div>
                        <span class="text-xs font-medium px-2 py-1 rounded-full bg-blue-100 text-blue-800">User</span>
                    </div>
                    
                    <div class="flex items-center gap-3 p-3 hover:bg-gray-50 rounded-lg transition-colors">
                        <div class="p-2 bg-emerald-50 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-800">Profile updated successfully</p>
                            <p class="text-xs text-gray-500">5 hours ago</p>
                        </div>
                        <span class="text-xs font-medium px-2 py-1 rounded-full bg-emerald-100 text-emerald-800">Update</span>
                    </div>
                    
                    <div class="flex items-center gap-3 p-3 hover:bg-gray-50 rounded-lg transition-colors">
                        <div class="p-2 bg-amber-50 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-800">System backup completed</p>
                            <p class="text-xs text-gray-500">Yesterday, 11:30 PM</p>
                        </div>
                        <span class="text-xs font-medium px-2 py-1 rounded-full bg-amber-100 text-amber-800">System</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>