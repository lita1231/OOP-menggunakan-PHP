<?php

class App {
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        // Mendapatkan URL yang telah diparsing
        $url = $this->parseURL();
        
        // Menentukan controller
        if ($url && file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]); // Menghapus elemen pertama dari array $url
        }

        // Memuat file controller yang sesuai
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Menentukan method
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]); // Menghapus elemen kedua dari array $url
        }

        // Menyiapkan parameter
        $this->params = $url ? array_values($url) : [];

        // Memanggil controller, method, dan mengirimkan parameter jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // Fungsi untuk mem-parsing URL
    public function parseURL()
    {
        if (isset($_GET['url'])) {
            // Membersihkan URL dari karakter yang tidak diinginkan
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url); // Membagi URL berdasarkan '/'
            return $url; // Mengembalikan array yang berisi komponen URL
        }
        return []; // Mengembalikan array kosong jika $_GET['url'] tidak ada
    }
}
