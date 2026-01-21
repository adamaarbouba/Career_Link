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
      --color-text-primary: #f1f5f9;
      --color-border: #334155;
    }

    body {
      background: linear-gradient(135deg, #0f172a 0%, #1a2342 100%);
      color: var(--color-text-primary);
      font-family: system-ui, -apple-system, sans-serif;
      min-height: 100vh;
    }

    .form-container {
      background: rgba(30, 41, 59, 0.7);
      border: 1px solid var(--color-border);
      border-radius: 0.75rem;
      backdrop-filter: blur(10px);
      padding: 2rem;
    }

    .input-field {
      background-color: rgba(30, 41, 59, 0.6);
      border: 1px solid var(--color-border);
      border-radius: 0.5rem;
      padding: 0.75rem 1rem;
      color: var(--color-text-primary);
      width: 100%;
      margin-bottom: 1rem;
      transition: all 0.2s;
    }
    
    .input-field:focus {
      outline: none;
      border-color: var(--color-accent);
      background-color: rgba(30, 41, 59, 0.9);
    }

    .input-field:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        background-color: rgba(15, 23, 42, 0.5);
    }

    /* Custom Radio Styling */
    .role-option {
      padding: 1rem;
      border: 1px solid var(--color-border);
      border-radius: 0.5rem;
      background-color: rgba(30, 41, 59, 0.4);
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      transition: all 0.2s;
    }
    
    .role-option:hover {
        border-color: var(--color-accent);
    }

    /* Selected State */
    .role-option.selected {
      border-color: var(--color-accent);
      background-color: rgba(16, 185, 129, 0.1);
    }

    .btn-primary {
      background-color: var(--color-accent);
      color: #0f172a;
      font-weight: bold;
      padding: 0.75rem;
      border-radius: 0.5rem;
      width: 100%;
      transition: transform 0.1s;
    }
    
    .btn-primary:active {
        transform: scale(0.98);
    }

    /* Utility */
    .hidden { display: none !important; }
  </style>
</head>
<body class="flex items-center justify-center p-4">

  <div class="w-full max-w-lg">
    <h1 class="text-3xl font-bold text-center text-slate-100 mb-8">Join CareerLink</h1>

    <form action="Authregister" method="POST" enctype="multipart/form-data" class="form-container" id="registerForm">

      <label class="block text-sm font-medium text-slate-300 mb-3">I am a...</label>
      <div class="grid grid-cols-2 gap-3 mb-6">
        
        <label class="role-option" id="lbl-candidate">
          <input type="radio" name="role" value="candidate" class="accent-emerald-500 w-5 h-5" checked>
          <span class="text-slate-200 font-medium">Candidate</span>
        </label>

        <label class="role-option" id="lbl-recruiter">
          <input type="radio" name="role" value="recruiter" class="accent-emerald-500 w-5 h-5">
          <span class="text-slate-200 font-medium">Recruiter</span>
        </label>

      </div>

      <div class="mb-4">
        <label class="block text-sm text-slate-300 mb-1">Full Name</label>
        <input type="text" name="name" class="input-field" placeholder="John Doe" required>
      </div>

      <div class="mb-4">
        <label class="block text-sm text-slate-300 mb-1">Email Address</label>
        <input type="email" name="email" class="input-field" placeholder="you@example.com" required>
      </div>

      <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
          <label class="block text-sm text-slate-300 mb-1">Password</label>
          <input type="password" name="password" class="input-field" placeholder="••••••••" required>
        </div>
        <div>
          <label class="block text-sm text-slate-300 mb-1">Confirm</label>
          <input type="password" name="confirm_password" class="input-field" placeholder="••••••••" required>
        </div>
      </div>

      <div id="recruiter-extras" class="hidden border-t border-slate-600 pt-4 mt-4 transition-all duration-300">
        <p class="text-xs text-emerald-400 font-bold uppercase mb-4 tracking-wider">Company Details</p>
        
        <div class="mb-4">
          <label class="block text-sm text-slate-300 mb-1">Company Name</label>
          <input type="text" name="Company_name" class="input-field" placeholder="Tech Solutions Inc." required disabled>
        </div>

        <div class="mb-4">
          <label class="block text-sm text-slate-300 mb-1">Company Description</label>
          <textarea name="description" class="input-field h-24" placeholder="Tell us about your company..." required disabled></textarea>
        </div>

        <div class="mb-4">
          <label class="block text-sm text-slate-300 mb-1">Company Logo</label>
          <input type="file" name="Company_image" class="input-field p-2 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-500 file:text-slate-900 hover:file:bg-emerald-400" required disabled>
        </div>
      </div>

      <div id="candidate-extras" class="border-t border-slate-600 pt-4 mt-4 transition-all duration-300">
        <p class="text-xs text-emerald-400 font-bold uppercase mb-4 tracking-wider">Candidate Details</p>
        
        <div class="mb-4">
           <label class="block text-sm text-slate-300 mb-1">Upload Resume (CV)</label>
           <input type="file" name="cv" accept=".pdf,.doc,.docx" class="input-field p-2 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-500 file:text-slate-900 hover:file:bg-emerald-400">
           <p class="text-xs text-slate-400 mt-1">Accepts PDF, DOC, DOCX (Max 5MB)</p>
        </div>
      </div>

      <button type="submit" class="btn-primary mt-6 shadow-lg shadow-emerald-500/20">Create Account</button>
    </form>

    <p class="text-center text-slate-400 text-sm mt-6">
      Already have an account? <a href="login" class="text-emerald-400 hover:underline">Sign In</a>
    </p>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const radios = document.querySelectorAll('input[name="role"]');
        const recruiterExtras = document.getElementById('recruiter-extras');
        const candidateExtras = document.getElementById('candidate-extras'); // Changed from candidate-msg
        const lblCandidate = document.getElementById('lbl-candidate');
        const lblRecruiter = document.getElementById('lbl-recruiter');

        // Select inputs for each section
        const recruiterInputs = recruiterExtras.querySelectorAll('input, textarea, select');
        const candidateInputs = candidateExtras.querySelectorAll('input, textarea, select');

        function updateFormState() {
            const selectedRole = document.querySelector('input[name="role"]:checked').value;

            if (selectedRole === 'recruiter') {
                // --- Show Recruiter ---
                recruiterExtras.classList.remove('hidden');
                candidateExtras.classList.add('hidden');
                
                // Highlight
                lblRecruiter.classList.add('selected');
                lblCandidate.classList.remove('selected');

                // Toggle Inputs
                recruiterInputs.forEach(input => input.disabled = false);
                candidateInputs.forEach(input => input.disabled = true);

            } else {
                // --- Show Candidate ---
                recruiterExtras.classList.add('hidden');
                candidateExtras.classList.remove('hidden');

                // Highlight
                lblCandidate.classList.add('selected');
                lblRecruiter.classList.remove('selected');

                // Toggle Inputs
                recruiterInputs.forEach(input => input.disabled = true);
                candidateInputs.forEach(input => input.disabled = false);
            }
        }

        radios.forEach(radio => {
            radio.addEventListener('change', updateFormState);
        });

        updateFormState();
    });
  </script>
</body>
</html>