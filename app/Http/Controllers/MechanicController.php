<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Cart;
use App\Repositories\MechanicRepository;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MechanicController extends Controller
{
    private $mechanicRepository;

    public function __construct(MechanicRepository $mechanicRepository)
    {
        $this->mechanicRepository = $mechanicRepository;
    }

    public function dashboard()
    {
        $data = $this->mechanicRepository->getMechanicData();
        return view('mechanic.dashboard', $data);
    }

    public function servisku()
    {
        $user = Auth::user();
        $data = $this->mechanicRepository->getMechanicData();
        $data1 = $this->mechanicRepository->getAllDealerServis($user);
        return view('mechanic.servisku', $data, $data1);
    }

    public function profilku()
    {
        $data = $this->mechanicRepository->getMechanicData();
        return view('mechanic.profilku', $data);
    }

    public function antrian()
    {
        $user = Auth::user();
        $data = $this->mechanicRepository->getMechanicData();
        $data1 = $this->mechanicRepository->getAllDealerServis($user);
        return view('mechanic.antrian', $data, $data1);
    }
    

    public function update(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $updatedUser = $this->mechanicRepository->updateProfile($user, $request->all());

        if ($updatedUser == 'email_exists') {
            return redirect()->back()->with('error', 'Email sudah terdaftar');
        } elseif ($updatedUser) {
            return redirect()->back()->with('success', 'Profile berhasil diubah');
        } else {
            return redirect()->back()->with('error1', 'Terjadi kesalahan saat mengupdate profil');
        }
    }

    public function updateService($id)
    {
        $data = $this->mechanicRepository->getMechanicData();
        $antrian = Service::findOrFail($id);
        $carts = Cart::where('service_id', $antrian->id)
                ->join('spareparts', 'carts.sparepart_id', '=', 'spareparts.id')
                ->select('carts.*', 'spareparts.item_name')
                ->get();

        $totalSubtotal = $carts->sum('subtotal');
        $total = $totalSubtotal;
        
        return view('mechanic.updateservice', $data, compact('antrian', 'carts', 'total'));
    }

    public function updateStatus(Request $request, $id)
    {
        $user = Auth::user();
        $data = $this->mechanicRepository->getMechanicData();
        $data1 = $this->mechanicRepository->getAllDealerServis($user);
        $service = $this->mechanicRepository->updateStatus1($id);

        $request->validate([
            'price' => 'required',
        ]);

        $price = $request->input('price');

        $totalprice = Service::find($id);
        $totalprice->price = $price;
        $totalprice->save();

        return redirect()
            ->route('mechanic.antrian')
            ->with([
            'data' => $data,
            'data1' => $data1,
            'service' => $service,
            'totalprice' => $totalprice
        ])->with('success', 'Status servis berhasil diubah');
    }

    public function updateStatus2($id)
    {
        $status = $this->mechanicRepository->updateStatus2($id);
        return redirect()->back()
            ->with($status)    
            ->with('success', 'Servis sedang dijalankan');
    }

    public function updateStatus3($id)
    {
        $status = $this->mechanicRepository->updateStatus3($id);
        return redirect()->back()
            ->with($status)
            ->with('success', 'Servis telah selesai');
    }


    public function giveRecom(Request $request, $id)
    {
        $request->validate([
            'message' => 'required',
        ]);
    
        $message = $request->input('message');
    
        $service = Service::find($id);
        $service->recommended_service = $message;
        $service->save();
    
        return redirect()->back()->with('success', 'Recommended servis berhasil diperbarui');
    }

    public function updateWaktu(Request $request, $id)
    {
        $request->validate([
            'datepicker' => 'required',
            'time' => 'required',
        ]);

        $planDate = $request->input('datepicker');
        $time = $request->input('time');

        $antrian = Service::find($id);
        $antrian->plan_date = Carbon::createFromFormat('m/d/Y', $planDate)->format('Y-m-d');
        $antrian->time = $time;
        $antrian->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    
}
