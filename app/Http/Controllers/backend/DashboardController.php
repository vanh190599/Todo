<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Model\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Socialite;
session_start();

class DashboardController extends Controller
{
    private $orderDetail;

    public function __construct(OrderDetail $orderDetail)
    {
        $this->orderDetail = $orderDetail;
    }

    public function AuthLogin(){
        $admin_id = session('admin_id');
        if (! $admin_id) {
            return false;
        }
        return true;
    }

    public function chart(Request $request){
        if (!$this->AuthLogin()) return redirect('admin');
        $type = $request->type;
        $data = [];
        switch ($type) {
            case "day":
                $data = $this->chartByDay();
                break;
            case "month":
                $data = $this->chartByMonth();
                break;
            default:
                break;
        }
        return response(['success' => 1, 'data' => $data]);
    }

    /**
     * @return array [key: data(int) ; value:category (date d-m-Y)]
     */
    public function chartByDay(){
        $detail = $this->orderDetail;
        $start =  strtotime(Carbon::now()->startOfMonth());
        $end   = strtotime(Carbon::now()->endOfMonth());
        $numberDayOfCurrentMonth = date('t');

        $period = [];
        $time = $start;
        for ($i = 0; $i <= $numberDayOfCurrentMonth; $i++ ) {
            $period[] = $time;
            $time = $time + 86400;
        }

        $result = [];
        $cate = [];
        foreach ($period as $key => $value) {
            if ($key < $numberDayOfCurrentMonth) {
                $qty = $detail->whereBetween('date_c', [$period[$key], $period[$key+1] - 1])->sum('product_sale_qty');
                $result[] = (int) $qty;
                $cate[]   = date('d-m-Y', $value);
            }
        }

        $data = [];
        $data['data'] = $result;
        $data['cate'] = $cate;

        return $data;
    }

    public function chartByMonth(){
        $detail = $this->orderDetail;
        $start = "1-1-2021";
        $start = strtotime($start);
        $start = Carbon::parse($start);

        $period = [];
        $time = $start;
        $test = [];
        for ($i = 0; $i <= 12; $i++ ) {
            $period[] = strtotime($time);
            $test[] = date('d-m-Y', strtotime($time));
            $time = $time->addMonth(1);
        }

        $result = [];
        $cate = [];
        foreach ($period as $key => $value) {
            if ($key < 12) {
                $qty = $detail->whereBetween('date_c', [$period[$key], $period[$key+1] - 1])->sum('product_sale_qty');
                $result[] = (int) $qty;
                $cate[]   = date('d-m-Y', $value);
            }
        }

        $data = [];
        $data['data'] = $result;
        $data['cate'] = $cate;

        return $data;
    }
}
