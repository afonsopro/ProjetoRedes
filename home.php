<nav style = "font-family: Poppins">
<br>
<h1 style="text-align: center; color: #333; margin-top: 20px; font-size: 40px"><i>Encontre o Carro Perfeito para Si</i></h1>
<br>
<form method="POST"  enctype="multipart/form-data" action="index.php?cmd=pesquisa" style="max-width: 80%; margin: 20px auto; background-color: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); display: flex; flex-wrap: wrap; gap: 20px;">

    <!-- Marca -->
    <label style="flex: 1 1 45%; font-weight: bold; color: #555;">
        Marca:<br>
        <select name="marca" id="marca" placeholder="Ex.: BMW" style="font-family: Poppins; color: #555; width: 90%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;">
        <option value="">Selecione uma marca</option>
        <?php
            $sql="select * from marca order by mardsg";
            $res=$lig->query($sql);
            while($lin=$res->fetch_array())
            {
                echo "<option value=",$lin['CodMarca'],">",$lin['mardsg'],"</option>\n";
            }
            echo "</select>";
        ?>
    </label>

   <!-- Modelo --> 
    <label style="flex: 1 1 45%; font-weight: bold; color: #555;">
        Modelo:
        <select name="modelo" id="modelo" placeholder="Ex.: Golf GTI" style="color: #555; font-family: Poppins; width: 99.6%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;">
            <option value="">Seleciona um modelo</option>
            <?php
            $sql="select * from marca order by mardsg";
            $res=$lig->query($sql);
            while($lin=$res->fetch_array())
            {
                echo "<option value=",$lin['CodMarca'],"; style='font-weight: bold;' disabled>",$lin['mardsg'],"</option>\n";
                $sql1="select * from modelo where CodMarca = ".$lin['CodMarca']." order by moddgs";
                $res1=$lig->query($sql1);
                while($lin1=$res1->fetch_array())
                {
                    echo "<option value=",$lin1['CodMod']," data-marca=", $lin1['CodMarca'], ">",$lin1['moddgs'],"</option>\n";        
                }
            }
        ?>
        </select>
    </label>

    <script>
        document.getElementById('modelo').addEventListener('change', function () {
            // Obtém a opção selecionada
            var selectedOption = this.options[this.selectedIndex];

            // Obtém o atributo data-marca da opção selecionada
            var codMarca = selectedOption.getAttribute('data-marca');

            // Define o valor correspondente no dropdown de marca
            var marcaDropdown = document.getElementById('marca');
            marcaDropdown.value = codMarca;
        });

        document.getElementById('marca').addEventListener('change', function () {
            var modeloDropdown = document.getElementById('modelo');
            modeloDropdown.value = "";
        });
    </script>

    <!-- Quilómetros Percorridos -->
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Quilómetros Percorridos (menos que):
        <input type="number" name="quilometros" placeholder="Ex.: 50000" min="0" style="width: 95%; color: #303030; font-family: Poppins; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;">
    </label>

    <!-- Preço -->
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Preço até (€):
        <input type="number" name="preco_max" placeholder="Ex.: 25000" min="1" style="width: 95%; color: #303030; font-family: Poppins; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;">
    </label>

    <!-- Tipo de Combustível -->
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Tipo de Combustível:
        <select name="combustivel" style="font-family: Poppins; color: #555; width: 99.5%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;">
            <option value="">Selecione um tipo de combústivel</option>
            <?php
                $sql="select * from combustivel";
                $res=$lig->query($sql);
                while($lin=$res->fetch_array())
                {
                    echo "<option value=",$lin['Codcomb'],">",$lin['combdsg'],"</option>\n";
                }
                echo "</select>";
            ?>
        </select>
    </label>

    <!-- Botão e Link -->
    <div style="flex: 1 1 100%; display: flex; align-items: center; justify-content: space-between; margin-top: 20px;">
        <!-- Pesquisa Avançada -->
        <div style="flex: 1; text-align: center; position: relative;">
            <a href="index.php?cmd=pesquisa" style="font-size: 16px; font-weight: bold; color: #f39c12; text-decoration: none; position: relative; z-index: 1; transition: color 0.3s ease, text-decoration 0.3s ease;" onmouseover="this.style.textDecoration='underline'; this.style.color='#f39c12';" onmouseout="this.style.textDecoration='none'; this.style.color='#f39c12';">Pesquisa Avançada</a>
            <img src="imagens/pesquisa.png" alt="Ícone Pesquisa" style="position: absolute; top: 0; left: 33%; transform: translate(-50%, 10%); z-index: 0; height: 20px; width: auto;">
        </div>
        <!-- Botão de Procurar -->
        <button type="submit" style="flex: 1; max-width: 50%; padding: 12px; background-color: #f39c12; font-family: 'Poppins'; color: white; font-size: 16px; font-weight: bold; border: 2px solid #f39c12; border-radius: 5px; cursor: pointer; text-align: center; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='white'; this.style.color='#f39c12'; this.style.borderColor='#f39c12';" onmouseout="this.style.backgroundColor='#f39c12'; this.style.color='white'; this.style.borderColor='#f39c12';">
            Procurar Carros
        </button>

    </div>
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
                    <!-- Botão com link para a página de pesquisa -->
                    <a href="index.php?cmd=pesquisa" style="text-decoration: none;">
                        <button style="padding: 15px 30px; font-family: Poppins; background-color: white; color: #f39c12; border: 2px solid #f39c12; border-radius: 5px; font-size: 18px; font-weight: bold; cursor: pointer; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#f39c12'; this.style.color='white'; this.style.border='2px solid white';" onmouseout="this.style.backgroundColor='white'; this.style.color='#f39c12'; this.style.border='2px solid #f39c12';">
                            Comprar
                        </button>
                    </a>
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
<h2 style="text-align: left; color: #333; margin-left: 80px; font-size: 27px"><i>Anúncios mais recentes</i></h2>

