<?php
namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('keranjang',
        [
            'title' => 'Keranjang',
            'keranjangs' => Keranjang::where('id_user', Auth::user()->id)->get(),
        ]);
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
            return Redirect::back()->with('sudahAda', 'Product sudah ditambahkan di keranjang');
        }
        $validateData = $request->validate([
            'id_product' => 'required'
        ]);
        $validateData['id_user'] = Auth::user()->id;

        Keranjang::create($validateData);
        return Redirect::back()->with('succes', 'Product berhasil ditambahkan ke keranjang');
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
    public function update(Request $request, Keranjang $keranjang)
    {
        //
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
            $product = Keranjang::where('id', $checkProduct)->get();
            foreach($product as $p) {
                if($p->id_user != Auth::user()->id) {
                    return redirect('keranjang')->with('error', 'Product tidak berada di keranjang anda');
                }
            }
            Keranjang::destroy('id', $checkProduct);
        }
        return redirect('keranjang')->with('succes', 'Product berhasil dihapus dari keranjang');
    }
}
