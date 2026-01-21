<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Career - CareerLink</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root { --color-bg-primary: #0f172a; --color-accent: #10b981; }
        body { background: linear-gradient(135deg, #0f172a 0%, #1a2342 100%); color: #f1f5f9; min-height: 100vh; font-family: sans-serif; }
        .glass-card { background: rgba(30, 41, 59, 0.6); backdrop-filter: blur(8px); border: 1px solid #334155; transition: transform 0.2s; }
        .glass-card:hover { border-color: var(--color-accent); transform: translateY(-2px); }
    </style>
</head>
<body>
    
    <nav class="border-b border-slate-700 bg-slate-900/50 backdrop-blur-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-emerald-500 rounded flex items-center justify-center font-bold text-slate-900">CL</div>
                    <span class="font-bold">CareerLink</span>
                </div>
                <div class="flex items-center gap-4">
                    <a href="#" class="text-emerald-400 text-sm font-medium">Find Jobs</a>
                    <a href="#" class="text-slate-300 hover:text-white text-sm">My Applications</a>
                    <div class="h-8 w-8 rounded-full bg-gradient-to-tr from-emerald-500 to-blue-500"></div>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <div class="glass-card rounded-2xl p-8 mb-8 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 rounded-full bg-slate-700 border-2 border-emerald-500 overflow-hidden">
                    <img src="https://i.pravatar.cc/150?img=12" alt="Profile" class="w-full h-full object-cover">
                </div>
                <div>
                    <h1 class="text-2xl font-bold">Welcome back, Sarah!</h1>
                    <p class="text-slate-400">Full Stack Developer • Casablanca, MA</p>
                </div>
            </div>
            <div class="flex gap-3">
                <button class="bg-slate-700 hover:bg-slate-600 px-4 py-2 rounded-lg text-sm font-medium transition-colors">Edit Profile</button>
                <button class="bg-emerald-500 hover:bg-emerald-600 text-slate-900 px-4 py-2 rounded-lg text-sm font-bold transition-colors flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                    Update CV
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-6">
                <h2 class="text-xl font-bold flex items-center gap-2">
                    <span class="text-emerald-400">★</span> Recommended for you
                </h2>

                <div class="glass-card p-6 rounded-xl cursor-pointer">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex gap-4">
                            <div class="w-12 h-12 bg-white rounded-lg p-2"><img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg" class="w-full"></div>
                            <div>
                                <h3 class="font-bold text-lg">Senior PHP Developer</h3>
                                <p class="text-slate-400 text-sm">Google Inc. • Remote</p>
                            </div>
                        </div>
                        <span class="bg-slate-800 text-emerald-400 text-xs px-2 py-1 rounded border border-emerald-500/20">98% Match</span>
                    </div>
                    <div class="flex gap-2 mt-4">
                        <span class="text-xs bg-slate-800 text-slate-300 px-2 py-1 rounded">PHP 8</span>
                        <span class="text-xs bg-slate-800 text-slate-300 px-2 py-1 rounded">Laravel</span>
                    </div>
                </div>

                <div class="glass-card p-6 rounded-xl cursor-pointer">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex gap-4">
                            <div class="w-12 h-12 bg-white rounded-lg p-2"><img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg" class="w-full"></div>
                            <div>
                                <h3 class="font-bold text-lg">DevOps Engineer</h3>
                                <p class="text-slate-400 text-sm">Microsoft • Rabat</p>
                            </div>
                        </div>
                        <span class="bg-slate-800 text-emerald-400 text-xs px-2 py-1 rounded border border-emerald-500/20">85% Match</span>
                    </div>
                    <div class="flex gap-2 mt-4">
                        <span class="text-xs bg-slate-800 text-slate-300 px-2 py-1 rounded">Docker</span>
                        <span class="text-xs bg-slate-800 text-slate-300 px-2 py-1 rounded">Azure</span>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <h2 class="text-xl font-bold">Recent Activity</h2>
                <div class="glass-card p-4 rounded-xl">
                    <ul class="space-y-4">
                        <li class="flex items-center justify-between pb-4 border-b border-slate-700 last:border-0 last:pb-0">
                            <div>
                                <p class="font-semibold text-sm">UX Designer</p>
                                <p class="text-xs text-slate-500">Spotify</p>
                            </div>
                            <span class="text-xs bg-yellow-500/10 text-yellow-400 px-2 py-1 rounded">Pending</span>
                        </li>
                        <li class="flex items-center justify-between pb-4 border-b border-slate-700 last:border-0 last:pb-0">
                            <div>
                                <p class="font-semibold text-sm">Backend Lead</p>
                                <p class="text-xs text-slate-500">Amazon</p>
                            </div>
                            <span class="text-xs bg-red-500/10 text-red-400 px-2 py-1 rounded">Rejected</span>
                        </li>
                    </ul>
                    <button class="w-full mt-4 text-center text-sm text-emerald-400 hover:text-emerald-300">View All Applications</button>
                </div>
            </div>

        </div>
    </div>
</body>
</html>