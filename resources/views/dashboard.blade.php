<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Role</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .role-container {
            text-align: center;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 80%;
            max-width: 600px;
        }
        .role-container h1 {
            margin-bottom: 20px;
        }
        .role {
            margin-bottom: 20px;
        }
        .role img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .role a {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007BFF;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .role a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="role-container">
        <h1>Select Your Role</h1>

        <div class="role">
            <img src="{{ asset('images/admin.jpg') }}" alt="Admin Role">
            <a href="{{ route('view.admin') }}">Admin</a>
        </div>

        <div class="role">
            <img src="{{ asset('images/chef.avif') }}" alt="Chef Role">
            <a href="{{ route('view.chef') }}">Chef</a>
        </div>

        <div class="role">
            <img src="{{ asset('images/caisser.jpg') }}" alt="Caissier Role">
            <a href="{{ route('view.caissier') }}">Caissier</a>
        </div>

        <div class="role">
            <img src="{{ asset('images/client.jpg') }}" alt="Client Role">
            <a href="{{ route('view.client') }}">Client</a>
        </div>
    </div>
</body>
</html>
