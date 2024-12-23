<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rôles - Pizzeria</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f5f5f5;
            padding: 20px;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #2d3436;
            margin-bottom: 40px;
            font-size: 2.5em;
            text-transform: uppercase;
        }

        .roles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            padding: 20px;
        }

        .role-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            text-align: center;
        }

        .role-card:hover {
            transform: translateY(-5px);
        }

        .role-icon {
            width: 60px;
            height: 60px;
            background: #d63031;
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
        }

        .role-name {
            color: #2d3436;
            font-size: 1.8em;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .role-description {
            color: #636e72;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #d63031;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .back-button:hover {
            background-color: #c72c2c;
        }

        .role-link {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="/" class="back-button">Retour</a>
        <h1>Rôles disponibles</h1>
        <div class="roles-grid">
            @foreach($roles as $role)
            <a href="{{ route('login') }}" class="role-link"> <!-- Redirige vers la page de connexion -->
                <div class="role-card">
                    <div class="role-icon">
                        @switch($role['name'])
                        @case('Admin')
                        A
                        @break
                        @case('Client')
                        C
                        @break
                        @case('Chef')
                        CH
                        @break
                        @case('Caissier')
                        CA
                        @break
                        @endswitch
                    </div>
                    <h2 class="role-name">{{ $role['name'] }}</h2>
                    <p class="role-description">{{ $role['description'] }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</body>

</html>