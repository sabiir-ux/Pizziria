<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu des Pizzas</title>
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
        }

        .menu-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #d63031;
            margin-bottom: 40px;
            font-size: 2.5em;
            text-transform: uppercase;
        }

        .pizza-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            padding: 20px;
        }

        .pizza-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .pizza-card:hover {
            transform: translateY(-5px);
        }

        .pizza-name {
            color: #2d3436;
            font-size: 1.5em;
            margin-bottom: 10px;
            border-bottom: 2px solid #ff7675;
            padding-bottom: 5px;
        }

        .pizza-ingredients {
            color: #636e72;
            margin-bottom: 15px;
            font-style: italic;
        }

        .pizza-price {
            color: #d63031;
            font-weight: bold;
            font-size: 1.2em;
        }

        @media (max-width: 600px) {
            .pizza-grid {
                grid-template-columns: 1fr;
            }
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
    </style>
</head>

<body>
    <div class="menu-container">
        <a href="/" class="back-button">Retour</a>
        <h1>Nos Pizzas</h1>
        <div class="pizza-grid">
            <div class="pizza-card">
                <h2 class="pizza-name">Margherita</h2>
                <p class="pizza-ingredients">Sauce tomate, mozzarella, basilic frais</p>
                <p class="pizza-price">12.90 €</p>
            </div>

            <div class="pizza-card">
                <h2 class="pizza-name">Regina</h2>
                <p class="pizza-ingredients">Sauce tomate, mozzarella, jambon, champignons</p>
                <p class="pizza-price">14.50 €</p>
            </div>

            <div class="pizza-card">
                <h2 class="pizza-name">Quattro Formaggi</h2>
                <p class="pizza-ingredients">Sauce tomate, mozzarella, gorgonzola, parmesan, chèvre</p>
                <p class="pizza-price">15.90 €</p>
            </div>

            <div class="pizza-card">
                <h2 class="pizza-name">Diavola</h2>
                <p class="pizza-ingredients">Sauce tomate, mozzarella, salami piquant, olives</p>
                <p class="pizza-price">14.90 €</p>
            </div>

            <div class="pizza-card">
                <h2 class="pizza-name">Végétarienne</h2>
                <p class="pizza-ingredients">Sauce tomate, mozzarella, poivrons, oignons, champignons, olives</p>
                <p class="pizza-price">13.90 €</p>
            </div>

            <div class="pizza-card">
                <h2 class="pizza-name">Calzone</h2>
                <p class="pizza-ingredients">Sauce tomate, mozzarella, jambon, œuf, champignons (pizza pliée)</p>
                <p class="pizza-price">15.50 €</p>
            </div>

            <div class="pizza-card">
                <h2 class="pizza-name">Sicilienne</h2>
                <p class="pizza-ingredients">Sauce tomate, mozzarella, anchois, câpres, olives noires</p>
                <p class="pizza-price">14.90 €</p>
            </div>

            <div class="pizza-card">
                <h2 class="pizza-name">Prosciutto</h2>
                <p class="pizza-ingredients">Sauce tomate, mozzarella, jambon de Parme, roquette, parmesan</p>
                <p class="pizza-price">16.90 €</p>
            </div>
        </div>
    </div>
</body>

</html>