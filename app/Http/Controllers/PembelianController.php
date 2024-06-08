<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pembelian.index', [
            'pembelians' => Pembelian::orderBy('tanggal', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pembelian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kode' => 'required|unique:pembelians,kd_pembelian',
            'nama_barang' => 'required',
            'nama_supplier' => 'required',
            'quantity' => 'required|integer|min:1',
            'satuan' => 'required',
            'harga' => 'required|integer|min:1',
        ]);

        // Mengatur locale Carbon ke Indonesia
        Carbon::setLocale('id');

        Pembelian::create([
            'userId' => Auth::id(),
            'kd_pembelian' => $validateData['kode'],
            'tanggal' => Carbon::now()->toDateString(),
            'nama_barang' => $validateData['nama_barang'],
            'nama_supplier' => $validateData['nama_supplier'],
            'quantity' => $validateData['quantity'],
            'satuan' => $validateData['satuan'],
            'harga' => $validateData['harga'],
            'status_manager' => 1,
            'date_manager' => null,
            'status_finance' => 1,
            'date_finance' => null,
            'bukti_beli' => null,
            'keterangan' => null,
        ]);

        return redirect('/dashboard/pengajuan-barang')->with('success', 'Pengajuan pembelian created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembelian $pengajuan_barang)
    {
        return view('dashboard.pembelian.edit', [
            'pembelian' => Pembelian::findOrFail($pengajuan_barang->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembelian $pengajuan_barang)
    {
        $validatedData = $request->validate([
            'kode' => 'required|unique:pembelians,kd_pembelian,' . $pengajuan_barang->id,
            'nama_barang' => 'required',
            'nama_supplier' => 'required',
            'quantity' => 'required|integer|min:1',
            'satuan' => 'required',
            'harga' => 'required|integer|min:1',
        ]);
    
        $pembelian = Pembelian::findOrFail($pengajuan_barang->id);
        $pembelian->kd_pembelian = $validatedData['kode'];
        $pembelian->nama_barang = $validatedData['nama_barang'];
        $pembelian->nama_supplier = $validatedData['nama_supplier'];
        $pembelian->quantity = $validatedData['quantity'];
        $pembelian->satuan = $validatedData['satuan'];
        $pembelian->harga = $validatedData['harga'];
        
        $pembelian->save();
    
        return redirect('/dashboard/pengajuan-barang')->with('success', 'Pengajuan pembelian updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $pengajuan_barang)
    {
        Pembelian::destroy($pengajuan_barang->id);

        return redirect('/dashboard/pengajuan-barang')->with('success', 'Pengajuan pembelian deleted successfully.');
    }

    public function manager_list()
    {
        return view('dashboard.manager.index', [
            'pembelians' => Pembelian::where('status_manager', 1)->orderBy('tanggal', 'desc')->get()
        ]);
    }
    public function manager_reject(Request $request, $id)
    {
        Carbon::setLocale('id');

        $pembelian = Pembelian::findOrFail($id);
        $pembelian->keterangan = $request->keterangan;
        $pembelian->status_manager = 3;
        $pembelian->date_manager = Carbon::now()->toDateString();

        $pembelian->save();
    
        return redirect('/dashboard/pengajuan-manager')->with('success', 'Pengajuan pembelian reject successfully.');
    }
    public function manager_approve(Request $request, $id)
    {
        Carbon::setLocale('id');

        $pembelian = Pembelian::findOrFail($id);
        $pembelian->status_manager = 2;
        $pembelian->date_manager = Carbon::now()->toDateString();

        $pembelian->save();
    
        return redirect('/dashboard/pengajuan-manager')->with('success', 'Pengajuan pembelian approve successfully.');
    }
    public function manager_history()
    {
        return view('dashboard.manager.history', [
            'pembelians' => Pembelian::where('status_manager', 2)->orderBy('tanggal', 'desc')->get()
        ]);
    }

    public function finance_list()
    {
        return view('dashboard.finance.index', [
            'pembelians' => Pembelian::where('status_manager', 2 )->where('status_finance', 1)->orderBy('tanggal', 'desc')->get()
        ]);
    }
    public function finance_reject(Request $request, $id)
    {
        Carbon::setLocale('id');

        $pembelian = Pembelian::findOrFail($id);
        $pembelian->keterangan = $request->keterangan;
        $pembelian->status_finance = 3;
        $pembelian->date_finance = Carbon::now()->toDateString();

        $pembelian->save();
    
        return redirect('/dashboard/pengajuan-finance')->with('success', 'Pengajuan pembelian reject successfully.');
    }

    public function finance_approve(Request $request, $id)
    {
        $validateData = $request->validate([
            'bukti' => 'required|image|file|max:2048',
        ]);

        Carbon::setLocale('id');

        $pembelian = Pembelian::findOrFail($id);
        if($pembelian->bukti_beli){
            Storage::delete($pembelian->bukti_beli);
        }
        $validateData['bukti'] = $request->file('bukti')->store('bukti-image');
        $pembelian->bukti_beli = $validateData['bukti'];
        $pembelian->status_finance = 2;
        $pembelian->date_finance = Carbon::now()->toDateString();

        $pembelian->save();
    
        return redirect('/dashboard/pengajuan-finance')->with('success', 'Pengajuan pembelian approve successfully.');
    }
    public function finance_history()
    {
        return view('dashboard.finance.history', [
            'pembelians' => Pembelian::where('status_manager', 2 )->where('status_finance', 2)->orderBy('tanggal', 'desc')->get()
        ]);
    }
}
