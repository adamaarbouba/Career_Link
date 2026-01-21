<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CareerLink - Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* 🎨 THEME CONFIGURATION */
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
      display: flex;
      flex-direction: column;
    }

    /* GLASSMORPHISM */
    .form-container {
      background: linear-gradient(135deg, rgba(30, 41, 59, 0.7) 0%, rgba(15, 23, 42, 0.6) 100%);
      border: 1px solid var(--color-border);
      border-radius: 0.75rem;
      backdrop-filter: blur(10px);
      padding: 2.5rem;
      box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.5);
    }

    /* INPUTS */
    .input-field {
      background-color: rgba(30, 41, 59, 0.6);
      border: 1px solid var(--color-border);
      border-radius: 0.5rem;
      padding: 0.75rem 1rem;
      color: var(--color-text-primary);
      transition: all 0.2s;
    }

    .input-field:focus {
      outline: none;
      border-color: var(--color-accent);
      background-color: rgba(30, 41, 59, 0.9);
      box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.1);
    }

    .input-field::placeholder {
      color: var(--color-text-secondary);
      opacity: 0.7;
    }

    /* BUTTONS */
    .btn-primary {
      background-color: var(--color-accent);
      color: var(--color-bg-primary);
      border: none;
      border-radius: 0.5rem;
      padding: 0.75rem 1.5rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
    }

    .btn-primary:hover {
      background-color: var(--color-accent-dark);
      transform: translateY(-2px);
      box-shadow: 0 8px 16px rgba(16, 185, 129, 0.2);
    }

    /* ROLE SELECTOR */
    .role-option {
      padding: 1rem;
      border: 1px solid var(--color-border);
      border-radius: 0.5rem;
      background-color: rgba(30, 41, 59, 0.4);
      cursor: pointer;
      transition: all 0.2s;
    }

    .role-option:hover {
      border-color: var(--color-accent);
      background-color: rgba(30, 41, 59, 0.8);
    }

    .role-option input:checked+.role-label {
      color: var(--color-accent);
      font-weight: 600;
    }

    .role-option input:checked+.role-label+.role-desc {
      color: #a7f3d0;
    }

    /* Hide default radio but keep functionality */
    .role-radio {
      accent-color: var(--color-accent);
    }

    .divider {
      border-color: var(--color-border);
    }
  </style>
</head>

<body>

  <nav class="absolute top-0 left-0 w-full p-6 z-10">
    <a href="home" class="flex items-center gap-2 text-slate-300 hover:text-emerald-400 transition-colors w-fit">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
      </svg>
      <span class="font-medium">Back to Home</span>
    </a>
  </nav>

  <div class="flex-grow flex items-center justify-center px-4 py-20">
    <div class="w-full max-w-lg">

      <div class="text-center mb-8">
        <div class="flex items-center justify-center mb-4">
          <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-lg flex items-center justify-center shadow-lg">
            <svg class="w-7 h-7 text-slate-950" fill="currentColor" viewBox="0 0 20 20">
              <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
            </svg>
          </div>
        </div>
        <h1 class="text-3xl font-bold text-slate-100">Join CareerLink</h1>
        <p class="text-slate-400 text-sm mt-2">Start your journey today</p>
      </div>

      <form action="/Career_Link/register/post" method="POST" class="form-container space-y-5">

        <div>
          <label for="name" class="block text-sm font-medium text-slate-200 mb-2">Full Name</label>
          <input
            type="text"
            id="name"
            name="name"
            class="input-field w-full"
            placeholder="John Doe"
            required />
        </div>

        <div>
          <label for="email" class="block text-sm font-medium text-slate-200 mb-2">Email Address</label>
          <input
            type="email"
            id="email"
            name="email"
            class="input-field w-full"
            placeholder="you@example.com"
            required />
        </div>

        <div>
          <label class="block text-sm font-medium text-slate-200 mb-3">I want to...</label>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <label class="role-option flex flex-col gap-1 relative overflow-hidden group">
              <div class="flex items-center gap-2 mb-1">
                <input type="radio" name="role" value="candidate" class="role-radio w-4 h-4" checked required>
                <span class="role-label text-slate-200 font-medium group-hover:text-emerald-400">Find a Job</span>
              </div>
              <p class="role-desc text-xs text-slate-400 pl-6">I am a candidate looking for work.</p>
            </label>

            <label class="role-option flex flex-col gap-1 relative overflow-hidden group">
              <div class="flex items-center gap-2 mb-1">
                <input type="radio" name="role" value="recruiter" class="role-radio w-4 h-4" required>
                <span class="role-label text-slate-200 font-medium group-hover:text-emerald-400">Hire Talent</span>
              </div>
              <p class="role-desc text-xs text-slate-400 pl-6">I am a recruiter posting jobs.</p>
            </label>
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div>
            <label for="password" class="block text-sm font-medium text-slate-200 mb-2">Password</label>
            <input
              type="password"
              id="password"
              name="password"
              class="input-field w-full"
              placeholder="••••••••"
              required />
          </div>
          <div>
            <label for="confirm-password" class="block text-sm font-medium text-slate-200 mb-2">Confirm</label>
            <input
              type="password"
              id="confirm-password"
              name="confirm-password"
              class="input-field w-full"
              placeholder="••••••••"
              required />
          </div>
        </div>
        <p class="text-xs text-slate-500">
          Must contain 1 uppercase, 1 lowercase, 1 number, and be 8+ chars.
        </p>

        <button type="submit" class="btn-primary w-full py-3 text-base shadow-lg shadow-emerald-500/20 mt-4">
          Create Account
        </button>
      </form>

      <div class="relative my-6">
        <div class="absolute inset-0 flex items-center">
          <div class="w-full border-t divider"></div>
        </div>
        <div class="relative flex justify-center text-sm">
          <span class="px-2" style="background-color: var(--color-bg-primary);">
            <span class="text-slate-500 bg-[#16203c] px-2 py-1 rounded">Already have an account?</span>
          </span>
        </div>
      </div>

      <a
        href="login"
        class="block w-full text-center py-2.5 px-4 rounded-md border border-slate-600 text-slate-300 font-medium transition-all hover:bg-slate-800 hover:border-emerald-500 hover:text-emerald-400">
        Sign In Instead
      </a>

    </div>
  </div>

  <footer class="text-center py-8 border-t border-slate-800/50">
    <div class="flex justify-center gap-6 text-sm text-slate-500 mb-4">
      <a href="Privacy" class="hover:text-emerald-400 transition-colors">Privacy</a>
      <a href="Terms" class="hover:text-emerald-400 transition-colors">Terms</a>
      <a href="Contact" class="hover:text-emerald-400 transition-colors">Contact</a>
    </div>
    <p class="text-xs text-slate-600">© 2026 CareerLink. All rights reserved.</p>
  </footer>

</body>

</html>