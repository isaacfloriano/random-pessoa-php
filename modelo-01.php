<?php
function getStr($string, $start, $end)
{
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}

$nm = ["marcos", "abreu", "murilo", "diego", "aberto", "dario", "micael", "rodrigo", "marlon", "silva", "Abrahao", "Abade", "francisco", "alan", "ronaldo", "marinho", "Abelardo", "magal", "lemos", "thales", "tiago", "Diniz", "luiz", "heitor", "leandro", "arthur", "david", "juan", "diogo", "caue", "joaquin", "isaac", "carlos", "andre", "marrone", "ian"]; ####36####
$nomeemail = $nm[array_rand($nm)];

$sobre = ["rodrigues", "vieira", "castro", "oliveira", "gomes", "almeida", "andrade", "barros", "borges", "campos", "cardoso", "carvalho", "costa", "dias", "dantas", "duarte", "santos", "freitas", "fernandes", "ferreira", "garcia", "gonçalves", "lima", "lopes", "machado", "marques", "bernardo", "martins", "medeiros", "melo", "mendes", "miranda", "monteiro", "moraes", "neves", "moreira"]; ####36####
$sobrenome = $sobre[array_rand($sobre)];

$provedor = array('x@hotmail.com','x@hotmail.com.br','x@gmail.com');
$provedor = $provedor[array_rand($provedor)];

# G E R A D O R      CPF|RG
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => 'https://www.4devs.com.br/ferramentas_online.php',
    CURLOPT_HEADER => 1,
    CURLOPT_FOLLOWLOCATION => 1,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => 'acao=gerar_pessoa&sexo=I&pontuacao=S&idade=0&cep_estado=&txt_qtde=1&cep_cidade='
));
$dados = curl_exec($ch);

$cpf = getStr($dados, 'cpf":"', '"');
$rg = getStr($dados, 'rg":"', '"');

$email = $nomeemail . $sobrenome . rand(000, 999) . $provedor;