<?php

namespace App\Http\Controllers\API;
use Validator;
use App\Models\Foto;
use App\Models\Like;
use Auth;
use App\Http\Resources\FotoCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\FotoResource;

class FotoController extends Controller
{
    public function index()
    {
        $data = Foto::toBase('foto.id, nama, user_id, created_at as tanggal')->get();

        return new FotoCollection($data);
    }

    public function store(Request $request)
    {
        /*$tambahFile = $request->file('nama');
        $file = time()."_".$tambahFile->getClientOriginalName();
        $folder = 'foto';
        $tambahFile->move($folder, $file);

        $foto = Foto::create([
            'nama'=>$file,
            'caption'=>$request->caption,
            'user_id'=>Auth()->id()
        ]);*/

        $file = $request->file('nama');

        /** Generate random unique_name for file */
        $fileName = time().md5(time()).'.'.$file->getClientOriginalExtension();
        $file->move(public_path().'/foto', $fileName);

        $foto = Foto::create([
            'nama'=>$fileName,
            'caption'=>$request->caption,
            'user_id'=>Auth()->id()
        ]);

        return response()->json(['success'=>true, 'messages'=>'Foto sukses ditambah']);
    }

    public function show($id)
    {
        $user_id = Auth()->id();

        $foto = Foto::selectRaw('foto.id, nama, coalesce(count(likes.user_id),0) AS total_like, users.name as dari, caption')
        ->selectRaw("CASE WHEN (SELECT COUNT(user_id) FROM likes WHERE user_id='$user_id' and foto_id='$id') = 0 THEN 'belum' ELSE 'sudah' END AS status")
        ->leftJoin('likes', 'likes.foto_id', 'foto.id')
        ->leftJoin('users', 'users.id', 'foto.user_id')
        ->where('foto.id', $id)
        ->groupBy('foto.id')
        ->firstOrFail();

        return response()->json([new FotoResource($foto)]);
    }

    public function update(Request $request, Foto $foto)
    {
        $validaton = Validator::make($request->all(),[
            'caption'=>'required|string'
        ]);

        $foto->caption = $request->caption;
        $foto->save();

        return response()->json(['Foto sukses diupdate.']);
    }

    public function destroy($id)
    {
        Like::where('foto_id', $id)->delete();
        Foto::find($id)->delete();

        return response()->json('Foto sukses di hapus');
    }

    public function like (Request $request)
    {
        $foto = Like::create(['foto_id'=>$request->foto_id, 'user_id'=>Auth()->id()]);

        return response()->json(['Foto berhasil disukai']);
    }

    public function unlike (Request $request)
    {
        $foto = Like::where('user_id', Auth()->id())->where('foto_id', $request->foto_id)->delete();

        return response()->json(['Foto berhasil unlike']);
    }
}
