<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiPembelianBarang;
use App\Models\TransaksiPembelian;
use App\Models\Barang;
use PDF;

class TransaksiBarangController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $Transaksi = TransaksiPembelian::all();
        return view('TransaksiBarang.index', compact('Transaksi'));
    }
    public function show($id)
    {
        $Transaksi = TransaksiPembelian::find($id);

        return view('TransaksiBarang.show', compact('Transaksi'));
    }

    public function create()
    {
        $Transaksi = TransaksiPembelian::all();
        $TransaksiBarang = TransaksiPembelianBarang::all();
        $barang = Barang::all();


        return view('TransaksiBarang.create', compact('Transaksi', 'TransaksiBarang', 'barang'));
    }

    public function store(Request $request, Barang $id)
    {
       
        $request->validate([
            'transaksi_pembelian_id' => 'required',
            'master_barang_id' => 'required',
            'jumlah' => 'required',
            'harga_satuan' => 'required',
        ]);

        if ($request->jumlah) { 
            $produk = Barang::findOrFail($request->master_barang_id);
            $produk->stok -= $request->jumlah;
            $produk->save();
        }

        $kapasitas = [
            "transaksi_pembelian_id" => $request["transaksi_pembelian_id"],
            "master_barang_id" => $request["master_barang_id"],
            "jumlah" => $request["jumlah"],
            "harga_satuan" => $request["harga_satuan"],
        ];
        $total_harga = $request["jumlah"] * $request["harga_satuan"];

        if ($kapasitas["transaksi_pembelian_id"] == 0) {
            $transaksi_pembelian = TransaksiPembelian::create([
                "total_harga" => $total_harga,
            ]);

            TransaksiPembelianBarang::create([
                "transaksi_pembelian_id" => $transaksi_pembelian->id,
                "master_barang_id" => $kapasitas["master_barang_id"],
                "jumlah" => $kapasitas["jumlah"],
                "harga_satuan" => $kapasitas["harga_satuan"]
            ]);
            return redirect('/transaksi');
        } elseif ($kapasitas["transaksi_pembelian_id"] > 1) {
            $transaksi_pembelian = TransaksiPembelian::find($kapasitas["transaksi_pembelian_id"]);
            $transaksi_pembelian->total_harga += $total_harga;
            $transaksi_pembelian->save();

            TransaksiPembelianBarang::create([
                "transaksi_pembelian_id" => $transaksi_pembelian->id,
                "master_barang_id" => $kapasitas["master_barang_id"],
                "jumlah" => $kapasitas["jumlah"],
                "harga_satuan" => $kapasitas["harga_satuan"]
            ]);
            return redirect('/transaksi');
        }
    }

    public function edit($id)
    {
        $Transaksi = TransaksiPembelian::all();
        $TransaksiBarang = TransaksiPembelianBarang::find($id);
        $barang = Barang::all();

        return view('TransaksiBarang.edit', compact('Transaksi', 'TransaksiBarang', 'barang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'transaksi_pembelian_id' => 'required',
            'master_barang_id' => 'required',
            'jumlah' => 'required',
            'harga_satuan' => 'required',
        ]);

        $cariTransaksiBarang = TransaksiPembelianBarang::find($id);

        $kapasitas = [
            "transaksi_pembelian_id" => $request["transaksi_pembelian_id"],
            "master_barang_id" => $request["master_barang_id"],
            "jumlah" => $request["jumlah"],
            "harga_satuan" => $request["harga_satuan"],
        ];

        $TransaksiBarang = TransaksiPembelianBarang::find($kapasitas['transaksi_pembelian_id']);
        $TransaksiP = TransaksiPembelian::find($kapasitas['transaksi_pembelian_id']);

        $total_harga_baru = $request["jumlah"] * $request["harga_satuan"];
        $total_harga_lama = $TransaksiBarang["jumlah"] * $TransaksiBarang["harga_satuan"];

        if ($total_harga_baru > $total_harga_lama) {
            $total_harga = $total_harga_baru - $total_harga_lama;
            $totalHarga = ($TransaksiP['total_harga'] + $total_harga);
            $transaksi_pembelian = [
                "total_harga" => $totalHarga
            ];
            $TransaksiP->update($transaksi_pembelian);
            $cariTransaksiBarang->update($kapasitas);

            return redirect('/transaksi/');
        } elseif ($total_harga_baru < $total_harga_lama) {
            $total_harga = $total_harga_lama - $total_harga_baru;
            $totalHarga = ($TransaksiP['total_harga'] - $total_harga);
            $transaksi_pembelian = [
                "total_harga" => $totalHarga
            ];
            $TransaksiP->update($transaksi_pembelian);
            $cariTransaksiBarang->update($kapasitas);

            return redirect('/transaksi/');
        } elseif ($total_harga_baru == $total_harga_lama) {
            return redirect('/transaksi/');
        }
        redirect('/transaksi');
    }

    public function destroy($id)
    {
        $TransaksiBarang = TransaksiPembelianBarang::find($id);
        $Transaksi = TransaksiPembelian::find($TransaksiBarang["transaksi_pembelian_id"]);

        $total_harga = $TransaksiBarang["jumlah"] * $TransaksiBarang["harga_satuan"];
        $totalHarga = $Transaksi["total_harga"] - $total_harga;

        $transaksi_pembelian = [
            "total_harga" => $totalHarga
        ];

        $Transaksi->update($transaksi_pembelian);
        $TransaksiBarang->delete();

        if ($Transaksi['total_harga'] == 0) {
            $Transaksi->delete();
        }

        return redirect('/transaksi');
    }
    public function transaksi_pdf()
    {
        $transaksi = TransaksiPembelian::all();

        $pdf = PDF::loadview('TransaksiBarang.transaksi_pdf', compact('transaksi'));
        return $pdf->stream('laporan-transaksi.pdf');
    }
    public function transaksibarang_pdf($id)
    {
        $Transaksi = TransaksiPembelian::find($id);

        $pdf = PDF::loadview('TransaksiBarang.transaksibarang_pdf', compact('Transaksi'));
        return $pdf->stream('laporan-transaksibarang.pdf');
    }
}
