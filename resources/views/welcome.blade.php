<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio Profesional - {{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-bg { 
            background: linear-gradient(135deg, #f0f5ff 0%, #e6edf7 100%); 
        }
        
        /* Animasi dasar */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        @keyframes pulse-glow {
            0%, 100% { opacity: 0.6; }
            50% { opacity: 1; }
        }
        
        @keyframes slide-in-left {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes slide-in-right {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes scale-in {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        /* Kelas animasi */
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        
        .animate-pulse-glow {
            animation: pulse-glow 2s ease-in-out infinite;
        }
        
        .animate-slide-left {
            animation: slide-in-left 0.8s ease-out forwards;
        }
        
        .animate-slide-right {
            animation: slide-in-right 0.8s ease-out forwards;
        }
        
        .animate-scale {
            animation: scale-in 0.6s ease-out forwards;
        }
        
        /* Hover effects */
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(37, 99, 235, 0.2),
                        0 10px 10px -5px rgba(37, 99, 235, 0.1);
        }
        
        .hover-glow {
            transition: box-shadow 0.3s ease;
        }
        
        .hover-glow:hover {
            box-shadow: 0 0 20px rgba(37, 99, 235, 0.3);
        }
        
        /* Delay animasi */
        .delay-1 { animation-delay: 0.2s; opacity: 0; animation-fill-mode: forwards; }
        .delay-2 { animation-delay: 0.4s; opacity: 0; animation-fill-mode: forwards; }
        .delay-3 { animation-delay: 0.6s; opacity: 0; animation-fill-mode: forwards; }
        
        /* Scroll reveal */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }
        
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body class="gradient-bg text-gray-800 overflow-x-hidden">

<!-- ================= DECORATIVE ELEMENTS ================= -->
<div class="fixed inset-0 pointer-events-none overflow-hidden">
    <div class="absolute top-20 left-10 w-64 h-64 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float"></div>
    <div class="absolute bottom-20 right-10 w-80 h-80 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float" style="animation-delay: 2s;"></div>
</div>

<!-- ================= NAVBAR ================= -->
<nav class="p-6 flex justify-between items-center bg-white/80 backdrop-blur-md shadow-sm sticky top-0 z-50 border-b border-blue-100 transform transition-all duration-300 hover:bg-white/90">
    <h1 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-blue-700 bg-clip-text text-transparent hover:scale-105 transition-transform duration-300">
        MyPortfolio.
    </h1>
    <div class="space-x-6">
        <a href="#projects" class="text-gray-600 hover:text-blue-600 font-medium relative group">
            Project
            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
        </a>
        <a href="#experience" class="text-gray-600 hover:text-blue-600 font-medium relative group">
            Track Record
            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
        </a>
        @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-blue-500 hover:text-blue-700 underline transition-all duration-300 hover:scale-105 inline-block">
                My Dashboard 
            </a>
        @endauth
    </div>
</nav>

<!-- ================= HEADER ================= -->
<header class="py-20 px-10 text-center relative overflow-hidden">

    <div class="relative z-10">

        @php
            $owner = \App\Models\User::first();
        @endphp

        <!-- FOTO PROFIL dengan animasi -->
        <div class="w-32 h-32 mx-auto mb-6 rounded-full bg-gradient-to-r from-blue-500 to-blue-600 p-1 shadow-lg animate-scale hover-lift cursor-pointer">
            <div class="w-full h-full rounded-full overflow-hidden bg-white">
                @if($owner && $owner->photo)
                    <img src="{{ asset('storage/' . $owner->photo) }}"
                         class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                @else
                    <img src="https://ui-avatars.com/api/?name=Elvi+Novika+Rahma&background=3B82F6&color=fff&size=256"
                         class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                @endif
            </div>
        </div>

        <h2 class="text-4xl md:text-6xl font-extrabold mb-4 bg-gradient-to-r from-blue-700 to-blue-500 bg-clip-text text-transparent animate-slide-left">
            Hi..., I'm {{ $settings['name'] ?? 'Your Name' }}
        </h2>

        <p class="text-xl text-blue-600/70 max-w-2xl mx-auto font-light animate-slide-right delay-1">
            {{ $settings['bio'] ?? '' }}. {{ $settings['job_title'] ?? '' }}.
        </p>
        
        <!-- Decorative line -->
        <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-blue-700 mx-auto mt-8 rounded-full animate-pulse-glow"></div>
    </div>
</header>

<!-- ================= PROJECT ================= -->
<section id="projects" class="py-20 bg-white/50">
    <div class="max-w-6xl mx-auto px-6">
        <h3 class="text-3xl font-bold mb-10 border-l-8 border-blue-500 pl-4 text-blue-700 transform transition-all duration-500 hover:translate-x-2">
            Proker record ✦
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($projects as $index => $project)
            <div class="bg-white rounded-2xl overflow-hidden shadow-md hover-lift border border-blue-100 group animate-scale" style="animation-delay: {{ $index * 0.1 }}s">
                <div class="overflow-hidden">
                    <img src="{{ asset('storage/' . $project->image) }}"
                         class="w-full h-48 object-cover transition-transform duration-700 group-hover:scale-110">
                </div>
                <div class="p-6">
                    <h4 class="font-bold text-xl mb-2 text-blue-700 group-hover:text-blue-800 transition-colors duration-300">
                        {{ $project->title }}
                    </h4>
                    <p class="text-gray-600 text-sm mb-4">
                        {{ \Illuminate\Support\Str::limit($project->description,100) }}
                    </p>
                    <div class="w-0 h-0.5 bg-blue-500 transition-all duration-300 group-hover:w-full"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ================= EXPERIENCE ================= -->
<section id="experience" class="py-20 bg-gradient-to-b from-blue-50 to-white">
    <div class="max-w-4xl mx-auto px-6">
        <h3 class="text-3xl font-bold mb-10 text-center text-blue-700 animate-pulse-glow">
            History Job Duties ⚡
        </h3>

        @foreach($experiences as $index => $exp)
        <div class="bg-white p-8 rounded-2xl shadow-md hover-lift border-l-4 border-blue-500 mb-6 transform transition-all duration-500 hover:scale-[1.02] hover:shadow-xl animate-slide-right" style="animation-delay: {{ $index * 0.15 }}s">
            <h4 class="text-xl font-bold text-blue-700 flex items-center">
                <span class="w-2 h-2 bg-blue-500 rounded-full mr-3 animate-pulse-glow"></span>
                {{ $exp->position }}
            </h4>
            <p class="text-blue-500 font-medium ml-5">
                {{ $exp->company_name }}
            </p>
            <p class="text-gray-600 mt-3 ml-5 italic relative">
                <span class="text-4xl text-blue-200 absolute -left-2 -top-4">"</span>
                {{ $exp->task_description }}
                <span class="text-4xl text-blue-200 absolute -right-2 -bottom-8">"</span>
            </p>
        </div>
        @endforeach
    </div>
</section>

<!-- ================= TESTIMONIAL ================= -->
<section id="testimonials" class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h3 class="text-3xl font-bold mb-12 text-blue-700 relative inline-block">
            What They Say ⚡
            <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 w-12 h-1 bg-blue-500 rounded-full animate-pulse-glow"></div>
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($testimonials as $index => $testi)
            <div class="p-8 bg-blue-50 rounded-2xl border border-blue-100 hover-lift group animate-scale" style="animation-delay: {{ $index * 0.1 }}s">
                <div class="relative">
                    <span class="text-6xl text-blue-200 absolute -top-4 left-0 opacity-50 group-hover:opacity-100 transition-opacity duration-300">"</span>
                    <p class="text-gray-600 mb-6 relative z-10">
                        {{ $testi->content }}
                    </p>
                </div>

                <div class="flex items-center justify-center gap-3 transform transition-transform duration-300 group-hover:scale-105">
                    @if($testi->avatar)
                        <img src="{{ asset('storage/' . $testi->avatar) }}"
                             class="w-12 h-12 rounded-full border-2 border-blue-500 transition-transform duration-300 hover:rotate-12">
                    @else
                        <div class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-200 to-blue-300 flex items-center justify-center border-2 border-blue-500 transition-transform duration-300 hover:rotate-12">
                            <span class="text-blue-700 font-bold">
                                {{ substr($testi->name,0,1) }}
                            </span>
                        </div>
                    @endif
                    <div class="text-left">
                        <h5 class="font-bold text-blue-700">
                            {{ $testi->name }}
                        </h5>
                        <small class="text-blue-500">
                            {{ $testi->position }}
                        </small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-12 bg-blue-50">
    <div class="max-w-3xl mx-auto px-6">
        <h3 class="text-2xl font-bold text-blue-700 mb-6 text-center ">Send Recommendation ⚡</h3>
        <form action="{{ route('testimonials.store') }}" method="POST" class="bg-white p-8 rounded-2xl shadow-sm">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 text-blue-600">
                <input type="text" name="name" placeholder="Your Name" class="rounded-lg border-blue-200 focus:ring-blue-600" required>
                <select name="rating" class="rounded-lg border-blue-200 focus:ring-blue-600 text-blue-600">
                    <option value="5">⭐⭐⭐⭐⭐ (Perfect)</option>
                    <option value="4">⭐⭐⭐⭐ (Good)</option>
                    <option value="3">⭐⭐⭐ (Average)</option>
                    <option value="2">⭐⭐ (Below Average)</option>
                    <option value="1">⭐ (Poor)</option>
                </select>
            </div>
            <textarea name="comment" rows="4" placeholder="Write your testimonial or message..." class="w-full rounded-lg border-blue-200 focus:ring-blue-600 mb-4" required></textarea>
            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-bold hover:bg-blue-700 transition ">
                Send Testimonial
            </button>
        </form>
    </div>
</section>

<!-- ================= FOOTER ================= -->
<footer class="py-10 text-center bg-gradient-to-r from-blue-600 to-blue-700 text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-1/4 w-20 h-20 bg-white rounded-full animate-float"></div>
        <div class="absolute bottom-0 right-1/4 w-32 h-32 bg-white rounded-full animate-float" style="animation-delay: 1s;"></div>
    </div>
    <p class="relative z-10 animate-pulse-glow">My Portfolio ⚡</p>
    <p class="text-sm text-blue-100 mt-2 relative z-10">Professional Portfolio</p>
</footer>

<!-- ================= LOGIN FLOAT BUTTON ================= -->
@if (Route::has('login'))
<div class="fixed bottom-4 right-4 text-xs bg-white/80 backdrop-blur-md px-4 py-2 rounded-full shadow-lg border border-blue-200 hover:scale-110 hover:shadow-xl transition-all duration-300 z-50">
    @auth
        <a href="{{ url('/dashboard') }}" class="text-gray-500 hover:text-blue-600 font-medium flex items-center gap-1">
            <span>⚡</span>My Dashboard 
        </a>
    @else
        <a href="{{ route('login') }}" class="text-gray-500 hover:text-blue-600 font-medium flex items-center gap-1">
            <span>🔐</span> Login
        </a>
    @endauth
</div>
@endif

<!-- ================= SCROLL REVEAL SCRIPT ================= -->
<script>
    // Scroll reveal animation
    function reveal() {
        var reveals = document.querySelectorAll('.reveal');
        
        for (var i = 0; i < reveals.length; i++) {
            var windowHeight = window.innerHeight;
            var elementTop = reveals[i].getBoundingClientRect().top;
            var elementVisible = 150;
            
            if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add('active');
            }
        }
    }
    
    window.addEventListener('scroll', reveal);
    
    // Add reveal class to sections
    document.querySelectorAll('section').forEach(section => {
        section.classList.add('reveal');
    });
    
    // Trigger reveal on load
    window.addEventListener('load', reveal);
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
    
    // Parallax effect for header
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const header = document.querySelector('header');
        if (header) {
            header.style.transform = `translateY(${scrolled * 0.5}px)`;
        }
    });
</script>

</body>
</html>