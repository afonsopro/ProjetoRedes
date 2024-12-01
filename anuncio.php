<?php
include "includes/ligamysql.php";
$car_id = $_REQUEST['id'];


$sql="select v.*, moddgs, mardsg, c.*, a.*, co.combdsg from Veiculo v, Modelo, Marca, Cliente c, Anuncio a, Combustivel co where (v.CodMod=Modelo.CodMod AND Modelo.CodMarca=Marca.CodMarca AND v.CodVei=$car_id AND v.CodAnun=a.CodAnu AND a.CodCli=c.CodCli AND v.Codcomb=co.Codcomb)";
	$res=$lig->query($sql);

include "includes/menu.php";
 while ($lin=$res->fetch_array()){
?>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0;">

    <div style="width: 80%; margin: 0 auto;">
        <!-- Header com nome carro e preço -->
        <span style="display: flex; justify-content: space-between; align-items: center; margin: 20px 0;">
            <h1><?php echo htmlspecialchars($lin['mardsg']);?> <?php echo htmlspecialchars($lin['moddgs']);?></h1>
            <h2><?php echo number_format($lin['veipre'], 2, ',', ' ') . " €"; ?></h2>
        </span>
    <section style="display: flex; align-items: center; gap: 20px; padding: 20px;">
        <!-- Carro imagens -->
        <div class="slideshow-container" style="position: relative; width: 100%; max-width: 600px; margin: auto;">
            <div class="slides" style="display: none; width: 100%;">
                <img src="<?php echo "./imagens/".$lin['foto'];?>" alt="Imagem 1" style="width:100%">
            </div>
            <div class="slides" style="display: none; width: 100%;">
                <img src="<?php echo "./imagens/".$lin['foto'];?>" alt="Imagem 2" style="width:100%">
            </div>
            <div class="slides" style="display: none; width: 100%;">
                <img src="<?php echo "./imagens/".$lin['foto'];?>" alt="Imagem 3" style="width:100%">
            </div>

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
                    <button style="background-color: #f39c12; color: #ffffff; border: 0px solid #303030; padding: 10px 20px; border-radius: 5px; font-size: 20px; cursor: pointer; font-family: 'Poppins'; width: 285px; height: 50px;">Mensagem</button><br>
                    <a href='favoritos.php?id= '. $car_id . >
                    <button id="favoritos" style="background-color: #f39c12; color: #ffffff; border: 0px solid #303030; padding: 10px 20px; border-radius: 5px; font-size: 20px; cursor: pointer; font-family: 'Poppins'; width: 285px; height: 50px; margin-top:10px;"><img src="imagens/fav.png" alt="" height="30px"></button>
                    </a>
                </th>
            </tr>
        </table>
    </section>

    <!-- Destaques-->




    <h2>Detalhes</h2>
    <span style="display: block; background: white; padding: 40px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin-bottom: 30px;">
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
                    <td style="border-bottom: 1px solid #ddd; padding: 8px; height:50px;"><?php echo htmlspecialchars($lin['tipopdsg']); ?></td>
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align:left; height:50px;">Tipo de Caixa</th>
                    <td style="border-bottom: 1px solid #ddd; padding: 8px; height:50px;"><?php echo htmlspecialchars($lin['caidsg']); ?></td>
                </tr>
            </table>
        </span>
       
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
</script>
</body>
<?php }?>