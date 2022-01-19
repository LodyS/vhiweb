<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">Dashboard Fotogram </div>

                    <div class="card-body">

                        @if ($aksi == 'update')
                        @foreach ($data as $key => $d)
                            <form method="post" action="{{  url('update', $d->id) }}" >  {{method_field('PUT')}} {{ @csrf_field() }}

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Foto</label>
                                    <div class="col-sm-12">
                                    <img class="card-img-top" src="{{ url('foto/'.$d->nama)}}" width="300" height="300" alt="Card image cap">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Caption</label>
                                    <div class="col-sm-12">
                                    <input type="text" class="form-control" value="{{ $d->caption }}"name="caption" maxlength="50" required>
                                </div>
                            </div>
                            @endforeach
                            <button type="submit" class="btn btn-danger">Update</button>
                            @else
                            <form method="post" action="{{  url('store') }}" enctype="multipart/form-data"> {{ @csrf_field() }}

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Foto</label>
                                    <div class="col-sm-12">
                                    <input type="file" class="form-control"  name="nama" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Caption</label>
                                    <div class="col-sm-12">
                                    <input type="text" class="form-control"  name="caption" maxlength="50" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger">Simpan</button>
                            @endif

                    </div>
                </div>
            </div>
        </div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
