<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - LealCars</title>
    <style>
        /* Estilo para a imagem de perfil na sessão */
        .session-info {
            display: flex;
            align-items: center;
            gap: 20px;
            font-size: 14px;
            color: #ffffff;
        }

        .session-info span {
            font-size: 14px;
        }

        .session-info .separator {
            margin: 1 10px;
            color: #ffffff;
            font-size: 22px;
        }

        .session-info .session-img {
            width: 40px;  /* Ajustado o tamanho da foto */
            height: 40px;
            border-radius: 50%; /* Torna a foto arredondada */
            object-fit: cover; /* Garante que a imagem se ajuste ao contorno circular */
        }

        /* Estilo do dropdown */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #303030;
            min-width: 150px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
            right: 0;
        }

        .dropdown-content a {
            color: #ffffff;
            padding: 12px 16px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
        }

        .dropdown-content a img {
            width: 16px;
            height: 16px;
        }

        .dropdown-content a:hover {
            text-decoration: none;
            color: #ffffff;
            background-color: transparent;
        }

        .dropdown img {
            cursor: pointer;
            width: 30px;
            height: 30px;
            border-radius: 50%;
        }

    </style>
</head>
<body>
    <nav style="background-color: #303030; color: #ffffff; display: flex; justify-content: space-between; align-items: center; padding: 20px 30px; font-size: 20px;">
        <a href="#" class="logo" style="font-size: 32px; font-weight: bold; font-style: italic; text-decoration: none; color: #ffffff;">
            <span class="leal" style="color: #ffffff;">Leal</span><span style="color: #f39c12;">Cars</span>
        </a>

        <form style="flex-grow: 1; display: flex; justify-content: center; padding-left: 20px; position: relative;">
            <input type="text" placeholder="O que estás à procura?" 
                   style="padding: 12px 40px 12px 15px; border-radius: 20px; border: 1px solid #ccc; outline: none; width: 400px; background-color: #FFFFFF !important; color: #000000; font-family: 'Poppins'; font-size: 15px; background: url('Imagens/search.png') no-repeat right 10px center; background-size: 20px;">
        </form>

        <ul style="display: flex; gap: 20px; list-style-type: none; padding: 0; margin: 0; margin-right: 40px;">
            <li style="font-size: 14px;">
                <a href="#sobre-nos" style="color: #ffffff; text-decoration: none;">Sobre Nós</a>
            </li>
            <li style="font-size: 14px;">
                <a href="#contactos" style="color: #ffffff; text-decoration: none;">Contactos</a>
            </li>
        </ul>

        <!-- Botão "Venda o seu carro" -->
        <a href="#venda-carro" style="text-decoration: none;">
            <button style="background-color: #f39c12; color: #ffffff; border: 1px solid #303030; padding: 10px 20px; border-radius: 5px; font-size: 14px; cursor: pointer; font-family: 'Poppins'; margin-right: 20px;">
                Venda o seu carro
            </button>
        </a>

        <!-- Informações da sessão -->
        <div class="session-info">
            <!-- Foto do usuário -->
            <img src="./Imagens/<?php echo $_SESSION['Clifoto']; ?>" alt="User Profile" class="session-img">
            <!-- Separador -->
            <span class="separator">|</span>

            <!-- Dropdown com ícone de usuário -->
            <div class="dropdown">
                <img src="Imagens/image.png" alt="User Dropdown" onclick="toggleDropdown()">
                <div class="dropdown-content" id="dropdownMenu">
                    <a href="index.php?cmd=logout">
                        <img src="Imagens/logout.png" alt="Logout Icon">Sair
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById("dropdownMenu");
            dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
        }
        // Fecha o dropdown ao clicar fora dele
        window.onclick = function(event) {
            const dropdown = document.getElementById("dropdownMenu");
            const image = document.querySelector(".dropdown img");
            if (!dropdown.contains(event.target) && !image.contains(event.target)) {
                dropdown.style.display = "none";
            }
        };
    </script>
</body>
</html>
