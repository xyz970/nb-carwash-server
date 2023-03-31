<?php

use Carbon\Carbon;

class BookingController extends BaseController
{

    private $booking;
    public function __construct()
    {
        $this->booking = new Booking();
    }

    public function getIndex()
    {
        $date = Carbon::now()->format('Y-m-d');
        $statusWait = $this->booking->rawQuery("SELECT COUNT(*) from bookings WHERE is_valid = 'true' && date = '$date'")->get();
        $statusBook = $this->booking->rawQuery("SELECT COUNT(*) from bookings WHERE is_valid = 'false' && date = '$date'")->get();
        // $status = $this->booking->mysql()->query("SELECT COUNT('id') as count from bookings WHERE is_valid = 'true'");
        // print_r($status->fetch_row());
        return $this->view('booking', array('statusWait' => $statusWait->fetch_row(),'statusBook'=>$statusBook->fetch_row()));
    }

    public function postInsert()
    {
        $date = Carbon::now()->format('Y-m-d');
        $time = Carbon::now()->format('H:i');
        $name = $this->post('name');
        $time = $this->post('time');
        $no_hp = $this->post('no_hp');
        $wash_type_id = $this->post('wash_type_id');
        $merk_model = $this->post('merk_model');
        $plate_number = $this->post('plate_number');
        $total = $this->post('total');
        $id = $date . '-' . str_replace('_', ' ', strtolower($name)) . '-' . $time;
        try {
            $query = $this->booking->rawQuery("INSERT INTO `bookings`(`id`, `name`, `no_hp`, `plate_number`, `merk_model`, `wash_type_id`, `time`, `total`, `date`) VALUES ('$id','$name','$no_hp','$plate_number','$merk_model','$wash_type_id','$time','$total','$date')")->get();
            if ($query === FALSE) {
                throw new Exception($this->booking->error_log);
            }
            return $this->view('booking-success', array('time' => $time));
        } catch (Exception $e) {
            //throw $th;
            header('Location: ' . BASE_URL . 'booking?error=true');
            
        }
        // print_r($query);
        // if ($query) {
        //     return $this->view('booking-success',array('time'=>$time));
        // }
        // if ($query === FALSE) {
        //     header('Location: ' . BASE_URL . 'booking');
        // }
        // return $this->view('booking-success', array('time' => $time));
    }
}