<?php
function gerarCartoesVeiculosRecentes($lig) {
    // Consulta para buscar os veículos com suas marcas e modelos
    $sql = "
        SELECT veiculo.CodVei, veiculo.veiano, veiculo.veikm, veiculo.veidescricao, veiculo.Codcomb, veiculo.veipot, veiculo.veipre, veiculo.fotovei,
               marca.mardsg AS marca, modelo.moddgs AS modelo
        FROM veiculo
        INNER JOIN modelo ON veiculo.CodMod = modelo.CodMod
        INNER JOIN marca ON modelo.CodMarca = marca.CodMarca
        INNER JOIN anuncio ON veiculo.CodAnun = anuncio.CodAnu
        ORDER BY anuncio.dataanu DESC
        LIMIT 8";
    
    $res = $lig->query($sql);

    if ($res->num_rows > 0) {
        // Início da estrutura dos cartões
        $html = '<table style="border-spacing: 15px; width: 100%; text-align: center; padding: 0 5%;">';
        $html .= '<tr>';

        $index = 0;
        while ($lin = $res->fetch_assoc()) {
            // Dados de cada veículo
            $titulo = $lin['marca'] . ' ' . $lin['modelo'];
            $ano = $lin['veiano'];
            $km = number_format($lin['veikm'], 0, ',', ' ') . ' km';
            $combustivel = $lin['Codcomb']; // Mapear códigos de combustível, se necessário
            $potencia = $lin['veipot'] . ' cv';
            $preco = number_format($lin['veipre'], 2, ',', ' ') . ' EUR';
            $descricao = $lin['veidescricao']; // Descrição do veículo
            $foto = $lin['fotovei'];
            $codVei = $lin['CodVei']; // ID único do veículo

            // Criação do cartão com botão
            $html .= '
            <td style="width: 22%; font-family: Poppins; vertical-align: top; border: 1px solid #ddd; border-radius: 8px; padding: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); margin: 0 10px; transition: transform 0.3s ease, box-shadow 0.3s ease;"
                onmouseover="this.style.transform = \'scale(1.05)\'; this.style.boxShadow = \'0 4px 8px rgba(0, 0, 0, 0.2)\';"
                onmouseout="this.style.transform = \'scale(1)\'; this.style.boxShadow = \'0 2px 4px rgba(0, 0, 0, 0.1)\';">
                <a href="anuncio.php?id=' . $codVei . '" style="text-decoration: none; font-family: Poppins; color: inherit;">
                    <button style="width: 100%; background: none; border: none; padding: 0; cursor: pointer;">
                        <div style="width: 100%; height: 170px; display: flex; justify-content: center; align-items: center; overflow: hidden; border-radius: 10px; margin: 10px 0;">
                            <img src="Imagens/caros/' . $foto . '" alt="Carro" style="max-width: 100%; max-height: 100%; object-fit: contain; border-radius: 10px;">
                        </div>
                        <h3 style="font-size: 1.1em; font-family: Poppins; font-weight: bold; margin: 10px 0; word-wrap: break-word;">' . htmlspecialchars($titulo) . '</h3>
                        <p style="margin: 5px 0; font-family: Poppins; font-size: 0.9em;">' . htmlspecialchars($ano) . ' • ' . htmlspecialchars($km) . ' • ' . htmlspecialchars($combustivel) . '</p>
                        <p style="margin: 5px 0; font-family: Poppins; font-size: 0.9em;">' . htmlspecialchars($potencia) . '</p>
                        <p style="font-size: 0.8em; font-family: Poppins; color: #666; margin: 10px 0; word-wrap: break-word;">' . htmlspecialchars($descricao) . '</p>
                        <p style="font-size: 1.2em; font-family: Poppins; color: #f39c12; font-weight: bold; margin: 10px 0;">' . htmlspecialchars($preco) . '</p>
                    </button>
                </a>
            </td>';

            // Criar nova linha a cada 4 cartões
            $index++;
            if ($index % 4 == 0 && $index != $res->num_rows) {
                $html .= '</tr><tr>';
            }
        }

        // Fechamento da estrutura
        $html .= '</tr></table>';
        return $html;
    } else {
        return '<p>Nenhum veículo encontrado.</p>';
    }
}

