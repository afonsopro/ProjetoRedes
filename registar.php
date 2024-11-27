<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta - LealCars</title>
    <script>
        // Função para validar o formulário
        function validarFormulario(event) {
            event.preventDefault(); // Impede o envio até a validação ser feita
            let isValid = true;

            // Obtém os campos
            const clinome = document.getElementById("clinome");
            const climail = document.getElementById("climail");
            const clitel = document.getElementById("clitel");
            const clipass = document.getElementById("clipass");

            // Limpa mensagens de erro existentes
            limparErros();

            // Verificação de nome
            if (clinome.value.trim() === "") {
                mostrarErro(clinome, "Coloque o seu nome");
                isValid = false;
            }

            // Verificação de email
            const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (climail.value.trim() === "") {
                mostrarErro(climail, "Insira um email válido");
                isValid = false;
            } else if (!climail.value.match(emailRegex)) {
                mostrarErro(climail, "O endereço de email deve conter '@', domínio e extensão válida (ex.: .com ou .pt)");
                isValid = false;
            }

            // Verificação de telefone (deve ter exatamente 9 dígitos)
            const telefoneRegex = /^\d{9}$/; // Regex para 9 dígitos numéricos
            if (clitel.value.trim() === "") {
                mostrarErro(clitel, "Insira seu telefone");
                isValid = false;
            } else if (!clitel.value.match(telefoneRegex)) {
                mostrarErro(clitel, "O telefone deve conter exatamente 9 dígitos");
                isValid = false;
            }

            // Verificação de senha
            if (clipass.value.trim() === "") {
                mostrarErro(clipass, "Insira sua senha");
                isValid = false;
            } else if (clipass.value.length < 8) {
                mostrarErro(clipass, "A senha deve ter no mínimo 8 caracteres");
                isValid = false;
            }

            // Se a validação for bem-sucedida, envia o formulário
            if (isValid) {
                event.target.submit();  // Submete o formulário
            }
        }

        // Função para mostrar erro
        function mostrarErro(input, mensagem) {
            const erro = document.createElement("div");
            erro.className = "erro";
            erro.style.color = "red";
            erro.style.fontSize = "14px";
            erro.style.marginTop = "5px";
            erro.textContent = mensagem;
            input.parentNode.appendChild(erro);
        }

        // Função para limpar mensagens de erro
        function limparErros() {
            const erros = document.querySelectorAll(".erro");
            erros.forEach(erro => erro.remove());
        }
    </script>
</head>
<body style="background: radial-gradient(circle at 10% 20%, rgb(255, 197, 61) 0%, rgb(255, 94, 7) 90%); font-family: 'Poppins', sans-serif; margin: 0; padding: 0; height: 100vh;">
    <section style="position: absolute; top: 70%; left: 50%; transform: translate(-50%, -50%); background-color: #ffffff; padding: 30px 40px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); width: 400px; text-align: center;">
        <h2 style="color: #303030; margin-bottom: 20px; font-size: 28px; font-weight: bold;">Criar Conta</h2>
        <form class="form-horizontal well text-center" method="POST" enctype="multipart/form-data" action="index.php?cmd=registar1" onsubmit="validarFormulario(event)">
            <!-- Campo de Nome -->
            <p style="margin-bottom: 20px;">
                <input type="text" id="clinome" name="clinome" placeholder="Digite seu nome" style="padding: 12px 20px; width: 80%; max-width: 300px; border-radius: 5px; border: 1px solid #ccc; font-size: 16px; outline: none; color: #303030; font-family: 'Poppins', sans-serif;">
            </p>

            <!-- Campo de Email -->
            <p style="margin-bottom: 20px;">
                <input type="email" id="climail" name="climail" placeholder="Digite seu e-mail" style="padding: 12px 20px; width: 80%; max-width: 300px; border-radius: 5px; border: 1px solid #ccc; font-size: 16px; outline: none; color: #303030; font-family: 'Poppins', sans-serif;">
            </p>

            <!-- Campo de Telefone -->
            <p style="margin-bottom: 20px;">
                <input type="text" id="clitel" name="clitel" placeholder="Digite seu telefone" style="padding: 12px 20px; width: 80%; max-width: 300px; border-radius: 5px; border: 1px solid #ccc; font-size: 16px; outline: none; color: #303030; font-family: 'Poppins', sans-serif;">
            </p>

            <!-- Campo de Senha -->
            <p style="margin-bottom: 20px;">
                <input type="password" id="clipass" name="clipass" placeholder="Digite sua senha" style="padding: 12px 20px; width: 80%; max-width: 300px; border-radius: 5px; border: 1px solid #ccc; font-size: 16px; outline: none; color: #303030; font-family: 'Poppins', sans-serif;">
            </p>

            <!-- Campo de Upload de Foto -->
            <p style="margin-bottom: 20px;">
                <input type="file" name="Clifoto" accept="image/*" style="padding: 12px 20px; width: 80%; max-width: 300px; border-radius: 5px; border: 1px solid #ccc; font-size: 16px; outline: none; color: #303030; font-family: 'Poppins', sans-serif;">
            </p>

            <!-- Botão de Criar Conta -->
            <button type="submit" style="padding: 12px 20px; background-color: #f39c12; color: #fff; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; width: 80%; max-width: 300px; font-family: 'Poppins', sans-serif;">Criar Conta</button>
            <p style="margin-top: 20px; font-family: 'Poppins', sans-serif;">
                <label style="font-size: 14px; color: #303030;">Já tem Conta?</label>
                <a href="index.php?cmd=login" style="color: red; text-decoration: none; font-size: 14px; font-weight: bold;">Iniciar Sessão</a>
            </p>
        </form>
    </section>
</body>
</html>
