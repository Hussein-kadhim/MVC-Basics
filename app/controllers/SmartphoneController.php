<?php

class SmartphoneController extends BaseController
{
    private $smartphoneModel;

    public function __construct()
    {
        $this->smartphoneModel = $this->model('smartphone');
    }

    public function index($display = 'none', $message = '')
    {
        $result = $this->smartphoneModel->getAllSmartphones();

        $data = [
            'title'   => 'Overzicht Smartphones',
            'display' => $display,
            'message' => $message,
            'result'  => $result
        ];

        $this->view('smartphone/index', $data);
    }

    public function delete($Id)
    {
        $this->smartphoneModel->delete($Id);
        header('Refresh:3; url=' . URLROOT . '/SmartphoneController/index');
        $this->index('flex', 'Record is verwijderd');
    }

    public function create()
    {
        $data = [
            'title'   => 'Nieuwe smartphone toevoegen',
            'display' => 'none',
            'message' => ''
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if (empty($_POST['merk']) || empty($_POST['model']) || empty($_POST['prijs']) ||
                empty($_POST['geheugen']) || empty($_POST['besturingssysteem']) ||
                empty($_POST['schermgrootte']) || empty($_POST['releasedatum']) ||
                empty($_POST['megapixels'])) {

                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in';
            } else {
                $this->smartphoneModel->create($_POST);
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens van de smartphone zijn opgeslagen';
                header('Refresh:3; url=' . URLROOT . '/SmartphoneController/index');
            }
        }
        $this->view('smartphone/create', $data);
    }

    public function update($id = NULL)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if (empty($_POST['merk']) || empty($_POST['model']) || empty($_POST['prijs']) ||
                empty($_POST['geheugen']) || empty($_POST['besturingssysteem']) ||
                empty($_POST['schermgrootte']) || empty($_POST['releasedatum']) ||
                empty($_POST['megapixels'])) {

                $data = [
                    'title'      => 'Wijzig smartphone',
                    'display'    => 'flex',
                    'message'    => 'Vul alle velden in',
                    'smartphone' => $this->smartphoneModel->getSmartphoneById($_POST['id'])
                ];
            } else {
                $this->smartphoneModel->updateSmartphone($_POST);
                header('Refresh:3; url=' . URLROOT . '/SmartphoneController/index');
                $data = [
                    'title'      => 'Wijzig smartphone',
                    'display'    => 'flex',
                    'message'    => 'De gegevens zijn gewijzigd',
                    'smartphone' => $this->smartphoneModel->getSmartphoneById($_POST['id'])
                ];
            }
        } else {
            $data = [
                'title'      => 'Wijzig smartphone',
                'display'    => 'none',
                'message'    => '',
                'smartphone' => $this->smartphoneModel->getSmartphoneById($id)
            ];
        }
        $this->view('smartphone/update', $data);
    }
}