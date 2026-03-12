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
            <form action="<?= URLROOT; ?>/SneakersController/update" method="post">
                <input type="hidden" name="id" value="<?= $data['sneaker']->Id; ?>">
                <div class="mb-3">
                    <label for="merk" class="form-label">Merk</label>
                    <input name="merk" type="text" class="form-control" id="merk" value="<?= $data['sneaker']->Merk; ?>"
                        required>
                </div>
                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input name="model" type="text" class="form-control" id="model"
                        value="<?= $data['sneaker']->Model; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input name="type" type="text" class="form-control" id="type" value="<?= $data['sneaker']->Type; ?>"
                        required>
                </div>
                <div class="mb-3">
                    <label for="prijs" class="form-label">Prijs</label>
                    <input name="prijs" type="text" class="form-control" id="prijs"
                        value="<?= $data['sneaker']->Prijs; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="materiaal" class="form-label">Materiaal</label>
                    <input name="materiaal" type="text" class="form-control" id="materiaal"
                        value="<?= $data['sneaker']->Materiaal; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="gewicht" class="form-label">Gewicht</label>
                    <input name="gewicht" type="text" class="form-control" id="gewicht"
                        value="<?= $data['sneaker']->Gewicht; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="releasedatum" class="form-label">Releasedatum</label>
                    <input name="releasedatum" type="date" class="form-control" id="releasedatum"
                        value="<?= $data['sneaker']->Releasedatum; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Verstuur</button>
            </form>
            <a href="<?= URLROOT; ?>/SneakersController/index" class="mt-3 d-block">
                <i class="bi bi-arrow-left"></i>
            </a>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>