<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
//use App\Http\Requests\ContactRequest;


class ContactController extends Controller
{
    public function list(Request $request){
        $pagination = Contact::orderBy("name");

        if (isset($request->busca) && $request->busca != "")
            $pagination->where("name","like","%$request->busca%");
        
        return view("admin.contacts.index", ["list"=>$pagination->paginate(3)]);
    }

    public function create(){
        return view("admin.contacts.form", ["data"=>new Contact()]);
    } 

    public function store(ContactRequest $request){
        $validated = $request->validated([
            'name' => 'required|max:250',
            'birth_date' => 'required|date',
            'address' => 'required|max:250',
            'email' => 'required|max:250',
            'phone' => 'regex:/\([0-9]{2}\)[0-9]{5}-[0-9]{4}/',
            'register_date' => 'required|date',
        ]);
        $post = Contact::create($request->all());
        return redirect(route("contacts.edit", $post))->with("success",__("Data saved!"));
    }
    
    /*
    public function create(){
        return view("admin.contacts.form", ["data"=>new Contact()]);
    } 
    
    public function store(ContactRequest $request){
        $validated = $request->validated();
        $contacts = Contact::create($request->all());
        return redirect(route("contacts.edit", $contacts))->with("success",__("Data saved!"));
    } 
    */

    public function destroy(Contact $contacts){
        $contacts->delete();
        return redirect(route("contacts.list"))->with("success",__("Data deleted!"));
    }
    
    #abre o formulario de edição
    public function edit(Contact $contacts){
        return view("admin.contacts.form",["data"=>$contacts]);
    }

    #salva as edições
    public function update(Contact $contacts, ContactRequest $request) {
        $validated = $request->validated();
        $contacts->update($request->all());
        return redirect()->back()->with("success",__("Data updated!"));
    }
    
}
