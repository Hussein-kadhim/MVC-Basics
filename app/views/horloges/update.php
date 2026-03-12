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
            <form action="<?= URLROOT; ?>/HorlogesController/update" method="post">
                <input type="hidden" name="id" value="<?= $data['horloge']->Id; ?>">
                <div class="mb-3">
                    <label for="merk" class="form-label">Merk</label>
                    <input name="merk" type="text" class="form-control" id="merk" value="<?= $data['horloge']->Merk; ?>"
                        required>
                </div>
                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input name="model" type="text" class="form-control" id="model"
                        value="<?= $data['horloge']->Model; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="prijs" class="form-label">Prijs</label>
                    <input name="prijs" type="number" class="form-control" id="prijs"
                        value="<?= $data['horloge']->Prijs; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="materiaal" class="form-label">Materiaal</label>
                    <input name="materiaal" type="text" class="form-control" id="materiaal"
                        value="<?= $data['horloge']->Materiaal; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input name="type" type="text" class="form-control" id="type" value="<?= $data['horloge']->Type; ?>"
                        required>
                </div>
                <div class="mb-3">
                    <label for="kenmerk" class="form-label">Uniek Kenmerk</label>
                    <input name="kenmerk" type="text" class="form-control" id="kenmerk"
                        value="<?= $data['horloge']->UniekKenmerk; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Verstuur</button>
            </form>
            <a href="<?= URLROOT; ?>/HorlogesController/index" class="mt-3 d-block">
                <i class="bi bi-arrow-left"></i>
            </a>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>