<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactos</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
        }
        .section-title {
            text-align: center;
            margin-top: 30px;
            font-size: 36px;
            font-weight: bold;
            color: #333;
        }
        .contact-section {
            padding: 40px;
            background-color: white;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }
        .contact-info {
			flex: 1;
			min-width: 300px;
			font-size: 18px;
			color: #555;
			display: flex; 
			flex-direction: column; 
			justify-content: center; 
			height: 450px; 
        }
        .contact-info h4 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }
        .contact-info p {
            font-size: 16px;
            margin-bottom: 15px;
        }
        .map-container {
            flex: 2;
            min-width: 400px;
        }
        iframe {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: none;
            height: 450px;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f39c12;
            font-weight: bold;
        }
        .contact-tables {
            margin: 30px 0;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
	<?php include 'skibidimenu.php'; ?>
    <div class="container">
        <h2 class="section-title">Contacte-nos</h2>
        <div class="contact-section">
            <div class="contact-info">
                <h4>Endereço</h4>
                <p>Av. Pedro Nunes 1, 2635-317 Rio de Mouro</p>
                <h4>Telefone</h4>
                <p>+351 123 456 789</p>
                <h4>Email</h4>
                <p>Lealcars@gmail.com</p>
            </div>
            <div class="map-container">
                <h4>Localização</h4>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3474.9811107564265!2d-9.321189295837682!3d38.782157254596996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd1ece29cc75c5d1%3A0xb51072528893ed5!2sEscola%20Secund%C3%A1ria%20Leal%20da%20C%C3%A2mara!5e0!3m2!1spt-PT!2spt!4v1732098860401!5m2!1spt-PT!2spt" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <div class="contact-tables">
            <h3 class="section-title">Zonas de Contacto</h3>
            <table>
				<thead>
					<tr>
						<th>Zona</th>
						<th>Endereço</th>
						<th>Email</th>
						<th>Número de Telemóvel</th>
					</tr>
				</thead>
			<tbody>
				<tr>
					<td>Norte</td>
					<td><a href="https://www.google.com/maps?q=Rua+das+Flores,+123,+Porto" target="_blank">Rua das Flores, 123, Porto</a></td>
					<td>norte@lealcars.pt</td>
					<td>+351 987 654 321</td>
				</tr>
				<tr>
					<td>Centro</td>
					<td><a href="https://www.google.com/maps?q=Av.+da+Liberdade,+456,+Coimbra" target="_blank">Av. da Liberdade, 456, Coimbra</a></td>
					<td>centro@lealcars.pt</td>
					<td>+351 876 543 210</td>
				</tr>
				<tr>
					<td>Lisboa</td>
					<td><a href="https://www.google.com/maps?q=Praça+do+Comércio,+789,+Lisboa" target="_blank">Praça do Comércio, 789, Lisboa</a></td>
					<td>lisboa@lealcars.pt</td>
					<td>+351 765 432 109</td>
				</tr>
				<tr>
					<td>Algarve</td>
					<td><a href="https://www.google.com/maps?q=Rua+do+Sol,+101,+Faro" target="_blank">Rua do Sol, 101, Faro</a></td>
					<td>algarve@lealcars.pt</td>
					<td>+351 654 321 098</td>
				</tr>
			</tbody>
			</table>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>