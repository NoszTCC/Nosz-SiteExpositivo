@extends('general.layout')
@section('Index')
    <section class="inicio-section d-flex justify-content-center align-items-center" id="inicio">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-4 mx-auto">
                    <em class="bem-vindo"> Bem vindo ao </em>
                    <h1> Nósz </h1>
                    <p class="mb-lg-4 mb-0"> A melhor escolha para o seu dia-a-dia! </p>
                    <a class="btn personalizado-btn personalizado-border-btn smoothscroll me-3" href="#sobre">
                        Objetivos
                    </a>
                    <a class="btn personalizado-btn smoothscroll me-2 mb-2" href="#parcerias">
                        <strong> Parcerias </strong>
                    </a>
                </div>
            </div>
        </div>

        <div class="inicio-slides"></div>
    </section>

    <section class="sobre-section section-padding" id="sobre">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12">
                    <div class="ratio ratio-1x1">
                        <video class="personalizado-video" poster autoplay loop muted>
                            <source src="{{ asset('videos/sobre.mp4') }}" type="video/mp4">
                            <track label="Português" kind="captions" srclang="pt" src="{{ asset('videos/sobre.mp4') }}"
                                default>
                            <track label="English" kind="captions" srclang="en" src="{{ asset('videos/sobre.mp4') }}">
                            <track label="Deutsch" kind="captions" srclang="de" src="{{ asset('videos/sobre.mp4') }}">
                            <track label="Español" kind="captions" srclang="es" src="{{ asset('videos/sobre.mp4') }}">
                            <p> Seu navegador não há compatibildade para a reprodução de vídeos </p>
                        </video>

                        <div class="sobre-video-info d-flex flex-column">
                            <h4 class="mt-auto"> Desde 2023 </h4>

                            <h4> Mudando o mundo. </h4>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-12 mt-4 mt-lg-0 mx-auto">
                    <em> Nósz.co </em>

                    <h3> Propósito Empresarial </h3>

                    <p> Em uma mente onde o desperdício de alimentos é uma preocupação diária, uma oportunidade de negócio
                        surgiu do excedente de produção das pequenas empresas locais. Inspirados pela ideia de reduzir o
                        desperdício e promover a sustentabilidade, um grupo de empreendedores criou a "Nósz". </p>

                    <p> Esta plataforma inovadora conecta produtores locais, restaurantes e consumidores conscientes,
                        resgatando alimentos excedentes do descarte e oferecendo-os a preços acessíveis. Rapidamente, a
                        "Nósz" se tornou uma força na luta contra o desperdício de alimentos, inspirando uma mudança de
                        mentalidade em relação ao consumo e à responsabilidade ambiental. </p>

                    <a href="#equipe" class="smoothscroll btn personalizado-btn personalizado-border-btn mt-3 mb-4">
                        Fundadores
                    </a>
                </div>

                <div class="col-lg-1 col-4 mt-1 mt-lg-0 ">
                    <em> ODS Colaboradas </em>

                    <div class="ods">
                        <img src="{{ asset('imgs/ods/ods2.png') }}" class="ods-block-image img-fluid"
                            alt="Fome Zero e Agricultura Sustentável">

                        <img src="{{ asset('imgs/ods/ods3.png') }}" class="ods-block-image img-fluid"
                            alt="Saude e Bem-Estar">

                        <img src="{{ asset('imgs/ods/ods8.png') }}" class="ods-block-image img-fluid"
                            alt="Trabalho crescente e Crescimento Sustentável">

                        <img src="{{ asset('imgs/ods/ods10.png') }}" class="ods-block-image img-fluid"
                            alt="Redução das Desigualdades">

                        <img src="{{ asset('imgs/ods/ods11.png') }}" class="ods-block-image img-fluid"
                            alt="Cidades e Comunidades Sustentáveis">

                        <img src="{{ asset('imgs/ods/ods12.png') }}" class="ods-block-image img-fluid"
                            alt="Consumo e Produção Responsáveis">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding section-bg" id="equipe">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-12 text-center mb-4 pb-lg-2">
                    <em> Mentes Brilhantes </em>

                    <h2> Mudando o mundo </h2>
                </div>

                <div class="col-lg-3 col-md-6 col-9 mb-4">
                    <div class="equipe-block-wrap">
                        <div class="equipe-block-info d-flex flex-column">
                            <div class="d-flex mb-5">
                                <h4 class="mb-0"> Leonardo </h4>

                                <p class="badge ms-4"> <em> Estratégico </em> </p>
                            </div>

                            <p class="mb-5 mt-5">
                            <ul>
                                <li> Liderança </li>
                                <li> Idealização </li>
                                <li> Dev. Web </li>
                                <li> Tecnologias </li>
                            </ul>
                            </p>
                        </div>

                        <div class="equipe-block-image-wrap">
                            <img src="{{ asset('imgs/equipe/leonardo.png') }}" class="equipe-block-image img-fluid"
                                alt="Leonardo Lucas">
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-9 mb-4">
                    <div class="equipe-block-wrap">
                        <div class="equipe-block-info d-flex flex-column">
                            <div class="d-flex mb-5">
                                <h4 class="mb-0"> Kawan </h4>

                                <p class="badge ms-4"> <em> Tático </em> </p>
                            </div>

                            <p class="mb-5 mt-5">
                            <ul>
                                <li> Documentação </li>
                                <li> Prototipagem </li>
                                <li> Dev. Web </li>
                                <li> Pesquisa de campo </li>
                            </ul>
                            </p>
                        </div>

                        <div class="equipe-block-image-wrap">
                            <img src="{{ asset('imgs/equipe/kawan.png') }}" class="equipe-block-image img-fluid"
                                alt="Kawan Nascimento">
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-9 mb-4">
                    <div class="equipe-block-wrap">
                        <div class="equipe-block-info d-flex flex-column">
                            <div class="d-flex mb-5">
                                <h4 class="mb-0"> Nathan </h4>

                                <p class="badge ms-4"> <em> Tático </em> </p>
                            </div>

                            <p class="mb-5 mt-5">
                            <ul>
                                <li> Documentação </li>
                                <li> Dev. Mobile </li>
                                <li> Dev. Web </li>
                                <li> Design </li>
                            </ul>
                            </p>
                        </div>

                        <div class="equipe-block-image-wrap">
                            <img src="{{ asset('imgs/equipe/nathan.png') }}" class="equipe-block-image img-fluid"
                                alt="Nathan Souza">
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-9 mb-4">
                    <div class="equipe-block-wrap">
                        <div class="equipe-block-info d-flex flex-column">
                            <div class="d-flex mb-5">
                                <h4 class="mb-0"> João </h4>

                                <p class="badge ms-4"> <em> Operacional </em> </p>
                            </div>

                            <p class="mb-5 mt-5">
                            <ul>
                                <li> Documentação </li>
                                <li> Dev. Mobile </li>
                                <li> Design </li>
                                <li> Apresentação </li>
                            </ul>
                            </p>
                        </div>

                        <div class="equipe-block-image-wrap">
                            <img src="{{ asset('imgs/equipe/joao.png') }}" class="equipe-block-image img-fluid"
                                alt="João Pedro">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="parcerias-section section-padding" id="parcerias">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mb-4 mb-lg-0">
                    <div class="parcerias-block-wrap">
                        <div class="text-center mb-4 pb-lg-2">
                            <em> Texas Burguer Lanch </em>
                            <h4> Informações e retratos </h4>

                            <div class="border-bottom mb-2 pb-2">
                                <strong class="ms-auto">
                                    <img src="imgs/parcerias/texasburguer.png" class="parcerias-block-image"
                                        alt="Logo da Texas Burguer Lanch">
                                </strong>
                            </div>
                        </div>

                        <div class="parcerias-block">
                            <div class="d-flex">
                                <h6> Localização </h6>

                                <strong class="ms-auto">
                                    <img src="imgs/parcerias/mapa.png" class="parcerias-block-image"
                                        alt="Localização do restaurante">
                                </strong>
                            </div>

                            <div class="border-top mt-2 pt-2">
                                <small> R. Conceição da Pedra, 152 Bonsucesso, Guarulhos, SP, Brasil </small>
                            </div>
                        </div>

                        <div class="parcerias-block my-4">
                            <div class="d-flex">
                                <strong class="me-auto">
                                    <img src="imgs/parcerias/dentro.png" class="parcerias-block-image"
                                        alt="Dentro do restaurante">
                                </strong>

                                <h6> Dentro do restaurante </h6>

                                <span class="underline"></span>
                            </div>

                            <div class="border-top mt-2 pt-2">
                                <small> Confira nosso ambiente de refeição. </small>
                            </div>
                        </div>

                        <div class="parcerias-block my-4">
                            <div class="d-flex">
                                <h6> Preparação dos alimentos </h6>

                                <strong class="ms-auto">
                                    <video class="parcerias-block-image" autoplay loop muted poster>
                                        <source src="videos/lanch.mp4" type="video/mp4">
                                        <track label="Português" kind="captions" srclang="pt" src="videos/lanch.mp4"
                                            default>
                                        <track label="English" kind="captions" srclang="en" src="videos/lanch.mp4">
                                        <track label="Deutsch" kind="captions" srclang="de" src="videos/lanch.mp4">
                                        <track label="Español" kind="captions" srclang="es" src="videos/lanch.mp4">
                                        <p> Seu navegador não há compatibildade para a reprodução de vídeos </p>
                                    </video>
                                </strong>

                                <span class="underline"></span>
                            </div>

                            <div class="border-top mt-2 pt-2">
                                <small> Cozinhamento dos alimentos em especial para prolongar a data de validade. </small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="parcerias-block-wrap">
                        <div class="text-center mb-4 pb-lg-2">
                            <em> Texas Burguer Lanch </em>
                            <h4> Metodologia </h4>

                            <div class="border-bottom mb-2 pb-2">
                                <small>
                                    <img src="imgs/parcerias/negociacao.png" class="parcerias-block-image"
                                        alt="Selo de negociação">
                                </small>
                            </div>
                        </div>

                        <div class="parcerias-block">
                            <div class="d-flex">
                                <h6> Descoberta </h6>

                                <span class="underline"></span>
                            </div>

                            <div class="border-top mt-2 pt-2">
                                <small> Nossa 1° união estabelecida foi realizada com a hamburgueria Texas Burguer Lanch,
                                    por onde frequentemente visitavamos o estabelecimento para degustar dos excelentes
                                    lanches. Além da aptidão, notou-se grande habilidade na preservação dos produtos,
                                    principalmente nos que passaram das 24 horas da meta de venda não concluída. </small>
                            </div>
                        </div>

                        <div class="parcerias-block my-4">
                            <div class="d-flex">
                                <h6> Expectativas </h6>

                                <span class="underline"></span>
                            </div>

                            <div class="border-top mt-2 pt-2">
                                <small> Pela sua administração de alimentos, será cativante e divisor de águas para a
                                    resolução do problema contra o desperdício de almentos, onde edificou ainda mais a
                                    nossa idealização do tema. </small>
                            </div>
                        </div>

                        <div class="parcerias-block my-4">
                            <div class="d-flex">
                                <h6> Compromisso com a qualidade </h6>

                                <span class="underline"></span>
                            </div>

                            <div class="border-top mt-2 pt-2">
                                <small> A Texas Burguer Lanch se compromete a oferecer apenas produtos de alta qualidade,
                                    assegurando que cada oferta atenda às condições próprias para consumo. O parceiro vai
                                    anunciar o produto no app por aprox metade do quilo que vender vai ser 50/50 entre a
                                    Nósz e o parceiro. </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="avaliacoes-section section-padding section-bg" id="avaliacoes">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-12 text-center mb-4 pb-lg-2">
                    <em> Comentários de Clientes </em>

                    <h2> Avaliações </h2>
                </div>

                <div class="avaliacoes">
                    <div class="avaliacoes-container avaliacoes-container-left">
                        <div class="avaliacoes-content">
                            <div class="avaliacoes-block">
                                <div class="avaliacoes-block-image-wrap d-flex align-items-center">
                                    <img src="imgs/avaliacoes/sandra.png" class="avaliacoes-block-image img-fluid"
                                        alt="Sandra">

                                    <h6 class="mb-0"> Sandra </h6>
                                </div>

                                <div class="avaliacoes-block-info">
                                    <p> Fiquei impressionada com a variedade de opções disponíveis na plataforma. É
                                        incrível como podemos encontrar produtos de alta qualidade e com preços
                                        acessíveis enquanto combatemos o desperdício de alimentos. </p>

                                    <div class="d-flex border-top pt-3 mt-4">
                                        <strong> 5 <small class="ms-2"> Classificação </small> </strong>

                                        <div class="avaliacoes-group ms-auto">
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="avaliacoes-container avaliacoes-container-right">
                        <div class="avaliacoes-content">
                            <div class="avaliacoes-block">
                                <div class="avaliacoes-block-image-wrap d-flex align-items-center">
                                    <img src="imgs/avaliacoes/pedro.png" class="avaliacoes-block-image img-fluid"
                                        alt="Pedro">

                                    <h6 class="mb-0"> Pedro </h6>
                                </div>

                                <div class="avaliacoes-block-info">
                                    <p> Adorei a ideia de poder ajudar o meio ambiente enquanto desfruto de
                                        produtos frescos e deliciosos! A entrega foi rápida e os produtos estavam
                                        em ótimo estado. </p>

                                    <div class="d-flex border-top pt-3 mt-4">
                                        <strong> 4 <small class="ms-2"> Classificação </small> </strong>

                                        <div class="avaliacoes-group ms-auto">
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="avaliacoes-container avaliacoes-container-left">
                        <div class="avaliacoes-content">
                            <div class="avaliacoes-block">
                                <div class="avaliacoes-block-image-wrap d-flex align-items-center">
                                    <img src="imgs/avaliacoes/olivia.png" class="avaliacoes-block-image img-fluid"
                                        alt="Olívia">

                                    <h6 class="mb-0"> Olivia </h6>
                                </div>

                                <div class="avaliacoes-block-info">
                                    <p> Estou encantada com a proposta da plataforma! Os produtos que adquiri
                                        superaram minhas expectativas e o processo de compra foi simples e
                                        eficiente. Recomendo a todos que queiram fazer parte dessa mudança
                                        positiva! </p>

                                    <div class="d-flex border-top pt-3 mt-4">
                                        <strong> 5 <small class="ms-2"> Classificação </small> </strong>

                                        <div class="avaliacoes-group ms-auto">
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contatos-section section-padding" id="contatos">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <em> Diga Olá </em>
                    <h2 class="mb-4 pb-lg-2"> Contate-nos </h2>
                </div>

                <div class="col-lg-6 col-12">
                    <form action="{{ route('enviarEMail') }}" method="post" class="personalizado-form contatos-form">
                        @method('post')
                        @csrf

                        @if (session('retorno'))
                            <em class="text-white"> {{ session('retorno') }} </em>
                        @endif

                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <label for="name" class="form-label">
                                    Nome <sup class="text-danger"> * </sup>
                                </label>

                                <input type="text" name="nome" id="nome" class="form-control"
                                    placeholder="Seu Nome" required>
                            </div>

                            <div class="col-lg-6 col-12">
                                <label for="email" class="form-label"> Email </label>

                                <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                    class="form-control" placeholder="Seu email@gmail.com" required>
                            </div>

                            <div class="col-12">
                                <label for="message" class="form-label"> Como podemos ajudar? </label>

                                <textarea name="mensagem" id="messagem" rows="4" class="form-control" placeholder="Mensagem" required></textarea>
                            </div>
                        </div>

                        <div class="col-lg-5 col-12 mx-auto mt-3">
                            <button type="submit" class="form-control"> Enviar Mensagem </button>
                        </div>
                    </form>
                </div>

                <div class="col-lg-6 col-12 mx-auto mt-5 mt-lg-0 ps-lg-5">
                    <em> Localização da Texas Burguer Launch </em>

                    <iframe class="google-map" width="100%" height="300" title="Localização da Texas Burguer Launch"
                        referrerpolicy="no-referrer-when-downgrade" allowfullscreen
                        src="https://encurtador.com.br/yBJ78"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
