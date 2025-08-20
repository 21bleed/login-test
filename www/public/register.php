<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->execute([$username, $password]);

    echo "User registered. <a href='index.php'>Login here</a>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Create Account</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-primary: #059669;
            --color-primary-hover: #047857;
            --color-accent: #10b981;
            --color-background: #f8fafc;
            --color-surface: #ffffff;
            --color-text-primary: #1f2937;
            --color-text-secondary: #6b7280;
            --color-border: #e5e7eb;
            --color-border-focus: var(--color-primary);
            --color-error: #dc2626;
            --color-success: #059669;
            
            --font-heading: 'Work Sans', sans-serif;
            --font-body: 'Open Sans', sans-serif;
            
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            
            --radius-sm: 0.375rem;
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-body);
            background: linear-gradient(135deg, var(--color-background) 0%, #e0f2fe 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            color: var(--color-text-primary);
        }

        .register-container {
            background: var(--color-surface);
            padding: 2.5rem;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            width: 100%;
            max-width: 400px;
            border: 1px solid var(--color-border);
        }

        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .register-title {
            font-family: var(--font-heading);
            font-size: 1.875rem;
            font-weight: 700;
            color: var(--color-text-primary);
            margin-bottom: 0.5rem;
        }

        .register-subtitle {
            color: var(--color-text-secondary);
            font-size: 0.875rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            display: block;
            font-weight: 500;
            color: var(--color-text-primary);
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid var(--color-border);
            border-radius: var(--radius-md);
            font-size: 1rem;
            font-family: var(--font-body);
            transition: all 0.2s ease;
            background: var(--color-surface);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--color-border-focus);
            box-shadow: 0 0 0 3px rgb(5 150 105 / 0.1);
        }

        .form-input:hover {
            border-color: var(--color-text-secondary);
        }

        .register-button {
            width: 100%;
            background: var(--color-primary);
            color: white;
            border: none;
            padding: 0.875rem 1.5rem;
            border-radius: var(--radius-md);
            font-size: 1rem;
            font-weight: 600;
            font-family: var(--font-body);
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: var(--shadow-sm);
        }

        .register-button:hover {
            background: var(--color-primary-hover);
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .register-button:active {
            transform: translateY(0);
        }

        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--color-border);
        }

        .login-link p {
            color: var(--color-text-secondary);
            font-size: 0.875rem;
        }

        .login-link a {
            color: var(--color-primary);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .login-link a:hover {
            color: var(--color-primary-hover);
            text-decoration: underline;
        }

        .success-message {
            background: #d1fae5;
            border: 1px solid #a7f3d0;
            color: var(--color-success);
            padding: 1rem;
            border-radius: var(--radius-md);
            margin-bottom: 1.5rem;
            text-align: center;
            font-size: 0.875rem;
        }

        .success-message a {
            color: var(--color-primary);
            text-decoration: none;
            font-weight: 500;
        }

        .success-message a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .register-container {
                padding: 2rem 1.5rem;
                margin: 1rem;
            }
            
            .register-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($stmt)): ?>
            <div class="success-message">
                ✓ Account created successfully! <a href="index.php">Login here</a>
            </div>
        <?php endif; ?>
        
        <div class="register-header">
            <h2 class="register-title">Create Account</h2>
            <p class="register-subtitle">Join us today and get started</p>
        </div>
        
        <form action="register.php" method="post">
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-input" required>
            </div>
            
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-input" required>
            </div>
            
            <button type="submit" class="register-button">Create Account</button>
        </form>
        
        <div class="login-link">
            <p>Already have an account? <a href="index.php">Sign in here</a></p>
        </div>
    </div>
</body>
</html>
