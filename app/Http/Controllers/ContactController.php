<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;


class ContactController extends Controller
{
    public function inputContact()
    {   
        return view('input');
    }

    public function confirmContact(ClientRequest $request)
    {
        $inputs = $request->all();
        $name1 = $request->input('name1');
        $name2 = $request->input('name2');
        $fullname = $name1.$name2;

        if (isset($inputs['postcode']))
            $inputs['postcode'] = mb_convert_kana($inputs['postcode'], 'a');

        return view('confirmation',[
            'inputs' => $inputs,
            'fullname'=> $fullname
        ]);
    }

    public function reviseContact(Request $request)
    {
        $inputs = $request->all();
        return view('input',[
            'inputs' => $inputs,
        ]);
    }

    public function sendContact(Request $request)
    {
        $inputs = [    
                    'fullname' => $request->input('fullname'),
                    'gender_id' => $request->input('gender'),
                    'email' => $request->input('email'),
                    'postcode' => $request->input('postcode'),
                    'address' => $request->input('address'),
                    'building_name' => $request->input('building_name'),
                    'opinion' => $request->input('opinion'),
                ];
        Contact::create($inputs);
        return view('thanks');
    }

    public function index(Request $request)
    {
        $fullname = $request->input('fullname');
        $gender = $request->input('gender');
        $created_at_from = $request->input('created_at_from');
        $created_at_to = $request->input('created_at_to');
        $email = $request->input('email');

        $query = Contact::JoinGenders()
                ->WhereFullname($fullname)
                ->WhereGender($gender)
                ->WhereCreated_at($created_at_from,$created_at_to)
                ->WhereEmail($email);

        $items = $query->paginate(5);

        return view('index', [
            'items' => $items,
            'fullname' => $fullname,
            'gender' => $gender,
            'created_at_from' => $created_at_from,
            'created_at_to' => $created_at_to,
            'email' => $email
        ]);
    }

    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/index');
    }

    public function verror()
    {
        return view('input');
    }
}
