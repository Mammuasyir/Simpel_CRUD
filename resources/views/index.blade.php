@extends('template')

@section('content')

<div class="container pt-4">
    <div class="col-lg-12 d-flex justify-content-between">
        <h3>Animal<h3>
                <div class="">
                    <a href="{{route('animal.create')}}" class="btn btn-primary">Create</a>
                </div>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">nama_hewan</th>
            <th scope="col">lokasi</th>
            <th scope="col">image</th>
            <th scope="col">action</th>
        </tr>
    </thead>

    @foreach($animal as $anim)
    <tbody>
        <tr>
            <td width="30px" class="text-center">{{$i++}}</td>
            <td>{{$anim->nama_hewan}}</td>
            <td>{{$anim->lokasi}}</td>
            <td><img src="{{url('/storage', $anim->image)}}" style="max-width: 100px;" class="img-thumbnail" alt=""></td>
            <td width="270px">
                <form action="{{route('animal.destroy', $anim->id) }}" method="POST">

                    <a href="{{route('animal.edit', $anim->id)}}" class="btn btn-warning">edit</a>

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Serius bg?')">delete</button>


                    
                    
                </form>
            </td>

        </tr>
    </tbody>
    @endforeach
</table>

@endsection