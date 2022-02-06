<?php

namespace App\Http\Controllers\API\Admin\Member;


use Illuminate\Http\Request;
use App\Support\ImageSupport;
use Kamaln7\Toastr\Facades\Toastr;
use App\Models\Admin\Member\Member;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{

        protected $folderName = 'admin.member.';
        protected $imageWidth = 450;
        protected $imageHeight= 450;
        protected $imageSupprot;
        protected $member;

        function __construct(ImageSupport $imageSupprot, Member $member)
        {
            $this->middleware('auth');
            $this->member = $member;
            $this->imageSupprot=$imageSupprot;
        }
        public function getMembers($n)
        {
            return Member::orderByDesc('created_at')->paginate($n);
        }
        public function index()
        {
            return view($this->folderName.'index', [
                 // member call here
                'members'=>$this->getMembers(10),
                'activePage'=>'member_list',
                'page'=>'member',
                'n'=>1,
                // $member = Member::paginate(),
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
            return view($this->folderName.'form', [
                'activePage'=>'member_create',
                'page'=>'member',
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
            $this->member->fill($request->all());
            if(!$request->file('image')==''){
                $this->member->image = $this->imageSupprot->saveAnyImg($request, 'member', 'image', $this->imageWidth, $this->imageHeight);
            }
            if(!$request->has('status')){
                $this->member->status=false;
            }
            if($this->member->save()){
                Toastr::success('Successfully 1 Member has added', 'Success !!!!', ['positionClass'=>'toast-bottom-right']);
                return redirect()->route('member.index')->with('success', 'Successfully 1 Member has added');
            }
        }

        /**
         * Display the specified resource.
         *
         * @param  \App\Models\Member  $member
         * @return \Illuminate\Http\Response
         */
        public function show(Member $member)
        {
            //
            return view($this->folderName.'member',[
                'activePage' =>'member',
                'blog'=>$member,
            ]);
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Models\Member  $member
         * @return \Illuminate\Http\Response
         */
        public function edit(Member $member)
        {
            //
            return view($this->folderName.'form', [
                'activePage'=>'member_create',
                'page'=>'member',
                'member'=>$member,
            ]);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Models\Member  $member
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Member $member)
        {
            //
            $this->member=$member;
            $this->member->fill($request->all());
            if(!$request->file('image')==''){
                $this->imageSupprot->deleteImg('member', $this->member->image);
                $this->member->image = $this->imageSupprot->saveAnyImg($request, 'member', 'image', $this->imageWidth, $this->imageHeight);
            }
            if(!$request->has('status')){
                $this->member->status=false;
            }
            if($member->save()){
                Toastr::success('Successfully 1 member has updated', 'Success !!!!', ['positionClass'=>'toast-bottom-right']);
                return redirect()->route('member.index')->with('success', 'Successfully 1 member has updated');
            }
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\Member  $member
         * @return \Illuminate\Http\Response
         */
        public function destroy(Member $member)
        {
            //
            if($member->delete()){
                Toastr::success('Successfully 1 member has deleted', 'Success !!!!', ['positionClass'=>'toast-bottom-right']);
                return redirect()->route('member.index')->with('success', 'Successfully 1 memberhas deleted');
            }
        }
    }
