<?php

class HorlogesController extends BaseController
{
    private $horlogeModel;

    public function __construct()
    {
        $this->horlogeModel = $this->model('horloges');
    }

    public function index($display = 'none', $message = '')
    {
        $result = $this->horlogeModel->getAllHorloges();

        $data = [
            'title'   => 'Overzicht Horloges',
            'display' => $display,
            'message' => $message,
            'result'  => $result
        ];

        $this->view('horloges/index', $data);
    }

    public function delete($Id)
    {
        $this->horlogeModel->delete($Id);
        header('Refresh:3; url=' . URLROOT . '/HorlogesController/index');
        $this->index('flex', 'Het horloge is verwijderd');
    }

    public function create()
    {
        $data = [
            'title'   => 'Nieuw horloge toevoegen',
            'display' => 'none',
            'message' => ''
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if (empty($_POST['merk']) || empty($_POST['model']) || empty($_POST['prijs']) ||
    empty($_POST['materiaal']) || empty($_POST['type']) || empty($_POST['kenmerk'])) {
            } else {
                $this->horlogeModel->create($_POST);
                $data['display'] = 'flex';
                $data['message'] = 'Het horloge is opgeslagen';
                header('Refresh:3; url=' . URLROOT . '/HorlogesController/index');
            }
        }
        $this->view('horloges/create', $data);
    }
} // Zorg dat deze haak hier staat om de controller af te sluiten!