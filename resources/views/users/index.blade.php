@extends('layouts.master')

@section('title','Create')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Brand Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $key => $user)
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->brand_name }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
