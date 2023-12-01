<?php
session_start();
require_once __DIR__ .'/tcpdf/tcpdf.php';

function create_termo(){
  // create new PDF document
  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

  // set document information
  $pdf->SetCreator(PDF_CREATOR);
  $pdf->SetAuthor('Sofia Fala - Coleta');
  $pdf->SetTitle('Projeto Sofia Fala - Coleta');
  $pdf->SetSubject('Sofia Fala - Coleta - Termo');
  $pdf->SetKeywords('Sofia Fala - Coleta, Termo, Voz');

  // set default header data
  $pdf->SetHeaderData('Termo de Doação de Voz', '');

  // set header and footer fonts
  $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
  $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

  // set default monospaced font
  $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

  //set margins
  $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
  $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
  $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

  //set auto page breaks
  $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

  //set image scale factor
  $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

  //set some language-dependent strings
  $pdf->setLanguageArray($l);

  // ---------------------------------------------------------

  // set default font subsetting mode
  $pdf->setFontSubsetting(true);

  // Set font
  // dejavusans is a UTF-8 Unicode font, if you only need to
  // print standard ASCII chars, you can use core fonts like
  // helvetica or times to reduce file size.
  $pdf->SetFont('dejavusans', '', 10, '', true);

  // Add a page
  // This method has several options, check the source code documentation for more information.
  $pdf->AddPage();

  // Set some content to print
  $html = '<p><b>Título da Pesquisa:</b> SofiaFala - composição de corpus para reconhecimento e análise em apraxias</p></br>
  <p><b>Professora orientadora:</b> Profa. Dra. Alessandra Alaniz Macedo da FFCLRP-USP</p> </br>
  <p><b>Professora Co-orientadora:</b> Dra. Patrícia Pupin Mandrá da FMRP-USP</p> </br>
  <p><b>Bolsista - USP:</b> Elias Gusmão </p></br>

  <p><b>Local de realização da pesquisa:</b> A pesquisa dar-se-á por meio de um sítio web no formato de página hospedado no endereço https://dcm.ffclrp.usp.br/coleta/html/inicio.php que poderá ser acessado da residência, consultório ou qualquer outro lugar com acesso à internet.</p> </br>

    <p><b>A) INFORMAÇÕES AO PARTICIPANTE</b></p>

    </br>
    <p><b>1. Apresentação da pesquisa</b></p>
    <p>Gostaríamos de convidá-lo(a) a participar da pesquisa intitulada Sofia Fala - Coleta (Fala-Para-Texto), conduzida por alunos e professores do curso de mestrado em Ciência da Computação da Universidade de São Paulo – localizado em Ribeirão Preto-SP. Por meio de sítio web participantes voluntários de todas as idades, de ambos os sexos, denominado grupo de usuários colaborativos, farão a leitura de textos, que poderão ser escolhidos nos idiomas português, inglês ou espanhol, de modo que o áudio da pronúncia dos textos fonéticos será armazenado em uma base de dados de áudio, sem que o participante possa ser identificado.</p></br>

    <p><b>2. Objetivos da pesquisa</b></p>
    <p>Esta pesquisa visa armazenar dados de voz (gravação em áudio) dos participantes a partir da pronúncia (emissão de fala) obtida a partir da  leitura de 10 (dez) frases pelo  participante, as quais serão gravadas em formato de arquivo de áudio digital em um banco de dados do computador que hospeda o site de coleta. A partir deste banco de dados, não é possível a identificação do participante que forneceu a voz com a pronúncia dos textos. O objetivo é que a partir de uma quantidade considerável de participantes, onde cada um lê o mesmo texto, seja possível treinar um sistema de computador (rede neural) para que ele possa compreender o mecanismo de fala e fonética, e então, a partir da recepção do áudio em um microfone, este sistema tenha a capacidade de transcrever de maneira textual, e avaliar aquilo que foi dito pelo participante.</p></br>

    <p><b>3. Participação na pesquisa</b></p>
    <p>Poderão participar desta pesquisa, fornecendo seus dados de voz, pessoas de ambos os sexos com qualquer idade (menores de idade poderão ter seus cuidadores ou responsáveis legais como assinantes deste documento e apoiadores na inclusão de informações básicas e na leitura de frases para que as crianças possam repetir), e que tenham acesso à Internet. É vedada a participação de pessoas que não apresentam transtorno de fala diagnosticado por profissional da área de Fonoaudiologia.
       A captura do áudio da leitura dos textos, fornecidas pelo participante, voluntário (a), dar-se-á em dois momentos: no primeiro momento, ao acessar o sítio web, com a plataforma, ao participante será apresentado um termo de consentimento, no qual é informado o procedimento desta pesquisa, e ainda, solicitado dados para fins estatísticos, como sexo – masculino ou feminino – faixa etária, escolaridade, ocupação e região onde reside. O termo de consentimento livre e esclarecido e o de uso de imagem, som e voz, deverá ser aceito para que o participante seja direcionado para a tela de apresentação dos textos para a leitura  e gravação em áudio. No segundo momento, na tela de leitura, os textos aparecerão em um local claro e visível, com letras em cor e tamanho adequados, juntamente com um botão de início e fim da gravação para leitura. Isto se repetirá para as dez frases preparadas pela fonoaudióloga. Ao final da leitura, ao participante será apresentado um botão com o texto "Enviar para o banco de dados", é este botão que faz o devido envio dos dados de áudio coletados para o banco de dados do computador. A qualquer momento, durante a coleta de dados de áudio, a critério do participante, poderá desistir do processo apenas pressionando o botão cancelar apresentado na tela de captura de áudio, sem qualquer ônus. O processo de captura será ofertado em um sítio web, e, portanto, é importante o participante estar em local que ofereça um ambiente livre de interferência de áudio externo ou que esta interferência seja minimizada, como no quarto da casa ou uma sala. </p></br>

    <p><b>4. Confidencialidade</b></p>
    <p>Informamos aos participantes da pesquisa, de forma voluntária, que não é solicitada, em momento algum do processo, qualquer tipo de dado que possibilite a sua identificação pessoal. Desta maneira, o dado de voz fornecido pelo participante, não permitirá ao programa de computador, nem a qualquer membro do projeto de pesquisa, um meio de associar a voz ao participante. Assim, os dados de voz capturados ficarão armazenados em um banco de dados de computador e só poderão ser utilizados pelos membros de grupos de pesquisa que solicitarem via cadastro, análise e permissão da equipe SofiaFala, em toda e qualquer atividade de pesquisa científica. Os dados de voz capturados e armazenados em banco de dados de computador não serão identificados, mantendo-se o sigilo das informações coletadas. E caso o participante queira desistir em qualquer momento do processo, poderá proceder sem nenhum ônus.</p></br>

    <p><b>5. Riscos e Benefícios</b></p></br>
    <p>Informamos que o procedimento desta pesquisa não é invasivo e não haverá risco para a integridade física e/ou emocional, uma vez que você e seu(ua) filho(a) irão realizar uma atividade em casa, no trabalho em qualquer momento de sua disponibilidade, usando um formulário no site do SofiaFala (http://dcm.ffclrp.usp.br/sofiafala/) que pedirá: suas informações básicas de cadastro como nome, email, idade, sexo e tipo de distúrbio diagnosticado e a repetição de algumas frases preparadas pela fonoaudióloga do grupo, Profa Patricia Mandrá, as quais serão gravadas para compor o conjunto de áudios a serem disponibilizados. </p>

    <p><b>6. Direito de sair da pesquisa e a esclarecimentos durante o processo</b></p></br>
    <p>Você e/ou seu(ua) filho(a) poderão parar de participar do estudo a qualquer momento, sem nenhuma penalidade. O procedimento de coleta envolverá risco mínimo quanto a quebra do sigilo. Após sua autorização clicando no botão a seguir, o formulário de informações básicas e as frases serão disponibilizados.
    Durante a pesquisa, o bolsista Elias Gusmão da equipe de TI do projeto e os pesquisadores responsáveis estarão à sua disposição para esclarecer possíveis dúvidas sobre o procedimento e questões éticas  do  projeto.</p>

    <p><b>8. Ressarcimento e indenização</b></p></br>
    <p>Não haverá ressarcimento de despesas, porém participante terá direito a indenização, conforme as leis  vigentes no país, o ressarcimento de eventuais despesas, bem como a indenização,  a título de cobertura material, para reparação de danos imediatos ou tardios,  decorrentes da sua participação na pesquisa, será feito pela pesquisadora responsável, não cabendo ao departamento de Computação e Matemática da  Faculdade de Filosofia, Ciências e Letras de Ribeirão Preto/USP e o departamento de Ciências da Saúde da Faculdade de Medicina de Ribeirão Preto qualquer  responsabilidade quanto aos referidos pagamentos. Será garantida a assistência, se algum problema decorrer desta pesquisa.</p>

    <p><b>ESCLARECIMENTOS SOBRE O COMITÊ DE ÉTICA EM PESQUISA</b></p></br>
    <p>Comitê de Ética em Pesquisa HC e FMRP-USP – Campus Universitário</p>
    <p>Monte Alegre 14048-900 - Ribeirão Preto - SP - Brasil</p>
    <p>Fone: (16) 3602-2228</p>
    <p>E-mail : cep@herp.fmrp.usp.br</p>

    <p><b>B) CONSENTIMENTO</b></p> </br>
    <p>Eu declaro ter conhecimento das informações contidas neste documento e ter recebido respostas claras às minhas questões a propósito da minha participação direta (ou indireta) na pesquisa e, adicionalmente, declaro ter compreendido o objetivo, a natureza, os riscos, benefícios, ressarcimento e indenização relacionados a este estudo. Após reflexão e um tempo razoável, eu decidi, livre e voluntariamente, participar deste estudo, permitindo que os pesquisadores relacionados neste documento obtenham fotografia, filmagem ou gravação de voz de minha pessoa para fins de pesquisa científica/ educacional. As fotografias, vídeos e gravações ficarão sob a propriedade do grupo de pesquisadores pertinentes ao estudo e sob sua guarda. Concordo que o material e as informações obtidas relacionadas a minha pessoa possam ser publicados em aulas, congressos, eventos científicos, palestras ou periódicos científicos. Porém, não devo ser identificado por nome ou qualquer outra forma. Estou consciente que posso deixar o projeto a qualquer momento, sem nenhum prejuízo. Após reflexão e um tempo razoável, eu decidi, livre e voluntariamente, participar deste estudo.</p> </br>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p><b>(Dados informados no formulário apresentado na sequência)</b></p>
    <p>
    Inscrição: '           . $_SESSION['id'] . '<br>
    Nome: '                . $_SESSION['nome'] . '<br>
    E-mail: '              . $_SESSION['email'] . '<br>
    Data de Nascimento: '  . $_SESSION['nasc']. '<br>
    Tipo de Distúrbio:  '  . $_SESSION['disturbio']. '<br>
    Sexo                '  . $_SESSION['sexo']. '<br>
    Telefone: '            . $_SESSION['tel'] . '<br>
    RG: '                  . $_SESSION['rg'] . '<br>
    Endereço: '            . $_SESSION['end'] . '<br>
    Cidade: '              . $_SESSION['cid'] . '<br>
    CEP: '                 . $_SESSION['cep'] . '<br>
    UF: '                  . $_SESSION['uf'] . '<br>
    </p>
    </br>
    <p>Eu declaro ter apresentado o estudo, explicado seus objetivos, natureza, riscos e benefícios e ter respondido da melhor forma possível às questões formuladas. </p></br>
    <p><b>Pesquisador(es)</b></p></br>
    <p>Alessandra Alaniz Macedo</p></br>
    <p>Patrícia Pupin Mandrá </p></br>
    <p><b>Aceito em: </b><i>'.date("d/m/Y").' ás '.date("H.i.s").' por: '.$_SESSION['nome'].'</i></p></br>
    <p>Para todas as questões relativas ao estudo ou para se retirar do mesmo, poderão se comunicar com os responsáveis pela pesquisa pelo email <b>sofiafala.contato@gmail.com</b>, ou pelo telefone <b>(16)3315-4863 </b>.</p></br>

<<<<<<< HEAD
    <p><b>Comitê de Ética em Pesquisa HC e FMRP-USP – Campus Universitário</b></p></br>
=======
    <p><b>Comitê de Ética em Pesquisa HC e FMRP-USP – Campus Universitário</b></p>
    <p><b>Monte Alegre 14048-900 - Ribeirão Preto - SP - Brasil</b></p>
    <p><b>Fone: (16) 3602-2228 </b></p>
    <p><b>E-mail : cep@herp.fmrp.usp.br </b></p>';

    // Print text using writeHTMLCell()
    //$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
    $pdf->WriteHTML($html, true, 0, true, 0);

    // ---------------------------------------------------------

    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    //tipo I, exibe no browser o pdf
    //$pdf->Output('termo.pdf', 'I');

    //tipo E, retorna o pdf
    $pdf->Output(__DIR__.'/termos_saves/termo-'.$_SESSION['id'].'.pdf', 'F');
}
  ?>
