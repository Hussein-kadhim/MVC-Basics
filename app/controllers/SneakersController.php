<?php

class SneakersController extends BaseController
{
    private $sneakerModel;

    public function __construct()
    {
        $this->sneakerModel = $this->model('sneakers');
    }

    public function index($display = 'none', $message = '')
    {
        $result = $this->sneakerModel->getAllSneakers();

        $data = [
            'title'   => 'Overzicht Sneakers',
            'display' => $display,
            'message' => $message,
            'result'  => $result
        ];

        $this->view('sneakers/index', $data);
    }

    public function delete($Id)
    {
        $this->sneakerModel->delete($Id);
        header('Refresh:3; url=' . URLROOT . '/SneakersController/index');
        $this->index('flex', 'De sneaker is verwijderd');
    }

    public function create()
    {
        $data = [
            'title'   => 'Nieuwe sneaker toevoegen',
            'display' => 'none',
            'message' => ''
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if (empty($_POST['merk']) || empty($_POST['model']) || empty($_POST['type']) ||
                empty($_POST['prijs']) || empty($_POST['materiaal']) ||
                empty($_POST['gewicht']) || empty($_POST['releasedatum'])) {

                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in';
            } else {
                $this->sneakerModel->create($_POST);
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn opgeslagen';
                header('Refresh:3; url=' . URLROOT . '/SneakersController/index');
            }
        }
        $this->view('sneakers/create', $data);
    }

    public function update($id = NULL)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if (empty($_POST['merk']) || empty($_POST['model']) || empty($_POST['type']) ||
                empty($_POST['prijs']) || empty($_POST['materiaal']) ||
                empty($_POST['gewicht']) || empty($_POST['releasedatum'])) {

                $data = [
                    'title'   => 'Wijzig sneaker',
                    'display' => 'flex',
                    'message' => 'Vul alle velden in',
                    'sneaker' => $this->sneakerModel->getSneakerById($_POST['id'])
                ];
            } else {
                $this->sneakerModel->updateSneaker($_POST);
                header('Refresh:3; url=' . URLROOT . '/SneakersController/index');
                $data = [
                    'title'   => 'Wijzig sneaker',
                    'display' => 'flex',
                    'message' => 'De gegevens zijn gewijzigd',
                    'sneaker' => $this->sneakerModel->getSneakerById($_POST['id'])
                ];
            }
        } else {
            $data = [
                'title'   => 'Wijzig sneaker',
                'display' => 'none',
                'message' => '',
                'sneaker' => $this->sneakerModel->getSneakerById($id)
            ];
        }
        $this->view('sneakers/update', $data);
    }
}