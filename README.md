# teste-desenvolvedor-paytour

Passos para testar o projeto:
<br>
1. Renomear arquivo '.env.example' para '.env' e configurá-lo: <br>
    1.1 Configurar sua conexão com o banco de dados <br>
        1.1.1 Exemplo: 
        <br>
            DB_CONNECTION=mysql <br>
            DB_HOST=127.0.0.1 <br>
            DB_PORT=3306 <br>
            DB_DATABASE=dbname <br>
            DB_USERNAME=root <br>
            DB_PASSWORD= 123 <br>
        <br>
    1.2 Configurar seu servidor de emails (eu usei o teste grátis do Mailtrap) </br>
        1.2.1 Exemplo: </br>
        MAIL_MAILER=smtp </br> 
        MAIL_HOST=sandbox.smtp.mailtrap.io </br>
        MAIL_PORT=2525 </br>
        MAIL_USERNAME=abc </br>
        MAIL_PASSWORD=edf </br>
        MAIL_ENCRYPTION=tls </br>
        MAIL_FROM_ADDRESS="hello@example.com" </br>
        MAIL_FROM_NAME="${APP_NAME}" </br>
    </br>
2. composer update </br>
3. php artisan key:generate </br>
4. php artisan serve (in a CLI) </br>
5. npm install </br>
6. npm run dev (in other CLI) </br>
7. Open http://localhost:8000/
        
