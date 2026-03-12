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

                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in';
            } else {
                $this->horlogeModel->create($_POST);
                $data['display'] = 'flex';
                $data['message'] = 'Het horloge is opgeslagen';
                header('Refresh:3; url=' . URLROOT . '/HorlogesController/index');
            }
        }
        $this->view('horloges/create', $data);
    }

    public function update($id = NULL)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if (empty($_POST['merk']) || empty($_POST['model']) || empty($_POST['prijs']) ||
                empty($_POST['materiaal']) || empty($_POST['type']) || empty($_POST['kenmerk'])) {

                $data = [
                    'title'   => 'Wijzig horloge',
                    'display' => 'flex',
                    'message' => 'Vul alle velden in',
                    'horloge' => $this->horlogeModel->getHorlogeById($_POST['id'])
                ];
            } else {
                $this->horlogeModel->updateHorloge($_POST);
                header('Refresh:3; url=' . URLROOT . '/HorlogesController/index');
                $data = [
                    'title'   => 'Wijzig horloge',
                    'display' => 'flex',
                    'message' => 'De gegevens zijn gewijzigd',
                    'horloge' => $this->horlogeModel->getHorlogeById($_POST['id'])
                ];
            }
        } else {
            $data = [
                'title'   => 'Wijzig horloge',
                'display' => 'none',
                'message' => '',
                'horloge' => $this->horlogeModel->getHorlogeById($id)
            ];
        }
        $this->view('horloges/update', $data);
    }
}