<?php
session_start();
include "includes/ligamysql.php";
$car_id = $_REQUEST['id'];

$sql="select v.*, moddgs, mardsg, c.*, a.*, co.combdsg from Veiculo v, Modelo, Marca, Cliente c, Anuncio a, Combustivel co where (v.CodMod=Modelo.CodMod AND Modelo.CodMarca=Marca.CodMarca AND v.CodAnun=a.CodAnu AND a.CodCli=c.CodCli AND v.Codcomb=co.Codcomb AND v.CodVei=$car_id)";
$res=$lig->query($sql);
$lin=$res->fetch_array();
    if (!$lin) {
        die("Nenhum registro encontrado.");
    }

$sql2 = "SELECT foto FROM FotosVei WHERE CodVei = $car_id ORDER BY CodFoto ASC";
$result = $lig->query($sql2);



?>

<head>
  <title>LealCars - <?php echo htmlspecialchars($lin['mardsg']);?> <?php echo htmlspecialchars($lin['moddgs']);?></title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0;">
<?php
    if(isset($_SESSION['climail'])){	
        require 'includes/menu1.php';
    }
    else{
        require 'includes/menu.php';
    }?>
    <div style="width: 80%; margin: 0 auto;">
        <!-- Header com nome carro e preço -->
         
        <span style="display: flex; justify-content: space-between; align-items: center; margin: 20px 0;">
            <a href="index.php?cmd=home"><button style="margin: none; background-color: #ffffff; border: 0px solid;"><img src="imagens/voltar.png" alt="" style="height: 35px;"></button></a>
            <h1 style="margin-left: -650px;"><?php echo htmlspecialchars($lin['mardsg']);?> <?php echo htmlspecialchars($lin['moddgs']);?></h1>
            <h2><?php echo number_format($lin['veipre'], 2, ',', ' ') . " €"; ?></h2>
        </span>
    <section style="display: flex; align-items: center; gap: 20px; padding: 20px;">
        <!-- Carro imagens -->

        <div class="slideshow-container" style="position: relative; width: 100%; max-width: 600px; margin: auto;">
            <div class="slides" style="display: none; width: 100%;">
                <img src="<?php echo "./imagens/caros/".$lin['fotovei'];?>" alt="Imagem 1" style="width:100%">
            </div>
            <?php
                $images = [];
                while ($row = $result->fetch_assoc()) {
                    $images[] = $row['foto'];
                }
                foreach ($images as $index => $image): ?>
                <div class="slides" style="display: none;">
                    <img src="<?php echo './imagens/caros/' . htmlspecialchars($image); ?>" alt="Imagem <?php echo $index + 1; ?>" style="width:100%">
                </div>
            <?php endforeach; ?>

  

            <!-- Botões de navegação -->
            <a class="prev" onclick="plusSlides(-1)" style="cursor: pointer; position: absolute; top: 50%; padding: 16px; color: white; font-weight: bold; font-size: 18px; background-color: rgba(0, 0, 0, 0.5); border: none; border-radius: 0 3px 3px 0; margin-top: -22px;">&#10094;</a>
            <a class="next" onclick="plusSlides(1)" style="cursor: pointer; position: absolute; top: 50%; right: 0; padding: 16px; color: white; font-weight: bold; font-size: 18px; background-color: rgba(0, 0, 0, 0.5); border: none; border-radius: 3px 0 0 3px; margin-top: -22px;">&#10095;</a>
        </div>

        <table style="float: right; width: 30%; border-radius: 5px;">
        

            <tr>
                <th style="border: 1px solid #ddd; padding: 8px; text-align:left; font-size:15px;">
                    <p>Nome Vendedor: <?php echo htmlspecialchars($lin['clinome']);?></p>
                    <p>Telefone: <?php echo $lin['clitel']?></p>
                    <p>Email: <?php echo $lin['climail']?></p>
                    <button style="background-color: #f39c12; color: #ffffff; border: 0px solid #303030; padding: 10px 20px; border-radius: 5px; font-size: 20px; cursor: pointer; font-family: 'Poppins'; width: 285px; height: 50px;" onclick="openModal()">Mensagem</button><br>
                    <button id="favoritos_<?php echo $car_id; ?>" 
                        onclick="toggleFavorito(<?php echo $car_id; ?>)" 
                        style="background-color: #f39c12; color: #ffffff; border: 0px solid #303030; padding: 10px 20px; border-radius: 5px; font-size: 20px; cursor: pointer; font-family: 'Poppins'; width: 285px; height: 50px; margin-top:10px;">
                    <img id="favImg_<?php echo $car_id; ?>" src="imagens/fav.png" alt="Favorito" height="30px">
                    </button>
                </th>
            </tr>
        </table>
    </section>

    <!-- Destaques-->




    <h2>Detalhes</h2>
    <span style="display: block; background: white; padding: 40px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); margin-bottom: 30px;">
        <!-- Subtítulo -->
        <h3>Informações Básicas</h3>
        <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align:left; height:50px;">Marca</th>
                    <td style="border-bottom: 1px solid #ddd; padding: 8px; height:50px;"><?php echo htmlspecialchars($lin['mardsg']); ?></td>
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align:left; height:50px;">Modelo</th>
                    <td style="border-bottom: 1px solid #ddd; padding: 8px; height:50px;"><?php echo htmlspecialchars($lin['moddgs']); ?></td>
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align:left; height:50px;">Cor</th>
                    <td style="border-bottom: 1px solid #ddd; padding: 8px; height:50px;"><?php echo htmlspecialchars($lin['veicor']); ?></td>
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align:left; height:50px;">Nº Portas</th>
                    <td style="border-bottom: 1px solid #ddd; padding: 8px; height:50px;"><?php echo ($lin['veiportas']); ?></td>
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align:left; height:50px;">Lugares</th>
                    <td style="border-bottom: 1px solid #ddd; padding: 8px; height:50px;"><?php echo ($lin['veilug']); ?></td>
                </tr>
            </table>
            <br>

        <h3>Especificações técnicas</h3>

        <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align:left; height:50px;">Combustível</th>
                    <td style="border-bottom: 1px solid #ddd; padding: 8px; height:50px;"><?php echo htmlspecialchars($lin['combdsg']); ?></td>
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align:left; height:50px;">Potência</th>
                    <td style="border-bottom: 1px solid #ddd; padding: 8px; height:50px;"><?php echo htmlspecialchars($lin['veipot']). 'cv'; ?></td>
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align:left; height:50px;">Tipo Veículo</th>
                    <td style="border-bottom: 1px solid #ddd; padding: 8px; height:50px;"><?php //echo htmlspecialchars($lin['tipopdsg']); ?>SUV</td>
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align:left; height:50px;">Tipo de Caixa</th>
                    <td style="border-bottom: 1px solid #ddd; padding: 8px; height:50px;"><?php //echo htmlspecialchars($lin['caidsg']); ?>Manual</td>
                </tr>
        </table>
    </span>
    
    </div>

