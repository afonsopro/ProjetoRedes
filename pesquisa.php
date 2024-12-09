<form method="POST" enctype="multipart/form-data" action="index.php?cmd=pesquisa" style="max-width: 1200px; margin: 20px auto; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); display: flex; flex-wrap: wrap; gap: 15px; font-family: 'Poppins', sans-serif; justify-content: center;">
    <!-- Marca -->
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Marca:<br>
        <select name="marca" id="marca" style="font-family: Poppins; color: #555; width: 95%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
            <option value="">Selecione uma marca</option>
            <?php
            $sql = "SELECT * FROM marca ORDER BY mardsg";
            $res = $lig->query($sql);
            while ($lin = $res->fetch_array()) {
                $selected = ($_POST['marca'] ?? '') == $lin['CodMarca'] ? 'selected' : '';
                echo "<option value='{$lin['CodMarca']}' $selected>{$lin['mardsg']}</option>";
            }
            ?>
        </select>
    </label>

    <!-- Modelo -->
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Modelo:<br>
        <select name="modelo" id="modelo" style="font-family: Poppins; color: #555; width: 95%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
            <option value="">Selecione um modelo</option>
            <?php
            $sql = "SELECT * FROM marca ORDER BY mardsg";
            $res = $lig->query($sql);
            while ($lin = $res->fetch_array()) {
                echo "<option value='' style='font-weight: bold;' disabled>{$lin['mardsg']}</option>";
                $sql1 = "SELECT * FROM modelo WHERE CodMarca = {$lin['CodMarca']} ORDER BY moddgs";
                $res1 = $lig->query($sql1);
                while ($lin1 = $res1->fetch_array()) {
                    $selected = ($_POST['modelo'] ?? '') == $lin1['CodMod'] ? 'selected' : '';
                    echo "<option value='{$lin1['CodMod']}' data-marca='{$lin1['CodMarca']}' $selected>{$lin1['moddgs']}</option>";
                }
            }
            ?>
        </select>
    </label>

    <script>
        document.getElementById('modelo').addEventListener('change', function () {
            var selectedOption = this.options[this.selectedIndex];
            var codMarca = selectedOption.getAttribute('data-marca');
            var marcaDropdown = document.getElementById('marca');
            marcaDropdown.value = codMarca;
        });

        document.getElementById('marca').addEventListener('change', function () {
            var modeloDropdown = document.getElementById('modelo');
            modeloDropdown.value = "";
        });
    </script>

    <!-- Tipo de Veículo -->
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Tipo de Veículo:<br>
        <select name="tipo_veiculo" style="font-family: Poppins; color: #555; width: 97%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
            <option value="">Selecione um tipo</option>
            <?php
            $sql = "SELECT * FROM tipovei ORDER BY tipopdsg";
            $res = $lig->query($sql);
            while ($lin = $res->fetch_array()) {
                $selected = ($_POST['tipo_veiculo'] ?? '') == $lin['CodTpVei'] ? 'selected' : '';
                echo "<option value='{$lin['CodTpVei']}' $selected>{$lin['tipopdsg']}</option>";
            }
            ?>
        </select>
    </label>

    <!-- Preço -->
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Preço Mínimo (€):<br>
        <input type="number" name="preco_min" placeholder="Ex.: 5000" min="0" value="<?= htmlspecialchars($_POST['preco_min'] ?? '') ?>" style="color: #303030; font-family: Poppins; width: 90.5%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
    </label>
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Preço Máximo (€):<br>
        <input type="number" name="preco_max" placeholder="Ex.: 50000" min="0" value="<?= htmlspecialchars($_POST['preco_max'] ?? '') ?>" style="width: 90.5%; padding: 8px; color: #303030; font-family: Poppins; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
    </label>

    <!-- Quilómetros -->
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Quilómetros Máximos:<br>
        <input type="number" name="quilometros" placeholder="Ex.: 50000" min="0" value="<?= htmlspecialchars($_POST['quilometros'] ?? '') ?>" style="color: #303030; font-family: Poppins; width: 93%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
    </label>

    <!-- Ano -->
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Ano (De):<br>
        <input type="number" name="ano_min" placeholder="Ex.: 2000" min="1950" value="<?= htmlspecialchars($_POST['ano_min'] ?? '') ?>" style="color: #303030; font-family: Poppins; width: 90.5%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
    </label>
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Ano (Até):<br>
        <input type="number" name="ano_max" placeholder="Ex.: 2024" min="1950" value="<?= htmlspecialchars($_POST['ano_max'] ?? '') ?>" style="color: #303030; font-family: Poppins; width: 90.5%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
    </label>

    <!-- Tipo de Combústivel -->
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Tipo de Combustível:<br>
        <select name="combustivel" style="font-family: Poppins; color: #555; width: 97.7%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
            <option value="">Selecione um tipo de combustível</option>
            <?php
                // Consulta para buscar os tipos de combustível
                $sql = "SELECT * FROM combustivel ORDER BY combdsg";
                $res = $lig->query($sql);
                
                // Loop para preencher as opções no dropdown
                while ($lin = $res->fetch_array()) {
                    // Verifica se o valor foi selecionado no envio anterior
                    $selected = ($_POST['combustivel'] ?? '') == $lin['Codcomb'] ? 'selected' : '';
                    echo "<option value='{$lin['Codcomb']}' $selected>{$lin['combdsg']}</option>";
                }
            ?>
        </select>
    </label>


    <!-- Número de Portas -->
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Número de Portas:<br>
        <input type="number" name="portas" min="0" placeholder="Ex.: 4" value="<?= htmlspecialchars($_POST['portas'] ?? '') ?>" style="color: #303030; font-family: Poppins; width: 91%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
    </label>

    <!-- Número de Lugares -->
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Número de Lugares:<br>
        <input type="number" name="lugares" min="1" placeholder="Ex.: 5" value="<?= htmlspecialchars($_POST['lugares'] ?? '') ?>" style="color: #303030; font-family: Poppins; width: 90.5%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
    </label>

    <!-- Cor -->
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Cor do Carro:<br>
        <select name="cor" style="font-family: Poppins; color: #555; width: 97.8%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
            <option value="">Selecione uma cor</option>
            <?php
            $cores = ['Preto', 'Branco', 'Prata', 'Azul', 'Vermelho', 'Cinzento ', 'Bege', 'Verde'];
            foreach ($cores as $cor) {
                $selected = ($_POST['cor'] ?? '') == $cor ? 'selected' : '';
                echo "<option value='$cor' $selected>$cor</option>";
            }
            ?>
        </select>
    </label>
    <!-- Botões de Limpar Filtros e Aplicar Filtro -->
    <a href="index.php?cmd=pesquisa" style="font-size: 15px; color: #f39c12; text-decoration: none; font-family: Poppins, sans-serif; display: inline-flex; justify-content: center; align-items: center; padding: 15px 20px;" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">
        Limpar Filtro
    </a>
    <!-- Botão de Pesquisa -->
    <button type="submit" style="font-family: Poppins; max-width: 250px; margin: 10px; padding: 15px 15px; background-color: #f39c12; color: white; font-size: 14px; font-weight: bold; border: 2px solid #f39c12; border-radius: 5px; cursor: pointer; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='white'; this.style.color='#f39c12'; this.style.borderColor='#f39c12';" onmouseout="this.style.backgroundColor='#f39c12'; this.style.color='white'; this.style.borderColor='#f39c12';">
        Aplicar Filtro
    </button>

