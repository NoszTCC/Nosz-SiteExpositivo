let slidesSecoes = ["inicio", "sobre", "parcerias", "avaliacoes", "contatos"];

$.each(slidesSecoes, function (index, value) {
    if ($("#" + value).length) {
        $(document).scroll(function () {
            let secao = $("#" + value);
            if (secao.length) {
                let deslocamentoSecao = secao.offset().top - 154;
                let scrollagem = $(document).scrollTop();
                let scrollagem1 = scrollagem + 1;

                if (scrollagem1 >= deslocamentoSecao) {
                    $(".navbar-nav .nav-link").removeClass("active");
                    $(".navbar-nav .nav-link:link").addClass("inactive");
                    $(".navbar-nav .nav-item .nav-link").eq(index).addClass("active");
                    $(".navbar-nav .nav-item .nav-link").eq(index).removeClass("inactive");
                }
            }
        });
    }

    if ($("#" + "section_" + value).length && $(".click-scroll").eq(index).length) {
        $(".click-scroll").eq(index).click(function (e) {
            let secao = $("#" + "section_" + value);
            if (secao.length) {
                let deslocamentoClique = secao.offset().top - 154;
                e.preventDefault();

                $("html, body").animate({ scrollTop: deslocamentoClique }, 300);
            }
        });
    }
});

$(".navbar-nav .nav-item .nav-link:link").addClass("inactive");
$(".navbar-nav .nav-item .nav-link").eq(0).addClass("active");
$(".navbar-nav .nav-item .nav-link:link").eq(0).removeClass("inactive");
