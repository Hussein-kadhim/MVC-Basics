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

        // Check of alle velden zijn ingevuld
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
}