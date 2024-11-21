<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SSDN</title>
    <style>
        /* General Body Styles */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background: linear-gradient(to right, #4f46e5, #8b5cf6);
            padding: 1rem;
        }

        /* Glassy Header Styles */
        .glassy-header {
            display: flex;
            align-items: center;
            justify-content: center;
            height: auto;
            margin-top: 1rem;
        }

        header {
            width: 100%;
            max-width: 60%;
            padding: 1rem;
            background: rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(10px);
            color: white;
            text-align: center;
            font-weight: 800;
            font-size: 2.5rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border-radius: 1rem;
            animation: fadeIn 1s ease-out;
        }

        header h1 {
            letter-spacing: 0.1rem;
            color: #3b82f6;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3);
        }

        /* Main Content Styles */
        .main-content {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            margin-top: 2rem;
        }

        .form-wrapper {
            width: 100%;
            max-width: 2xl;
            padding: 1.5rem;
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 1.5rem;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }

        .form-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            gap: 2rem;
        }

        .login-form {
            width: 100%;
            padding: 2rem;
            background-color: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(10px);
            border-radius: 1.5rem;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            animation: fadeIn 1s ease-out;
        }


        .error-message {
            color: #ef4444;
            font-size: 0.875rem;
            text-align: center;
            margin-bottom: 1rem;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-group label {
            display: block;
            color: #d1d5db;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.5rem;
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 0.5rem;
            border: 1px solid #4b5563;
            color: #d1d5db;
            font-size: 1rem;
            transition: all 0.2s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5);
        }

        .submit-btn {
            background-color: #2563eb;
            color: white;
            font-weight: bold;
            padding: 0.75rem;
            border-radius: 0.5rem;
            width: 100%;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .submit-btn:hover {
            background-color: #1d4ed8;
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideDown {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>

    <div class="glassy-header">
        <header>
            <h1>Shri Sachidanand Traders</h1>
        </header>
    </div>

    <div class="main-content">
        <div class="form-wrapper">
            <div class="form-container">
                <div class="login-form">
                    @if ($errors->any())
                        <p class="error-message">{{ $errors->first('error') }}</p>
                    @endif

                    <form method="POST" action="/login">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input name="username" id="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input name="password" type="password" id="password" required>
                        </div>
                        <button type="submit" class="submit-btn">Log In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
