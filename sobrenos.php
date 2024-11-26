<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            line-height: 1.6;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .section-title {
            text-align: center;
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
        }
        .about-section {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        .about-text {
            margin-bottom: 20px;
            font-size: 18px;
            color: #555;
        }
        .about-values {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 30px;
        }
        .value-item {
            flex: 1;
            min-width: 250px;
            padding: 20px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
            text-align: center;
            color: #333;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .value-item h4 {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .value-item p {
            font-size: 16px;
        }
        .call-to-action {
            text-align: center;
            margin-top: 40px;
        }
        .cta-button {
            text-decoration: none;
            background-color: #f39c12;
            color: white;
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
        }
        .cta-button:hover {
            background-color: #f59907;
        }
    </style>
</head>
<body>
	<?php include('skibidimenu.php');?>
    <div class="container">
        <h2 class="section-title">Sobre Nós</h2>
        <div class="about-section">
            <div class="about-text">
                <p>
                    Bem-vindo à <strong>LealCars</strong>, a plataforma confiável para quem deseja vender seu carro de forma simples, rápida e segura.
                    Nós oferecemos um espaço onde você pode anunciar o seu veículo e conectá-lo com compradores interessados, 
                    tornando o processo de venda mais eficiente e descomplicado.
                </p>
                <p>
                    Com anos de experiência no setor automotivo, nossa missão é facilitar a vida de quem deseja vender ou comprar um automóvel.
                    Valorizamos a transparência, a segurança e a confiança entre nossos clientes.
                </p>
            </div>
            <h3>O que nos diferencia?</h3>
            <div class="about-values">
                <div class="value-item">
                    <h4>Facilidade</h4>
                    <p>Com apenas alguns cliques, você pode cadastrar seu carro em nossa plataforma e alcançar milhares de potenciais compradores.</p>
                </div>
                <div class="value-item">
                    <h4>Segurança</h4>
                    <p>Garantimos um ambiente seguro para as negociações, oferecendo suporte durante todo o processo de venda.</p>
                </div>
                <div class="value-item">
                    <h4>Confiança</h4>
                    <p>Trabalhamos para criar conexões de confiança entre vendedores e compradores, com total transparência.</p>
                </div>
            </div>
        </div>
        <div class="call-to-action">
            <h3>Pronto para vender o seu carro?</h3>
            <a href="venda-carro.html" class="cta-button">Anuncie seu carro agora</a>
        </div>
    </div>
</body>
</html>