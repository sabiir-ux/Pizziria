<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>
<style>
    /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    color: #333;
    background-color: #f9f9f9;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

/* Sign In Page */
.sign-in-container {
    background-color: #fff;
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    text-align: center;
}

.sign-in-container h1 {
    color: #333;
    font-size: 2rem;
    margin-bottom: 20px;
}

.sign-in-container form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.sign-in-container input[type="email"],
.sign-in-container input[type="password"] {
    padding: 12px 15px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 8px;
    width: 100%;
}

.sign-in-container input[type="email"]:focus,
.sign-in-container input[type="password"]:focus {
    outline: none;
    border-color: #4CAF50;
}

.sign-in-container button {
    padding: 12px 15px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.sign-in-container button:hover {
    background-color: #45a049;
    transform: translateY(-2px);
}

.sign-in-container button:focus {
    outline: none;
    box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.5);
}

/* Error Message */
.error-message {
    color: #e74c3c;
    font-size: 14px;
    margin-top: 10px;
}

/* Footer */
.copyrights {
    background-color: #333;
    color: #fff;
    padding: 15px 20px;
    text-align: center;
    position: absolute;
    bottom: 0;
    width: 100%;
}

.copyrights a {
    color: #FFD700;
    text-decoration: none;
}

.copyrights a:hover {
    text-decoration: underline;
}


</style>
<body>
    <div class="sign-in-container">
        <h1>Sign In</h1>
        <form action="{{ route('log') }}" method="get">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Log In</button>
        </form>
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="copyrights">
        <p>&copy; 2024 Green Special Restaurant. All rights reserved.</p>
    </div>
</body>
</html>
