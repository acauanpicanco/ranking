<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Character;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $characters = Character::orderBy('like', 'DESC')->get();
        return view('home', compact('characters'));
    }

    public function vote(){
        return 'aqui';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('manager-create');
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if ($request->hasFile('image')) {
            
            $img_name = uniqid().'-'.$request->file('image')->getClientOriginalName();

             $request->file('image')->move( 'upload/' , $img_name);


            // ensure every image has a different name
            // $file_name = $request->file('image')->hashName();
            
            // save new image $file_name to database
           
        }

        
        $data = $request->only('name', 'description');

        $data['image'] = $img_name;


       Character::create($data);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
        //
        $characters = Character::orderBy('like', 'DESC')->get();
        return view('manager-list', compact('characters'));
    

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $character = Character::find($id);
        return view('manager-edit', compact('character'));
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
         $character = Character::find(1);

        $character->name =  $request->get('name');
        $character->description =  $request->get('description');

        if ($request->hasFile('image')) {
            
            $img_name = uniqid().'-'.$request->file('image')->getClientOriginalName();

             $request->file('image')->move( 'upload/' , $img_name);

             $character->image = $img_name;


        }
       
              

        $character->save();

         return redirect('/manager-list');
        
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
       $character = Character::find($id);

       $character->delete();

       return redirect('/manager-list');
    }
}

