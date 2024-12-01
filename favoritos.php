<?php


// Obtém o ID do cliente logado com base no email armazenado na sessão
$email = $_SESSION['climail'];
$query_cliente = $lig->prepare("SELECT CodCLi FROM cliente WHERE climail = ?");
$query_cliente->bind_param("s", $email);
$query_cliente->execute();
$result_cliente = $query_cliente->get_result();
$cliente = $result_cliente->fetch_assoc();
$CodCLi = $cliente['CodCLi'];

// Busca os veículos favoritos do cliente
$query_favoritos = $lig->prepare("
    SELECT 
        Favoritos.CodCar, 
        Veiculo.veidescricao, 
        Veiculo.veipre, 
        FotosVei.foto 
    FROM Favoritos
    INNER JOIN Veiculo ON Favoritos.CodVei = Veiculo.CodVei
    LEFT JOIN FotosVei ON Veiculo.CodVei = FotosVei.CodVei
    WHERE Favoritos.CodCLi = ?
");
$query_favoritos->bind_param("i", $CodCLi);
$query_favoritos->execute();
$result_favoritos = $query_favoritos->get_result();

// Processa a remoção de um favorito
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_favorite'])) {
    $CodCar = $_POST['CodCar'];
    $query_remove = $lig->prepare("DELETE FROM Favoritos WHERE CodCar = ? AND CodCLi = ?");
    $query_remove->bind_param("ii", $CodCar, $CodCLi);
    $query_remove->execute();
    header("Location: index.php?cmd=favoritos"); // Atualiza a página
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <title>Meus Favoritos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
</head>
<body style="margin: 0; padding: 20px; font-family: 'Poppins', sans-serif; background-color: #f4f4f4; color: #333; line-height: 1.6;">
    <h2 style="text-align: center;">Os Meus Favoritos</h2>
    <section style="margin: 0 auto; max-width: 800px; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <?php if ($result_favoritos->num_rows === 0): ?>
            <p style="text-align: center; font-size: 18px; color: #666;">Nenhum veículo adicionado aos favoritos ainda.</p>
        <?php else: ?>
            <?php while ($fav = $result_favoritos->fetch_assoc()): ?>
                <article style="margin-bottom: 20px; padding: 20px; background: #f9f9f9; border: 1px solid #ddd; border-radius: 10px; display: flex; justify-content: space-between; align-items: center;">
                    <img src="<?= htmlspecialchars($fav['foto']) ?>" alt="Foto do Veículo" style="width: 120px; height: 80px; object-fit: cover; border-radius: 10px;">
                    <div style="flex: 1; margin-left: 20px;">
                        <h4 style="margin: 0;"><?= htmlspecialchars($fav['veidescricao']) ?></h4>
                        <p style="margin: 0; font-size: 16px; color: #666;">Preço: €<?= htmlspecialchars(number_format($fav['veipre'], 2)) ?></p>
                    </div>
                    <form method="POST" style="margin: 0;">
                        <input type="hidden" name="CodCar" value="<?= $fav['CodCar'] ?>">
                        <button type="submit" name="remove_favorite" style="background-color: #d9534f; color: white; border: none; padding: 10px 20px; font-size: 14px; border-radius: 5px; cursor: pointer;">
                            Remover
                        </button>
                    </form>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
</body>
</html>
