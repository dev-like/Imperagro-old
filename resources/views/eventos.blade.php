<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Imperagro</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;600;800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('site/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/footer-000001.css') }}">

    <link rel="stylesheet" href="{{ asset('site/css/evento.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/slick-theme.css') }}">
</head>
<body>
<!-- Cotações -->
<div class="cotacoes">
    <div class="cot cot-1">
        <strong>COTAÇÃO - DÓLAR EUA (PTAX):</strong>
        <span>COMPRA <u>{{ $cotacao_compra }}</u> VENDA <u>{{ $cotacao_venda }}</u></span>
    </div>
    <div class="cot cot-2">
        <strong>COTAÇÃO - BOI GORDO 15KG:</strong> <span>PREÇO <u>R$ 287,50</u></span>
    </div>
</div>

<!-- Menu -->
<nav>
    <div class="content">
        <a href="{{ route('site') }}"><img src="{{ asset('site/images/logo.png') }}" alt="Imperagro logo" class="logo"></a>
        <ul>
            <li><a href="#quem-somos">QUEM SOMOS</a></li>
            <li><a href="#nossos-eventos">NOSSOS EVENTOS</a></li>
            <li><a href="#servicos-solucoes">SERVIÇOS & SOLUÇÕES</a></li>
            <li><a href="#contato">CONTATO</a></li>
        </ul>
        <div class="redes-sociais">
            <a href="{{ $quemSomos->youtube ?? '' }}">
                <svg version="1.2" baseProfile="tiny-ps" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"
                     width="1000" height="1000">
                    <path fill-rule="evenodd" class="shp0"
                          d="M999.6 548.4C999.4 570.8 998.3 593.3 997.1 615.7C996.2 633.1 994.5 650.6 993.1 668.1C990.6 699 985.3 729.3 974 758.4C957.5 801.1 926.3 826.5 882.2 836C868.3 839 853.9 840 839.7 841.1C817.1 842.9 794.4 844 771.7 845.3C764.9 845.7 758 846 751.2 846.2C730.5 846.8 709.9 847.5 689.2 847.9C638.8 848.9 588.4 850.2 538 850.6C497.9 850.9 457.6 850.2 417.4 849.8C394.5 849.6 371.6 849.1 348.7 848.7C324 848.3 299.3 847.7 274.6 847C258.8 846.6 243 846 227.3 845.3C208.2 844.4 189.1 843.8 170.1 842C146.6 839.8 122.9 837.7 100.2 830.1C64.5 818.1 39.4 794.8 26 759.3C18.7 740.1 13.3 720.4 10.1 700.1C8.2 688.3 7.5 676.3 6.5 664.4C5.1 648.4 3.7 632.3 2.5 616.2C1.7 605 0.9 593.7 0.8 582.4C0.3 537.3 0 492.1 0 447C0 431.1 0.7 415.2 1.7 399.3C2.8 379.9 3.9 360.4 5.9 341C7.9 321.8 10 302.6 13.5 283.7C17.8 260.5 24.8 237.9 37.5 217.7C55 190.2 80.4 172.9 111.9 165.3C126.2 161.8 141.2 160.5 155.9 159.2C177.8 157.3 199.8 156.3 221.8 155C228.5 154.6 235.2 154.3 241.9 154.1C263.1 153.5 284.3 152.8 305.5 152.4C355.8 151.4 406 150.1 456.3 149.7C505.9 149.3 555.5 149.8 605.1 150.1C630.3 150.3 655.6 151 680.9 151.7C706.7 152.4 732.5 153.3 758.3 154.3C775.5 154.9 792.6 155.7 809.7 156.8C828.3 157.9 847 159.1 865.5 161C900.6 164.7 930.6 179 953.9 205.9C964.5 218.1 971.5 232.6 976.2 247.9C981.4 264.9 985.9 282.2 989.5 299.7C991.9 311.3 992.1 323.4 993.2 335.3C994.3 347.2 995.5 359.1 996.4 371C997.1 380.6 997.8 390.2 998.1 399.8C998.4 409.6 998.2 419.3 998.2 429.1L999.9 429.1C999.9 468.9 1000.2 508.7 999.6 548.4ZM666.7 490C576.3 442.8 486.7 396.1 396.6 349.2L396.6 629.9C486.9 583.1 576.5 536.7 666.7 490Z"/>
                </svg>
            </a>
            <a href="{{ $quemSomos->facebook ?? '' }}">
                <svg version="1.2" baseProfile="tiny-ps" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"
                     width="1000" height="1000">
                    <path class="shp0"
                          d="M703.2 345.8L564.6 345.8L564.6 255C564.6 220.9 587.3 212.9 603.2 212.9L700.8 212.9L700.8 63L566.2 62.5C416.9 62.5 383 174.3 383 245.9L383 345.8L296.6 345.8L296.6 500.2L383 500.2L383 937.4L564.7 937.4L564.7 500.3L687.3 500.3L703.2 345.8Z"/>
                </svg>
            </a>
            <a href="{{ $quemSomos->instagram ?? '' }}">
                <svg version="1.2" baseProfile="tiny-ps" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"
                     width="1000" height="1000">
                    <path fill-rule="evenodd" class="shp0"
                          d="M993.7 289.6L993.7 709.4C993.7 866.3 866 994 709.1 994L289.3 994C132.4 994 4.7 866.3 4.7 709.4L4.7 289.6C4.7 132.7 132.4 5 289.3 5L709.1 5C866.1 5 993.7 132.7 993.7 289.6ZM895.7 709.4L895.7 289.6C895.7 186.7 812 103 709.1 103L289.3 103C186.4 103 102.7 186.7 102.7 289.6L102.7 709.4C102.7 812.3 186.4 896 289.3 896L709.1 896C812 896 895.8 812.3 895.8 709.4L895.7 709.4ZM755.9 499.5C755.9 641 640.8 756.2 499.2 756.2C357.6 756.2 242.4 641.1 242.4 499.5C242.4 357.9 357.6 242.7 499.2 242.7C640.8 242.7 756 357.9 755.9 499.5ZM658 499.5C658 411.9 586.8 340.7 499.2 340.7C411.6 340.7 340.4 411.9 340.4 499.5C340.4 587.1 411.6 658.3 499.2 658.3C586.8 658.3 658 587.1 658 499.5ZM826.7 235.7C826.7 272.8 796.5 302.9 759.5 302.9C722.4 302.9 692.3 272.7 692.3 235.7C692.3 198.6 722.5 168.5 759.5 168.5C796.5 168.5 826.7 198.6 826.7 235.7Z"/>
                </svg>
            </a>
        </div>
    </div>

    <div class="content-mobile">
        <div class="p">
            <a href="/"><img src="{{ asset('site/images/logo.png') }}" alt="Imperagro logo" class="logo"></a>
            <a href="#" class="menu-mob"><img src="{{ asset('site/images/menu.png') }}" alt=""></a>
        </div>
        <div class="l">
            <ul>
                <li><a href="#quem-somos">QUEM SOMOS</a></li>
                <li><a href="#nossos-eventos">NOSSOS EVENTOS</a></li>
                <li><a href="#servicos-solucoes">SERVIÇOS & SOLUÇÕES</a></li>
                <li><a href="#contato">CONTATO</a></li>
            </ul>
            <div class="redes-sociais">
                <a href="#">
                    <svg version="1.2" baseProfile="tiny-ps" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"
                         width="1000" height="1000">
                        <path fill-rule="evenodd" class="shp0"
                              d="M999.6 548.4C999.4 570.8 998.3 593.3 997.1 615.7C996.2 633.1 994.5 650.6 993.1 668.1C990.6 699 985.3 729.3 974 758.4C957.5 801.1 926.3 826.5 882.2 836C868.3 839 853.9 840 839.7 841.1C817.1 842.9 794.4 844 771.7 845.3C764.9 845.7 758 846 751.2 846.2C730.5 846.8 709.9 847.5 689.2 847.9C638.8 848.9 588.4 850.2 538 850.6C497.9 850.9 457.6 850.2 417.4 849.8C394.5 849.6 371.6 849.1 348.7 848.7C324 848.3 299.3 847.7 274.6 847C258.8 846.6 243 846 227.3 845.3C208.2 844.4 189.1 843.8 170.1 842C146.6 839.8 122.9 837.7 100.2 830.1C64.5 818.1 39.4 794.8 26 759.3C18.7 740.1 13.3 720.4 10.1 700.1C8.2 688.3 7.5 676.3 6.5 664.4C5.1 648.4 3.7 632.3 2.5 616.2C1.7 605 0.9 593.7 0.8 582.4C0.3 537.3 0 492.1 0 447C0 431.1 0.7 415.2 1.7 399.3C2.8 379.9 3.9 360.4 5.9 341C7.9 321.8 10 302.6 13.5 283.7C17.8 260.5 24.8 237.9 37.5 217.7C55 190.2 80.4 172.9 111.9 165.3C126.2 161.8 141.2 160.5 155.9 159.2C177.8 157.3 199.8 156.3 221.8 155C228.5 154.6 235.2 154.3 241.9 154.1C263.1 153.5 284.3 152.8 305.5 152.4C355.8 151.4 406 150.1 456.3 149.7C505.9 149.3 555.5 149.8 605.1 150.1C630.3 150.3 655.6 151 680.9 151.7C706.7 152.4 732.5 153.3 758.3 154.3C775.5 154.9 792.6 155.7 809.7 156.8C828.3 157.9 847 159.1 865.5 161C900.6 164.7 930.6 179 953.9 205.9C964.5 218.1 971.5 232.6 976.2 247.9C981.4 264.9 985.9 282.2 989.5 299.7C991.9 311.3 992.1 323.4 993.2 335.3C994.3 347.2 995.5 359.1 996.4 371C997.1 380.6 997.8 390.2 998.1 399.8C998.4 409.6 998.2 419.3 998.2 429.1L999.9 429.1C999.9 468.9 1000.2 508.7 999.6 548.4ZM666.7 490C576.3 442.8 486.7 396.1 396.6 349.2L396.6 629.9C486.9 583.1 576.5 536.7 666.7 490Z"/>
                    </svg>
                </a>
                <a href="#">
                    <svg version="1.2" baseProfile="tiny-ps" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"
                         width="1000" height="1000">
                        <path class="shp0"
                              d="M703.2 345.8L564.6 345.8L564.6 255C564.6 220.9 587.3 212.9 603.2 212.9L700.8 212.9L700.8 63L566.2 62.5C416.9 62.5 383 174.3 383 245.9L383 345.8L296.6 345.8L296.6 500.2L383 500.2L383 937.4L564.7 937.4L564.7 500.3L687.3 500.3L703.2 345.8Z"/>
                    </svg>
                </a>
                <a href="#">
                    <svg version="1.2" baseProfile="tiny-ps" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"
                         width="1000" height="1000">
                        <path fill-rule="evenodd" class="shp0"
                              d="M993.7 289.6L993.7 709.4C993.7 866.3 866 994 709.1 994L289.3 994C132.4 994 4.7 866.3 4.7 709.4L4.7 289.6C4.7 132.7 132.4 5 289.3 5L709.1 5C866.1 5 993.7 132.7 993.7 289.6ZM895.7 709.4L895.7 289.6C895.7 186.7 812 103 709.1 103L289.3 103C186.4 103 102.7 186.7 102.7 289.6L102.7 709.4C102.7 812.3 186.4 896 289.3 896L709.1 896C812 896 895.8 812.3 895.8 709.4L895.7 709.4ZM755.9 499.5C755.9 641 640.8 756.2 499.2 756.2C357.6 756.2 242.4 641.1 242.4 499.5C242.4 357.9 357.6 242.7 499.2 242.7C640.8 242.7 756 357.9 755.9 499.5ZM658 499.5C658 411.9 586.8 340.7 499.2 340.7C411.6 340.7 340.4 411.9 340.4 499.5C340.4 587.1 411.6 658.3 499.2 658.3C586.8 658.3 658 587.1 658 499.5ZM826.7 235.7C826.7 272.8 796.5 302.9 759.5 302.9C722.4 302.9 692.3 272.7 692.3 235.7C692.3 198.6 722.5 168.5 759.5 168.5C796.5 168.5 826.7 198.6 826.7 235.7Z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</nav>

