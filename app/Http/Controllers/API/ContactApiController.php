<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Contact\Contact;

class ContactApiController extends Controller
{
    //
     function index(){
        return Contact::all();
    }

   function show(Contact $Contact){
        return $Contact;
    }

     function store(Request $request){
        $Contact = Contact::create($request->all());
        return response()->json($Contact, 201);
    }

  function update(Request $request, Contact $Contact){
        $Contact->update($request->all());
        return response()->json($Contact, 201);

    }
   function destroy(Contact $Contact){
        $Contact->delete();
        return response()->json(null,200);
    }


}
