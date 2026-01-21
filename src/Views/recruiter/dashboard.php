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
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700">
                    <tr class="hover:bg-slate-800/30">
                        <td class="px-6 py-4">
                            <div class="font-bold text-white">Frontend Developer</div>
                            <div class="text-xs text-slate-500">Remote • Full Time</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex -space-x-2 overflow-hidden">
                                <img class="inline-block h-8 w-8 rounded-full ring-2 ring-slate-900" src="https://i.pravatar.cc/100?img=1" alt="" />
                                <div class="h-8 w-8 rounded-full bg-slate-700 flex items-center justify-center text-xs font-medium text-white ring-2 ring-slate-900">+12</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs font-semibold text-emerald-400 bg-emerald-400/10 rounded-full">Active</span>
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button class="text-slate-400 hover:text-white">Edit</button>
                            <button class="text-red-400 hover:text-red-300">Archive</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <div id="jobModal" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/80 backdrop-blur-sm hidden opacity-0 transition-opacity duration-300">

        <div class="w-full max-w-2xl transform scale-95 transition-transform duration-300" id="modalContent">

            <div class="glass-panel rounded-xl shadow-2xl overflow-hidden">
                <div class="flex items-center justify-between px-8 py-6 border-b border-slate-700">
                    <h2 class="text-2xl font-bold text-slate-100">Post a New Job</h2>
                    <button id="closeModalBtn" class="text-slate-400 hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <form id="createJobForm" action="saveJob" method="POST" class="p-8 max-h-[80vh] overflow-y-auto modal-scroll">

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-slate-300 mb-2">Job Title</label>
                        <input type="text" name="title" class="input-field w-full rounded-lg px-4 py-3" placeholder="e.g. Senior PHP Developer" required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">Category</label>
                            <div class="relative">
                                <select name="category_id" class="input-field w-full rounded-lg px-4 py-3 appearance-none cursor-pointer" required>
                                    <option value="" disabled selected>Select Category</option>
                                    <?php if (isset($categories)): foreach ($categories as $category): ?>
                                            <option value="<?= $category['id'] ?>"><?= htmlspecialchars($category['name']) ?></option>
                                    <?php endforeach; endif; ?>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">Salary (Monthly)</label>
                            <div class="relative">
                                <span class="absolute left-4 top-3.5 text-slate-500">$</span>
                                <input type="number" name="salary" class="input-field w-full rounded-lg pl-8 pr-4 py-3" placeholder="e.g. 4000" step="0.01" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-slate-300 mb-2">Required Skills (Tags)</label>
                        <div class="border border-slate-700 rounded-lg p-3 bg-slate-900/30 max-h-32 overflow-y-auto modal-scroll">
                            <div class="grid grid-cols-2 gap-2">
                                <?php if (isset($tags)): foreach ($tags as $tag): ?>
                                    <label class="flex items-center space-x-3 cursor-pointer group">
                                        <input type="checkbox" name="tags[]" value="<?= $tag['id'] ?>" class="tag-checkbox accent-emerald-500 w-4 h-4 rounded border-slate-600 focus:ring-emerald-500 focus:ring-offset-0">
                                        <div class="text-sm text-slate-300 group-hover:text-emerald-400 transition-colors">
                                            <?= htmlspecialchars($tag['name']) ?>
                                        </div>
                                    </label>
                                <?php endforeach; else: ?>
                                    <p class="text-sm text-slate-500">No tags available.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <p class="text-xs text-slate-500 mt-1">Select all that apply.</p>
                    </div>

                    <div class="mb-8">
                        <label class="block text-sm font-medium text-slate-300 mb-2">Job Description</label>
                        <textarea name="description" class="input-field w-full rounded-lg px-4 py-3 h-40 resize-none" placeholder="Describe the responsibilities..." required></textarea>
                    </div>

                    <div class="flex gap-4">
                        <button type="button" id="cancelBtn" class="w-1/3 bg-slate-700 hover:bg-slate-600 text-slate-200 font-bold py-3.5 rounded-lg transition-all">Cancel</button>
                        <button type="submit" class="w-2/3 bg-emerald-500 hover:bg-emerald-600 text-slate-900 font-bold py-3.5 rounded-lg transition-all shadow-lg shadow-emerald-500/20">Publish Offer</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('jobModal');
        const modalContent = document.getElementById('modalContent');
        const openBtn = document.getElementById('openModalBtn');
        const closeBtn = document.getElementById('closeModalBtn');
        const cancelBtn = document.getElementById('cancelBtn');
        const jobForm = document.getElementById('createJobForm');

        function openModal() {
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modalContent.classList.remove('scale-95');
                modalContent.classList.add('scale-100');
            }, 10);
        }

        function closeModal() {
            modal.classList.add('opacity-0');
            modalContent.classList.add('scale-95');
            modalContent.classList.remove('scale-100');

            setTimeout(() => {
                modal.classList.add('hidden');
                jobForm.reset();
            }, 300);
        }

        openBtn.addEventListener('click', openModal);
        closeBtn.addEventListener('click', closeModal);
        cancelBtn.addEventListener('click', closeModal);

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal();
            }
        });
    </script>
</body>

</html>