<div class="banner" style="background-image:url('{{ asset('uploads/eventos/'.$evento->foto) }}')"></div>

<section class="conteudo">
    <div class="content">
        <span><strong>{{ $evento->categoria->nome }}</strong> - <time>{{ $evento->data_evento->format('d/m/Y') }}</time></span>
        <h1>{{ $evento->titulo }}</h1>
        <h5>{{ $evento->sub_titulo }}</h5>
        <article>
            <!-- notícia vai aqui -->
            <p>
                {!! $evento->descricao !!}
            </p>
        </article>
    </div>
</section>

<section class="galeria">
    <div class="content">
        <h2>Galeria</h2>
        <div class="ga-list-foco">
            @foreach($evento->galeria as $galeria)
                <div class="item" style="background-image:url('{{ asset('uploads/galeria/'.$galeria->file) }}')"></div>
            @endforeach
        </div>
        <div class="ga-list-choice">
            @foreach($evento->galeria as $galeria)
                <div class="item" style="background-image:url('{{ asset('uploads/galeria/'.$galeria->file) }}')"></div>
            @endforeach
        </div>
    </div>
</section>

<section class="relacionados">
    <div class="content">
        <h2>Relacionados</h2>
    </div>
    <div class="content list">
        @foreach($eventosRelacionados as $eventoRelacionado)
            <div class="item" style="background-image:url('{{ asset('uploads/eventos/'.$eventoRelacionado->foto) }}')">
                <div class="bg">
                    <a href="#">
                        <h5>{{ $eventoRelacionado->titulo }}</h5>
                        <span>{{ $eventoRelacionado->sub_titulo }}</span>
                        <p>
                            {{ $eventoRelacionado->data_evento->format('d/m/Y') }}: {!! strlen($evento->descricao) > 100 ? substr($evento->descricao, 0 ,100)." ..." : $evento->descricao !!}
                        </p>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- Rodapé -->
