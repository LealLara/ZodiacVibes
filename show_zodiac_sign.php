<?php include('layouts/header.php'); ?>

<?php

$data_nascimento = $_POST['data_nascimento'];

$signos = simplexml_load_file("signos.xml");

$data = new DateTime($data_nascimento);

$dia_mes = $data->format('d/m');

$signo_encontrado = null;

foreach ($signos->signo as $signo)
{
    $inicio = DateTime::createFromFormat(
        'd/m/Y',
        $signo->dataInicio . '/2024'
    );

    $fim = DateTime::createFromFormat(
        'd/m/Y',
        $signo->dataFim . '/2024'
    );

    $nascimento = DateTime::createFromFormat(
        'd/m/Y',
        $dia_mes . '/2024'
    );

    // Signos normais
    if ($inicio <= $fim)
    {
        if ($nascimento >= $inicio &&
            $nascimento <= $fim)
        {
            $signo_encontrado = $signo;
            break;
        }
    }
    // Capricórnio (vira o ano)
    else
    {
        if ($nascimento >= $inicio ||
            $nascimento <= $fim)
        {
            $signo_encontrado = $signo;
            break;
        }
    }
}

?>

<div class="card bg-secondary p-4">

    <?php if ($signo_encontrado): ?>

        <h2 class="text-warning">
            Seu signo é:
            <?= $signo_encontrado->signoNome ?>
        </h2>

        <p class="mt-3">
            <?= $signo_encontrado->descricao ?>
        </p>

    <?php else: ?>

        <h2>Signo não encontrado.</h2>

    <?php endif; ?>

    <a href="index.php"
       class="btn btn-light mt-3">
       Voltar
    </a>

</div>

</div>
</body>
</html>