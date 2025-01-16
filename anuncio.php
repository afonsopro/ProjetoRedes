<?php 
$car_id = $_REQUEST['id']; 
$sql = "SELECT v.*, moddgs, mardsg, c.*, a.*, co.combdsg 
        FROM Veiculo v, Modelo, Marca, Cliente c, Anuncio a, Combustivel co 
        WHERE (v.CodMod = Modelo.CodMod AND Modelo.CodMarca = Marca.CodMarca 
        AND v.CodAnun = a.CodAnu AND a.CodCli = c.CodCli AND v.Codcomb = co.Codcomb 
        AND v.CodVei = $car_id)"; 
$res = $lig->query($sql); 
$lin = $res->fetch_array(); 
if (!$lin) { 
    die("Nenhum registro encontrado."); 
} 
$sql2 = "SELECT foto FROM FotosVei WHERE CodVei = $car_id ORDER BY CodFoto ASC"; 
$result = $lig->query($sql2); 
?>
<nav style="font-family: Poppins, sans-serif; background-color: #f4f4f9; margin: 0; padding: 0; color: #333;">
<head>
    <title>LealCars - <?php echo htmlspecialchars($lin['mardsg']);?> <?php echo htmlspecialchars($lin['moddgs']);?></title>
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f4f9; margin: 0; padding: 0; color: #333; }
        h1, h2 { margin: 0; color: #333; }
        h1 { font-size: 2.5em; color: #f39c12; text-transform: uppercase; font-weight: bold; }
        h2 { font-size: 2em; color: #f39c12; }
        .slideshow-container { position: relative; width: 100%; max-width: 850px; margin-left: -20px; overflow: hidden; border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); }
        .slides img { width: 100%; height: 550px; object-fit: cover; border-radius: 10px; }
        .prev, .next { cursor: pointer; position: absolute; top: 50%; padding: 16px; color: white; font-weight: bold; font-size: 18px; background-color: rgba(0, 0, 0, 0.5); border: none; border-radius: 50%; margin-top: -22px; z-index: 1; }
        .prev { left: 10px; } .next { right: 10px; }
        .slideshow-container:hover .prev, .slideshow-container:hover .next { background-color: rgba(0, 0, 0, 0.8); }
        .button { background-color: #f39c12; color: white; border: none; padding: 15px; border-radius: 5px; font-size: 18px; cursor: pointer; width: 100%; margin-top: 15px; text-align: center; }
        .button img { vertical-align: middle; }
        .car-details-section { background: #ffffff; padding: 40px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05); margin-bottom: 40px; }
        .car-details-section h3 { color: #f39c12; font-size: 1.5em; margin-bottom: 15px; }
        .car-details-table { width: 100%; border-collapse: collapse; margin-top: 20px; margin-bottom: 40px; }
        .car-details-table th, .car-details-table td { border-bottom: 1px solid #e5e5e5; padding: 12px 15px; text-align: left; font-size: 1em; vertical-align: middle; }
        .car-details-table th { background-color: #f9f9f9; color: #333; font-weight: bold; }
        .car-details-table td { background-color: #fafafa; color: #666; }
        .chat-modal { display: none; position: fixed; z-index: 1000; left: 0%; top: 0%; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.7); }
        .chat-modal-content { background: #fff; margin: 10% auto; padding: 20px; border-radius: 5px; width: 50%; max-width: 600px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); }
        .close-modal { font-size: 24px; cursor: pointer; float: right; }
        .chat-box { height: 300px; overflow-y: auto; border: 1px solid #ddd; padding: 10px; background-color: #f9f9f9; margin-bottom: 10px; border-radius: 5px; }
        .message-input { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; }
        .send-button { background-color: #f39c12; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; margin-left: 10px; }
        @media (max-width: 768px) { .slideshow-container { max-width: 100%; } .car-details-table, .car-details-section { margin-left: 10px; margin-right: 10px; } .chat-modal-content { width: 80%; } }
    </style>
</head>
    <div style="width: 80%; margin: 0 auto;">
        <span style="display: flex; justify-content: space-between; align-items: center; margin: 20px 0;">
            <a href="index.php?cmd=home"><img src="Imagens/voltar1.png" alt="" style="height: 35px;"></a>
            <h1><?php echo htmlspecialchars($lin['mardsg']);?> <?php echo htmlspecialchars($lin['moddgs']);?></h1>
            <h2><?php echo number_format($lin['veipre'], 2, ',', ' ') . " €"; ?></h2>
        </span>
        <section style="display: flex; align-items: center; gap: 20px; padding: 20px;">
            <div class="slideshow-container">
                <div class="slides" style="display: none;">
                    <img src="<?php echo "Imagens/carros/" . $lin['fotovei']; ?>" alt="Imagem 1">
                </div>
                <?php
                $images = [];
                while ($row = $result->fetch_assoc()) {
                    $images[] = $row['foto'];
                }
                foreach ($images as $index => $image): ?>
                    <div class="slides" style="display: none;">
                        <img src="<?php echo 'Imagens/carros/' . htmlspecialchars($image); ?>" alt="Imagem <?php echo $index + 1; ?>">
                    </div>
                <?php endforeach; ?>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>

            <table style="width: 30%; float: right; background-color: white; border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); padding: 20px; margin-left: 150px; font-family: 'Poppins', sans-serif; text-align: center;">
                <tr>
                    <th>
                        <p style="color: #f39c12; font-weight: bold;">Vendedor:</p>
                        <p><?php echo htmlspecialchars($lin['clinome']); ?></p>
                        
                        <p style="color: #f39c12; font-weight: bold;">Telefone:</p>
                        <p><?php echo htmlspecialchars($lin['clitel']); ?></p>
                        
                        <p style="color: #f39c12; font-weight: bold;">Email:</p>
                        <p><?php echo htmlspecialchars($lin['climail']); ?></p>
                        
                        <button style="background-color: #f39c12; color: white; margin-left: 54px;border: none; border-radius: 8px; padding: 10px 20px; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 10px; font-family: 'Poppins', sans-serif; font-size: 1em;" onclick="openModal()">Mensagem</button><br>

                        <div style="margin-top: 0px; display: flex; justify-content: center;">
                            <button id="favoritos_<?php echo $car_id; ?>" 
                                onclick="toggleFavorito(<?php echo $car_id; ?>)" 
                                style="background-color: #f39c12; color: white; border: none; border-radius: 8px; padding: 10px 20px; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 10px; font-family: 'Poppins', sans-serif; font-size: 1em;">
                                <img id="favImg_<?php echo $car_id; ?>" src="Imagens/fav.png" alt="Favorito" height="20px" style="filter: invert(1);">
                                <span>Favoritar</span>
                            </button>
                        </div>
                    </th>
                </tr>
            </table>
        </section>
        <h2 style="font-family: Poppins, sans-serif;">Detalhes</h2><br>
<div class="car-details-section">
    <h3 style="margin-bottom: 20px; font-family: Poppins, sans-serif;">Informações Básicas</h3>
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <tr>
            <th style="width: 30%; text-align: left; padding: 10px; border-bottom: 1px solid #ddd; color: rgb(0, 0, 0); font-weight: bold;">
                Marca
            </th>
            <td style="width: 70%; text-align: left; padding: 10px; border-bottom: 1px solid #ddd; color: rgb(97, 97, 97); padding-left: 200px;">
                <?php echo htmlspecialchars($lin['mardsg']); ?>
            </td>
        </tr>
        <tr>
            <th style="width: 30%; text-align: left; padding: 10px; border-bottom: 1px solid #ddd; color: rgb(0, 0, 0); font-weight: bold;">
                Modelo
            </th>
            <td style="width: 70%; text-align: left; padding: 10px; border-bottom: 1px solid #ddd; color: rgb(97, 97, 97); padding-left: 200px;">
                <?php echo htmlspecialchars($lin['moddgs']); ?>
            </td>
        </tr>
        <tr>
            <th style="width: 30%; text-align: left; padding: 10px; border-bottom: 1px solid #ddd; color: rgb(0, 0, 0); font-weight: bold;">
                Cor
            </th>
            <td style="width: 70%; text-align: left; padding: 10px; border-bottom: 1px solid #ddd; color:rgb(97, 97, 97); padding-left: 200px;">
                <?php echo htmlspecialchars($lin['veicor']); ?>
            </td>
        </tr>
        <tr>
            <th style="width: 30%; text-align: left; padding: 10px; border-bottom: 1px solid #ddd; color: rgb(0, 0, 0); font-weight: bold;">
                Nº Portas
            </th>
            <td style="width: 70%; text-align: left; padding: 10px; border-bottom: 1px solid #ddd; color: rgb(97, 97, 97); padding-left: 200px;">
                <?php echo htmlspecialchars($lin['veiportas']); ?>
            </td>
        </tr>
        <tr>
            <th style="width: 30%; text-align: left; padding: 10px; border-bottom: 1px solid #ddd; color: rgb(0, 0, 0); font-weight: bold;">
                Lugares
            </th>
            <td style="width: 70%; text-align: left; padding: 10px; border-bottom: 1px solid #ddd; color:rgb(97, 97, 97)); padding-left: 200px;">
                <?php echo htmlspecialchars($lin['veilug']); ?>
            </td>
        </tr>
    </table>
    <br>
    <h3 style="margin-bottom: 20px; font-family: Poppins, sans-serif;">Especificações Técnicas</h3>
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <tr>
            <th style="width: 30%; text-align: left; padding: 10px; border-bottom: 1px solid #ddd; color:rgb(0, 0, 0); font-weight: bold;">
                Combustível
            </th>
            <td style="width: 70%; text-align: left; padding: 10px; border-bottom: 1px solid #ddd; color: rgb(97, 97, 97); padding-left: 200px;">
                <?php echo htmlspecialchars($lin['combdsg']); ?>
            </td>
        </tr>
        <tr>
            <th style="width: 30%; text-align: left; padding: 10px; border-bottom: 1px solid #ddd; color: rgb(0, 0, 0); font-weight: bold;">
                Potência
            </th>
            <td style="width: 70%; text-align: left; padding: 10px; border-bottom: 1px solid #ddd; color: rgb(97, 97, 97); padding-left: 200px;">
                <?php echo htmlspecialchars($lin['veipot']) . ' cv'; ?>
            </td>
        </tr>
        <tr>
            <th style="width: 30%; text-align: left; padding: 10px; border-bottom: 1px solid #ddd; color: rgb(0, 0, 0); font-weight: bold;">
                Tipo Veículo
            </th>
            <td style="width: 70%; text-align: left; padding: 10px; border-bottom: 1px solid #ddd; color: rgb(97, 97, 97); padding-left: 200px;">
                SUV
            </td>
        </tr>
        <tr>
            <th style="width: 30%; text-align: left; padding: 10px; border-bottom: 1px solid #ddd; color: rgb(0, 0, 0); font-weight: bold;">
                Tipo de Caixa
            </th>
            <td style="width: 70%; text-align: left; padding: 10px; border-bottom: 1px solid #ddd; color:rgb(97, 97, 97); padding-left: 200px;">
                Manual
            </td>
        </tr>
    </table>
</div>

    </div>

    <div id="chatModal" class="chat-modal">
        <div class="chat-modal-content">
            <span onclick="closeModal()" class="close-modal">&times;</span>
            <h2>Chat</h2>
            <div id="chatBox" class="chat-box"></div>
            <div>
                <input type="text" id="messageInput" class="message-input" placeholder="Digite sua mensagem">
                <button class="send-button" onclick="sendMessage()">Enviar</button>
            </div>
        </div>
    </div>

    <script>
        var slideIndex = 0;
        function showSlides(n) {
            var slides = document.getElementsByClassName("slides");
            if (n >= slides.length) { slideIndex = 0; }
            if (n < 0) { slideIndex = slides.length - 1; }
            for (var i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex].style.display = "block";
        }
        function plusSlides(n) { showSlides(slideIndex += n); }
        showSlides(slideIndex);
        function openModal() { document.getElementById("chatModal").style.display = "block"; }
        function closeModal() { document.getElementById("chatModal").style.display = "none"; }
        function sendMessage() {
            const messageInput = document.getElementById("messageInput");
            const chatBox = document.getElementById("chatBox");
            if (messageInput.value.trim() !== "") {
                const message = document.createElement("div");
                message.textContent = messageInput.value;
                message.style.marginBottom = "10px";
                message.style.background = "#f39c12";
                message.style.color = "#fff";
                message.style.padding = "10px";
                message.style.borderRadius = "5px";
                message.style.textAlign = "right"; 
                chatBox.appendChild(message);
                messageInput.value = "";
                chatBox.scrollTop = chatBox.scrollHeight;
            }
        }
    </script>
</nav>