// Exibir os cartões
echo gerarCartoesVeiculosRecentes($lig);
?>

<br><br>
<h2 style="text-align: left; color: #333; margin-left: 80px; font-size: 27px"><i>Anúncios mais baratos</i></h2>
<?php
function gerarCartoesVeiculosBaratos($lig) {
    // Consulta para buscar os veículos com suas marcas e modelos, limitando a 8 registros
    $sql = "
        SELECT veiculo.CodVei, veiculo.veiano, veiculo.veikm, veiculo.veidescricao, veiculo.Codcomb, veiculo.veipot, veiculo.veipre, veiculo.fotovei,
               marca.mardsg AS marca, modelo.moddgs AS modelo
        FROM veiculo
        INNER JOIN modelo ON veiculo.CodMod = modelo.CodMod
        INNER JOIN marca ON modelo.CodMarca = marca.CodMarca
        ORDER BY veiculo.veipre
        LIMIT 8"; // Limita a 8 registros
    
    $res = $lig->query($sql);

    if ($res->num_rows > 0) {
        // Início da estrutura dos cartões
        $html = '<table style="border-spacing: 15px; width: 100%; text-align: center; padding: 0 5%;">';
        $html .= '<tr>';

        $index = 0;
        while ($lin = $res->fetch_assoc()) {
            // Dados de cada veículo
            $titulo = $lin['marca'] . ' ' . $lin['modelo'];
            $ano = $lin['veiano'];
            $km = number_format($lin['veikm'], 0, ',', ' ') . ' km';
            $combustivel = $lin['Codcomb']; // Mapear códigos de combustível, se necessário
            $potencia = $lin['veipot'] . ' cv';
            $preco = number_format($lin['veipre'], 2, ',', ' ') . ' EUR';
            $descricao = $lin['veidescricao']; // Descrição do veículo
            $foto = $lin['fotovei'];
            $codVei = $lin['CodVei']; // ID único do veículo

            // Criação do cartão com botão
            $html .= '
            <td style="width: 22%; font-family: Poppins; vertical-align: top; border: 1px solid #ddd; border-radius: 8px; padding: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); margin: 0 10px; transition: transform 0.3s ease, box-shadow 0.3s ease;"
                onmouseover="this.style.transform = \'scale(1.05)\'; this.style.boxShadow = \'0 4px 8px rgba(0, 0, 0, 0.2)\';"
                onmouseout="this.style.transform = \'scale(1)\'; this.style.boxShadow = \'0 2px 4px rgba(0, 0, 0, 0.1)\';">
                <a href="anuncio.php?id=' . $codVei . '" style="text-decoration: none; font-family: Poppins; color: inherit;">
                    <button style="width: 100%; background: none; border: none; padding: 0; cursor: pointer;">
                        <div style="width: 100%; height: 170px; display: flex; justify-content: center; align-items: center; overflow: hidden; border-radius: 10px; margin: 10px 0;">
                            <img src="Imagens/caros/' . $foto . '" alt="Carro" style="max-width: 100%; max-height: 100%; object-fit: contain; border-radius: 10px;">
                        </div>
                        <h3 style="font-size: 1.1em; font-family: Poppins; font-weight: bold; margin: 10px 0; word-wrap: break-word;">' . htmlspecialchars($titulo) . '</h3>
                        <p style="margin: 5px 0; font-family: Poppins; font-size: 0.9em;">' . htmlspecialchars($ano) . ' • ' . htmlspecialchars($km) . ' • ' . htmlspecialchars($combustivel) . '</p>
                        <p style="margin: 5px 0; font-family: Poppins; font-size: 0.9em;">' . htmlspecialchars($potencia) . '</p>
                        <p style="font-size: 0.8em; font-family: Poppins; color: #666; margin: 10px 0; word-wrap: break-word;">' . htmlspecialchars($descricao) . '</p>
                        <p style="font-size: 1.2em; font-family: Poppins; color: #f39c12; font-weight: bold; margin: 10px 0;">' . htmlspecialchars($preco) . '</p>
                    </button>
                </a>
            </td>';
            // Criar nova linha a cada 4 cartões
            $index++;
            if ($index % 4 == 0 && $index != $res->num_rows) {
                $html .= '</tr><tr>';
            }
        }

        // Fechamento da estrutura
        $html .= '</tr></table>';
        return $html;
    } else {
        return '<p>Nenhum veículo encontrado.</p>';
    }
}

// Exibir os cartões
echo gerarCartoesVeiculosBaratos($lig);
?>
<br><br>
</nav>
