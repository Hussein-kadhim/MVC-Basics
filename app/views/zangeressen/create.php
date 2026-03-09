<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-6">
            <h3 class="text-success"><?php echo $data['title']; ?></h3>
        </div>
    </div>

    <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-6 text-begin text-primary">
            <div class="alert alert-success" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-6">
            <form action="<?= URLROOT; ?>/ZangeressenController/create" method="post">
                <div class="mb-3">
                    <label for="naam" class="form-label">Naam</label>
                    <input name="naam" type="text" class="form-control" id="naam" required>
                </div>
                <div class="mb-3">
                    <label for="waarde" class="form-label">Netto Waarde (miljoen)</label>
                    <input name="waarde" type="number" class="form-control" id="waarde" required>
                </div>
                <div class="mb-3">
                    <label for="land" class="form-label">Land</label>
                    <input name="land" type="text" class="form-control" id="land" required>
                </div>
                <div class="mb-3">
                    <label for="leeftijd" class="form-label">Leeftijd</label>
                    <input name="leeftijd" type="number" class="form-control" id="leeftijd" required>
                </div>
                <div class="mb-3">
                    <label for="nummer" class="form-label">Bekendste Nummer</label>
                    <input name="nummer" type="text" class="form-control" id="nummer" required>
                </div>
                <div class="mb-3">
                    <label for="jaar" class="form-label">Debuutjaar</label>
                    <input name="jaar" type="number" class="form-control" id="jaar" required>
                </div>
                <button type="submit" class="btn btn-primary">Verstuur</button>
            </form>
            <a href="<?= URLROOT; ?>/ZangeressenController/index"><i class="bi bi-arrow-left"></i></a>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>