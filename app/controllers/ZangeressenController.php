<?php

class ZangeressenController extends BaseController
{
    private $zangeresModel;

    public function __construct()
    {
        $this->zangeresModel = $this->model('zangeressen');
    }

    public function index($display = 'none', $message = '')
    {
        $result = $this->zangeresModel->getAllZangeressen();

        $data = [
            'title'   => 'Top Zangeressen',
            'display' => $display,
            'message' => $message,
            'result'  => $result
        ];

        $this->view('zangeressen/index', $data);
    }

    public function delete($Id)
    {
        $this->zangeresModel->delete($Id);
        header('Refresh:3; url=' . URLROOT . '/ZangeressenController/index');
        $this->index('flex', 'Zangeres is verwijderd uit de lijst');
    }

    public function create()
    {
        $data = [
            'title'   => 'Nieuwe zangeres toevoegen',
            'display' => 'none',
            'message' => ''
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if (empty($_POST['naam']) || empty($_POST['waarde']) || empty($_POST['land']) ||
                empty($_POST['leeftijd']) || empty($_POST['nummer']) || empty($_POST['jaar'])) {

                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in';
            } else {
                $this->zangeresModel->create($_POST);
                $data['display'] = 'flex';
                $data['message'] = 'De zangeres is succesvol toegevoegd';
                header('Refresh:3; url=' . URLROOT . '/ZangeressenController/index');
            }
        }
        $this->view('zangeressen/create', $data);
    }

    public function update($id = NULL)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if (empty($_POST['naam']) || empty($_POST['waarde']) || empty($_POST['land']) ||
                empty($_POST['leeftijd']) || empty($_POST['nummer']) || empty($_POST['jaar'])) {

                $data = [
                    'title'    => 'Wijzig zangeres',
                    'display'  => 'flex',
                    'message'  => 'Vul alle velden in',
                    'zangeres' => $this->zangeresModel->getZangeresById($_POST['id'])
                ];
            } else {
                $this->zangeresModel->updateZangeres($_POST);
                header('Refresh:3; url=' . URLROOT . '/ZangeressenController/index');
                $data = [
                    'title'    => 'Wijzig zangeres',
                    'display'  => 'flex',
                    'message'  => 'De gegevens zijn gewijzigd',
                    'zangeres' => $this->zangeresModel->getZangeresById($_POST['id'])
                ];
            }
        } else {
            $data = [
                'title'    => 'Wijzig zangeres',
                'display'  => 'none',
                'message'  => '',
                'zangeres' => $this->zangeresModel->getZangeresById($id)
            ];
        }
        $this->view('zangeressen/update', $data);
    }
}