<footer id="contato">
    <div class="content">
        <div class="col">
            <img src="{{ asset('site/images/logo.png') }}" alt="Imperagro" class="logo">
        </div>
        <div class="col">
            <h6>Matriz</h6>
            <p>{{ $quemSomos->endereco_matriz ?? '' }}</p>
            <p>{{ $quemSomos->telefone ?? ''}}</p>
            <p>{{ $quemSomos->telefone2 ?? '' }}</p>
        </div>
        <div class="col">
            <h6>Filial</h6>
            <p>{{ $quemSomos->endereco_filial ?? '' }}</p>
            <p>(99)3535-3535</p>
        </div>
        <div class="col">
            <h6>Trabalhe conosco</h6>
            <p>Envie seu currículo. Especifique sua vaga almejada na caixa de assunto do e-mail.</p>
            <a href="mailto:">
                <svg version="1.2" baseProfile="tiny-ps" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                     width="512" height="512">
                    <g>
                        <path class="shp0"
                              d="M10.69 95.16C80.96 154.67 204.26 259.37 240.5 292.01C245.37 296.42 250.58 298.66 256 298.66C261.41 298.66 266.62 296.44 271.47 292.05C307.74 259.38 431.04 154.67 501.31 95.16C505.69 91.46 506.35 84.96 502.81 80.44C494.63 69.99 482.42 64 469.33 64L42.67 64C29.58 64 17.38 69.99 9.19 80.44C5.65 84.96 6.31 91.46 10.69 95.16Z"/>
                        <path class="shp0"
                              d="M505.81 127.41C502.03 125.65 497.58 126.26 494.44 128.95C416.51 195.01 317.05 279.69 285.76 307.88C268.2 323.74 243.82 323.74 226.22 307.86C192.86 277.81 81.18 182.86 17.56 128.95C14.39 126.26 9.94 125.67 6.19 127.4C2.42 129.16 0 132.93 0 137.08L0 405.33C0 428.87 19.14 448 42.67 448L469.33 448C492.87 448 512 428.87 512 405.33L512 137.08C512 132.93 509.58 129.15 505.81 127.41Z"/>
                    </g>
                </svg>
                <span>ENVIAR ></span>
            </a>
        </div>
    </div>
