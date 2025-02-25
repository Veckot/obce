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
    private $dataOkres;
    public $pageNum;

    public function __construct()
    {
        $this->adresni_misto = new Adresni_misto();
        $this->cast_obce = new Cast_obce();
        $this->kraj = new Kraj();
        $this->obec = new Obec();
        $this->okres = new Okres();
        $this->typ_so = new Typ_so();
        $this->ulice = new Ulice();
        $this->pageNum = 20;
        // Query to get data for 'kraj'
        $this->dataKraj['kraj'] = $this->kraj->join('okres', 'kraj.kod=okres.kraj', 'left')->where('kraj', 141)->findAll();
    }

    public function index($funnyNum)
    {
        $perPage = $this->request->getGet('perPage') ?? $this->pageNum;

        // Query to get 'obec' data for specific 'okres'
        $dataKraj['obec'] = $this->okres
            ->join('obec', 'okres.kod = obec.okres', 'inner')
            ->where('okres', $funnyNum)->findAll();

        // Pass data to the view
        $dataKraj['kraj'] = $this->dataKraj['kraj'];
        $dataKraj['okres'] = $this->okres->find($funnyNum);

        // Pocet mist
        $dataKraj['mista'] = $this->okres->select('obec.nazev, Count(*) as pocet')
            ->join('obec', 'okres.kod = obec.okres', 'inner')
            ->join('cast_obce', 'obec.kod = cast_obce.obec', 'inner')
            ->join('ulice', 'cast_obce.kod = ulice.cast_obce', 'inner')
            ->join('adresni_misto', 'ulice.kod = adresni_misto.ulice', 'inner')
            ->where('kraj', $funnyNum)
            ->groupBy('obec.kod')
            ->orderBy('pocet', 'desc')
            ->paginate($perPage);


        $dataKraj["pager"] = $this->okres->pager;
        $dataKraj["perPage"] = $perPage;

        return view('mainStranka', $dataKraj);
    }
    public function changeNum(): void
    {
        $this->pageNum++;
    }

    public function obceStranka($idOkres)
    {

        $perPage = $this->request->getGet('perPage') ?? $this->pageNum;
        // Query to get 'obec' data for specific 'okres'
        $dataObce['obec'] = $this->okres
            ->join('obec', 'okres.kod = obec.okres', 'inner')
            ->where('okres', $idOkres)->findAll();

        // Pass data to the view
        $dataObce['kraj'] = $this->dataKraj['kraj'];
        $dataObce['okres'] = $this->okres->find($idOkres);

        // Pocet mist
        $dataObce['mista'] = $this->okres->select('obec.nazev, Count(*) as pocet')
            ->join('obec', 'okres.kod = obec.okres', 'inner')
            ->join('cast_obce', 'obec.kod = cast_obce.obec', 'inner')
            ->join('ulice', 'cast_obce.kod = ulice.cast_obce', 'inner')
            ->join('adresni_misto', 'ulice.kod = adresni_misto.ulice', 'inner')
            ->where('okres', $idOkres)
            ->groupBy('obec.kod')
            ->orderBy('pocet', 'desc')
            ->paginate($perPage);

        // Paginace
        $dataObce["pager"] = $this->okres->pager;
        $dataObce["perPage"] = $perPage;

        return view('obceStranka', $dataObce);
    }
}
