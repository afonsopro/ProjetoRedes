<h1 style="text-align: center; color: #333; margin-top: 20px; font-size: 40px"><i>Encontre o Carro Perfeito</i></h1>
<br>
<form action="/buscar" method="POST" style="max-width: 1200px; margin: 20px auto; background-color: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); display: flex; flex-wrap: wrap; gap: 20px;">

    <!-- Modelo -->
    <label style="flex: 1 1 45%; font-weight: bold; color: #555;">
        Modelo:
        <input type="text" name="modelo" placeholder="Ex.: Golf GTI" style="width: 90%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;" required>
    </label>

    <!-- Quilómetros Percorridos -->
    <label style="flex: 1 1 45%; font-weight: bold; color: #555;">
        Quilómetros Percorridos:
        <input type="number" name="kilometros" placeholder="Ex.: 50000" min="0" style="width: 96%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;" required>
    </label>
    <!-- Tipo de Veículo -->
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Tipo de Veículo:
        <select name="tipo_veiculo" style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;" required>
            <option value="" disabled selected>Selecione</option>
            <option value="sedan">Sedan</option>
            <option value="suv">SUV</option>
            <option value="hatch">Hatch</option>
            <option value="pickup">Pickup</option>
        </select>
    </label>

    <!-- Ano de Fabrico -->
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Ano de Fabrico:
        <input type="number" name="ano_fabrico" placeholder="Ex.: 2020" min="1900" style="width: 94%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;" required>
    </label>

    <!-- Preço -->
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Preço (€):
        <input type="number" name="preco" placeholder="Ex.: 25000" min="0" style="width: 94%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;" required>
    </label>

    <!-- Cor -->
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Cor:
        <input type="text" name="cor" placeholder="Ex.: Preto" style="width: 94%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;" required>
    </label>

    <!-- Tipo de Combustível -->
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Tipo de Combustível:
        <select name="combustivel" style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;" required>
            <option value="" disabled selected>Selecione</option>
            <option value="gasolina">Gasolina</option>
            <option value="diesel">Diesel</option>
            <option value="hibrido">Híbrido</option>
            <option value="eletrico">Elétrico</option>
        </select>
    </label>

    <!-- Número de Lugares -->
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Número de Lugares:
        <input type="number" name="num_lugares" placeholder="Ex.: 5" min="1" style="width: 94%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;" required>
    </label>

    <!-- Potência e Número de Portas (Ocultos) -->
    <input type="hidden" name="potencia" value="">
    <input type="hidden" name="num_portas" value="">

    <!-- Botão de Submissão -->
    <button type="submit" style="width: 100%; padding: 12px; background-color: #f39c12; font-family: 'Poppins'; color: white; font-size: 16px; font-weight: bold; border: none; border-radius: 5px; cursor: pointer; margin-top: 10px;">
        Procurar Carros
    </button>
</form>
<br>
<!-- Seção de Botões (Comprar / Vender) com Imagem e Gradiente -->
<section style="position: relative; text-align: center; margin-top: 40px;">
    <!-- Imagem de Fundo com Gradiente -->
    <figure style="margin: 0; background-image: url('imagens/carros.jpg'); background-size: cover; background-position: center; background-attachment: fixed; height: 400px;">
        <!-- Gradiente com Opacidade -->
        <figcaption style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(90deg, rgba(243, 156, 18, 0.7), rgba(230, 126, 34, 0.7));"></figcaption>

        <!-- Conteúdo Principal -->
        <header style="position: relative; z-index: 1; color: white; padding: 60px 20px; text-align: center;">
            <h2 style="font-size: 32px; margin-bottom: 20px;">Venda o seu carro usado e compre o carro dos seus sonhos!</h2>
            <br>
            <!-- Botões e Parágrafos alinhados horizontalmente -->
            <div style="display: flex; justify-content: center; gap: 60px; align-items: center;">
                <div>
                    <!-- Parágrafo para Promover a Compra -->
                    <p style="font-size: 18px; color: #fff; max-width: 300px; margin: 0 auto 15px auto;">Explore nossa vasta seleção de veículos e encontre o carro perfeito para você!</p>
                    <button style="padding: 15px 30px; font-family: Poppins; background-color: white; color: #f39c12; border: 2px solid #f39c12; border-radius: 5px; font-size: 18px; font-weight: bold; cursor: pointer; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#f39c12'; this.style.color='white'; this.style.border='2px solid white';" onmouseout="this.style.backgroundColor='white'; this.style.color='#f39c12'; this.style.border='2px solid #f39c12';">
                        Comprar
                    </button>
                </div>
                <div>
                    <!-- Parágrafo para Promover a Venda -->
                    <p style="font-size: 18px; color: #fff; max-width: 300px; margin: 0 auto 15px auto;">Pronto para vender seu carro? Anuncie conosco e alcance milhares de compradores!</p>
                    <button style="padding: 15px 30px; font-family: Poppins; background-color: white; color: #f39c12; border: 2px solid #f39c12; border-radius: 5px; font-size: 18px; font-weight: bold; cursor: pointer; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#f39c12'; this.style.color='white'; this.style.border='2px solid white';" onmouseout="this.style.backgroundColor='white'; this.style.color='#f39c12'; this.style.border='2px solid #f39c12';">
                        Vender
                    </button>
                </div>
            </div>
        </header>
    </figure>
</section>
<br><br>
<h2 style="text-align: left; color: #333; margin-left: 80px; font-size: 27px"><i>Anúncios populares</i></h2>
<br><br><br><br>
<h2 style="text-align: left; color: #333; margin-left: 80px; font-size: 27px"><i>Anúncios mais baratos</i></h2>
<br><br><br><br><br><br>
<footer>
    <?php include 'footer.php'; ?>
</footer>