</footer>

<!-- copy -->
<div class="copy">
    <div class="content">
        <div class="copyright">
            Copyright &copy; {{ date('Y') }} IMPERAGRO LTDA. <br> Todos os direitos reservados.
        </div>
        <div class="socials">
            <ul>
                <li>
                    <a href="{{ $quemSomos->youtube ?? '' }}">
                        <svg version="1.2" baseProfile="tiny-ps" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 1000 1000" width="1000" height="1000">
                            <path fill-rule="evenodd" class="shp0"
                                  d="M999.6 548.4C999.4 570.8 998.3 593.3 997.1 615.7C996.2 633.1 994.5 650.6 993.1 668.1C990.6 699 985.3 729.3 974 758.4C957.5 801.1 926.3 826.5 882.2 836C868.3 839 853.9 840 839.7 841.1C817.1 842.9 794.4 844 771.7 845.3C764.9 845.7 758 846 751.2 846.2C730.5 846.8 709.9 847.5 689.2 847.9C638.8 848.9 588.4 850.2 538 850.6C497.9 850.9 457.6 850.2 417.4 849.8C394.5 849.6 371.6 849.1 348.7 848.7C324 848.3 299.3 847.7 274.6 847C258.8 846.6 243 846 227.3 845.3C208.2 844.4 189.1 843.8 170.1 842C146.6 839.8 122.9 837.7 100.2 830.1C64.5 818.1 39.4 794.8 26 759.3C18.7 740.1 13.3 720.4 10.1 700.1C8.2 688.3 7.5 676.3 6.5 664.4C5.1 648.4 3.7 632.3 2.5 616.2C1.7 605 0.9 593.7 0.8 582.4C0.3 537.3 0 492.1 0 447C0 431.1 0.7 415.2 1.7 399.3C2.8 379.9 3.9 360.4 5.9 341C7.9 321.8 10 302.6 13.5 283.7C17.8 260.5 24.8 237.9 37.5 217.7C55 190.2 80.4 172.9 111.9 165.3C126.2 161.8 141.2 160.5 155.9 159.2C177.8 157.3 199.8 156.3 221.8 155C228.5 154.6 235.2 154.3 241.9 154.1C263.1 153.5 284.3 152.8 305.5 152.4C355.8 151.4 406 150.1 456.3 149.7C505.9 149.3 555.5 149.8 605.1 150.1C630.3 150.3 655.6 151 680.9 151.7C706.7 152.4 732.5 153.3 758.3 154.3C775.5 154.9 792.6 155.7 809.7 156.8C828.3 157.9 847 159.1 865.5 161C900.6 164.7 930.6 179 953.9 205.9C964.5 218.1 971.5 232.6 976.2 247.9C981.4 264.9 985.9 282.2 989.5 299.7C991.9 311.3 992.1 323.4 993.2 335.3C994.3 347.2 995.5 359.1 996.4 371C997.1 380.6 997.8 390.2 998.1 399.8C998.4 409.6 998.2 419.3 998.2 429.1L999.9 429.1C999.9 468.9 1000.2 508.7 999.6 548.4ZM666.7 490C576.3 442.8 486.7 396.1 396.6 349.2L396.6 629.9C486.9 583.1 576.5 536.7 666.7 490Z"/>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="{{ $quemSomos->facebook ?? '' }}">
                        <svg version="1.2" baseProfile="tiny-ps" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 1000 1000" width="1000" height="1000">
                            <path class="shp0"
                                  d="M703.2 345.8L564.6 345.8L564.6 255C564.6 220.9 587.3 212.9 603.2 212.9L700.8 212.9L700.8 63L566.2 62.5C416.9 62.5 383 174.3 383 245.9L383 345.8L296.6 345.8L296.6 500.2L383 500.2L383 937.4L564.7 937.4L564.7 500.3L687.3 500.3L703.2 345.8Z"/>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="{{ $quemSomos->instagram ?? '' }}">
                        <svg version="1.2" baseProfile="tiny-ps" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 1000 1000" width="1000" height="1000">
                            <path fill-rule="evenodd" class="shp0"
                                  d="M993.7 289.6L993.7 709.4C993.7 866.3 866 994 709.1 994L289.3 994C132.4 994 4.7 866.3 4.7 709.4L4.7 289.6C4.7 132.7 132.4 5 289.3 5L709.1 5C866.1 5 993.7 132.7 993.7 289.6ZM895.7 709.4L895.7 289.6C895.7 186.7 812 103 709.1 103L289.3 103C186.4 103 102.7 186.7 102.7 289.6L102.7 709.4C102.7 812.3 186.4 896 289.3 896L709.1 896C812 896 895.8 812.3 895.8 709.4L895.7 709.4ZM755.9 499.5C755.9 641 640.8 756.2 499.2 756.2C357.6 756.2 242.4 641.1 242.4 499.5C242.4 357.9 357.6 242.7 499.2 242.7C640.8 242.7 756 357.9 755.9 499.5ZM658 499.5C658 411.9 586.8 340.7 499.2 340.7C411.6 340.7 340.4 411.9 340.4 499.5C340.4 587.1 411.6 658.3 499.2 658.3C586.8 658.3 658 587.1 658 499.5ZM826.7 235.7C826.7 272.8 796.5 302.9 759.5 302.9C722.4 302.9 692.3 272.7 692.3 235.7C692.3 198.6 722.5 168.5 759.5 168.5C796.5 168.5 826.7 198.6 826.7 235.7Z"/>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<script src="{{ asset('site/js/jq.min.js') }}"></script>
<script src="{{ asset('site/js/slick.js') }}"></script>
<script src="{{ asset('site/js/main-000001.js') }}" charset="utf-8"></script>
<script>
		$('.ga-list-foco').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  arrows: false,
		  fade: true,
		  asNavFor: '.ga-list-choice'
		});
		$('.ga-list-choice').slick({
		  slidesToShow: 3,
		  slidesToScroll: 1,
		  asNavFor: '.ga-list-foco',
		  dots: true,
		  arrows: false,
		  centerMode: true,
		  focusOnSelect: true,
		  responsive: [
		    {
		      breakpoint: 768,
		      settings: {
		        slidesToShow: 2,
		      }
		    }
		  ]
		});
</script>
</body>
</html>
