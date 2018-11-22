<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Article;
use App\Model\Label;
use DB;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
        return view('home.label.index',['id'=>$id]);
    }
    public function label($id)
    {
        


        $label = Label::find($id);
        // dump($label->articlenumber);
        $labelaid = $label->articlenumber;
        $labelaid = rtrim($labelaid ,',');
        $arrlabelaid = explode(',', $labelaid);
        // dump($arrlabelaid);
        
        // dump($article);
        foreach ($arrlabelaid as $ka => $va) {
            $article[] = DB::table('dy-articles')->where('id','=',$va)->get();
            // $aid[] = $va->id;
        }
        // dump($article);
        // $articleid = array_unique($id); 
        // dump($aid);
        // $aid = array_intersect($arrlabelaid,$aid);
        // dump($aid);,'aid'=>$aid

        return view('home.label.index',['id'=>$id,'arrlabelaid'=>$arrlabelaid,'article'=>$article]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
