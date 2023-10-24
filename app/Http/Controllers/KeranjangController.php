<?php
namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Keranjang';
        $keranjangs = Keranjang::where('id_user', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        $total = DB::table('keranjangs')->join('products', 'keranjangs.id_product', '=', 'products.id')
        ->where('id_user', Auth::user()->id)->sum(DB::raw('products.harga * keranjangs.kuantitas'));
        return view('keranjang', compact('title', 'keranjangs', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param   \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(count(Auth::user()->keranjangs->where('id_product', $request->id_product)) == 1) {
            return back()->with('error', 'Product sudah ditambahkan di keranjang');
        }
        if(Product::find($request->id_product)->stok == 0) {
            return back()->with('error', 'Product tidak memiliki stok!');
        }
        $validateData = $request->validate([
            'id_product' => 'required',
        ]);
        $validateData['id_user'] = Auth::user()->id;

        Keranjang::create($validateData);
        return back()->with('success', 'Product berhasil ditambahkan ke keranjang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function show(Keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function edit(Keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'idKeranjangs' => 'required',
            'kuantitass' => 'required'
        ]);
        $idKeranjangs = $request->input('idKeranjangs');
        $kuantitass = $request->input('kuantitass');

        if(count($idKeranjangs) != count($kuantitass)) {
            return back()->with('error', 'Terjadi kesalahan pada program! mohon maaf!');
        }

        for($i = 0; $i < count($idKeranjangs); $i++) {
            $idKeranjang = $idKeranjangs[$i];
            $newKuantitas = $kuantitass[$i];
            $keranjang = Keranjang::find($idKeranjang);
            if(!$keranjang || $keranjang->id_user != Auth::user()->id) {
                return back()->with('error', 'Product tidak berada di keranjang anda');
            }
            if($newKuantitas > $keranjang->product->stok) {
                if($keranjang->kuantitas > $keranjang->product->stok) {
                    $keranjang->update(['kuantitas' => $keranjang->product->stok]);
                }
                return back()->with('error', "Kuantitas melebihi stok yang tersedia! \nPerhatikan stok yang tersedia!");
            }
            
            if($newKuantitas <= 0) {
                $keranjang->update(['kuantitas' => 1]);
            } else {
                $keranjang->update(['kuantitas' => $newKuantitas]);
            }
        }
        return back()->with('success', 'Keranjang berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'checkProducts' => 'required', 
        ]);
        $checkProducts = $request->input('checkProducts');
        foreach($checkProducts as $checkProduct) {
            $keranjang = Keranjang::find($checkProduct);
            if(!$keranjang || $keranjang->id_user != Auth::user()->id) {
                return back()->with('error', 'Product tidak berada di keranjang anda');
            }
            Keranjang::destroy('id', $checkProduct);
        }
        return back()->with('success', 'Product berhasil dihapus dari keranjang');
    }
}
