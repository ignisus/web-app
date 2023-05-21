<!--POWERED BY IGNISUS-->
<?php
include "php/db.php";
?>
<!--HTML-->
<!DOCTYPE html>
<html lang="es">

<head>
    <!--METAS-->
    <meta charset="UTF-8">
    <meta name="robots" content="index, all, follow">
    <meta name="language" content="spanish">
    <meta name="copyright" content="ignisus">
    <meta name="author" content="eldiosx">
    <meta name="audience" content="all">
    <meta name="category" content="community">
    <meta name="description" content="Bienvenid@s a la Comunidad Ignisus, conoce gente de la manera más chill :D">
    <meta name="keywords" content="ignisus, comunidad, games, pokespain, ignisusland">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="email" content="ignisus@pm.me">
    <meta name="ignisusland" content="Ip: minecraft.ignisus.org">
    <!--PWA-->
    <meta name="theme-color" content="#2F3BA2">
    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-status-bar" content="#db4938">
    <link rel="manifest" href="./manifest.json">
    <link rel="shortcut icon" type="image/png" href=".img/icons/icon-512x512.png">
    <link rel="apple-touch-icon" href=".img/icons/icon-512x512.png">
    <link rel="apple-touch-startup-image" href=".img/icons/icon-512x512.png">
    <link rel="apple-touch-icon" href=".img/icons/icon-72x72.png">
    <link rel="apple-touch-icon" href=".img/icons/icon-96x96.png">
    <link rel="apple-touch-icon" href=".img/icons/icon-128x128.png">
    <link rel="apple-touch-icon" href=".img/icons/icon-144x144.png">
    <link rel="apple-touch-icon" href=".img/icons/icon-152x152.png">
    <link rel="apple-touch-icon" href=".img/icons/icon-192x192.png">
    <link rel="apple-touch-icon" href=".img/icons/icon-384x384.png">
    <link rel="apple-touch-icon" href=".img/icons/icon-512x512.png">
    <!--STYLE-->
    <link rel="stylesheet" type="text/css" href="css/forum.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <link rel="icon" type="image/logo" href="img/ignisus.svg">
    <!--SCRIPTS-->
    <script src="js/jquery-3.6.3.js"></script>
    <script src="js/loader.js"></script>
    <script src="js/char-remain.js"></script>

    <!--TITTLE-->
    <title>Comunidad Ignisus</title>
</head>

