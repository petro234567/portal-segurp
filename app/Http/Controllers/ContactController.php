<?php
namespace App\Http\Controllers;
use App\Mail\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    public function create()
    {

        return view('contact.create');
    }
 public function store(Request $request)
 {

 $data = $request->validate([
    'name' => ['required','string','max:100'],
    'email' => ['required','email','max:255'],
    'message' => ['required','string','max:5000'],
 ]);
    Mail::to(config('mail.from.address'))
    ->send(new ContactMessage(
        $data['name'],
        $data['email'],
        $data['message']
        ));
    return back()->with('success', 'Mensaje enviado correctamente.');
 }
}