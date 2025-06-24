<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;
use App\Models\Visitor;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data = new stdClass;

        if (auth()->user()->isPractitioner()) {
            $data->countryWiseVisitors = [];

            $data->totalVisitors = DB::table('visitors')->where('user_id', auth()->id())->count();
            $countries = [
                'United States' => '#2acd72',
                'United Kingdom' => 'rgba(103,58,183,1.0)',
                'Canada' => '#eee',
                'Others' => '#E91E63'
            ];
            foreach ($countries as $key => $value) {
                $query = Visitor::query();
                if ($key !== 'Others') {
                    $query->where('country_name', $key);
                } 
                else {
                    $query->whereNotIn('country_name', ['United States','United Kingdom','Canada']);
                }
                $visitors = $query->where('user_id', auth()->id())->count();

                $visitor  = $data->totalVisitors > 0 ?  (($visitors / $data->totalVisitors) * 100) : 0;
                $data->countryWiseVisitors[] = (object) [
                    'name'   => $key,
                    'color'   => $value,
                    'visitor' => gettype($visitor) == 'double' ? convertAmount($visitor, false) : $visitor
                ];
            }

            $data->days = [];
            $data->monthData = [];

            $month = $request->has('month') ? date('m', strtotime($request->month)) : date('m');
            $year = $request->has('month') ? date('Y', strtotime($request->month)) : date('Y');

            for ($i = 1; $i <= 12; $i++) {
                for ($i = 1; $i <= now()->month($month)->daysInMonth; $i++) {
                    $data->days[] = date('jS', strtotime(date("$year-$month-$i")));
                    $data->monthData[] = $request->user()->visitors()->whereDate('created_at', date("$year-$month-$i"))->count();
                }
            }
        }

        return view('user.dashboard', compact('data'));
    }
}
