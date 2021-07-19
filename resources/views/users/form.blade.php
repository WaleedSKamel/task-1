@extends('layouts.master')

@section('title','Create')

@section('content')

    @if ($edit)
        {!! Form::open(['route' => ['users.update',$user->id],'method' => 'put','files' => true,'class' => 'row']) !!}
        {!! Form::hidden('id', $user->id) !!}
    @else
        {!! Form::open(['route' => 'users.store','method' => 'post','files' => true,'class' => 'row']) !!}
    @endif
    <div class="col-md-4">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{!! $edit ? $user->name : old('name') !!}">
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">E-email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{!! $edit ? $user->email : old('email') !!}">
        @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Brand Name</label>
        <input type="text" name="brand_name" class="form-control @error('brand_name') is-invalid @enderror" value="{!! $edit ? $user->email : old('brand_name') !!}">
        @error('brand_name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="col-12">
        <br>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="{{old('show_input')}}" name="show_input" {{ old('show_input') == 1 ? 'checked' : '' }} id="show_input">
            <label class="form-check-label" for="show_input">
                You want to upload the CR of his brand ..?
            </label>
        </div>
    </div>

    <div class="col-md-4" id="show-div">
        <br>
        <label for="formFile" class="form-label">Upload PDF</label>
        <input class="form-control @error('upload') is-invalid @enderror" name="upload" type="file" id="formFile">
        @error('upload')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="col-12">
        <br>
        <button class="btn btn-primary" type="submit">Submit form</button>
    </div>
    {!! Form::close() !!}
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            @if(old('show_input') == 1)
            $("#show-div").css('display', 'block');
            @else
            $("#show-div").css('display', 'none');
            @endif
        });


        $("#show_input").change(function () {
            if ($(this).prop('checked')) {
                $(this).val(1);
                $("#show-div").css('display', 'block');
            } else {
                $(this).val(0);
                $("#show-div").css('display', 'none');
            }
        });
    </script>
@endpush
