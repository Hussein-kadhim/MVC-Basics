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
            <form action="<?= URLROOT; ?>/ZangeressenController/update" method="post">
                <input type="hidden" name="id" value="<?= $data['zangeres']->Id; ?>">
                <div class="mb-3">
                    <label for="naam" class="form-label">Naam</label>
                    <input name="naam" type="text" class="form-control" id="naam"
                        value="<?= $data['zangeres']->Naam; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="waarde" class="form-label">Netto Waarde (miljoen)</label>
                    <input name="waarde" type="number" class="form-control" id="waarde"
                        value="<?= $data['zangeres']->NettoWaarde; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="land" class="form-label">Land</label>
                    <input name="land" type="text" class="form-control" id="land"
                        value="<?= $data['zangeres']->Land; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="leeftijd" class="form-label">Leeftijd</label>
                    <input name="leeftijd" type="number" class="form-control" id="leeftijd"
                        value="<?= $data['zangeres']->Leeftijd; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nummer" class="form-label">Bekendste Nummer</label>
                    <input name="nummer" type="text" class="form-control" id="nummer"
                        value="<?= $data['zangeres']->BekendsteNummer; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="jaar" class="form-label">Debuutjaar</label>
                    <input name="jaar" type="number" class="form-control" id="jaar"
                        value="<?= $data['zangeres']->Debuutjaar; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Verstuur</button>
            </form>
            <a href="<?= URLROOT; ?>/ZangeressenController/index" class="mt-3 d-block">
                <i class="bi bi-arrow-left"></i>
            </a>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>