<?php include('layouts/header.php'); ?>

<h1 class="text-center mb-4">
    Descubra seu signo
</h1>

<div class="card p-4 bg-secondary">

    <form id="signo-form"
          method="POST"
          action="show_zodiac_sign.php">

        <div class="mb-3">
            <label class="form-label">
                Data de nascimento
            </label>

            <input type="date"
                   name="data_nascimento"
                   class="form-control"
                   required>
        </div>

        <button type="submit"
                class="btn btn-warning w-100">
            Descobrir Signo
        </button>

    </form>

</div>

</div>
</body>
</html>