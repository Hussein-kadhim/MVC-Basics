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
        /**
         * Haal de resultaten van de model binnen
         */
        $result = $this->smartphoneModel->getAllSmartphones();

        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'title'   => 'Overzicht Smartphones',
            'display' => $display, 
            'message' => $message,  
            'result'  => $result
        ];

        /**
         * Met de view-method uit de BaseController-class wordt de view
         * aangeroepen
         */
        $this->view('smartphone/index', $data);
    }

    public function delete($Id)
    {
        /**
         * Verwijder het record via het model
         */
        $this->smartphoneModel->delete($Id);

        /**
         * Stuur een header mee om na 3 seconden terug te keren naar de index
         * Let op: URLROOT moet goed gedefinieerd zijn in je config
         */
        header('Refresh:3; url=' . URLROOT . '/SmartphoneController/index');

        /**
         * Roep de index methode direct aan om de bevestiging te tonen
         */
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

        // Controleer of alle velden zijn ingevuld
        if (empty($_POST['merk']) || empty($_POST['model']) || empty($_POST['prijs']) || 
            empty($_POST['geheugen']) || empty($_POST['besturingssysteem']) || 
            empty($_POST['schermgrootte']) || empty($_POST['releasedatum']) || 
            empty($_POST['megapixels'])) {
            
            $data['display'] = 'flex';
            $data['message'] = 'Vul alle velden in';
        } else {
            // Gegevens opslaan via het model
            $this->smartphoneModel->create($_POST);
            $data['display'] = 'flex';
            $data['message'] = 'De gegevens van de smartphone zijn opgeslagen';
            
            // Na 3 seconden terugsturen naar de index
            header('Refresh:3; url=' . URLROOT . '/SmartphoneController/index');
        }
    }
    $this->view('smartphone/create', $data);
}
}