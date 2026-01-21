<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerLink - Find Your Future</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* 🎨 THEME CONFIGURATION (Copied from Login) */
        :root {
            --color-bg-primary: #0f172a;
            --color-bg-secondary: #1e293b;
            --color-accent: #10b981;
            --color-accent-dark: #059669;
            --color-text-primary: #f1f5f9;
            --color-text-secondary: #cbd5e1;
            --color-border: #334155;
        }

        body {
            background: linear-gradient(135deg, #0f172a 0%, #1a2342 100%);
            color: var(--color-text-primary);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* GLASSMORPHISM UTILITIES */
        .glass-panel {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.7) 0%, rgba(15, 23, 42, 0.6) 100%);
            border: 1px solid var(--color-border);
            backdrop-filter: blur(10px);
        }

        .nav-blur {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--color-border);
        }

        /* INPUTS & BUTTONS */
        .search-input {
            background-color: rgba(30, 41, 59, 0.6);
            border: 1px solid var(--color-border);
            color: var(--color-text-primary);
            transition: all 0.2s;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--color-accent);
            background-color: rgba(30, 41, 59, 0.9);
            box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.1);
        }

        .btn-primary {
            background-color: var(--color-accent);
            color: var(--color-bg-primary);
            transition: all 0.3s;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: var(--color-accent-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(16, 185, 129, 0.2);
        }

        .btn-outline {
            background: transparent;
            border: 1px solid var(--color-border);
            color: var(--color-text-secondary);
            transition: all 0.3s;
        }

        .btn-outline:hover {
            border-color: var(--color-accent);
            color: var(--color-text-primary);
            background: rgba(16, 185, 129, 0.05);
        }

        /* JOB CARDS */
        .job-card {
            transition: all 0.3s ease;
        }

        .job-card:hover {
            transform: translateY(-4px);
            border-color: var(--color-accent);
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.5);
        }

        .tag {
            background: rgba(16, 185, 129, 0.1);
            color: var(--color-accent);
            border: 1px solid rgba(16, 185, 129, 0.2);
        }
    </style>
</head>

<body class="flex flex-col">

    <nav class="nav-blur fixed w-full z-50 top-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded flex items-center justify-center shadow-lg">
                        <svg class="w-5 h-5 text-slate-950" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                        </svg>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-slate-100">Career<span class="text-emerald-400">Link</span></span>
                </div>

                <div class="flex items-center gap-4">
                    <a href="register" class="text-sm font-medium text-slate-300 hover:text-emerald-400 transition-colors">Sign In</a>
                    <a href="login" class="btn-primary px-4 py-2 rounded-md text-sm">Get Started</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow pt-24 pb-12 px-4 sm:px-6">
        <div class="max-w-4xl mx-auto text-center mt-12 mb-16">
            <span class="px-3 py-1 rounded-full bg-slate-800 border border-slate-700 text-emerald-400 text-xs font-semibold uppercase tracking-wider mb-6 inline-block">
                New Opportunities Added Daily
            </span>
            <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                Find the career <br />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-300">you deserve</span>
            </h1>
            <p class="text-slate-400 text-lg mb-10 max-w-2xl mx-auto">
                Connect with top tech companies and startups. Secure your future with our curated job listings and smart matching algorithm.
            </p>

            <div class="glass-panel p-2 rounded-xl flex flex-col sm:flex-row gap-2 max-w-2xl mx-auto shadow-2xl">
                <div class="flex-grow relative">
                    <svg class="w-5 h-5 absolute left-3 top-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" placeholder="Job title, keyword or company..." class="search-input w-full pl-10 pr-4 py-3 rounded-lg bg-transparent border-transparent focus:bg-slate-800 text-slate-200 placeholder-slate-500">
                </div>
                <button class="btn-primary px-8 py-3 rounded-lg flex items-center justify-center gap-2">
                    <span>Search</span>
                </button>
            </div>
        </div>

        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between items-end mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-slate-100">Latest Openings</h2>
                    <p class="text-slate-400 text-sm mt-1">Showing 3 of 42 available positions</p>
                </div>
                <a href="#" class="text-emerald-400 hover:text-emerald-300 text-sm font-medium flex items-center gap-1">
                    View all jobs <span>→</span>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="glass-panel p-6 rounded-xl job-card cursor-pointer group relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-4 opacity-50 group-hover:opacity-100 transition-opacity">
                        <svg class="w-6 h-6 text-slate-600 group-hover:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                        </svg>
                    </div>
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center p-2">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg" alt="Google" class="w-full">
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-slate-100 group-hover:text-emerald-400 transition-colors">Senior Backend Dev</h3>
                            <p class="text-slate-400 text-sm">Google Inc.</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="tag px-2.5 py-1 rounded text-xs font-medium">PHP 8</span>
                        <span class="tag px-2.5 py-1 rounded text-xs font-medium">Laravel</span>
                        <span class="tag px-2.5 py-1 rounded text-xs font-medium">Remote</span>
                    </div>
                    <div class="flex items-center justify-between mt-auto">
                        <span class="text-slate-400 text-sm flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Casablanca
                        </span>
                        <span class="text-slate-300 font-semibold">$3k - $5k</span>
                    </div>
                </div>

                <div class="glass-panel p-6 rounded-xl job-card cursor-pointer group relative">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center p-2">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg" alt="Microsoft" class="w-full">
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-slate-100 group-hover:text-emerald-400 transition-colors">Full Stack Engineer</h3>
                            <p class="text-slate-400 text-sm">Microsoft</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="tag px-2.5 py-1 rounded text-xs font-medium">React</span>
                        <span class="tag px-2.5 py-1 rounded text-xs font-medium">Node.js</span>
                    </div>
                    <div class="flex items-center justify-between mt-auto">
                        <span class="text-slate-400 text-sm flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Rabat
                        </span>
                        <span class="text-slate-300 font-semibold">$2.5k - $4k</span>
                    </div>
                </div>

                <div class="glass-panel p-6 rounded-xl job-card cursor-pointer group relative">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center p-2">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg" alt="Amazon" class="w-full">
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-slate-100 group-hover:text-emerald-400 transition-colors">DevOps Specialist</h3>
                            <p class="text-slate-400 text-sm">Amazon AWS</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="tag px-2.5 py-1 rounded text-xs font-medium">Docker</span>
                        <span class="tag px-2.5 py-1 rounded text-xs font-medium">Kubernetes</span>
                    </div>
                    <div class="flex items-center justify-between mt-auto">
                        <span class="text-slate-400 text-sm flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Tangier
                        </span>
                        <span class="text-slate-300 font-semibold">$3.5k - $6k</span>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <footer class="border-t border-slate-800 bg-slate-900/50 backdrop-blur-sm mt-auto">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-2">
                    <div class="w-6 h-6 bg-emerald-500 rounded flex items-center justify-center">
                        <svg class="w-4 h-4 text-slate-900" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                        </svg>
                    </div>
                    <span class="text-slate-200 font-bold">CareerLink</span>
                </div>
                <div class="flex gap-6 text-sm text-slate-400">
                    <a href="Privacy" class="hover:text-emerald-400 transition-colors">Privacy</a>
                    <a href="Terms" class="hover:text-emerald-400 transition-colors">Terms</a>
                    <a href="Contact" class="hover:text-emerald-400 transition-colors">Contact</a>
                </div>
                <p class="text-xs text-slate-600">© 2026 SecureCore Architecture. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>

</html>