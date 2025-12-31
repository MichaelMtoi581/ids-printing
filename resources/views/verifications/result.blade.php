<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KMC ID Card Verification - {{ $staff ? 'Valid' : 'Invalid' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Poppins', sans-serif; }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .card-shadow {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .pulse-animation {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .success-gradient {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }
        
        .error-gradient {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
    <div class="container mx-auto px-4 py-12 max-w-4xl">
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="inline-block p-4 bg-white rounded-2xl shadow-lg mb-6">
                <img src="https://via.placeholder.com/60x60/0a3d62/ffffff?text=KMC" 
                     alt="KMC Logo" 
                     class="h-16 w-16 mx-auto rounded-lg">
            </div>
            <h1 class="text-4xl font-bold text-gray-800 mb-2">
                Kinondoni Municipal Council
            </h1>
            <p class="text-gray-600">Staff ID Card Verification System</p>
        </div>

        <!-- Verification Result Card -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden card-shadow">
            <!-- Status Header -->
            <div class="px-8 py-6 {{ $staff ? 'success-gradient' : 'error-gradient' }}">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="h-12 w-12 bg-white/20 rounded-full flex items-center justify-center mr-4">
                            @if($staff)
                            <i class="fas fa-check text-white text-2xl"></i>
                            @else
                            <i class="fas fa-times text-white text-2xl"></i>
                            @endif
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">
                                @if($staff)
                                VALID STAFF IDENTIFICATION
                                @else
                                INVALID / NOT FOUND
                                @endif
                            </h2>
                            <p class="text-white/80 text-sm">Verification Result</p>
                        </div>
                    </div>
                    <div class="text-white text-right">
                        <div class="text-sm opacity-80">Verified at</div>
                        <div class="font-bold">{{ now()->format('h:i A') }}</div>
                        <div class="text-sm">{{ now()->format('M d, Y') }}</div>
                    </div>
                </div>
            </div>

            <!-- Result Content -->
            <div class="p-8">
                @if($staff)
                <!-- Valid Result -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Staff Photo & Basic Info -->
                    <div class="lg:col-span-1">
                        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 text-center">
                            <div class="relative mx-auto w-48 h-48 rounded-2xl overflow-hidden border-4 border-white shadow-lg mb-6">
                                @if($staff->photo_path && file_exists(public_path('storage/'.$staff->photo_path)))
                                    <img src="{{ asset('storage/'.$staff->photo_path) }}" 
                                         alt="{{ $staff->full_name }}" 
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-blue-100 to-indigo-100 flex items-center justify-center">
                                        <span class="text-blue-600 text-4xl font-bold">
                                            {{ substr($staff->full_name, 0, 2) }}
                                        </span>
                                    </div>
                                @endif
                                <div class="absolute -bottom-2 -right-2 bg-emerald-500 text-white text-xs px-3 py-1 rounded-full font-bold">
                                    <i class="fas fa-check mr-1"></i> Verified
                                </div>
                            </div>
                            
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $staff->full_name }}</h3>
                            <div class="inline-block px-4 py-2 bg-emerald-100 text-emerald-800 rounded-full text-sm font-medium mb-4">
                                <i class="fas fa-id-card mr-2"></i> File No: {{ $staff->file_no }}
                            </div>
                        </div>
                    </div>

                    <!-- Professional Details -->
                    <div class="lg:col-span-2">
                        <div class="space-y-6">
                            <!-- Designation -->
                            <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-2xl p-6">
                                <div class="flex items-center mb-4">
                                    <div class="h-12 w-12 bg-purple-100 rounded-xl flex items-center justify-center mr-4">
                                        <i class="fas fa-user-tie text-purple-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-800">Designation</h4>
                                        <p class="text-2xl font-bold text-purple-700">{{ $staff->designation->name ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Department -->
                            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-2xl p-6">
                                <div class="flex items-center mb-4">
                                    <div class="h-12 w-12 bg-blue-100 rounded-xl flex items-center justify-center mr-4">
                                        <i class="fas fa-building text-blue-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-800">Department</h4>
                                        <p class="text-2xl font-bold text-blue-700">{{ $staff->department->name ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="bg-white border border-gray-200 rounded-2xl p-6">
                                    <h5 class="text-sm font-medium text-gray-500 mb-2">Status</h5>
                                    <div class="flex items-center">
                                        <div class="h-8 w-8 rounded-full {{ $staff->status === 'active' ? 'bg-emerald-100' : 'bg-red-100' }} flex items-center justify-center mr-3">
                                            <div class="h-3 w-3 rounded-full {{ $staff->status === 'active' ? 'bg-emerald-500' : 'bg-red-500' }}"></div>
                                        </div>
                                        <span class="text-lg font-bold {{ $staff->status === 'active' ? 'text-emerald-700' : 'text-red-700' }}">
                                            {{ ucfirst($staff->status) }}
                                        </span>
                                    </div>
                                </div>

                                <div class="bg-white border border-gray-200 rounded-2xl p-6">
                                    <h5 class="text-sm font-medium text-gray-500 mb-2">Email</h5>
                                    <div class="flex items-center">
                                        <i class="fas fa-envelope text-gray-400 mr-3"></i>
                                        <span class="text-lg font-medium text-gray-800">{{ $staff->email }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Security Footer -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <div class="flex flex-col md:flex-row items-center justify-between">
                        <div class="flex items-center mb-4 md:mb-0">
                            <div class="h-10 w-10 bg-gradient-to-br from-amber-50 to-orange-50 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-shield-alt text-amber-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Security Verified</h4>
                                <p class="text-sm text-gray-600">This ID has been authenticated by KMC system</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button onclick="window.print()" 
                                    class="inline-flex items-center px-5 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300">
                                <i class="fas fa-print mr-2"></i> Print Result
                            </button>
                            <button onclick="window.close()" 
                                    class="inline-flex items-center px-5 py-3 border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 transition-all duration-300">
                                <i class="fas fa-times mr-2"></i> Close
                            </button>
                        </div>
                    </div>
                </div>
                @else
                <!-- Invalid Result -->
                <div class="text-center py-12">
                    <div class="mx-auto w-32 h-32 bg-gradient-to-br from-red-50 to-pink-50 rounded-full flex items-center justify-center mb-8 pulse-animation">
                        <i class="fas fa-exclamation-triangle text-red-500 text-5xl"></i>
                    </div>
                    
                    <h3 class="text-3xl font-bold text-gray-800 mb-4">ID Card Verification Failed</h3>
                    <p class="text-gray-600 text-lg mb-8 max-w-2xl mx-auto">
                        The scanned QR code does not match any registered staff ID in our system. 
                        This could be due to an invalid, expired, or fake ID card.
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-3xl mx-auto mb-10">
                        <div class="bg-red-50 border border-red-100 rounded-2xl p-6">
                            <div class="h-12 w-12 bg-red-100 rounded-xl flex items-center justify-center mb-4 mx-auto">
                                <i class="fas fa-ban text-red-500 text-xl"></i>
                            </div>
                            <h4 class="font-semibold text-red-700 mb-2">Invalid Code</h4>
                            <p class="text-sm text-gray-600">The QR code is not recognized by our system</p>
                        </div>
                        
                        <div class="bg-amber-50 border border-amber-100 rounded-2xl p-6">
                            <div class="h-12 w-12 bg-amber-100 rounded-xl flex items-center justify-center mb-4 mx-auto">
                                <i class="fas fa-clock text-amber-500 text-xl"></i>
                            </div>
                            <h4 class="font-semibold text-amber-700 mb-2">Possible Expiry</h4>
                            <p class="text-sm text-gray-600">ID card might have expired or been revoked</p>
                        </div>
                        
                        <div class="bg-blue-50 border border-blue-100 rounded-2xl p-6">
                            <div class="h-12 w-12 bg-blue-100 rounded-xl flex items-center justify-center mb-4 mx-auto">
                                <i class="fas fa-user-slash text-blue-500 text-xl"></i>
                            </div>
                            <h4 class="font-semibold text-blue-700 mb-2">Staff Not Found</h4>
                            <p class="text-sm text-gray-600">No matching staff record in our database</p>
                        </div>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="{{ url('/') }}" 
                           class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300">
                            <i class="fas fa-home mr-2"></i> Return to Home
                        </a>
                        <button onclick="window.close()" 
                                class="inline-flex items-center px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 transition-all duration-300">
                            <i class="fas fa-times mr-2"></i> Close Window
                        </button>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-12 text-center text-gray-500 text-sm">
            <p class="mb-2">
                <i class="fas fa-lock mr-2"></i>
                This verification is secured by Kinondoni Municipal Council
            </p>
            <p>
                For assistance, contact: +255 222 17073 | 
                <a href="mailto:info@kinondonimc.go.tz" class="text-blue-600 hover:underline">
                    info@kinondonimc.go.tz
                </a>
            </p>
        </div>
    </div>

    <script>
        // Auto close after 30 seconds for invalid results
        @if(!$staff)
        setTimeout(function() {
            if(confirm('This window will close automatically. Click OK to close now.')) {
                window.close();
            }
        }, 30000);
        @endif

        // Add some interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            const resultCard = document.querySelector('.card-shadow');
            if (resultCard) {
                resultCard.style.transition = 'transform 0.3s ease';
                resultCard.addEventListener('mouseenter', () => {
                    resultCard.style.transform = 'translateY(-5px)';
                });
                resultCard.addEventListener('mouseleave', () => {
                    resultCard.style.transform = 'translateY(0)';
                });
            }
        });
    </script>
</body>
</html>