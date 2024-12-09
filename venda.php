<!-- Formulário para revender carro -->
<nav style="font-family: Poppins;">
    <br>
    <!-- Título principal -->
    <h1 style="text-align: center; color: #333; margin-top: 20px; font-size: 35px;">
        Revenda o seu carro usado de forma simples e eficaz,<br> ao seu preço e rigor!
    </h1>
    <br>

    <!-- Subtítulo: Passo 1 -->
    <h2 style="margin-left: 5%; font-size: 26px; color: #f39c12;">
        1º Passo: Indique as características e parâmetros do seu veículo
    </h2>

    <form method="POST" enctype="multipart/form-data" action="index.php?cmd=venda-submit">
        <!-- Contêiner para os campos do Passo 1 -->
        <nav style="max-width: 1200px; margin: 20px auto; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); display: flex; flex-wrap: wrap; gap: 15px; font-family: 'Poppins', sans-serif; justify-content: center;">
            <!-- Marca -->
            <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
                Marca:<br>
                <select name="marca" id="marca" required style="font-family: Poppins; color: #555; width: 95%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
                    <option value="">Selecione uma marca</option>
                    <?php
                    $sql = "SELECT * FROM marca ORDER BY mardsg";
                    $res = $lig->query($sql);
                    while ($lin = $res->fetch_array()) {
                        echo "<option value='{$lin['CodMarca']}' $selected>{$lin['mardsg']}</option>";
                    }
                    ?>
                </select>
            </label>

            <!-- Modelo -->
            <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
                Modelo:<br>
                <select name="modelo" id="modelo" required style="font-family: Poppins; color: #555; width: 95%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
                    <option value="">Selecione um modelo</option>
                    <?php
                    $sql = "SELECT * FROM marca ORDER BY mardsg";
                    $res = $lig->query($sql);
                    while ($lin = $res->fetch_array()) {
                        echo "<option value='' style='font-weight: bold;' disabled>{$lin['mardsg']}</option>";
                        $sql1 = "SELECT * FROM modelo WHERE CodMarca = {$lin['CodMarca']} ORDER BY moddgs";
                        $res1 = $lig->query($sql1);
                        while ($lin1 = $res1->fetch_array()) {
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
                <select name="tipovei" required style="font-family: Poppins; color: #555; width: 97%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
                    <option value="">Selecione um tipo</option>
                    <?php
                    $sql = "SELECT * FROM tipovei ORDER BY tipopdsg";
                    $res = $lig->query($sql);
                    while ($lin = $res->fetch_array()) {
                        echo "<option value='{$lin['CodTpVei']}' $selected>{$lin['tipopdsg']}</option>";
                    }
                    ?>
                </select>
            </label>

            <!-- Quilómetros -->
            <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
                Quilómetros Percorridos:<br>
                <input type="number" required name="quilometros" placeholder="Ex.: 50000" min="0" style="color: #303030; font-family: Poppins; width: 93%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
            </label>

            <!-- Ano -->
            <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
                Ano de Matrícula:<br>
                <input type="number" required name="ano" placeholder="Ex.: 2020" min="1950" style="color: #303030; font-family: Poppins; width: 90.5%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
            </label>

            <!-- Tipo de Combústivel -->
            <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
                Tipo de Combustível:<br>
                <select name="combustivel" required style="font-family: Poppins; color: #555; width: 97.7%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
                    <option value="">Selecione um tipo de combustível</option>
                    <?php
                        // Consulta para buscar os tipos de combustível
                        $sql = "SELECT * FROM combustivel ORDER BY combdsg";
                        $res = $lig->query($sql);
                        
                        // Loop para preencher as opções no dropdown
                        while ($lin = $res->fetch_array()) {
                            // Verifica se o valor foi selecionado no envio anterior
                            echo "<option value='{$lin['Codcomb']}' $selected>{$lin['combdsg']}</option>";
                        }
                    ?>
                </select>
            </label>


            <!-- Número de Portas -->
            <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
                Número de Portas:<br>
                <input type="number" required name="portas" min="0" placeholder="Ex.: 4" style="color: #303030; font-family: Poppins; width: 91%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
            </label>

            <!-- Número de Lugares -->
            <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
                Número de Lugares:<br>
                <input type="number" required name="lugares" min="1" placeholder="Ex.: 5" style="color: #303030; font-family: Poppins; width: 90.5%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
            </label>

            <!-- Cor -->
            <label style="flex: 1 1 30%; font-weight: bold; color: #555;">
                Cor do Carro:<br>
                <select name="cor" required style="font-family: Poppins; color: #555; width: 97.8%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
                    <option value="">Selecione uma cor</option>
                    <?php
                    $cores = ['Preto', 'Branco', 'Prata', 'Azul', 'Vermelho', 'Cinzento ', 'Bege', 'Verde'];
                    foreach ($cores as $cor) {
                        echo "<option value='$cor' $selected>$cor</option>";
                    }
                    ?>
                </select>
            </label>
        </nav>
        <br>

        <!-- Subtítulo: Passo 2 -->
        <h2 style="margin-left: 5%; font-size: 26px; color: #f39c12;">
            2º Passo: Indique a quantia solicitada pelo veículo e escreva uma descrição e comentários adicionais referentes à viatura
        </h2>

        <!-- Campos do Passo 2 -->
        <nav style="max-width: 600px; margin: 20px auto; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); display: flex; flex-direction: column; align-items: center; gap: 15px; font-family: 'Poppins', sans-serif;">
            <!-- Campo: Preço -->
            <label style="width: 100%; max-width: 300px; font-weight: bold; color: #555; text-align: center;">
                Preço Solicitado (€):<br>
                <input type="number" name="preco" required placeholder="Ex.: 5000" min="1" style="color: #303030; font-family: Poppins; width: 100%; max-width: 500px; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px;">
            </label>

            <!-- Campo: Descrição -->
            <label style="width: 100%; max-width: 500px; font-weight: bold; color: #555; text-align: center;">
                Descrição/Comentários:<br>
                <textarea name="descri" required placeholder="Ex.: Este veículo está em boas condições e tem revisão feita recentemente." style="color: #303030; font-family: Poppins; width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 12px; height: 80px; resize: vertical;"></textarea>
            </label>
        </nav>
        <br>

        <!-- Subtítulo: Passo 3 -->
        <h2 style="margin-left: 5%; font-size: 26px; color: #f39c12;">
            3º Passo: Adicione fotos da viatura
        </h2>

        <!-- Upload de imagens -->
        <nav style="max-width: 1200px; margin: 20px auto; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); display: flex; flex-direction: column; align-items: center; gap: 15px; font-family: 'Poppins', sans-serif;">
            <label style="width: 100%; max-width: 1000px; font-weight: bold; color: #555; text-align: center;">
                Principal foto do carro, sendo a foto que aparecerá na capa de pesquisas:<br>
                <input type="file" required name="foto1" id="foto1" accept="image/*" required>
            </label>
            <label style="width: 100%; max-width: 1000px; font-weight: bold; color: #555; text-align: center;">
                2ª foto do carro (Ex.: Parte de lado ou de trás do carro):<br>
                <input type="file" required name="foto2" id="foto2" accept="image/*" required>
            </label>
            <label style="width: 100%; max-width: 1000px; font-weight: bold; color: #555; text-align: center;">
                3ª foto do carro (Ex.: Interior do carro):<br>
                <input type="file" required name="foto3" id="foto3" accept="image/*" required>
            </label>
        </nav>
        <div style="display: flex; justify-content: center; margin: 20px 0;">
    <button type="submit" style="width: 60%; margin-top: 20px; max-width: 500px; padding: 15px; background-color: #f39c12; font-family: 'Poppins', sans-serif; color: white; font-size: 15px; font-weight: bold; border: 2px solid #f39c12; border-radius: 5px; cursor: pointer; text-align: center; transition: all 0.3s ease;" 
        onmouseover="this.style.backgroundColor='white'; this.style.color='#f39c12'; this.style.borderColor='#f39c12';" 
        onmouseout="this.style.backgroundColor='#f39c12'; this.style.color='white'; this.style.borderColor='#f39c12';">
        Anunciar Veículo
    </button>
</div>


    </form>
</nav>