</form>
<br>
<?php
// Atribuição de variáveis com base em $_REQUEST
$marca = !empty($_REQUEST['marca']) ? intval($_REQUEST['marca']) : null;
$modelo = !empty($_REQUEST['modelo']) ? intval($_REQUEST['modelo']) : null;
$tipo_veiculo = !empty($_REQUEST['tipo_veiculo']) ? intval($_REQUEST['tipo_veiculo']) : null;
$preco_min = !empty($_REQUEST['preco_min']) ? floatval($_REQUEST['preco_min']) : null;
$preco_max = !empty($_REQUEST['preco_max']) ? floatval($_REQUEST['preco_max']) : null;
$quilometros = !empty($_REQUEST['quilometros']) ? intval($_REQUEST['quilometros']) : null;
$ano_min = !empty($_REQUEST['ano_min']) ? intval($_REQUEST['ano_min']) : null;
$ano_max = !empty($_REQUEST['ano_max']) ? intval($_REQUEST['ano_max']) : null;
$combustivel = !empty($_REQUEST['combustivel']) ? intval($_REQUEST['combustivel']) : null;
$portas = !empty($_REQUEST['portas']) ? intval($_REQUEST['portas']) : null;
$lugares = !empty($_REQUEST['lugares']) ? intval($_REQUEST['lugares']) : null;
$cor = !empty($_REQUEST['cor']) ? $lig->real_escape_string($_REQUEST['cor']) : null;

