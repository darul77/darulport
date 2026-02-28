<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class="flex items-center space-x-3">
                <div class="h-4 w-px bg-gray-300"></div>
                <span class="text-sm text-blue-600 font-medium">Welcome back, {{ Auth::user()->name }} ⚡</span>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- ================= STATISTICS CARDS ================= -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Projects -->
                <div class="bg-white overflow-hidden shadow-lg rounded-2xl hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-blue-100 rounded-xl p-3">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-green-500 bg-green-100 px-3 py-1 rounded-full">+{{ $experienceCount }}%</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-1">{{ $experienceCount }}</h3>
                        <p class="text-gray-500 text-sm">Total Projects</p>
                    </div>
                </div>

                <!-- Experiences -->
                <div class="bg-white overflow-hidden shadow-lg rounded-2xl hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-indigo-100 rounded-xl p-3">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-blue-500 bg-blue-100 px-3 py-1 rounded-full">{{ $experienceCount }}%</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-1">{{ $experienceCount }}</h3>
                        <p class="text-gray-500 text-sm">Work Experiences</p>
                    </div>
                </div>

                <!-- Testimonials -->
                <div class="bg-white overflow-hidden shadow-lg rounded-2xl hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-cyan-100 rounded-xl p-3">
                                <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-yellow-500 bg-yellow-100 px-3 py-1 rounded-full">{{ \App\Models\Testimonial::count() }}</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-1">{{ \App\Models\Testimonial::count() }}</h3>
                        <p class="text-gray-500 text-sm">Testimonials</p>
                    </div>
                </div>

                <!-- Visitors -->
                <div class="bg-white overflow-hidden shadow-lg rounded-2xl hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-emerald-100 rounded-xl p-3">
                                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-blue-500 bg-blue-100 px-3 py-1 rounded-full">+2.1k</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-1">8,249</h3>
                        <p class="text-gray-500 text-sm">Profile Visitors</p>
                    </div>
                </div>
            </div>

            <!-- ================= MAIN CONTENT GRID ================= -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- LEFT COLUMN - Profile Overview -->
                <div class="lg:col-span-1">
                    <div class="bg-white overflow-hidden shadow-lg rounded-2xl">
                        <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-8 text-center">
                            <div class="relative inline-block">
                                <div class="w-24 h-24 rounded-full border-4 border-white mx-auto overflow-hidden bg-white">
                                    @php
                                        $user = Auth::user();
                                    @endphp
                                    @if($user && $user->photo)
                                        <img src="{{ asset('storage/' . $user->photo) }}" class="w-full h-full object-cover">
                                    @else
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=2563EB&color=fff&size=128" class="w-full h-full object-cover">
                                    @endif
                                </div>
                                <span class="absolute bottom-0 right-0 w-5 h-5 bg-green-400 border-2 border-white rounded-full"></span>
                            </div>
                            <h3 class="text-xl font-bold text-white mt-4">{{ $user->name }}</h3>
                            <p class="text-blue-100 text-sm">Administrator</p>
                        </div>
                        
                        <div class="p-6">
                            <div class="space-y-4">
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="text-sm">{{ $user->email }}</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm">Member since {{ $user->created_at->format('M Y') }}</span>
                                </div>
                            </div>

                            <div class="border-t border-gray-100 mt-6 pt-6">
                                <h4 class="font-semibold text-gray-700 mb-3">Quick Actions</h4>
                                <div class="grid grid-cols-2 gap-3">
                                <a href="{{ route('projects.create') }}" class="p-3 bg-blue-50 rounded-xl text-blue-600 hover:bg-blue-100 transition-colors text-sm font-medium text-center">
                                    + Project
                                </a>
                                
                                <a href="{{ route('experiences.create') }}" class="p-3 bg-indigo-50 rounded-xl text-indigo-600 hover:bg-indigo-100 transition-colors text-sm font-medium text-center">
                                    + Experience
                                </a>

                                <a href="{{ route('testimonials.index') }}" class="p-3 bg-cyan-50 rounded-xl text-cyan-600 hover:bg-cyan-100 transition-colors text-sm font-medium text-center">
                                    Testimonials
                                </a>

                                <a href="{{ route('settings.edit') }}" class="p-3 bg-emerald-50 rounded-xl text-emerald-600 hover:bg-emerald-100 transition-colors text-sm font-medium text-center">
                                    Settings
                                </a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN - Recent Activities & Stats -->
                <div class="lg:col-span-2">
                    
                    <!-- Recent Projects -->
                    <div class="bg-white overflow-hidden shadow-lg rounded-2xl mb-8">
                        <div class="p-6 border-b border-gray-100">
                            <div class="flex justify-between items-center">
                                <h3 class="font-semibold text-gray-800">Recent Projects</h3>
                                <a href="#" class="text-sm text-blue-600 hover:text-blue-700 flex items-center">
                                    View All
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                @foreach($recentProjects as $project)
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center text-white font-bold">
                                            {{ Str::upper(substr($project->title,0,1)) }}{{ $loop->iteration }}
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-800">{{ $project->title }}</h4>
                                            <p class="text-sm text-gray-500">Last updated {{ $project->updated_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                    <span class="px-3 py-1 bg-green-100 text-green-600 text-xs rounded-full">Completed</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Recent Testimonials -->
                    <div class="bg-white overflow-hidden shadow-lg rounded-2xl">
                        <div class="p-6 border-b border-gray-100">
                            <div class="flex justify-between items-center">
                                <h3 class="font-semibold text-gray-800">Recent Testimonials</h3>
                                <a href="#" class="text-sm text-blue-600 hover:text-blue-700 flex items-center">
                                    View All
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                @foreach($testimonials as $testi)
                                <div class="flex items-start space-x-4 p-4 bg-gray-50 rounded-xl">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 rounded-full bg-blue-200 flex items-center justify-center text-blue-700 font-bold">
                                            {{ substr($testi->name, 0, 2) }}
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex text-yellow-400">
                                            @for($i = 1; $i <= 5; $i++)
                                                <svg class="w-4 h-4 {{ $i <= $testi->rating ? 'fill-current' : 'text-gray-300' }}" viewBox="0 0 20 20">
                                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                </svg>
                                            @endfor
                                        </div>
                                        <p class="text-sm text-gray-600 mt-1">{{ $testi->comment }}</p>
                                        <p class="text-xs text-gray-400 mt-1">- {{ $testi->name }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Activity Chart (Placeholder) -->
                    <div class="bg-white overflow-hidden shadow-lg rounded-2xl mt-8">
                        <div class="p-6">
                            <h3 class="font-semibold text-gray-800 mb-4">Weekly Activity</h3>
                            <div class="flex items-end justify-between h-32">
                                @foreach(['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'] as $day)
                                <div class="flex flex-col items-center">
                                    <div class="w-8 bg-blue-100 rounded-t-lg" style="height: {{ rand(20, 100) }}px">
                                        <div class="w-full bg-blue-600 rounded-t-lg" style="height: {{ rand(10, 80) }}%"></div>
                                    </div>
                                    <span class="text-xs text-gray-500 mt-2">{{ $day }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>