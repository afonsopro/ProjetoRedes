<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - LealCars</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Poppins';">
    <nav style="background-color: #303030; color: #ffffff; display: flex; justify-content: space-between; align-items: center; padding: 20px 30px; font-size: 20px;">
        <a href="#" class="logo" style="font-size: 32px; font-weight: bold; font-style: italic; text-decoration: none; color: #ffffff;">
            <span class="leal" style="color: #ffffff;">Leal</span><span style="color: #f39c12;">Cars</span>
        </a>
        <div style="flex-grow: 1; display: flex; justify-content: center; padding-left: 20px;"> <!-- Ajustei o padding-left para mover para a esquerda -->
            <div style="display: flex; align-items: center; position: relative;">
                <!-- Aumentei o padding em cima e embaixo e alterei a altura da barra de pesquisa -->
                <input type="text" placeholder="O que estás à procura?" style="padding: 12px 30px; border-radius: 20px; border: 1px solid #ccc; outline: none; width: 400px; height: 18px; font-family: 'Poppins'; font-size: 15px;">
                <img src="search.png" alt="Search" style="position: absolute; right: 10px; width: 20px; height: 20px; cursor: pointer;">
            </div>
        </div>
        <ul style="display: flex; gap: 20px; list-style-type: none; padding: 0; margin: 0; margin-right: 40px;">
            <li style="font-size: 15px;">
                <a href="#sobre-nos" style="color: #ffffff; text-decoration: none;">Sobre Nós</a>
            </li>
            <li style="font-size: 15px;">
                <a href="#contactos" style="color: #ffffff; text-decoration: none;">Contactos</a>
            </li>
        </ul>
        <div style="display: flex; align-items: center; gap: 20px; margin-left: 20px; transform: translateY(2px);"> <!-- Ajustei a posição das imagens para baixo -->
            <a href="#signup-page" style="text-decoration: none;">
                <img src="signup1.jpg" alt="Signup" style="width: 30px; height: 30px;">
            </a>
            <a href="#star-page" style="text-decoration: none;">
                <img src="star.png" alt="Star" style="width: 30px; height: 30px;">
            </a>
        </div>
    </nav>
</body>
</html>