// Início da consulta SQL
$sql = "SELECT veiculo.*, marca.mardsg AS marca, modelo.moddgs AS modelo, combustivel.combdsg AS comb FROM veiculo INNER JOIN modelo ON veiculo.CodMod = modelo.CodMod INNER JOIN marca ON modelo.CodMarca = marca.CodMarca INNER JOIN combustivel ON combustivel.Codcomb = veiculo.Codcomb WHERE 1=1";

// Construção dinâmica do filtro SQL

// Marca
if ($marca !== null) {
    $sql .= " AND modelo.CodMarca = $marca";
}

// Modelo
if ($modelo !== null) {
    $sql .= " AND modelo.CodMod = $modelo";
}

// Tipo de Veículo
if ($tipo_veiculo !== null) {
    $sql .= " AND CodTpVei = $tipo_veiculo";
}

// Preço Mínimo
if ($preco_min !== null) {
    $sql .= " AND veipre >= $preco_min";
}

// Preço Máximo
if ($preco_max !== null) {
    $sql .= " AND veipre <= $preco_max";
}

// Quilômetros Máximos
if ($quilometros !== null) {
    $sql .= " AND veikm <= $quilometros";
}

// Ano (De)
if ($ano_min !== null) {
    $sql .= " AND veiano >= $ano_min";
}

// Ano (Até)
if ($ano_max !== null) {
    $sql .= " AND veiano <= $ano_max";
}

// Ano (Até)
if ($combustivel !== null) {
    $sql .= " AND veiculo.Codcomb = $combustivel";
}

// Número de Portas
if ($portas !== null) {
    $sql .= " AND veiportas = $portas";
}

// Número de Lugares
if ($lugares !== null) {
    $sql .= " AND veilug = $lugares";
}

// Cor
if ($cor !== null) {
    $sql .= " AND veicor = '$cor'";
}

// Finaliza a consulta com a ordenação desejada, se necessário
$sql .= " ORDER BY veipre ASC";

// Executa a consulta
$res = $lig->query($sql);

