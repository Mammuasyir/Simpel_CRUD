@extends('template')

@section('content')

<div class="container pt-4">
    <div class="col-lg-12 d-flex justify-content-between">
        <h3>Animal<h3>
                <div class="">
                    <a href="{{route('animal.index')}}" class="btn btn-dark">Back</a>
                </div>
    </div>
</div>

<form action="{{route('animal.update', $anim->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nama_hewan" class="form-label">nama_hewan</label>
        <input name="nama_hewan" value="{{$anim->nama_hewan}}" class="form-control" id="animal">
    </div>

    <div class="mb-3">
        <label for="lokasi" class="form-label">lokasi</label>
        <!-- <input type="password" class="form-control" id="exampleInputPassword1"> -->
        <textarea name="lokasi" id="lokasi" class="form-control" style="height: 80px;">{{$anim->lokasi}}</textarea>
    </div>

    <div class="mb-3">
        <div class="col-lg-3 col-md-3 col-sm-4 text-right">
            <label>image</label>
        </div>
        <div class="col-lg-4 col-md-9 col-sm-8">
            <input type="file" name="image">

        </div>
    </div>

    <button type="submit" class="btn btn-primary">Buat</button>
</form>


@endsection