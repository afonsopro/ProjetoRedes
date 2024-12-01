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
    
    // Redireciona para a página de favoritos após a remoção
    header("Location: index.php?cmd=favoritos");
    exit;  // Garante que o script pare e a página seja redirecionada
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <title>Meus Favoritos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <style>
        /* Estilos para o botão de Remover (X) */
        .remove-btn {
            background-color: transparent;
            border: none;
            color: #d9534f;
            font-size: 20px;
            cursor: pointer;
            margin-bottom: 10px;
        }
        /* Estilos para o botão Mostrar Mais */
        .show-more-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .favorites-container {
            margin: 0 auto;
            max-width: 800px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .favorite-item {
            margin-bottom: 20px;
            padding: 20px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .favorite-item img {
            width: 120px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
        }
        .favorite-item div {
            flex: 1;
            margin-left: 20px;
        }
        .favorite-item h4 {
            margin: 0;
        }
        .favorite-item p {
            margin: 0;
            font-size: 16px;
            color: #666;
        }
        .actions {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-end;
        }
    </style>
</head>
<body style="margin: 0; padding: 20px; font-family: 'Poppins', sans-serif; background-color: #f4f4f4; color: #333; line-height: 1.6;">
    <h2 style="text-align: center;">Os Meus Favoritos</h2>
    <section class="favorites-container">
        <?php if ($result_favoritos->num_rows === 0): ?>
            <p style="text-align: center; font-size: 18px; color: #666;">Nenhum veículo adicionado aos favoritos ainda.</p>
        <?php else: ?>
            <?php while ($fav = $result_favoritos->fetch_assoc()): ?>
                <article class="favorite-item">
                    <img src="uploads/<?= htmlspecialchars($fav['foto']) ?>" alt="Foto do Veículo">
                    <div>
                        <h4><?= htmlspecialchars($fav['veidescricao']) ?></h4>
                        <p>Preço: €<?= htmlspecialchars(number_format($fav['veipre'], 2)) ?></p>
                    </div>
                    <div class="actions">
                        <form method="POST">
                            <input type="hidden" name="CodCar" value="<?= $fav['CodCar'] ?>">
                            <button type="submit" name="remove_favorite" class="remove-btn">
                                &#10005; <!-- Ícone de 'X' -->
                            </button>
                        </form>
                        <a href="detalhes.php?CodCar=<?= $fav['CodCar'] ?>" class="show-more-btn">
                            Mostrar Mais
                        </a>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
</body>
</html>
