<?php

use Carbon\CarbonImmutable;

class PengeluaranController extends BaseController
{
    private $pengeluaran;
    public function __construct()
    {
        session_start();
        $this->pengeluaran = new Spend;
        if (!$_SESSION['user']) {
            return header("location: " . BASE_URL);
        }
    }
    public function getIndex()
    {

        $now = CarbonImmutable::now();
        $profit = new Profit;
        $weekStartDate = $now->startOfWeek()->subDays(1);
        $weekEndDate = $now->endOfWeek();
        $kas = $profit->rawQuery("SELECT sum(for_cash) as kas FROM `profits` where `date` >= '$weekStartDate' && `date` <= '$weekEndDate'")->get();
        $owner = $profit->rawQuery("SELECT sum(for_owner) as owner FROM `profits` where `date` >= '$weekStartDate' && `date` <= '$weekEndDate'")->get();
        // $data = array('kas'=>$kas->fetch_object(),'owner'=>$owner->fetch_assoc());
        if ($kas->num_rows > 0 || $owner->num_rows > 0) {
            while ($row = $kas->fetch_assoc()) {
                $data['kas'] = $row['kas'];
            }
            while ($row = $owner->fetch_assoc()) {
                $data['owner'] = $row['owner'];
            }
        }
        // echo $weekStartDate.' - '.$weekEndDate;
        return $this->view('admin.pengeluaran', $data);
    }

    public function getPengeluaran_data()
    {
        header('Content-Type: application/json');
        $pengeluaran = $this->pengeluaran->all();
        $data = [];
        if ($pengeluaran->num_rows > 0) {
            while ($row = $pengeluaran->fetch_assoc()) {
                $data[] = $row;
            }
        }
        // print_r($data);
        echo json_encode(array('data' => $data));
    }

    public function postInsert()
    {
        $now = CarbonImmutable::now();
        $ket = $this->post('keterangan');
        $date = $this->post('date');
        $total = $this->post('total');
        $process = $this->pengeluaran->rawQuery("INSERT INTO `spends`(`keterangan`, `date`, `total`) VALUES ('$ket','$date','$total')")->get();
        if ($process) {
            echo json_encode(array('message' => 'success'));
        }
    }

    public function deleteDelete()
    {
        $id = $this->get('id');
        $process = $this->pengeluaran->rawQuery("DELETE FROM `spends` WHERE id = '$id'");
        echo json_encode(array('message' => 'Data berhasil dihapus'));
    }
}
