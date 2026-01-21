<?php
// Adopt a Taxpayer Page - TaxAid Africa
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt a Taxpayer - TaxAid Africa</title>
    <meta name="description" content="Join our Adopt a Taxpayer program and support financially vulnerable individuals and small businesses across Nigeria.">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2D8CD5',
                        'primary-dark': '#2470ab',
                        secondary: '#F2BC1C',
                        'secondary-dark': '#d9a617',
                        accent: '#E64249',
                        'accent-dark': '#c93238',
                        light: '#f4f7f6',
                        dark: '#333333',
                        muted: '#555555',
                    },
                    fontFamily: {
                        sans: ['DM Sans', 'sans-serif'],
                        hand: ['Architects Daughter', 'cursive'],
                    },
                }
            }
        }
    </script>
    
    <style>
        .backdrop-blur-custom { backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-in { animation: fadeInUp 0.8s ease forwards; }
        .animate-delay-100 { animation-delay: 100ms; }
        .animate-delay-200 { animation-delay: 200ms; }
        .animate-delay-300 { animation-delay: 300ms; }
    </style>
</head>
<body class="min-h-screen bg-light font-sans text-dark antialiased">
    
    <!-- HEADER -->
    <header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 shadow-lg" id="navbar">
        <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none transition-opacity duration-300 opacity-100" id="header-bg-container">
            <div id="header-slider" class="relative w-full h-full">
                <div class="absolute inset-0 transition-opacity duration-1000 opacity-100 header-slide-item" style="background: url('../assets/images/hero-slides/slide1.jpg') center top no-repeat; background-size: cover;"></div>
                <div class="absolute inset-0 transition-opacity duration-1000 opacity-0 header-slide-item" style="background: url('../assets/images/hero-slides/slide2.jpg') center top no-repeat; background-size: cover;"></div>
                <div class="absolute inset-0 transition-opacity duration-1000 opacity-0 header-slide-item" style="background: url('../assets/images/hero-slides/slide3.jpg') center top no-repeat; background-size: cover;"></div>
                <div class="absolute inset-0 transition-opacity duration-1000 opacity-0 header-slide-item" style="background: url('../assets/images/hero-slides/slide4.jpg') center top no-repeat; background-size: cover;"></div>
                <div class="absolute inset-0 transition-opacity duration-1000 opacity-0 header-slide-item" style="background: url('../assets/images/hero-slides/slide5.jpg') center top no-repeat; background-size: cover;"></div>
            </div>
            <div class="absolute inset-0 bg-gradient-to-br from-[#2D8CD5]/80 via-[#2D8CD5]/70 to-[#2470ab]/80 backdrop-blur-md"></div>
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 sm:h-18 lg:h-20">
                <a href="../index.html" class="flex-shrink-0 relative">
                    <img src="../assets/images/logo.png" alt="TaxAid Africa" class="h-8 sm:h-10 lg:h-12 w-auto transition-all duration-200">
                </a>
                <nav class="hidden lg:flex items-center gap-8">
                    <a href="resources.html" class="text-[18px] font-semibold text-white/90 hover:text-white transition-colors">Tax Information</a>
                    <a href="about.html" class="text-[18px] font-semibold text-white/90 hover:text-white transition-colors">About Us</a>
                    <a href="contact.html" class="text-[18px] font-semibold text-white/90 hover:text-white transition-colors">Contact</a>
                </nav>
                <div class="hidden lg:flex items-center gap-3">
                    <a href="donate.php" class="px-5 py-2.5 bg-primary hover:bg-primary-dark text-white text-sm font-bold rounded-full shadow-lg shadow-primary/20 hover:shadow-xl hover:shadow-primary/30 transition-all hover:-translate-y-0.5">Donate</a>
                </div>
            </div>
        </div>
    </header>
    
    <main class="pt-16 sm:pt-18 lg:pt-20">
        <section class="relative py-20 lg:py-28 bg-gradient-to-br from-primary via-primary to-primary-dark overflow-hidden">
            <div class="absolute inset-0 opacity-20" style="background-size: 60px 60px; background-image: linear-gradient(to right, rgba(255, 255, 255, 0.08) 1px, transparent 1px), linear-gradient(to bottom, rgba(255, 255, 255, 0.08) 1px, transparent 1px);"></div>
            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-6 animate-fade-in">Adopt a Taxpayer</h1>
                <p class="text-xl text-white/80 max-w-3xl mx-auto animate-fade-in animate-delay-100">Directly support the tax compliance of vulnerable Nigerians</p>
            </div>
        </section>

        <!-- Adoption Program Section -->
        <section class="py-16 sm:py-20 lg:py-24 bg-light">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-12 items-start">
                    <!-- Left: Information -->
                    <div class="space-y-8 animate-fade-in">
                        <div>
                            <h2 class="text-3xl font-bold text-dark mb-4">How it Works</h2>
                            <p class="text-muted leading-relaxed">
                                Our "Adopt a Taxpayer" program connects generous donors with individuals and small business owners who are struggling to meet their tax obligations. Your support covers their tax liabilities, filing fees, and provides them with essential tax education.
                            </p>
                        </div>
                        
                        <div class="grid sm:grid-cols-2 gap-6">
                            <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-100">
                                <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                </div>
                                <h3 class="font-bold text-dark mb-2">Individual Adoption</h3>
                                <p class="text-sm text-muted">Support artisans, petty traders, and low-income earners with their personal income tax.</p>
                            </div>
                            <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-100">
                                <div class="w-12 h-12 bg-secondary/10 rounded-xl flex items-center justify-center mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-secondary-dark"><rect width="16" height="20" x="4" y="2" rx="2" ry="2"></rect><path d="M9 22v-4h6v4"></path><path d="M8 6h.01"></path><path d="M16 6h.01"></path><path d="M12 6h.01"></path></svg>
                                </div>
                                <h3 class="font-bold text-dark mb-2">Corporate Adoption</h3>
                                <p class="text-sm text-muted">Empower small businesses (SMEs) to stay compliant and grow through professional tax support.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Form -->
                    <div class="bg-white rounded-3xl p-8 lg:p-10 shadow-xl border border-gray-100 animate-fade-in animate-delay-200">
                        <h3 class="text-2xl font-bold text-dark mb-6">Start Your Adoption Journey</h3>
                        <form action="../api/adopt_process.php" method="POST" class="space-y-6">
                            <div>
                                <label class="block text-sm font-semibold text-dark mb-2">I want to adopt a...</label>
                                <div class="grid grid-cols-2 gap-4">
                                    <label class="relative flex items-center justify-center p-4 border-2 border-gray-100 rounded-xl cursor-pointer hover:border-primary transition-all">
                                        <input type="radio" name="adoption_type" value="individual" required class="absolute opacity-0">
                                        <span class="font-bold text-dark">Individual</span>
                                    </label>
                                    <label class="relative flex items-center justify-center p-4 border-2 border-gray-100 rounded-xl cursor-pointer hover:border-primary transition-all">
                                        <input type="radio" name="adoption_type" value="corporate" required class="absolute opacity-0">
                                        <span class="font-bold text-dark">Corporate/SME</span>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="grid sm:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-2">Your Full Name</label>
                                    <input type="text" name="name" required class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-2">Email Address</label>
                                    <input type="email" name="email" required class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary">
                                </div>
                            </div>

                            <div class="grid sm:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-2">Country</label>
                                    <select id="country-select" name="country" required class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none bg-white focus:border-primary">
                                        <option value="Nigeria" selected>Nigeria</option>
                                        <option value="Other">Other Countries</option>
                                    </select>
                                </div>
                                <div id="state-container">
                                    <label class="block text-sm font-semibold text-dark mb-2">Preferred State (Optional)</label>
                                    <select name="preferred_state" class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none bg-white focus:border-primary">
                                        <option value="">Anywhere in Nigeria</option>
                                        <option value="Abia">Abia</option>
                                        <option value="Adamawa">Adamawa</option>
                                        <option value="Akwa Ibom">Akwa Ibom</option>
                                        <option value="Anambra">Anambra</option>
                                        <option value="Bauchi">Bauchi</option>
                                        <option value="Bayelsa">Bayelsa</option>
                                        <option value="Benue">Benue</option>
                                        <option value="Borno">Borno</option>
                                        <option value="Cross River">Cross River</option>
                                        <option value="Delta">Delta</option>
                                        <option value="Ebonyi">Ebonyi</option>
                                        <option value="Edo">Edo</option>
                                        <option value="Ekiti">Ekiti</option>
                                        <option value="Enugu">Enugu</option>
                                        <option value="FCT - Abuja">FCT - Abuja</option>
                                        <option value="Gombe">Gombe</option>
                                        <option value="Imo">Imo</option>
                                        <option value="Jigawa">Jigawa</option>
                                        <option value="Kaduna">Kaduna</option>
                                        <option value="Kano">Kano</option>
                                        <option value="Katsina">Katsina</option>
                                        <option value="Kebbi">Kebbi</option>
                                        <option value="Kogi">Kogi</option>
                                        <option value="Kwara">Kwara</option>
                                        <option value="Lagos">Lagos</option>
                                        <option value="Nasarawa">Nasarawa</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Ogun">Ogun</option>
                                        <option value="Ondo">Ondo</option>
                                        <option value="Osun">Osun</option>
                                        <option value="Oyo">Oyo</option>
                                        <option value="Plateau">Plateau</option>
                                        <option value="Rivers">Rivers</option>
                                        <option value="Sokoto">Sokoto</option>
                                        <option value="Taraba">Taraba</option>
                                        <option value="Yobe">Yobe</option>
                                        <option value="Zamfara">Zamfara</option>
                                    </select>
                                </div>
                                <div id="coming-soon-container" class="hidden">
                                    <label class="block text-sm font-semibold text-dark mb-2">Status</label>
                                    <div class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-muted italic">
                                        Coming Soon...
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-dark mb-2">Message or Special Instructions</label>
                                <textarea name="message" rows="3" class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary resize-none" placeholder="Tell us if you have any specific preferences..."></textarea>
                            </div>

                            <button type="submit" class="w-full py-4 bg-primary text-white font-bold rounded-xl shadow-lg hover:bg-primary-dark transition-all text-lg">
                                Submit Interest
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="py-16 sm:py-20 lg:py-24 bg-dark text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-10">
                <div class="lg:col-span-1">
                    <img src="../assets/images/logo.png" alt="TaxAid Africa" class="h-12 w-auto mb-6">
                    <p class="text-white/70 mb-6 leading-relaxed">
                        Making tax easier for everyone. We help individuals and small businesses navigate the Nigerian tax system with confidence.
                    </p>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="about.html" class="text-white/70 hover:text-white transition-colors">About Us</a></li>
                        <li><a href="volunteer.html" class="text-white/70 hover:text-white transition-colors">Volunteer</a></li>
                        <li><a href="gethelp.php" class="text-white/70 hover:text-white transition-colors">Get Help</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Header background slider logic
        const slides = document.querySelectorAll('.header-slide-item');
        let currentSlide = 0;
        setInterval(() => {
            slides[currentSlide].classList.replace('opacity-100', 'opacity-0');
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.replace('opacity-0', 'opacity-100');
        }, 5000);

        // Simple radio selection styling
        const radioInputs = document.querySelectorAll('input[name="adoption_type"]');
        radioInputs.forEach(radio => {
            radio.addEventListener('change', () => {
                radioInputs.forEach(r => r.parentElement.classList.remove('border-primary', 'bg-primary/5'));
                if (radio.checked) {
                    radio.parentElement.classList.add('border-primary', 'bg-primary/5');
                }
            });
        });

        // Country selection logic
        const countrySelect = document.getElementById('country-select');
        const stateContainer = document.getElementById('state-container');
        const comingSoonContainer = document.getElementById('coming-soon-container');

        countrySelect.addEventListener('change', (e) => {
            if (e.target.value === 'Nigeria') {
                stateContainer.classList.remove('hidden');
                comingSoonContainer.classList.add('hidden');
            } else {
                stateContainer.classList.add('hidden');
                comingSoonContainer.classList.remove('hidden');
            }
        });
    </script>
</body>
</html>