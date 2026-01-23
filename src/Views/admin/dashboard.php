<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - CareerLink</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Reuse your Theme Variables */
        :root { --color-bg-primary: #0f172a; --color-accent: #10b981; --color-text-primary: #f1f5f9; --color-border: #334155; }
        body { background-color: var(--color-bg-primary); color: var(--color-text-primary); font-family: sans-serif; }
        .glass-panel { background: rgba(30, 41, 59, 0.7); backdrop-filter: blur(10px); border: 1px solid var(--color-border); }
        .sidebar-link:hover { background: rgba(16, 185, 129, 0.1); color: var(--color-accent); border-right: 3px solid var(--color-accent); }
    </style>
</head>
<body class="flex h-screen overflow-hidden">

    <aside class="w-64 bg-slate-900 border-r border-slate-800 hidden md:flex flex-col">
        <div class="p-6 flex items-center gap-2">
            <div class="w-8 h-8 bg-emerald-500 rounded flex items-center justify-center font-bold text-slate-900">CL</div>
            <span class="text-xl font-bold tracking-tight">Career<span class="text-emerald-400">Link</span></span>
        </div>

        <nav class="flex-1 px-4 space-y-2 mt-4">
            <a href="#" class="sidebar-link flex items-center gap-3 px-4 py-3 text-slate-300 rounded-lg transition-all bg-slate-800/50 text-emerald-400 border-r-2 border-emerald-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                Dashboard
            </a>
            <a href="#" class="sidebar-link flex items-center gap-3 px-4 py-3 text-slate-400 rounded-lg transition-all hover:bg-slate-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                Tags & Categories
            </a>
            <a href="#" class="sidebar-link flex items-center gap-3 px-4 py-3 text-slate-400 rounded-lg transition-all hover:bg-slate-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                Users Management
            </a>
        </nav>

        <div class="p-4 border-t border-slate-800">
            <a href="logout.php" class="flex items-center gap-2 text-slate-400 hover:text-red-400 transition-colors px-4">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Sign Out
            </a>
        </div>
    </aside>

    <main class="flex-1 overflow-y-auto p-8 relative">
        <header class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-white">Admin Overview</h1>
                <p class="text-slate-400 text-sm">Welcome back, Admin.</p>
            </div>
            <button class="bg-slate-800 p-2 rounded-full text-slate-300 hover:text-white relative">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                <span class="absolute top-0 right-0 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-slate-900"></span>
            </button>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="glass-panel p-6 rounded-xl">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-slate-400 text-sm">Total Active Jobs</p>
                        <h3 class="text-3xl font-bold text-white mt-1"><?= htmlspecialchars($totalOffers) ?></h3>
                    </div>
                    <span class="p-2 bg-emerald-500/10 text-emerald-400 rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </span>
                </div>
            </div>
            <div class="glass-panel p-6 rounded-xl">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-slate-400 text-sm">Active Recruiters</p>
                        <h3 class="text-3xl font-bold text-white mt-1">86</h3>
                    </div>
                    <span class="p-2 bg-blue-500/10 text-blue-400 rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </span>
                </div>
            </div>
            <div class="glass-panel p-6 rounded-xl">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-slate-400 text-sm">Candidates</p>
                        <h3 class="text-3xl font-bold text-white mt-1">3,592</h3>
                    </div>
                    <span class="p-2 bg-purple-500/10 text-purple-400 rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </span>
                </div>
            </div>
        </div>

        <div class="glass-panel rounded-xl overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-700 flex justify-between items-center">
                <h3 class="font-bold text-lg">Job Moderation (Soft Delete)</h3>
                <input type="text" placeholder="Search jobs..." class="bg-slate-800 border-none rounded-lg px-4 py-2 text-sm focus:ring-1 focus:ring-emerald-500 text-white">
            </div>
            <table class="w-full text-left text-slate-300">
                <thead class="bg-slate-800/50 text-slate-400 text-xs uppercase">
                    <tr>
                        <th class="px-6 py-3">Position</th>
                        <th class="px-6 py-3">Company</th>
                        <th class="px-6 py-3">Posted</th>
                        <th class="px-6 py-3 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700">
                    <tr class="hover:bg-slate-800/30 transition-colors">
                        <td class="px-6 py-4 font-medium text-white">Senior Backend Developer</td>
                        <td class="px-6 py-4">TechSolutions Inc.</td>
                        <td class="px-6 py-4">2 hours ago</td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-slate-400 hover:text-red-400 transition-colors" title="Archive Job">
                                <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>