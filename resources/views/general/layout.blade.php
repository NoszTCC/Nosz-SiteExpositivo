<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Empresa que viabiliza o Reaproveitamento de Alimentos">
    <meta name="author" content="Nósz">
    <meta name="Copyright" content="Copyright © Nósz.co 2024">
    <meta name="keywords"
        content="nosz, reaproveitamento, alimentos, reaproveitamento de alimentos,
            comida para o nosso povo, app de reaproveitamento, empresa de reaproveitamento, grupo de reaproveitamento">

    <title> Nósz </title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('imgs/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('imgs/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('imgs/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('imgs/favicons/site.webmanifest') }}">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vegas.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilosGerais.css') }}" rel="stylesheet">
</head>

<body>

    <main>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ '/' }}">
                    <img src="{{ asset('imgs/favicons/logo.png') }}" class="navbar-brand-image img-fluid"
                        alt="Logo da Nósz"> Nósz </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{ '/#inicio' }}"> Início </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{ '/#sobre' }}"> Sobre </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{ '/#parcerias' }}"> Parcerias </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{ '/#avaliacoes' }}"> Avaliações </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{ '/#contatos' }}"> Contatos </a>
                        </li>
                    </ul>

                    <div class="ms-lg-3">
                        <a class="btn personalizado-btn personalizado-border-btn" href="{{ '/download' }}">
                            Experimente nosso app! <i class="bi-arrow-up-right ms-2"> </i>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        @yield('Index')
        @yield('Download')
    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12 me-auto">
                    <em class="d-block mb-4"> Onde nos encontrar? </em>

                    <strong>
                        <i class="bi-geo-alt me-2"></i>
                        R. Conceição da Pedra, 152 - Bonsucesso, Guarulhos - SP, 07176-560
                    </strong>

                    <ul class="social-icone mt-4">
                        <li class="social-icone-item">
                            <a target="_blank" class="social-icone-link bi-facebook" title="Facebook" rel="noopener"
                                href="https://www.facebook.com/profile.php?id=61556614689733">
                            </a>
                        </li>

                        <li class="social-icone-item">
                            <a target="_blank" class="social-icone-link bi-twitter" title="X/Twitter" rel="noopener"
                                href="https://twitter.com/NoszTCC">
                            </a>
                        </li>

                        <li class="social-icone-item">
                            <a target="_blank" class="social-icone-link bi-instagram" title="Instagram" rel="noopener"
                                href="https://www.instagram.com/noszdevs/">
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-12 mt-4 mb-3 mt-lg-0 mb-lg-0">
                    <em class="d-block mb-4"> Contatos </em>

                    <p class="d-flex">
                        <strong class="me-2"> Email: </strong>

                        <a href="mailto:nosztcc@gmail.com" class="site-footer-link"> nosztcc@gmail.com </a>
                    </p>
                </div>

                <div class="col-lg-5 col-12">
                    <em class="d-block mb-4"> Parcerias </em>

                    <div class="d-flex">
                        <a target="_blank" href="https://www.instagram.com/texasburguerlanch/" rel="noopener">
                            <img src="{{ asset('imgs/parcerias/texasburguer.png') }}"
                                class="avaliacoes-block-image img-fluid" alt="Restaurante Texas Burguer">
                            <strong class="mt-4"> Texas Burguer Lanch </strong>
                        </a>
                    </div>

                    <div class="d-flex">
                        <a target="_blank" href="https://www.cps.sp.gov.br/" rel="noopener">
                            <img src="{{ asset('imgs/parcerias/CPS.png') }}" class="avaliacoes-block-image img-fluid"
                                alt="ETEC - CPS">
                            <strong class="mt-4"> Centro Paula de Souza </strong>
                        </a>
                    </div>
                </div>

                <div class="col-lg-8 col-12 mt-4">
                    <p class="copyright-text mb-0">
                        Copyright adaptado pela © Nósz.co 2024 - Template do Design:
                        <a rel="noopener" href="https://www.tooplate.com" target="_blank"> Tooplate </a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('js/click-scroll.js') }}"></script>
    <script src="{{ asset('js/vegas.min.js') }}"></script>
    <script src="{{ asset('js/personalizado.js') }}"></script>
</body>

</html>
