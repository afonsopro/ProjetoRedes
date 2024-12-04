
<nav style="background-color: #303030; color: #ffffff; display: flex; justify-content: space-between; align-items: center; padding: 20px 30px; font-size: 20px; font-family: Poppins;"">
        <a href="index.php?cmd=home" class="logo" style="font-size: 32px; font-weight: bold; font-style: italic; text-decoration: none; color: #ffffff;">
            <span class="leal" style="color: #ffffff;">Leal</span><span style="color: #f39c12;">Cars</span>
        </a>

        <form style="flex-grow: 1; display: flex; justify-content: center; padding-left: 20px; position: relative;">
            <input type="text" placeholder="O que estás à procura?" 
                   style="padding: 12px 40px 12px 15    px; border-radius: 20px; border: 1px solid #ccc; outline: none; width: 400px; background-color: #FFFFFF !important; color: #000000; font-family: 'Poppins'; font-size: 15px; background: url('Imagens/search.png') no-repeat right 10px center; background-size: 20px;">

            <!-- Adicionando o style inline para o placeholder -->
            <script>
                document.querySelector('input').setAttribute('style', 'padding: 12px 40px 12px 15px; border-radius: 20px; border: 1px solid #ccc; outline: none; width: 400px; background-color: #FFFFFF !important; color: #000000; font-family: "Poppins"; font-size: 15px; background: url("search.png") no-repeat right 10px center; background-size: 20px;');
                document.querySelector('input').placeholder = "O que estás à procura?";
                document.querySelector('input').style.setProperty('--placeholder-color', '#000000');
            </script>
        </form>

        <ul style="display: flex; gap: 20px; list-style-type: none; padding: 0; margin: 0; margin-right: 40px;">
            <li style="font-size: 14px;">
                <a href="index.php?cmd=sobre" style="color: #ffffff; text-decoration: none; position: relative; display: inline-block; transition: color 0.3s ease;">
                    Sobre Nós
                    <span style="position: absolute; bottom: 0; left: 0; width: 100%; height: 2px; background-color: #ffffff; transform: scaleX(0); transform-origin: left; transition: transform 0.3s ease;"></span>
                </a>
            </li>
            <li style="font-size: 14px;">
                <a href="index.php?cmd=contactos" style="color: #ffffff; text-decoration: none; position: relative; display: inline-block; transition: color 0.3s ease;">
                    Contactos
                    <span style="position: absolute; bottom: 0; left: 0; width: 100%; height: 2px; background-color: #ffffff; transform: scaleX(0); transform-origin: left; transition: transform 0.3s ease;"></span>
                </a>
            </li>
        </ul>

        <a href="index.php?cmd=venda" style="text-decoration: none;">
            <button style="background-color: #f39c12; color: #ffffff; border: 1px solid #f39c12; padding: 10px 20px; border-radius: 5px; font-size: 14px; cursor: pointer; font-family: 'Poppins'; transition: all 0.3s ease; text-align: center;" onmouseover="this.style.backgroundColor='#ffffff'; this.style.color='#f39c12'; this.style.borderColor='#f39c12';" onmouseout="this.style.backgroundColor='#f39c12'; this.style.color='#ffffff'; this.style.borderColor='#f39c12';">
                Venda o seu carro
            </button>
        </a>

        <!-- Barra vertical para separar -->
        <span style="font-size: 27px; margin-left: 20px; margin-right: 20px; color: #ffffff;">|</span>

        <nav aria-label="secondary-menu" style="display: flex; align-items: center; gap: 20px; transform: translateY(2px);">
            <a href="index.php?cmd=login" style="text-decoration: none;">
                <img src="Imagens/signup1.jpg" alt="Signup" style="width: 30px; height: 30px;">
            </a>
            <a href="index.php?cmd=favoritos" style="text-decoration: none;">
                <img src="Imagens/star.png" alt="Star" style="width: 30px; height: 30px;">
            </a>
        </nav>
    </nav>
