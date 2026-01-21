<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruiter Dashboard - CareerLink</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --color-bg-primary: #0f172a;
            --color-accent: #10b981;
            --color-text-primary: #f1f5f9;
            --color-border: #334155;
        }

        body {
            background-color: var(--color-bg-primary);
            color: var(--color-text-primary);
            font-family: sans-serif;
        }

        .glass-panel {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid var(--color-border);
        }

        .btn-primary {
            background-color: var(--color-accent);
            color: #0f172a;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            transition: all 0.2s;
        }

        .btn-primary:hover {
            background-color: #059669;
        }

        /* Input Styles */
        .input-field {
            background-color: rgba(30, 41, 59, 0.6);
            border: 1px solid var(--color-border);
            color: var(--color-text-primary);
            transition: all 0.2s;
        }

        .input-field:focus {
            outline: none;
            border-color: var(--color-accent);
            background-color: rgba(30, 41, 59, 0.9);
        }

        /* Scrollbar */
        .modal-scroll::-webkit-scrollbar { width: 8px; }
        .modal-scroll::-webkit-scrollbar-track { background: rgba(30, 41, 59, 0.5); }
        .modal-scroll::-webkit-scrollbar-thumb { background: var(--color-border); border-radius: 4px; }
        
        /* Custom Checkbox Container */
        .tag-checkbox:checked + div {
            border-color: var(--color-accent);
            background-color: rgba(16, 185, 129, 0.1);
        }
    </style>
</head>

<body class="flex h-screen overflow-hidden bg-gradient-to-br from-slate-900 to-slate-800">

    <aside class="w-64 bg-slate-900 border-r border-slate-800 hidden md:flex flex-col">
        <div class="p-6">
            <span class="text-xl font-bold tracking-tight text-white">Career<span class="text-emerald-400">Link</span></span>
            <p class="text-xs text-slate-500 mt-1 uppercase tracking-wider">Recruiter Portal</p>
        </div>
        <nav class="flex-1 px-4 space-y-2 mt-4">
            <a href="#" class="flex items-center gap-3 px-4 py-3 bg-emerald-500/10 text-emerald-400 rounded-lg border-l-4 border-emerald-500">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                My Jobs
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white hover:bg-slate-800 rounded-lg transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                Applications
            </a>
        </nav>
        <div class="p-4"><a href="logout.php" class="text-slate-400 hover:text-white text-sm">Sign Out</a></div>
    </aside>

    <main class="flex-1 overflow-y-auto p-8 relative z-0">
        <header class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold">Manage Offers</h1>

            <button id="openModalBtn" class="btn-primary flex items-center gap-2 shadow-lg shadow-emerald-500/20">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Post New Job
            </button>
        </header>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                <div class="glass-panel p-4 rounded-lg">
                    <p class="text-slate-400 text-xs uppercase">Active Jobs</p>
                    <p class="text-2xl font-bold text-emerald-400">12</p>
                </div>
                <div class="glass-panel p-4 rounded-lg">
                    <p class="text-slate-400 text-xs uppercase">Total Applicants</p>
                    <p class="text-2xl font-bold text-white">48</p>
                </div>
            </div>

            <div class="glass-panel rounded-xl overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-slate-800/50 text-slate-400 text-xs uppercase">
                        <tr>
                            <th class="px-6 py-4">Job Title</th>
                            <th class="px-6 py-4">Applications</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700">
                        <?php foreach ($offers as $offer): ?>
                        <tr>
                            <td class="px-6 py-4">
                                <div class="font-medium text-white"><?= htmlspecialchars($offer->title) ?></div>
                                <div class="text-slate-500 text-sm"><?= htmlspecialchars(substr($offer->description, 0, 50)) ?>...</div>
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <button class="text-slate-400 hover:text-white">Edit</button>
                                <button class="text-red-400 hover:text-red-300">Archive</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </body>
    </html>