<!--Modal-->
<div id="chatModal" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0, 0, 0, 0.5);">
        <div style="background: #fff; margin: 10% auto; padding: 20px; border-radius: 5px; width: 50%; max-width: 600px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
            <span onclick="closeModal()" style="float: right; cursor: pointer; font-size: 24px;">&times;</span>
            <h2>Chat</h2>
            <div id="chatBox" style="height: 300px; overflow-y: auto; border: 1px solid #ddd; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f9f9f9;">
                <!-- Mensagem aparece aqui -->
            </div>
            <div style="display: flex; gap: 10px;">
                <input type="text" id="messageInput" placeholder="Digite sua mensagem" style="flex-grow: 1; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                <button onclick="sendMessage()" style="background-color: #f39c12; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Enviar</button>
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

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Inicializa o slideshow
    showSlides(slideIndex);


    // Abrir o modal
    function openModal() {
        document.getElementById("chatModal").style.display = "block";
    }

    // Fechar o modal
    function closeModal() {
        document.getElementById("chatModal").style.display = "none";
    }

    // Enviar mensagem
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
            message.style.textAlign = "right"; // Mensagem do usuário alinhada à direita
            chatBox.appendChild(message);

            // Limpa o campo de texto
            messageInput.value = "";

            // Rolagem automática para a última mensagem
            chatBox.scrollTop = chatBox.scrollHeight;

            // Envia para o backend (usando AJAX ou WebSocket, por exemplo)
            /*
            fetch("enviarMensagem.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ mensagem: message.textContent })
            }).then(response => response.json())
              .then(data => console.log(data))
              .catch(err => console.error(err));
            */}
        }


        //botão favoritos

        function toggleFavorito(carId) {
       // Obter o botão e a imagem
      const favButton = document.getElementById(`favoritos_${carId}`);
      const favImg = document.getElementById(`favImg_${carId}`);
    
     // Enviar requisição ao servidor para alternar o status do favorito
      fetch('favoritar.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ carId })
      })
     .then(response => response.json())
     .then(data => {
           if (data.success) {
            // Alternar a imagem do botão com base no status retornado
               if (data.isFavorited) {
                favImg.src = "imagens/fav2.png"; // Nova imagem para "Favoritado"
            } else {
                favImg.src = "imagens/fav.png"; // Imagem para "Não Favoritado"
            }
        } else {
            alert('Não foi possível atualizar o favorito. Tente novamente mais tarde.');
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Ocorreu um erro ao tentar favoritar.');
    });
}
</script>
</body>
