<?php
namespace App\Http\Controllers\API\Admin\Contact;

use Illuminate\Http\Request;
use App\Support\ImageSupport;
use Kamaln7\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Contact\Contact;


class ContactController extends Controller{

    protected $folderName ='admin.contact.';
    protected $imageSupport;
    protected $imageHeight = 350;
    protected $imageWidth = 500;
    protected $contact;

    function __construct(ImageSupport $imageSupport, Contact $contact)



            {

                $this->middleware('auth');
                $this->contact = $contact;
                $this->imageSupport = $imageSupport;
            }
            public function getcontacts($n){
            return contact::orderByDesc('created_at')->paginate($n);
            }

            public function index()
            {
            return view($this->folderName.'index',[
                'contacts' => $this->getcontacts(10),
                'activePage' => 'contact_list',
                'page' => 'contact',
                'n' => 1,
            ]);

            }

            /**
            * Show the form for creating a new resource.
            *
            * @return \Illuminate\Http\Response
            */
            public function create()
            {
            //
            return view($this->folderName.'form',[
                'activePage' =>'contact_create',
                'page' =>'contact',
            ]);
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
            // $request->validate([
            //     'name'=>'string|required|max:50',
            //     // 'description'=>'string|nullable',
            //     // 'email' =>'string!required',
            //     'subject'=>'string|required|max:500',
            //     'message'=>'string!required',
            //     // 'image'=>'string|required',
            //     // 'status'=>'required|in:active,inactive',
            // ]);
            $this->contact->fill($request->all());
            $image = $this->imageSupport->saveAnyImg($request,'contact','image', $this->imageWidth, $this->imageHeight);
            $this->contact->image = $image;
            $this->contact->created_by = Auth::user()->id;
            if($this->contact->save()){
                Toastr::success('Successfully 1 contact has added','Success!!!',['positionClass'=>'toast-bottom-right']);
                return redirect()->route('contact.index')->with('success', 'Successfully 1 contact has added.');
            }else{
                return back()->withInput()->with('error','Couldnot be contact created, please try again later!!');
            }


            }

            /**
            * Display the specified resource.
            *
            * @param  \App\Models\contact  $contact
            * @return \Illuminate\Http\Response
            */
            public function show(contact $contact)
            {
            return view($this->folderName.'show',[
                'activePage' =>'contact',
                'contact'=>$contact,
            ]);
            }

            /**
            * Show the form for editing the specified resource.
            *
            * @param  \App\Models\contact  $contact
            * @return \Illuminate\Http\Response
            */
            public function edit(contact $contact)
            {
            return view($this->folderName.'form',[
                'activePage' => 'contact',
                'contacts' => $this->getcontacts(10),
                'n'=>1,
                'contact' => $contact,
            ]);
            }

            /**
            * Update the specified resource in storage.
            *
            * @param  \Illuminate\Http\Request  $request
            * @param  \App\Models\contact  $contact
            * @return \Illuminate\Http\Response
            */
            public function update(Request $request, contact $contact)
            {
                // $request->validate([
                //     'name'=>'string|required|max:50',
                //     // 'description'=>'string|nullable',
                //     // 'email' =>'string',
                //     'subject'=>'string|required|max:500',
                //     'message'=>'string!required',
                //     // 'image'=>'string|required',
                //     // 'status'=>'required|in:active,inactive',
                // ]);
            $this->contact = $contact;
            $this->contact->fill($request->all());
            $this->contact->created_by = Auth::User()->id;

            if(!$request->file('image')== ''){
                $this->imageSupport->deleteImg('contact',$this->contact->image);
                $image = $this->imageSupport->saveAnyImg($request, 'contact', 'image',$this->imageWidth, $this->imageHeight);
                $this->contact->image = $image;
            }

            if($this->contact->save()){
                Toastr::success('Successfully 1 contact has added','Success!!!', ['positionClass' => 'toastr-bottom-right']);
                return redirect()->route('contact.index')->with('success','Successfully 1 contact has added.');
            }else{
                return back()->withInput()->with('error','Couldnot be saved , please try again later!');
            }
            }

            /**
            * Remove the specified resource from storage.
            *
            * @param  \App\Models\contact  $contact
            * @return \Illuminate\Http\Response
            */
            public function destroy(contact $contact)
            {
            if($contact->delete()){
                Toastr::success('Successfully 1 contact has deleted!', 'Success!!!',['positionClass'=>'toast-bottom-right']);
                return redirect()->route('contact.index')->with('success','Successfully 1 contact has deleted!');

            }else{
                return back()->with('error','Couldnot be deleted, please try again later');
            }
            }
        }