if ($res->num_rows > 0) {

// Início da div que contém o título e a caixa de seleção
echo "<div style='display: flex; align-items: center; justify-content: space-between; margin-left: 7%; width: 100%; max-width: 87%; padding: 20px 0;'>";

// Título com o número de resultados
echo "<h2 style='font-family: Poppins, sans-serif; color: #f39c12; text-align: left; margin-left: 0;'>";
echo $res->num_rows . " resultados</h2>";

// Barra de separação
echo "<hr style='flex-grow: 4; border: 0; border-top: 2px solid #ddd; margin: 0 30px;'>";

echo "</div>"; // Fim da div de contagem e caixa de seleção

    while ($lin = $res->fetch_assoc()) {
        // Início da seção do layout para cada veículo
        echo "<a href='anuncio.php?id=" . $lin['CodVei'] . "' style='text-decoration: none; color: inherit;'>
                <section style='background-color: #ffffff; border: 1px solid #ddd; border-radius: 12px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); width: 100%; max-width: 87%; padding: 20px; margin: 10px auto; font-family: Poppins, sans-serif; display: flex; align-items: flex-start; gap: 20px; min-height: 200px; transition: transform 0.3s ease, box-shadow 0.3s ease;' 
                onmouseover='this.style.transform=\"scale(1.05)\"; this.style.boxShadow=\"0 6px 12px rgba(0, 0, 0, 0.2)\";' 
                onmouseout='this.style.transform=\"scale(1)\"; this.style.boxShadow=\"0 4px 8px rgba(0, 0, 0, 0.1)\";'>";

        // Foto do veículo (lado esquerdo) com altura ajustada
        echo "<div style='flex: 0 0 150px; width: auto; height: 200px; object-fit: cover;'>
                <img src='Imagens/caros/" . $lin['fotovei'] . "' alt='Imagem do Veículo' style='width: 300px; height: 100%; border-radius: 8px;'>
              </div>";

        // Informações do veículo (lado direito)
        echo "<div style='flex: 1; padding: 10px;'>";

        // Preço (canto superior direito)
        echo "<div style='font-size: 25px; font-weight: bold; color: #f39c12; text-align: right;'>";
        echo "€ " . number_format($lin['veipre'], 2, ',', '.');
        echo "</div>";

        // Título do veículo (Marca e Modelo)
        echo "<h3 style='font-size: 22px; font-weight: bold; color: #333; margin-top: -10px; margin-bottom: 10px;'>";
        echo $lin['marca'] . " " . $lin['modelo'];
        echo "</h3>";

        // Descrição do veículo
        echo "<h4 style='font-size: 17px; font-weight: bold; color: #333; margin-top: -10px; margin-bottom: 10px;'>";
        echo $lin['veidescricao'];
        echo "</h4>";

        // Ano e Quilometragem
        echo "<p style='font-size: 14px; color: #555; margin-bottom: 5px;'>";
        echo "<strong>Ano:</strong> " . $lin['veiano'] . " | ";
        echo "<strong>Quilómetros:</strong> " . number_format($lin['veikm'], 0, ',', '.') . " km";
        echo "</p>";

        // Número de portas e lugares
        echo "<p style='font-size: 14px; color: #555; margin-bottom: 5px;'>";
        echo "<strong>Portas:</strong> " . $lin['veiportas'] . " | ";
        echo "<strong>Lugares:</strong> " . $lin['veilug'];
        echo "</p>";

        // Cor e Tipo de Combustível
        echo "<p style='font-size: 14px; color: #555; margin-bottom: 5px;'>";
        echo "<strong>Cor:</strong> " . $lin['veicor'] . " | ";
        echo "<strong>Combustível:</strong> " . $lin['comb'];
        echo "</p>";

        // Final da seção
        echo "</div>"; // Fim das informações do veículo
        echo "</section>";
        echo "</a>";
        echo "<br>";
    }
} else {
    echo "<section style='text-align: center; margin-top: 50px;'>";
    echo "<h1 style='font-size: 60px; color: #f39c12; font-family: Poppins, sans-serif;'>OOOPS!</h1>";
    echo "<p style='font-size: 22px; color: #333; font-family: Poppins, sans-serif;'>";
    echo "Parece que nenhum dos nossos veículos encontra-se com os teus parâmetros.";
    echo "</p>";
    echo "<a href='index.php?cmd=pesquisa' style='font-size: 18px; color: #f39c12; text-decoration: none; font-family: Poppins, sans-serif;' onmouseover='this.style.textDecoration=\"underline\";' onmouseout='this.style.textDecoration=\"none\";'>Cancelar filtro</a>";
    echo "</section>";
}
?>
<br><br><br><br>
