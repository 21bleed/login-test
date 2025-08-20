<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Welcome Back</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --background: #ffffff;
            --foreground: #475569;
            --card: #f1f5f9;
            --card-foreground: #475569;
            --primary: #059669;
            --primary-foreground: #ffffff;
            --secondary: #f1f5f9;
            --muted: #f0fdf4;
            --muted-foreground: #374151;
            --accent: #10b981;
            --border: #e5e7eb;
            --input: #ffffff;
            --ring: #059669;
            --radius: 0.5rem;
        }
        
        .font-heading {
            font-family: 'Work Sans', sans-serif;
        }
        
        .font-body {
            font-family: 'Open Sans', sans-serif;
        }
        
        .login-container {
            background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 100%);
            min-height: 100vh;
        }
        
        .login-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        .input-field {
            background: var(--input);
            border: 1px solid var(--border);
            border-radius: calc(var(--radius) - 2px);
            transition: all 0.2s ease-in-out;
        }
        
        .input-field:focus {
            outline: none;
            border-color: var(--ring);
            box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.1);
        }
        
        .btn-primary {
            background: var(--primary);
            color: var(--primary-foreground);
            border-radius: calc(var(--radius) - 2px);
            transition: all 0.2s ease-in-out;
        }
        
        .btn-primary:hover {
            background: #047857;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(5, 150, 105, 0.3);
        }
        
        .link-accent {
            color: var(--accent);
            transition: color 0.2s ease-in-out;
        }
        
        .link-accent:hover {
            color: var(--primary);
            text-decoration: underline;
        }
        
        .floating-label {
            transition: all 0.2s ease-in-out;
        }
        
        .input-field:focus + .floating-label,
        .input-field:not(:placeholder-shown) + .floating-label {
            transform: translateY(-1.5rem) scale(0.875);
            color: var(--primary);
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
        
        .security-icon {
            background: linear-gradient(135deg, var(--accent), var(--primary));
            border-radius: 50%;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body class="font-body login-container">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="w-full max-w-md">
            <!-- Logo/Brand Area -->
            <div class="text-center mb-8 animate-fade-in-up">
                <div class="security-icon inline-flex items-center justify-center w-16 h-16 mx-auto">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h1 class="font-heading text-3xl font-bold text-gray-900 mt-4">Welcome Back</h1>
                <p class="text-gray-600 mt-2">Sign in to your account to continue</p>
            </div>

            <!-- Login Form Card -->
            <div class="login-card p-8 animate-fade-in-up" style="animation-delay: 0.2s;">
                <form action="evaluate.php" method="post" class="space-y-6">
                    <!-- Username Field -->
                    <div class="relative">
                        <input 
                            type="text" 
                            name="username" 
                            id="username"
                            required 
                            placeholder=" "
                            class="input-field w-full px-4 py-3 text-gray-900 placeholder-transparent peer"
                        >
                        <label 
                            for="username" 
                            class="floating-label absolute left-4 top-3 text-gray-500 pointer-events-none peer-placeholder-shown:top-3 peer-placeholder-shown:text-base peer-focus:top-0 peer-focus:text-sm peer-focus:text-primary"
                        >
                            Username
                        </label>
                    </div>

                    <!-- Password Field -->
                    <div class="relative">
                        <input 
                            type="password" 
                            name="password" 
                            id="password"
                            required 
                            placeholder=" "
                            class="input-field w-full px-4 py-3 text-gray-900 placeholder-transparent peer"
                        >
                        <label 
                            for="password" 
                            class="floating-label absolute left-4 top-3 text-gray-500 pointer-events-none peer-placeholder-shown:top-3 peer-placeholder-shown:text-base peer-focus:top-0 peer-focus:text-sm peer-focus:text-primary"
                        >
                            Password
                        </label>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center">
                            <input type="checkbox" class="w-4 h-4 text-primary border-gray-300 rounded focus:ring-primary focus:ring-2">
                            <span class="ml-2 text-gray-600">Remember me</span>
                        </label>
                        <a href="#" class="link-accent font-medium">Forgot password?</a>
                    </div>

                    <!-- Login Button -->
                    <button 
                        type="submit" 
                        class="btn-primary w-full py-3 px-4 font-semibold text-white font-heading"
                    >
                        Sign In
                    </button>
                </form>

                <!-- Divider -->
                <div class="mt-6 relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-gray-50 text-gray-500">New to our platform?</span>
                    </div>
                </div>

                <!-- Register Link -->
                <div class="mt-6 text-center">
                    <p class="text-gray-600">
                        Don't have an account? 
                        <a href="register.php" class="link-accent font-semibold font-heading">Create one here</a>
                    </p>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-8 text-sm text-gray-500 animate-fade-in-up" style="animation-delay: 0.4s;">
                <p>Secure login powered by modern encryption</p>
            </div>
        </div>
    </div>
</body>
</html>
