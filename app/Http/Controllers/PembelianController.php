<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pembelian;
use App\Models\DetailPembelian;
use App\Models\Supplier;
use App\Models\Gudang;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Pembelian";
        $supplier = Supplier::all();
        $pembelian =  Pembelian::where("status", 'PO')->orderBy('id', 'DESC')->paginate(25)->onEachSide(1);

        return view('admin.pembelian.index', compact('title', 'pembelian', 'supplier'));
    }

    ## Tampilkan Data Search
    public function search(Request $request)
    {
        $title = "Pembelian";
        $supplier = Supplier::all();
        $search = $request->get('search');
        $pembelian = Pembelian::where("status", 'PO')
            ->whereHas('user', function ($q) {
                $q->where('outlet_id', Auth::user()->outlet_id);
            })
            ->where(function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('transaction_number', 'LIKE', '%' . $search . '%')
                        ->orWhere('pay_cost', 'LIKE', '%' . $search . '%')
                        ->orWhere('total_price', 'LIKE', '%' . $search . '%')
                        ->orWhere('transaction_date', 'LIKE', '%' . $search . '%');
                })
                    ->orwhereHas('user', function ($query) use ($search) {
                        $query->where('qname', 'LIKE', '%' . $search . '%');
                    })
                    ->orWhereHas('supplier', function ($query) use ($search) {
                        $query->where('supplier_name', 'LIKE', '%' . $search . '%');
                    });
            })->orderBy('id', 'DESC')->paginate(25)->onEachSide(1);

        return view('admin/preorder/index', compact('title', 'pembelian', 'supplier'));
    }

    ## Tampilkan Form Create
    public function create()
    {
        $title = "Pembelian";
        $barang = Barang::where('status', 1)->orderBy('id', 'DESC')->limit(20)->get();
        $supplier = Supplier::all();
        $detail_pembelian = DetailPembelian::whereHas('pembelian', function ($query) {
            $query->where('status', 'CART');
        })->orderBy('id', 'DESC')->get();
        $pembelian = pembelian::where('status', 'CART')->first();

        if (!$pembelian) {
            $index = Pembelian::count() + 1;
            Pembelian::create([
                "nomor_transaksi" => ('PO-' . time() . $index),
                "status_id" => 4, //successfully
                "user_id" => Auth::user()->id, //admin
                "supplier_id" => 1, //
            ]);
        }

        $pembelian = pembelian::where('status', 'CART')->first();

        $view = view('admin.preorder.create', compact('title', 'barang', 'supplier', 'detail_pembelian', 'pembelian'));
        $view = $view->render();
        return $view;
    }

    public function search_box_po(Request $request)
    {
        $barang = $request->get('search');
        $barang = Barang::where('status', 1)->where('outlet_id', Auth::user()->outlet_id)->where(function ($query) use ($barang) {
            $query->where('code', 'LIKE', '%' . $barang . '%')
                ->orWhere('barang_name', 'LIKE', '%' . $barang . '%');
        })->orderBy('id', 'DESC')->limit(25)->get();

        return view('admin.preorder.barang_search', compact('barang'));
    }

    public function get_modal_data_po(Request $request)
    {
        $barang = $request->get('id');
        $barang = Barang::where('status', 1)->where('outlet_id', Auth::user()->outlet_id)->where('id', $barang)->first();
        $detail_pembelian = DetailPembelian::where('barang_id', $barang->id)
            ->whereHas('pembelian', function ($query) {
                $query->where('status', 'CART');
            })->first();
        $pembelian = Pembelian::with("user", "supplier")
            ->where("status", 'CART')->first();

        return view('admin.preorder.modal_barang', compact('barang', 'pembelian', 'detail_pembelian'));
    }

    public function refresh()
    {
        $detail_pembelian = DetailPembelian::whereHas('pembelian', function ($query) {
            $query->where('status', 'CART');
        })->orderBy('id', 'DESC')->get();

        return view('admin.preorder.refresh', compact('detail_pembelian'));
    }

    public function add_to_cart_po(Request $request)
    {
        $purchase = DetailPembelian::where('purchase_transaction_id', $request->purchase_transaction_id)
            ->where('barang_id', $request->barang_id);

        $barang = Barang::find($request->barang_id);

        $cek = $purchase->count();

        if ($cek) { //if barang already in cart
            $data = $purchase->first(); //get purchase row

            //update cart in purchase 
            $data->amount = $request->amount;
            $data->price = $barang->purchase_price * $request->amount;
            $data->save();
        } else {
            $input['purchase_transaction_id'] = $request->purchase_transaction_id;
            $input['barang_id'] = $request->barang_id;
            $input['amount'] = $request->amount;
            $input['price'] =  $barang->purchase_price * $request->amount;
            DetailPembelian::create($input);
        }
    }

    function delete_item_po(Request $request)
    {
        DetailPembelian::find($request['id'])->delete();
    }


    public static function order(Request $request)
    {
        $Pembelian = Pembelian::find($request->purchase_transaction_id);
        $Pembelian->status = 'PO';
        // $Pembelian->user_id =  Auth::user()->id;
        $Pembelian->supplier_id = $request->supplier_id;
        $Pembelian->total_price = $request->total_price;
        $Pembelian->save();
    }

    ## Hapus Data
    public function delete(Pembelian $purchase_transaction)
    {

        $purchase_transaction->delete();

        activity()->log('Hapus Data PO dengan ID = ' . $purchase_transaction->id);
        return redirect('/preorder')->with('status', 'Data Berhasil Dihapus');
    }

    ## Confirm Form View
    public function confirm($id)
    {
        $title = "Konfirmasi Pre Order";
        $pembelian = Pembelian::find($id);
        $detail_pembelian = DetailPembelian::with('barang')->where('purchase_transaction_id', $id)->get();
        // dd($detail_pembelian);
        $view = view('admin.preorder.confirm', compact('title', 'detail_pembelian', 'pembelian'));
        $view = $view->render();
        return $view;
    }

    public function confirm_ship(Request $request)
    {
        // dd($request);
        // return 0;    
        $purchase_transaction_id = $request['purchase_transaction_id'];
        $purchase_detail_id = $request['id'];
        $barang_id = $request['barang_id'];
        $amount = $request['amount'];
        $purchase_price = $request['purchase_price'];
        $selling_price = $request['selling_price'];

        $total_price = 0;
        foreach ($purchase_detail_id as  $i => $id) {

            $this->validate($request, [
                'selling_price.*' => 'required|numeric',
            ]);
            
            // UPDATE PRODUCT PRICE
            $barang =  Barang::find($barang_id[$i]);
            $barang->purchase_price = $purchase_price[$i];
            $barang->selling_price = $selling_price[$i];
            $barang->save();

            // UPDATE PURCHASE DETAIL
            // if ($amount[$i] > 0) {
            $purchase = DetailPembelian::find($id);
            $purchase->amount = $amount[$i];
            $purchase->price = $amount[$i] * $purchase_price[$i];
            $purchase->save();
            // } else
            //     $purchase = DetailPembelian::find($id)->delete();

            // STORE TO INVENTORY
            $inventory =  Inventory::where('barang_id', $barang_id[$i])->first();
            $inventory->in_stock = $inventory->in_stock + $amount[$i];
            $inventory->save();

            // SUM TOTAL PRICE
            $total_price += $amount[$i] * $purchase_price[$i];
        }

        // UPDATE TRANSACTION
        $purchase_transaction = Pembelian::find($purchase_transaction_id);
        $purchase_transaction->transaction_number   = 'TRX' . time()  . $i;
        $purchase_transaction->pay_cost             = $total_price;
        $purchase_transaction->total_price          = $total_price;
        $purchase_transaction->status               = 'DONE';
        $purchase_transaction->save();

        return redirect('/preorder')->with('status', 'Data Berhasil Dikonfirmasi');
    }
}
