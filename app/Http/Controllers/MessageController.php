<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //

	public function index()
	{
		$messages = Contact::all();

		//dd($messages);

		return view('admin.allmessage', compact('messages'))->with('no', 1);
	}


	public function view($id)
	{
		$message = Contact::find($id);

		//dd($messages);

		return view('admin.viewmessage', compact('message'));
	}

    public function add(Request $request)
    {
    	$this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required',
        ]);

        //dd($request);

        $message = new Contact();
        
        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;

        $message->save();
        return redirect('contact')->with('successMsg', 'Your mail has been sent successfully.');
    }

    public function reply($id)
	{
		// $message = Contact::find($id);

		// dd($messages);

		// return view('admin.replymessage', compact('message'));
	}

	public function delete($id)
	{
		$message = Contact::find($id)->delete();

		//dd($messages);

		return redirect()->back()->with('successMsg', 'Message Successfully Deleted.');
	}
}
