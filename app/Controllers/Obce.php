<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Adresni_misto;
use App\Models\Cast_obce;
use App\Models\Kraj;
use App\Models\Obec;
use App\Models\Okres;
use App\Models\Typ_so;
use App\Models\Ulice;


class Obce extends BaseController
{
    private $adresni_misto;
    private $cast_obce;
    private $kraj;
    private $obec;
    private $okres;
    private $typ_so;
    private $ulice;
    private $dataKraj;
    public function __construct()
    {
        $this->adresni_misto = new Adresni_misto();
        $this->cast_obce = new Cast_obce();
        $this->kraj = new Kraj();
        $this->obec = new Obec();
        $this->okres = new Okres();
        $this->typ_so = new Typ_so();
        $this->ulice = new Ulice();
        $this->dataKraj['kraj'] = $this->kraj->join('okres','kraj.kod=okres.kraj','left')->where('kraj', 141)->findAll();

    }
    public function index()
    {
        return view('mainStranka', $this->dataKraj);
    }



}
