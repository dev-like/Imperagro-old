<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Eventos;
use App\Models\Parceiros;
use App\Models\QuemSomos;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use DOMDocument;

class HomeController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        list($cotacao_compra, $cotacao_venda) = $this->cotacao();
        $cotacao_boi = Self::scrapCotacaoBoi();
        $banner = Banner::first();
        $quemSomos = QuemSomos::first();
        $eventos = Eventos::all()->load('categoria');
        $parceiros = Parceiros::all()->groupBy('tipo_servico');
        return view('index', compact('banner', 'quemSomos', 'eventos', 'parceiros', 'cotacao_compra', 'cotacao_venda', 'cotacao_boi'));
    }

    /**
     * @param  string  $slug
     * @return Application|Factory|View
     */
    public function show(string $slug)
    {
        list($cotacao_compra, $cotacao_venda) = $this->cotacao();

        $evento = Eventos::where('slug', $slug)->firstOrFail();
        $eventosRelacionados = Eventos::where('categoria_id', $evento->categoria_id)->limit(2)->get()->load('categoria');
        $quemSomos = QuemSomos::first();

        return view('eventos', compact('cotacao_venda', 'cotacao_compra', 'evento', 'quemSomos', 'eventosRelacionados'));
    }

    public function servico(string $slug)
    {
        list($cotacao_compra, $cotacao_venda) = $this->cotacao();

        if ($slug == 'acompanhamento-da-safra') {
            $servico_titulo = 'Acompanhamento da safra';
            // <h2>Sua safra, nosso compromisso: A Imperagro te acompanha do plantio à colheita!</h2>
            $servico_conteudo = '
                <p>Na Imperagro, sabemos que cada ciclo da sua plantação é único e exige atenção especial. É por isso que oferecemos um <b>acompanhamento completo da sua safra, do plantio à colheita</b>, com a expertise de uma equipe de especialistas e a mais moderna tecnologia à disposição.</p>
                <p>Do que você precisa para ter uma safra de sucesso? Conte com a Imperagro para:</p>
                <ul>
                    <li>Analisar o solo e o clima para indicar as melhores práticas de manejo e adubação.</li>
                    <li>Monitorar o desenvolvimento das plantas, identificando e combatendo pragas e doenças com agilidade.</li>
                    <li>Oferecer soluções personalizadas e inovadoras para maximizar a produtividade da sua lavoura.</li>
                    <li>Garantir a melhor rentabilidade para o seu negócio, com custos controlados e um planejamento estratégico.</li>
                </ul>
                <p>Com a Imperagro, você terá um parceiro que entende as suas necessidades e te acompanha em cada passo do caminho.</p>
                <p><b>Conecte-se com a Imperagro!</b></p>
                <p><b>[Chamadas para ação: entre em contato, agende uma visita, conheça nossos serviços]</b></p>
                <p>Safra de sucesso começa com a Imperagro. Conte conosco!</p>';

        } elseif ($slug == 'provisao-para-a-sua-terra') {
            $servico_titulo = 'Provisão para a sua terra';
            // <h2>Tudo para a sua terra, em um só lugar: Imperagro, a solução completa para o seu plantio!</h2>
            $servico_conteudo = '
                <p>A Imperagro te oferece uma variedade incomparável de produtos para nutrir e fortalecer sua terra,  impulsionando sua colheita e maximizando os seus resultados.</p>
                <p>Com mais de <b>quinhentos itens</b> no nosso catálogo, você encontra tudo que precisa para:</p>
                <ul>
                    <li>Nutrir seu solo com adubos de alta qualidade e formulados para as necessidades específicas de cada cultura.</li>
                    <li>Combater pragas e doenças com defensivos eficazes e seguros, protegendo sua plantação.</li>
                    <li>Utilizar sementes de alta qualidade e genética superior para um plantio vigoroso e produtivo.</li>
                    <li>Acessar insumos e ferramentas essenciais para a realização de todas as etapas do seu plantio, da preparação do solo até a colheita.</li>
                </ul>
                <p>A Imperagro é a sua parceira ideal para garantir o sucesso da sua produção. Desfrute de:</p>
                <ul>
                    <li><b>Variedade</b>: Encontre tudo que você precisa em um único lugar, sem precisar procurar em diversos fornecedores.</li>
                    <li><b>Qualidade</b>: Conte com produtos de marcas renomadas e com tecnologia de ponta, garantindo o máximo desempenho.</li>
                    <li><b>Agilidade</b>: Facilidade e rapidez na compra, com um atendimento personalizado e entregas rápidas.</li>
                    <li><b>Economia</b>: Soluções completas para o seu plantio, com preços competitivos e condições de pagamento facilitadas.</li>
                </ul>
                <p>Com a Imperagro, você planta com tranquilidade e colhe com sucesso.</p>
                <p><b>Acesse nosso catálogo e confira tudo o que temos para oferecer!</b></p>
                <p><b>[Chamadas para ação: visite nosso site, fale com um especialista, consulte o catálogo online]</b></p>
                <p>Sua terra, nossa paixão! Conte com a Imperagro!</p>';

        } elseif ($slug == 'solicite-um-orcamento') {
            $servico_titulo = 'Solicite um orçamento';
            // <h2>Sua próxima colheita de sucesso começa aqui!  Solicite um orçamento da Imperagro!</h2>
            $servico_conteudo = '
                <p>Construir uma parceria forte e duradoura é o nosso objetivo.</p>
                <p>E nada melhor para começar do que entender as suas necessidades e apresentar as melhores soluções para o seu negócio.</p>
                <p><b>Solicite um orçamento sem compromisso e descubra como a Imperagro pode te ajudar a:</b></p>
                <ul>
                    <li>Impulsionar a produtividade da sua lavoura com tecnologias e práticas inovadoras.</li>
                    <li>Economizar recursos com soluções eficientes e personalizadas para o seu plantio.</li>
                    <li>Obter um retorno financeiro mais alto e lucrativo para a sua produção.</li>
                </ul>
                <p>A equipe da Imperagro está pronta para te auxiliar em todas as etapas do seu projeto, desde o planejamento até a colheita.</p>
                <p><b>Entre em contato conosco!  É o primeiro passo para uma parceria de sucesso!</b></p>
                <p><b>[Chamadas para ação: Clique aqui para solicitar um orçamento, ligue para nosso número, preencha o formulário de contato]</b></p>
                <p>Juntos, vamos construir um futuro promissor para a sua agricultura!</p>';
        }

        return view('servicos', compact('cotacao_compra', 'cotacao_venda', 'servico_titulo', 'servico_conteudo'));
    }


    public function cotacao(): array
    {
        $ch = curl_init("https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarDia(dataCotacao=@dataCotacao)?@dataCotacao='".date('m-d-Y')."'&format=json");

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res_curl = curl_exec($ch);
        $resultado = json_decode($res_curl, true);
        if (isset($resultado["value"][0])) {
            $valores = $resultado["value"][0];
            $cotacao_compra = $valores["cotacaoCompra"];
            $cotacao_venda = $valores["cotacaoVenda"];
        } else {
            $cotacao_compra = "Fechado";
            $cotacao_venda = "Fechado";
        }
        curl_close($ch);
        return [$cotacao_compra, $cotacao_venda];
    }

    public function scrapCotacaoBoi()
    {
        $url = "https://www.melhorcambio.com/boi-hoje";
        $html = file_get_contents($url);
        $dom = new DOMDocument();
        @$dom->loadHTML($html);
        $inputs = $dom->getElementsByTagName('input');
        if ($inputs->length > 0) {
            $ultimoInput = $inputs->item($inputs->length - 1);
            $valorUltimoInput = $ultimoInput->getAttribute('value');
            return $valorUltimoInput;
        } else {
            return null;
        }
    }
}
