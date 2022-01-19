<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Auth;
use Illuminate\Support\Facades\Route;

class FotoController extends Controller
{
    public function index ()
    {
        return view ('foto/index');
    }

    public function dashboard (Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $login = new Client(['auth'=>[$email, $password]]);

        $res = $login->request('POST', 'localhost:8000/api/login', ['query'=>[
                'email'=>$email,
                'password'=>$password
            ],
        ])
        ->getBody()
        ->getContents();

        $api = json_decode($res);
        $user_id = $api->id;
        $pesan = $api->message;
        $token = $api->access_token;

        $getFoto = new Client();
        $foto = $getFoto->request('GET', 'localhost:8000/api/foto', ['headers' =>['Authorization' =>"Bearer {$token}"],])
        ->getBody()
        ->getContents();

        $foto = json_decode($foto);
        //dd($foto);

        return view('foto/dashboard', compact('pesan', 'foto', 'token', 'user_id'));
    }

    public function detail (Request $request)
    {
        $token = $request->token;
        $client = new Client();
        $foto = $client->request('GET', 'localhost:8000/api/foto/'.$request->id, ['headers' =>['Authorization' =>"Bearer {$token}"],])
        ->getBody()
        ->getContents();

        $data = json_decode($foto);

        return view ('foto/detail', compact('data', 'token'));
    }

    public function create (Request $request)
    {
        $token = $request->token;
        $data = [];
        $aksi = 'create';

        return view ('foto/form', compact('data', 'aksi', 'token'));
    }

    public function store (Request $request)
    {

        $file = $request->file('nama');


        $response = Http::withToken($request->token)->withOptions(['verify' => false,])
        ->attach('nama', $request->file('nama'), "nama".'.'.$request->file('nama')->getClientOriginalName())
        ->post('http://localhost:8000/api/foto', ["caption" => $request->caption,]);

        //dd("nama".'.'.$request->file('nama')->getClientOriginalExtension());
        $response = $response->getBody()->getContents();
        return response()->json (['error' =>$response]);

    }

    public function edit (Request $request)
    {
        $aksi = 'update';
        $token = $request->token;
        $client = new Client();
        $foto = $client->request('GET', 'localhost:8000/api/foto/'.$request->id, ['headers' =>['Authorization' =>"Bearer {$token}"],])
        ->getBody()
        ->getContents();

        $data = json_decode($foto);

        return view ('foto/form', compact('data', 'token'));
    }

    public function update (Request $request)
    {
        $response = Http::withToken($request->token)->put('localhost:8000/api/foto/'.$request->id, ['caption' =>$request->caption,]);

        return back();
    }

    public function like(Request $request)
    {
        Http::asForm()->withToken($request->token)->post('localhost:8000/api/like', ['foto_id'=>$request->foto_id]);

        return back();
    }

    public function unlike(Request $request)
    {
        Http::asForm()->withToken($request->token)->post('localhost:8000/api/unlike', ['foto_id'=>$request->foto_id]);

        return back();
    }

    public function delete (Request $request)
    {
        $token = $request->token;
        $client = new Client();
        $foto = $client->request('GET', 'localhost:8000/api/foto/'.$request->id, ['headers' =>['Authorization' =>"Bearer {$token}"],])
        ->getBody()
        ->getContents();

        $data = json_decode($foto);

        return view ('foto/delete', compact('data', 'token'));
    }

    public function destroy (Request $request)
    {
        $token = $request->token;
        $client = new Client();
        $foto = $client->request('DELETE', 'localhost:8000/api/foto/'.$request->id, ['headers' =>['Authorization' =>"Bearer {$token}"],])
        ->getBody()
        ->getContents();

        return 'Berhasil dihapus';
    }

    public function logout ()
    {
        $login = new Client();

        $res = $login->request('POST', 'localhost:8000/api/logout')
        ->getBody()
        ->getContents();

        return redirect('foto/index');
    }
}
