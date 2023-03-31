<?php

use Carbon\Carbon;

class KeuntunganController extends BaseController
{

    private $profit, $sesi;
    public function __construct()
    {
        session_start();
        if (!$_SESSION['user']) {
            return header("location: " . BASE_URL);
        }
        $this->sesi = new Sesi;
        $this->profit = new Profit;
    }

    public function getIndex()
    {
        $sesi = new Sesi;
        $dataSesi = $sesi->all();
        $dataSesi2 = $sesi->all();
        // print_r($dataSesi);
        return $this->view('admin.jumlah_keuntungan', array('dataSesi' => $dataSesi, 'dataSesi2' => $dataSesi2));
    }

    public function getSelected_date()
    {
        $date = $this->get('date');
        $data = $this->profit->where(array('date' => $date))->get();
        if ($data->num_rows < 5) {
            http_response_code(404);
            echo json_encode(array('data' => []));
        }
    }

    public function getShow_data()
    {
        $date = $this->get('date');
        $profit = $this->profit->rawQuery("select profits.*, sesi.keterangan as keterangan from profits join sesi on profits.daytime = sesi.id where date = '$date'")->get();
        header('Content-Type: application/json');
        $data = [];
        if ($profit->num_rows > 0) {
            while ($row = $profit->fetch_assoc()) {
                $data[] = $row;
            }
        }
        // print_r($data);
        echo json_encode(array('data' => $data));
    }

    public function postInsert()
    {
        $sesi = $this->post('daytime');
        $date = $this->get('date');
        $now = Carbon::now();
        $dataSesi = $this->sesi->where(array('id' => $sesi))->get();
        if ($dataSesi->num_rows != 0) {
            $row = $dataSesi->fetch_assoc();
            $awal = $row['jam_awal'];
            $akhir = $row['jam_akhir'];
            $sql = "SELECT SUM(total) as total FROM transactions WHERE time BETWEEN '$awal' AND '$akhir'";
        }
        $check = $this->profit->rawQuery("SELECT * FROM `profits` WHERE `date` = '$date' && `daytime` = '$sesi'")->get();
        $profit = $this->profit->rawQuery($sql)->get();

        $id = str_replace(' ', '-', strtolower($sesi)) . '-' . $date;
        if ($profit->num_rows > 0) {
            while ($row = $profit->fetch_assoc()) {
                $total = $row;
            }
        }
        if ($check->num_rows == 1) {
            http_response_code(400);
            echo json_encode(array('message' => "Data di sesi tersebut sudah terdata"));
        } else {

            // print_r($total['total']);
            $total = $total['total'];
            $for_owner = $total * 0.5;
            $for_employee = $for_owner * 0.35;
            $for_cash = $for_employee * 0.15;
            // echo "INSERT INTO `profits` VALUES ('$id','$date','$total','$sesi','$for_employee','$for_cash','$for_owner'";
            $insert = $this->profit->rawQuery("INSERT INTO `profits`(`id`, `date`, `total`, `daytime`, `for_employee`, `for_cash`, `for_owner`) VALUES ('$id','$date','$total','$sesi','$for_employee','$for_cash','$for_owner')")->get();
            if ($insert) {
                echo json_encode(array('message' => "Data berhasil dimasukkan"));
            }
        }
    }

    public function postInsert_karyawan()
    {
        $user_id = $this->post('user_id');
        $date = $this->post('date');
        $daytime = $this->post('daytime');
        $id = $user_id . '-' . $date . '-' . str_replace(' ', '-', strtolower($daytime));
        // $check = Employee::where('id', '=', $id)->where('date', '=', $request->input('date'))->where('user_id', '=', $request->input('user_id'))->count();
        // echo $date;
        $employee = new Employee;
        $check = $employee->rawQuery("SELECT * FROM `employees` WHERE `user_id` = '$user_id' && `date` = '$date' && `id` = '$id'")->get();
        if ($check->num_rows != 0) {
            http_response_code(302);
            echo json_encode(array('message' => 'Data telah ada'));
        } else {

            // $input = array(
            //     'id' => $id,
            //     'user_id' => $request->input('user_id'),
            //     'date' => $request->input('date'),
            //     'time' => $request->input('daytime'),
            // );
            // Employee::create($input);
            $employee->rawQuery("INSERT INTO `employees`(`id`, `user_id`, `date`, `time`) VALUES ('$id','$user_id','$date','$daytime')");
            echo json_encode(array('message' => 'Success'));
        }
    }

    public function getData_profit()
    {
        $employee = new Employee;
        $date = $this->get('date');
        $employee = $employee->rawQuery("SELECT `date`,sesi.keterangan, users.name as name,`time`,`total_fee` FROM `employees` JOIN users ON employees.user_id = users.id join sesi on employees.time = sesi.id where `date` ='$date'")->get();
        if ($employee->num_rows > 0) {
            while ($row = $employee->fetch_assoc()) {
                $data[] = $row;
            }
        }
        echo json_encode(array('data' => $data));
    }

    public function postTotal_fee()
    {
        $employee = new Employee;
        $sesi = new Sesi;
        $dataSesi = $sesi->all();
        while ($row = $dataSesi->fetch_assoc()) {
            $date = $this->post('date');
            $id = $row['id'];
            // $totalsesi = '';
            // $totalsesi = Profit::where('date', '=', $request->input('date'))->where('daytime', '=', $array[$i])->first();
            $totalsesi = $this->profit->rawQuery("SELECT for_employee FROM profits WHERE daytime = '$id' AND date = '$date'")->get();
            while ($row = $totalsesi->fetch_assoc()) {
                $totalTransaksi = $row;
            }
            // $countSchedule = Employee::where('date', '=', $request->input('date'))->where('time', '=', $id)->count();
            $countSchedule = $employee->rawQuery("SELECT count(id) as total FROM employees WHERE time = '$id' AND date = '$date'")->get();
            while ($row = $countSchedule->fetch_assoc()) {
                $hitungJadwal = $row;
            }
            // print_r($hitungJadwal['total']);
            if ($hitungJadwal['total'] != 0) {
                $fee = $totalTransaksi['for_employee'] / $hitungJadwal['total'];
                $employee->rawQuery("UPDATE employees SET total_fee = '$fee' WHERE time = '$id' AND date = '$date'");
                // Employee::where('date', '=', $request->input('date'))->where('time', '=', $id)->update(['total_fee' => $fee]);
            }
        }
    }
}
