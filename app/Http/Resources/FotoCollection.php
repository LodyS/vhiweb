<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FotoCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'data'=>[
                'foto'=>$this->collection->map(function($data){
                    return [
                        'id'=>$data->id,
                        'nama'=>$data->nama,
                        'user_id'=>$data->user_id,
                        'tanggal'=> date('d-m-Y', strtotime($data->created_at)),
                    ];
                })
            ]
        ];
    }
}
