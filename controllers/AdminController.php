<?php

use Carbon\Carbon;
use Carbon\CarbonImmutable;

class AdminController extends BaseController
{
    public function __construct()
    {
        session_start();
        // if (!session_name('user')) {
        //     return header("location: ".BASE_URL);
        // }

        if (!$_SESSION['user']) {
            return header("location: ".BASE_URL);
        }
    }
    public function getIndex()
    { 
        $profit = new Profit();
        $now = CarbonImmutable::now();
        $year = Carbon::now()->format('Y');
        $month = Carbon::now()->format('m');
        $weekStartDate = $now->startOfWeek()->subDays(1);
        $weekEndDate = $now->endOfWeek();
        // echo $weekStartDate;

        $kas = $profit->rawQuery("SELECT sum(for_cash) as kas FROM `profits` where `date` >= '$weekStartDate' && `date` <= '$weekEndDate'")->get();
        $owner = $profit->rawQuery("SELECT sum(for_owner) as owner FROM `profits` where `date` >= '$weekStartDate' && `date` <= '$weekEndDate'")->get();
    
        $kasPerbulan = $profit->rawQuery("select sum(for_cash) as totalKasPerBulan from profits where month(date) = $month && year(date) = $year")->get();
        $profitPerBulan = $profit->rawQuery("select sum(for_owner) as totalPerBulan from profits where month(date) = $month && year(date) = $year")->get();
        $profitPerTahun = $profit->rawQuery("select sum(for_owner) as totalPerTahun from profits where year(date) = $year")->get();
        while ($row = $profitPerBulan->fetch_assoc()) {
            $data['profitPerbulan'] = $row['totalPerBulan'];
        }
        while ($row = $profitPerTahun->fetch_assoc()) {
            $data['profitPerTahun'] = $row['totalPerTahun'];
        }
        while ($row = $kasPerbulan->fetch_assoc()) {
            $data['kasPerbulan'] = $row['totalKasPerBulan'];
        }
        while ($row = $kas->fetch_assoc()) {
            $data['KasPerMinggu'] = $row['kas'];
        }
        while ($row = $owner->fetch_assoc()) {
            $data['OwnerPerMinggu'] = $row['owner'];
        }
        // $data 
        // print_r($data);

        // echo($data['profitPerTahun']);
        return $this->view('admin.index',$data);
    }

    public function getData_tahunan()
    {
        $year = Carbon::now()->format('Y');
        $date = Carbon::now()->format('Y-m-d');
        $trans = new Transaksi();
        $listTrans = $trans->rawQuery("select count(*) as y,DATE_FORMAT(date,'%b') as x from transactions where YEAR(date) = $year group by month(date)")->get();
        $data = [];
        if ($listTrans->num_rows > 0) {
            while ($row = $listTrans->fetch_assoc()) {
                $data[] = $row;
            }
        } else {
            $data = [];
        }
        echo json_encode($data);
    }
}
