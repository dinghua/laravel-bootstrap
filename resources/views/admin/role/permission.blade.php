@extends('layouts.master')

@section('content')
    {{$role->display_name}}
    <hr/>

    {!! Form::open(['url'=>'admin/role/'.$role->id.'/permissions', 'method'=>'POST']) !!}
    @foreach($all_perms as $perm)
        <div class="checkbox">
            <label class="i-checks">
                <input type="checkbox" value="{{$perm->id}}" checked><i></i> {{$perm->display_name}}
            </label>
        </div>
    @endforeach
    <button class="btn btn-primary btn-sm" type="submit">保存</button>
    {!! Form::close() !!}

@endsection