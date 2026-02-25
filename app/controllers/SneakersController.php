<?php

class SneakersController extends BaseController
{
    private $sneakerModel;

    public function __construct()
    {
        $this->sneakerModel = $this->model('Sneakers');
    }

    public function index()
    {
        /**
         * Haal de resultaten van de model binnen
         */
        $result = $this->sneakerModel->getAllSneakers();

        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'title' => 'Mooiste Sneakers',
            'result' => $result
        ];

        /**
         * Met de view-method uit de BaseController-class wordt de view
         * aangeroepen
         */
        $this->view('sneakers/index', $data);
    }
}