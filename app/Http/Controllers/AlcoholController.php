<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversion;
use App\Models\Alcohol;

//SQL計算用
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;

class AlcoholController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // これ使ってないかも
        $alcohols = Alcohol::get();
        return view('alcohol.input', compact('alcohols'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ddd($request);
        $request->validate([
            // 'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'based_alcohol_id' => 'required',
            'based_cups' => 'required',
            'target_alcohol_id' => 'required',

        ]);

        $conversions = Conversion::create([
            // 'name' => $request->name,
            // 'email' => $request->email,
            // 'password' => Hash::make($request->password),
            'based_alcohol_id' => $request->based_alcohol_id, //->alcohol->name,
            'based_cups' => $request->based_cups,
            'target_alcohol_id' => $request->target_alcohol_id, //->alcohol->name,
            // 'remember_token' => $request->remember_token,

        ]);
        $conversion = Conversion::orderBy('updated_at', 'desc')->first();
        // ddd($conversion);
        $conversion_name = [
            'based_alcohol_name' => Alcohol::find($conversion->based_alcohol_id)->name,
            'based_cups' => $conversion->based_cups,
            'target_alcohol_name' => Alcohol::find($conversion->target_alcohol_id)->name,
        ];  

        $based_alcohol_info = [
            'based_alcohol_amount' => Alcohol::find($conversion->based_alcohol_id)->amount,
            'based_alcohol_degree' => Alcohol::find($conversion->based_alcohol_id)->degree,
            'based_cups' => $conversion->based_cups,
        ];

        $target_alcohol_info = [
            'target_alcohol_amount' => Alcohol::find($conversion->target_alcohol_id)->amount,
            'target_alcohol_degree' => Alcohol::find($conversion->target_alcohol_id)->degree,
        ];

        //phpで計算した結果を変数に入れる
        // $target_cups = $based_alcohol_info['based_alcohol_amount'] * $based_alcohol_info['based_alcohol_degree'] * $based_alcohol_info['based_cups'] / ( $target_alcohol_info['target_alcohol_amount'] * $target_alcohol_info['target_alcohol_degree'] );
        // $target_cups = round($target_cups, 1);

        //計算した結果をconversionsテーブルのtarget_cupsカラムに挿入(下記に記述)
        $based_calculation = DB::table('alcohols')
            ->join('conversions', function ($join){
				$join->on('alcohols.id', '=', 'conversions.based_alcohol_id');})
            ->orderBy(DB::raw('conversions.updated_at'), 'desc')
            ->take(1)
            //->where(DB::raw(conversions.id), )
            // ->select(DB::raw('alcohols.amount') * DB::raw('alcohols.degree') * DB::raw('conversions.based_cups'))
            ->select(DB::raw('alcohols.amount * alcohols.degree * conversions.based_cups as Bc'))
            ->get();

        //$based_calculation = $based_calculation[0];


        //ddd($based_calculation);

        $target_calculation = DB::table('alcohols')
            ->join('conversions', function ($join){
				$join->on('alcohols.id', '=', 'conversions.target_alcohol_id');})
            ->orderBy(DB::raw('conversions.updated_at'), 'desc')
            ->take(1)
            ->select(DB::raw('alcohols.amount * alcohols.degree as Tc'))
            ->get();
        //ddd($target_calculation);

        $target_cups = round(($based_calculation[0]->Bc 
            / $target_calculation[0]->Tc), 1);

        //ddd($target_cups);

        $based_alcohol_phrase = Alcohol::find($conversion->based_alcohol_id)->phrase;
        // ddd($conversion_name);
        // bladeで 変数$conversion_nameの中のデータを取り出すときはアローではなく，`$conversion_name['based_alcohol_id']`みたいにやる
        // $conversion_nameはテーブルではなくて配列だから？？
        return view('alcohol.output', compact('conversion_name', 'target_cups', 'based_alcohol_phrase'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
