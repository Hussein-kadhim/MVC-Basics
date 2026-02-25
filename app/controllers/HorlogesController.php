<?php

class HorlogesController extends BaseController
{
    private $horlogeModel;

    public function __construct()
    {
        $this->horlogeModel = $this->model('horloges');
    }

    public function index()
    {
        /**
         * Haal de resultaten van de model binnen
         */
        $result = $this->horlogeModel->getAllHorloges();

        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'title' => 'Duurste Horloges',
            'result' => $result
        ];

        /**
         * Met de view-method uit de BaseController-class wordt de view
         * aangeroepen
         */
        $this->view('horloges/index', $data);
    }
}