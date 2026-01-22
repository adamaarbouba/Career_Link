<?php
if (session_status() === PHP_SESSION_NONE) session_start();
// Pull errors as a simple list. We no longer use specific keys like 'email' or 'password'
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CareerLink - Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    :root {
      --color-bg-primary: #0f172a;
      --color-bg-secondary: #1e293b;
      --color-accent: #10b981;
      --color-text-primary: #f1f5f9;
      --color-border: #334155;
    }

    body {
      background: linear-gradient(135deg, #0f172a 0%, #1a2342 100%);
      color: var(--color-text-primary);
      font-family: system-ui, -apple-system, sans-serif;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .form-container {
      background: rgba(30, 41, 59, 0.7);
      border: 1px solid var(--color-border);
      border-radius: 0.75rem;
      backdrop-filter: blur(10px);
      padding: 2.5rem;
      box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.5);
    }

    .input-field {
      background-color: rgba(30, 41, 59, 0.6);
      border: 1px solid var(--color-border);
      border-radius: 0.5rem;
      padding: 0.75rem 1rem;
      color: var(--color-text-primary);
      width: 100%;
      transition: all 0.2s;
    }

    .input-field:focus {
      outline: none;
      border-color: var(--color-accent);
      background-color: rgba(30, 41, 59, 0.9);
    }

    .btn-primary {
      background-color: var(--color-accent);
      color: #0f172a;
      font-weight: 600;
      padding: 0.75rem 1.5rem;
      border-radius: 0.5rem;
      width: 100%;
      transition: transform 0.1s;
    }

    .btn-primary:active { transform: scale(0.98); }
  </style>
</head>

<body>

  <nav class="absolute top-0 left-0 w-full p-6">
    <a href="/" class="flex items-center gap-2 text-slate-300 hover:text-emerald-400 transition-colors w-fit">
      <span class="font-medium">← Back to Home</span>
    </a>
  </nav>

  <div class="flex-grow flex items-center justify-center px-4">
    <div class="w-full max-w-md">

      <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-slate-100">Welcome Back</h1>
        <p class="text-slate-400 text-sm mt-2">Sign in to Career<span class="text-emerald-400">Link</span></p>
      </div>

      <?php if (!empty($errors)): ?>
        <div class="bg-red-500/10 border border-red-500 text-red-200 px-4 py-3 rounded mb-6 text-sm text-center">
          <?php foreach ($errors as $error): ?>
            <p><?= htmlspecialchars($error) ?></p>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <form action="/Career_Link/login/post" method="POST" class="form-container space-y-6">

        <div>
          <label class="block text-sm font-medium text-slate-200 mb-2">Email Address</label>
          <input type="email" name="email"
            class="input-field"
            placeholder="you@example.com"
            value="<?= htmlspecialchars($old['email'] ?? '') ?>" required>
        </div>

        <div>
          <label class="block text-sm font-medium text-slate-200 mb-2">Password</label>
          <input type="password" name="password"
            class="input-field"
            placeholder="••••••••" required>
        </div>

        <div class="flex items-center justify-between text-sm">
          <label class="flex items-center space-x-2 cursor-pointer text-slate-300">
            <input type="checkbox" name="remember" class="accent-emerald-500">
            <span>Remember me</span>
          </label>
          <a href="#" class="text-emerald-400 hover:underline">Forgot password?</a>
        </div>

        <button type="submit" class="btn-primary shadow-lg shadow-emerald-500/20">Sign In</button>

        <div class="text-center mt-4">
          <span class="text-slate-400 text-sm">New here? </span>
          <a href="register" class="text-emerald-400 font-medium hover:underline">Create an Account</a>
        </div>
      </form>
    </div>
  </div>

  <?php 
  unset($_SESSION['errors']);
  unset($_SESSION['old']); 
  ?>
</body>
</html>