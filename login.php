<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LealCars</title>
</head>
<body style="background: radial-gradient(circle at 10% 20%, rgb(255, 197, 61) 0%, rgb(255, 94, 7) 90%); font-family: 'Poppins', sans-serif; margin: 0; padding: 0; height: 100vh;">
    <section style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #ffffff; padding: 30px 40px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); width: 400px; text-align: center; font-family: 'Poppins', sans-serif;">
        <h2 style="color: #303030; margin-bottom: 20px; font-size: 28px; font-weight: bold;">Login</h2>

        <form class="form-horizontal well text-center" method="POST" enctype="multipart/form-data" action="index.php?cmd=login1" onsubmit="validarFormulario(event)">
            <!-- Campo de Email -->
            <p style="margin-bottom: 20px;">
                <input type="email" name="climail" placeholder="Digite seu e-mail" 
                       style="padding: 12px 20px; width: 80%; max-width: 300px; border-radius: 5px; border: 1px solid #ccc; font-size: 16px; outline: none; color: #303030; font-family: 'Poppins', sans-serif;">
            </p>

            <!-- Campo de Senha -->
            <p style="margin-bottom: 20px;">
                <input type="password" name="clipass" placeholder="Digite sua senha" 
                       style="padding: 12px 20px; width: 80%; max-width: 300px; border-radius: 5px; border: 1px solid #ccc; font-size: 16px; outline: none; color: #303030; font-family: 'Poppins', sans-serif;">
            </p>

            <!-- Botão de Login -->
            <button type="submit" style="padding: 12px 20px; background-color: #f39c12; color: #fff; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; width: 80%; max-width: 300px; font-family: 'Poppins', sans-serif;">Entrar</button>
        </form>

        <!-- Link para criar conta -->
        <p style="margin-top: 20px; font-family: 'Poppins', sans-serif;">
            <label style="font-size: 14px; color: #303030;">Não tem Conta?</label>
            <a href="index.php?cmd=registar" style="color: red; text-decoration: none; font-size: 14px; font-weight: bold;">Criar Conta</a>
        </p>
    </section>
</body>
</html>
