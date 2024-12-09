<?php
// Dados recebidos do formulário
$modelo = $_REQUEST['modelo'];
$tipo_veiculo = $_REQUEST['tipovei'];
$quilometros = $_REQUEST['quilometros'];
$ano = $_REQUEST['ano'];
$combustivel = $_REQUEST['combustivel'];
$portas = $_REQUEST['portas'];
$lugares = $_REQUEST['lugares'];
$cor = $_REQUEST['cor'];
$preco = $_REQUEST['preco'];
$descricao = $_REQUEST['descri'];

// Processar as imagens carregadas
$foto1 = basename($_FILES['foto1']['name']);
$foto2 = basename($_FILES['foto2']['name']);
$foto3 = basename($_FILES['foto3']['name']);

// Verificar se as fotos foram carregadas corretamente
if (move_uploaded_file($_FILES['foto1']['tmp_name'], 'Imagens/caros/' . $foto1) &&
    move_uploaded_file($_FILES['foto2']['tmp_name'], 'Imagens/caros/' . $foto2) &&
    move_uploaded_file($_FILES['foto3']['tmp_name'], 'Imagens/caros/' . $foto3)) {

    // Data de hoje
    $data = date('Y-m-d');

    // Inserir dados na tabela 'anuncio'
    $sql1 = "INSERT INTO anuncio (dataanu, estadoanu, CodCli) VALUES ('$data', 'Ativo', '25')";
    if ($lig->query($sql1)) {
        // Obter o CodAnu do último anúncio inserido
        $CodAnu = $lig->insert_id;

        // Inserir dados na tabela 'veiculo'
        $sql2 = "INSERT INTO veiculo (
                    CodMod, CodTpVei, veikm, veiano, CodComb, 
                    veiportas, veilug, veicor, veipre, veidescricao, fotovei, veipot, CodAnun
                 ) VALUES (
                    '$modelo', '$tipo_veiculo', '$quilometros', '$ano', '$combustivel', 
                    '$portas', '$lugares', '$cor', '$preco', '$descricao', '$foto1', '100', '$CodAnu'
                 )";

        if ($lig->query($sql2)) {
            $CodVei = $lig->insert_id;
            $sql3 = "INSERT INTO fotosvei (
                foto, dataft, CodVei
             ) VALUES (
                '$foto2','$data','$CodVei'
             )";
             $lig->query($sql3);
             $sql4 = "INSERT INTO fotosvei (
                foto, dataft, CodVei
             ) VALUES (
                '$foto3','$data','$CodVei'
             )";
             $lig->query($sql4);
            echo "Veículo registrado com sucesso! ID do veículo: " . $lig->insert_id;
            echo "<meta http-equiv=refresh content=2;URL=index.php?cmd=home>";
        } else {
            echo "Erro ao registrar o veículo: " . $lig->error;
            echo "<meta http-equiv=refresh content=2;URL=index.php?cmd=home>";
        }
    } else {
        echo "Erro ao registrar o anúncio: " . $lig->error;
        echo "<meta http-equiv=refresh content=2;URL=index.php?cmd=home>";
    }
} else {
    echo "Erro ao fazer upload das fotos. Veículo não registrado.";
    echo "<meta http-equiv=refresh content=2;URL=index.php?cmd=home>";
}
?>
