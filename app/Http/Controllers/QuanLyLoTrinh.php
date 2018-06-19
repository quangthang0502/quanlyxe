<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\ThemLoTrinh;
use App\KhuVuc;
use App\LoTrinh;
use App\TaiXe;
use App\TaxiTaiXe;
use Illuminate\Http\Request;

class QuanLyLoTrinh extends Controller
{
    function index()
    {
        $loTrinh = LoTrinh::paginate(8);
        $result = array();

        foreach ($loTrinh as $a) {
            $customer = $a->getCustomer();
            array_push($result, [
                'customer' => $customer,
                'loTrinh' => $a,
                'driver' => $customer->getDriver()->lastName,
                'taxi' => $customer->getTaxi()->licenceNumber
            ]);
        }

        return view('QuanLyLoTrinh.index')->with(compact('result', 'loTrinh'));
    }

    function findByDriver()
    {
        return view('QuanLyLoTrinh.findByDriver');
    }

    function postFindByDriver(Request $request)
    {
        $name = $request['lastName'];

        if (isset($name) || $name != '') {
            $driver = TaiXe::where('lastName', 'LIKE', '%' . $name . '%')->get();
            $result = array();
            foreach ($driver as $d) {
                $totalMoney = 0;
                $totalKm = 0;
                $count = 0;
                $customer = Customer::where('codeDriver', $d->codeDriver)->get();

                foreach ($customer as $c) {
                    $count++;
                    $var = $c->getLoTrinh();
                    $totalKm = $totalKm + $var->numberOfKm;
                    $totalMoney = $totalMoney + $var->fee;
                }
                if ($count != 0){
                    array_push($result, [
                        'driver' => $d,
                        'count' => $count,
                        'totalKm' => $totalKm,
                        'totalMoney' => $totalMoney
                    ]);
                }
            }

            return view('QuanLyLoTrinh.findByDriver')->with(compact('result'));
        }

        return redirect()->route('ThongKeLotrinh');
    }

    function showDetailCustomer($codeCustomer)
    {
        $customer = Customer::where('codeCustomer', $codeCustomer)->first();

        $loTrinh = $customer->getLoTrinh();
        $driver = $customer->getDriver();
        $location = $customer->getLocation();
        $taxi = $customer->getTaxi();

        return view('QuanLyLoTrinh.detail')->with(compact('customer', 'loTrinh', 'driver', 'location', 'taxi'));
    }

    function addNewCustomer()
    {
        $driver = TaxiTaiXe::all();
        $result = array();

        foreach ($driver as $a) {
            array_push($result, [
                'codeDriver' => $a->codeDriver,
                'name' => $a->getDriver()->firstName . ' ' . $a->getDriver()->lastName,
                'licenceNumber' => $a->licenceNumber
            ]);
        }

        do {
            $random = str_random(8);

            $customer = Customer::where('codeCustomer', $random)->first();
        } while ($customer);


        return view('QuanLyLoTrinh.newCustomer')->with(compact('result', 'random'));
    }

    function postAddNewCustomer(ThemLoTrinh $request)
    {
        $input = $request->only([
            'codeCustomer',
            'phoneNumber',
            'number',
            'codeDriver',
            'origin',
            'destination',
            'time',
            'numberOfKm',
            'fee'
        ]);

        $taiXeTaxi = TaxiTaiXe::where([
            'codeDriver' => $input['codeDriver'],
        ])->first();

        Customer::create([
            'codeCustomer' => $input['codeCustomer'],
            'number' => $input['number'],
            'licenceNumber' => $taiXeTaxi->licenceNumber,
            'codeDriver' => $input['codeDriver'],
            'codeLocation' => $taiXeTaxi->codeLocation,
            'phoneNumber' => $input['phoneNumber']
        ]);

        LoTrinh::create([
            'origin' => $input['origin'],
            'destination' => $input['destination'],
            'time' => $input['time'],
            'numberOfKm' => $input['numberOfKm'],
            'fee' => $input['fee'],
            'mediumTime' => floatval($input['numberOfKm']) / floatval($input['time']),
            'codeCustomer' => $input['codeCustomer'],
        ]);

        return redirect()->route('showCustomer', $input['codeCustomer']);
    }

    function editCustomer($codeCustomer)
    {
        $driver = TaxiTaiXe::all();
        $result = array();

        foreach ($driver as $a) {
            array_push($result, [
                'codeDriver' => $a->codeDriver,
                'name' => $a->getDriver()->firstName . ' ' . $a->getDriver()->lastName,
                'licenceNumber' => $a->licenceNumber
            ]);
        }

        $customer = Customer::where('codeCustomer', $codeCustomer)->first();

        $loTrinh = LoTrinh::where('codeCustomer', $codeCustomer)->first();

        return view('QuanLyLoTrinh.editCustomer')->with(compact('result', 'customer', 'loTrinh'));
    }

    function postEditCustomer($codeCustomer, ThemLoTrinh $request)
    {
        $input = $request->only([
            'codeCustomer',
            'phoneNumber',
            'number',
            'codeDriver',
            'origin',
            'destination',
            'time',
            'numberOfKm',
            'fee',
        ]);

        $taiXeTaxi = TaxiTaiXe::where([
            'codeDriver' => $input['codeDriver'],
        ])->first();

        $customer = Customer::where('codeCustomer', $codeCustomer)->first();

        $customer->phoneNumber = $input['phoneNumber'];
        $customer->number = $input['number'];
        $customer->codeDriver = $input['codeDriver'];
        $customer->licenceNumber = $taiXeTaxi->licenceNumber;
        $customer->codeLocation = $taiXeTaxi->codeLocation;

        $customer->save();

        $loTrinh = LoTrinh::where('codeCustomer', $codeCustomer)->first();

        $loTrinh->origin = $input['origin'];
        $loTrinh->destination = $input['destination'];
        $loTrinh->time = $input['time'];
        $loTrinh->numberOfKm = $input['numberOfKm'];
        $loTrinh->fee = $input['fee'];
        $loTrinh->mediumTime = floatval($input['numberOfKm']) / floatval($input['time']);
        $loTrinh->codeCustomer = $input['codeCustomer'];

        $loTrinh->save();

        return redirect()->route('showCustomer', $codeCustomer);
    }

    function deleteCustomer($codeCustomer)
    {
        $customer = Customer::where('codeCustomer', $codeCustomer)->first();
        $customer->delete();

        $loTrinh = LoTrinh::where('codeCustomer', $codeCustomer)->first();
        $loTrinh->delete();

        return redirect()->route('loTrinh');
    }

}
