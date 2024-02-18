<?php

namespace Modules\Contact\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Modules\Contact\Entities\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $contacts = Contact::paginate(15);
        
        return view('contact::index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('contact::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $messages =
            [
                'firstname.required' => 'يجب عليك إدخال الإسم',
                'firstname.max' => 'الحد الأقصى 255 حرف ',
                'phone.required' => 'يجب عليك إدخال رقم الهاتف متكون من 10 أرقام ',
            ];

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'phone' => 'required|max:10',
        ], $messages);


        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();

            Session::flash('error', $response);

            return redirect()->back();
        }

        $contact = new Contact();
        $contact->name = $request->firstname;
        $contact->phone = $request->phone;
        $contact->save();


        Session::flash('success', 'تم حفظ رقمك بنجاح , سوف نتصل بك قريبا شكرا');

        return redirect()->back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('contact::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);


        return Response::json([
            'success' => true,
            'data' => $contact->toArray()
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $contact->is_done = $request->is_done?? 0;
        $contact->comment = $request->comment;     
        $contact->save();

        Session::flash('success', 'contact updated changed succssfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
