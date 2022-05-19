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
})->name('home');


Route::view('/about', 'pages.about')->name('about');

Route::view('/contact-us', 'pages.contact')->name('contact');

Route::post('/contact-us', function(Request $request){
$request->validate([
    'name' => 'required|min:3|max:255|string',
    'email' => 'required|email',
    'phone' => 'required|starts_with:9639|digits_between:12,12',
    'content' => 'required|string|min:5'
]);

$message= new Message();
$message->name = $request->name;
$message->email = $request->email;
$message->content = $request->content;
$message->phone = $request->phone;
$message->save();
 return redirect("/#contact");
});

Route::get('/admin/messages', function () {
    $messages = Message::all();

    return view('messages.index', compact('messages'));
})->name('messages.store');
Route::get('/admin/messages/{message}', function (Message $message) {
    //لما حطيت نوعها مسج صار فيني استغني عن findOrFail ^
    //هاد الشي اسمو implicit Binding
    // $message = Message::find($id);
    // $message = Message::findOrFail($id);

    return view('messages.show', compact('message'));
})->name('message.show');