<body>
    <img class="loader" src="img/pageLoader.gif" alt="cargando..." id="loader">
    <!--TOP-->
    <select class="center" id="language-select">
        <option value="en">English</option>
        <option value="es">Español</option>
    </select>
    <div class="top">
        <div class="theme">
            <input type="checkbox" id="switch" onclick="themeToggle()">
            <label for="switch">
                <i class="icon-sun"></i>
                <i class="icon-moon-o"></i>
            </label>
        </div>
    </div>
    <!--Login-->
    <div class="menuContainerLogin"></div>
    <!--MAIN MENU-->
    <header id="navbar">
        <input type="checkbox" id="btn-mainmenu">
        <label for="btn-mainmenu">
            <img src="../img/mainmenudark.png" class="iconomenu" alt="">
        </label>
        <div class="title_mobile"><a href="/"><img class="logotext" src="img/logotext.png" alt="Foro"></a></div>
        <nav class="mainmenu">
            <ul>
                <li class="title"><a href="/"><img class="logotext" src="img/logotext.png" alt="Foro"></a></li>
                <li class="item"><a href="../shop/"><span class="icon-shopping-bag">&nbsp;</span>Productos</a></li>
                <li class="item"><a href="https://archive.org/details/@eldiosx"><span class="icon-file-empty">&nbsp;</span>Archivos</a></li>
                <li class="item"><a href="pokespain/"><span class="icon-radio-unchecked">&nbsp;</span>PokeSpaña</a></li>
                <li class="item"><a href="ignisusland/"><span class="icon-checkbox-unchecked">&nbsp;</span>IgnisusLand</a></li>
                <li class="item"><a href="https://discord.gg/jbeCEshTur" target="_blank"><span class="icon-bubble2">&nbsp;</span>Discord</a></li>
                <li class="item"><a onclick="hizoClick()" href="mailto:ignisus@pm.me?subject=Reportar"><span class="icon-help">&nbsp;</span>Soporte</a></li>
            </ul>
        </nav>
    </header>
    <!--BODY-->
    <div class="content">
        <section class="noticias">
            <!--FORUM-->
            <div class="in-flex">
                <br>
                <h1><i data-translate="greeting">Ignisus Forum</i></h1><br>
                <p class="info"> (Al pulsar "enviar" usted es el responsable de todo lo que ha escrito. El chat y todos
                    los datos se borrarán cada cierto tiempo) </p><br>
                <div class="contenedor-comentarios">
                    <div class="area-comentar" id="char-count" onload="ajax();">
                        <form action="..//" method="post" class="inputs-comentarios">
                            Nombre: <textarea name="nombre" class="area-nombre" required>Anonymus</textarea>
                            Mensaje: <span class="char-remain-count"></span> caracteres<textarea maxlength="300" id="mensaje" name="mensaje" class="area-comentario" required></textarea>
                            <div class="botones-comentar">
                                <button class="boton-enviar" type="submit" name="enviar" value="Enviar">
                                    Enviar
                                </button>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['enviar'])) {
                            $nombre = $_POST['nombre'];
                            $mensaje = $_POST['mensaje'];

                            // get Ip (security)
                            function clientip()
                            {
                                $ipaddressx = '';
                                if (isset($_SERVER['HTTP_CLIENT_IP']))
                                    $ipaddressx = $_SERVER['HTTP_CLIENT_IP'];
                                else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                                    $ipaddressx = $_SERVER['HTTP_X_FORWARDED_FOR'];
                                else if (isset($_SERVER['HTTP_X_FORWARDED']))
                                    $ipaddressx = $_SERVER['HTTP_X_FORWARDED'];
                                else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
                                    $ipaddressx = $_SERVER['HTTP_FORWARDED_FOR'];
                                else if (isset($_SERVER['HTTP_FORWARDED']))
                                    $ipaddressx = $_SERVER['HTTP_FORWARDED'];
                                else if (isset($_SERVER['REMOTE_ADDR']))
                                    $ipaddressx = $_SERVER['REMOTE_ADDR'];
                                else
                                    $ipaddressx = 'UNKNOWN';
                                return $ipaddressx;
                            }
                            $ipaddress = clientip();
                            $consulta = "INSERT INTO chat (nombre, mensaje, ipaddress) VALUES ('$nombre', '$mensaje', '$ipaddress')";
                            $ejecutar = $conexion->query($consulta);
                            //play a chat sound
                            if ($ejecutar) {
                                #echo "<embed loop='false' src='beep.mp3' hidden='true' autoplay='true'>";
                            }
                        }
                        ?>
                    </div>
                    <div id="x1">
                        <div id="x2">
                            <div id="chat"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--NEWS-->
            <div class="in-flex">
                <div class="box">
                    <h1 class="centrar">Comunidad Ignisus</h1>
                    <br><span>Bienvenid@s a la Comunidad Ignisus, conoce gente de la manera más chill :D</span>
                    <span>&nbsp;Signal Group: <a href="https://signal.group/#CjQKII117e9C-AsIsCwvlAJIPFDArUlu5rbP2UMqXvA3edRHEhBkbAUiJ2u3GIKjM5KcvqNC" target="_blank">SIGNAL GROUP LINK</a></span>
                    <br><a href="img/ignisus.svg" target="_blank">Logo oficial:<img class="logo" src="img/ignisus.svg" alt=""></a>
                </div>
                <!--NEWS-->
                <div class="box">
                    <a>Esta página ha sido testeada en firefox para W3C. Si tienes problemas de visualización cambie a
                        dicho navegador.</a><br><br>
                    <span>&nbsp;Open Source: <a href="https://github.com/ignisus" target="_blank">github.com/ignisus</a></span>
                </div>
            </div>
        </section>
        <footer>
            <div>
                <br>
            </div>
        </footer>
    </div>
    <!--SCRIPTS-->
    <script>
        //MENU
        window.onscroll = function() {
            myFunction()
        };
        var navbar = document.getElementById("navbar");
        var sticky = navbar.offsetTop;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
            } else {
                navbar.classList.remove("sticky");
            }
            document.getElementById("navbar").style.zIndex = "9999";
        }
        //SOPORTE
        function hizoClick() {
            alert("Send email to: ignisus@pm.me");
        }
        //THEME
        (function() {
            let onpageLoad = localStorage.getItem("theme") || "";
            let element = document.body;
            element.classList.add(onpageLoad);
            document.getElementById("theme").textContent =
                localStorage.getItem("theme") || "light";
        })();

        function themeToggle() {
            let element = document.body;
            element.classList.toggle("lightmode");

            let theme = localStorage.getItem("theme");
            if (theme && theme === "lightmode") {
                localStorage.setItem("theme", "");
            } else {
                localStorage.setItem("theme", "lightmode");
            }

            document.getElementById("theme").textContent = localStorage.getItem("theme");
        }
    </script>
    <!--CHAT-->
    <script>
        function ajax() {
            var req = new XMLHttpRequest();

            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200) {
                    document.getElementById('chat').innerHTML = req.responseText;
                }
            }
            req.open('GET', 'php/chat.php', true);
            req.send();
        }

        //refrescar pagina
        setInterval(function() {
            ajax();
        }, 1000);
    </script>
    <script>
        $(document).ready(function() {
            $('.menuContainerLogin').load('./login.html');
        });
    </script>
    <script>
        function translate(language) {
            fetch(`json/${language}.json`)
                .then(response => response.json())
                .then(data => {
                    const elements = document.querySelectorAll('[data-translate]');
                    elements.forEach(element => {
                        const key = element.getAttribute('data-translate');
                        if (data[key]) {
                            element.innerText = data[key];
                        }
                    });
                });
        }

        const languageSelect = document.getElementById('language-select');
        languageSelect.addEventListener('change', function() {
            const selectedLanguage = this.value;
            translate(selectedLanguage);
        });

        // default language
        translate(languageSelect.value);
    </script>

</body>

</html>