<form method="POST" enctype="multipart/form-data" action="index.php?cmd=pesquisa" style="max-width: 1200px; margin: 20px auto; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); display: flex; flex-wrap: wrap; gap: 15px; font-family: 'Poppins', sans-serif;">

    <!-- Marca -->
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Marca:<br>
        <select name="marca" id="marca" style="font-family: Poppins; color: #555; width: 95%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
            <option value="">Selecione uma marca</option>
            <?php
            $sql="select * from marca order by mardsg";
            $res=$lig->query($sql);
            while($lin=$res->fetch_array()) {
                echo "<option value=",$lin['CodMarca'],">",$lin['mardsg'],"</option>\n";
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
            $sql="select * from marca order by mardsg";
            $res=$lig->query($sql);
            while($lin=$res->fetch_array()) {
                echo "<option value=",$lin['CodMarca'],"; style='font-weight: bold;' disabled>",$lin['mardsg'],"</option>\n";
                $sql1="select * from modelo where CodMarca = ".$lin['CodMarca']." order by moddgs";
                $res1=$lig->query($sql1);
                while($lin1=$res1->fetch_array()) {
                    echo "<option value=",$lin1['CodMod']," data-marca=", $lin1['CodMarca'], ">",$lin1['moddgs'],"</option>\n";        
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
        <select name="tipo_veiculo" style="font-family: Poppins; color: #555; width: 95%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
            <option value="">Selecione um tipo</option>
            <?php
            $sql="SELECT * FROM tipovei ORDER BY tipopdsg";
            $res=$lig->query($sql);
            while($lin=$res->fetch_array()) {
                echo "<option value=",$lin['CodTpVei'],">",$lin['tipopdsg'],"</option>\n";
            }
            ?>
        </select>
    </label>

    <!-- Preço -->
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Preço Mínimo (€):<br>
        <input type="number" name="preco_min" placeholder="Ex.: 5000" min="0" style="width: 95%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
    </label>
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Preço Máximo (€):<br>
        <input type="number" name="preco_max" placeholder="Ex.: 50000" min="0" style="width: 95%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
    </label>

    <!-- Quilómetros -->
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Quilómetros Máximos:<br>
        <input type="number" name="quilometros" placeholder="Ex.: 50000" min="0" style="width: 95%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
    </label>

    <!-- Ano -->
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Ano (De):<br>
        <input type="number" name="ano_min" placeholder="Ex.: 2000" min="1900" style="width: 95%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
    </label>
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Ano (Até):<br>
        <input type="number" name="ano_max" placeholder="Ex.: 2024" min="1900" style="width: 95%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
    </label>

    <!-- Número de Portas -->
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Número de Portas:<br>
        <input type="number" name="portas" min="0" placeholder="Ex.: 4" style="width: 95%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
    </label>

    <!-- Número de Lugares -->
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Número de Lugares:<br>
        <input type="number" name="lugares" min="1" placeholder="Ex.: 5" style="width: 95%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
    </label>

    <!-- Cor -->
    <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
        Cor do Carro:<br>
        <select name="cor" style="font-family: Poppins; color: #555; width: 95%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
            <option value="">Selecione uma cor</option>
            <option value="Preto">Preto</option>
            <option value="Branco">Branco</option>
            <option value="Prata">Prata</option>
            <option value="Azul">Azul</option>
            <option value="Vermelho">Vermelho</option>
            <option value="Cinza">Cinza</option>
            <option value="Bege">Bege</option>
            <option value="Verde">Verde</option>
        </select>
    </label>

    <!-- Botão de Pesquisa -->
    <button type="submit" style="flex: 1 1 150%; font-family: Poppins; max-width: 250px; margin: 10px auto; padding: 15px 10px; background-color: #f39c12; color: white; font-size: 14px; font-weight: bold; border: none; border-radius: 5px; cursor: pointer;">
        Aplicar Filtro
    </button>
</form>
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
$portas = !empty($_REQUEST['portas']) ? intval($_REQUEST['portas']) : null;
$lugares = !empty($_REQUEST['lugares']) ? intval($_REQUEST['lugares']) : null;
$cor = !empty($_REQUEST['cor']) ? $lig->real_escape_string($_REQUEST['cor']) : null;

// Início da consulta SQL
$sql = "SELECT * FROM veiculo WHERE 1=1";

// Construção dinâmica do filtro SQL

// Marca
if ($marca !== null) {
    $sql .= " AND CodMarca = $marca";
}

// Modelo
if ($modelo !== null) {
    $sql .= " AND CodMod = $modelo";
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
    while ($lin = $res->fetch_assoc()) {
        // Início da seção do layout para cada veículo
        echo "<section style='background-color: #ffffff; border: 1px solid #ddd; border-radius: 12px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); width: 100%; max-width: 900px; padding: 20px; margin: 20px auto; font-family: Poppins, sans-serif; display: flex; align-items: center; gap: 20px;'>";

        // Informações do veículo
        echo "<div style='flex: 1; padding: 10px;'>";

        // Título do veículo (Marca e Modelo)
        echo "<h3 style='font-size: 22px; font-weight: bold; color: #333; margin-bottom: 10px;'>";
        echo $lin['CodMod'] . " " . $lin['veidescricao'];
        echo "</h3>";

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
        echo "<strong>Combustível:</strong> " . $lin['Codcomb'];
        echo "</p>";

        // Preço
        echo "<p style='font-size: 20px; font-weight: bold; color: #f39c12; margin-top: 10px;'>";
        echo "€ " . number_format($lin['veipre'], 2, ',', '.');
        echo "</p>";

        // Final da seção
        echo "</div>";
        echo "</section>";
    }
} else {
    echo "<p style='font-family: Poppins, sans-serif; font-size: 14px; color: #333;'>Nenhum veículo encontrado.</p>";
}
?>