<?php

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::view('/about', 'pages.about');

Route::view('/contact', 'pages.contact');

Route::post('/contact-us', function(Request $request){
$request->validate([
    'name' => 'required',
    'email' => 'required',
    'phone' => 'required',
    'content' => 'required'
]);

$message= new Message();
$message->name = $request->name;
$message->email = $request->email;
$message->content = $request->content;
$message->phone = $request->phone;
$message->save();
 return redirect("/#contact-us");
});

Route::get('/admin/messages', function () {
    $messages = Message::all();

    return view('messages.index', compact('messages'));
});

Route::get('/admin/messages/{id}', function ($id) {
    $message = Message::find($id);

    return view('messages.show', compact('message'));
});
