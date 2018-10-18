@extends('layouts.app')
@section('title')
    @include('users.profile_header')
@endsection
@section('content')

<div class="row profile">
    <div class="col col-sm-4">
        @include('users.profile_card')
    </div>

    <div class="col col-sm-8">
        <div class="ml-5">
            <h2>Edit</h2>

            {!! Form::open(['action' => ['UserController@profile_update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    
            <div class="form-group">
                    {{Form::label('picture', 'Profile Picture')}}
                    <div class="custom-file">
                        {{Form::file('picture', ['class' => 'custom-file-input'])}}
                        {{Form::label('picture', 'Choose file', ['class' => 'custom-file-label pic-label'])}}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('cover_image', 'Profile Cover')}}
                    <div class="custom-file">
                        {{Form::file('cover_image', ['class' => 'custom-file-input'])}}
                        {{Form::label('cover_image', 'Choose file', ['class' => 'custom-file-label cover-label'])}}
                    </div>
                </div>             
                <div class="form-group">
                    {{Form::label('name', 'Name')}}
                    {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
                </div>
                <div class="form-group">
                    {{Form::label('occupation', 'Occupation')}}
                    {{Form::text('occupation', $user->occupation, ['class' => 'form-control', 'placeholder' => 'Occupation'])}}
                </div>
                <div class="form-group">
                    {{Form::label('phone_number', 'Phone Number')}}
                    {{Form::text('phone_number', $user->phone_number, ['class' => 'form-control', 'placeholder' => 'Phone Number'])}}
                </div>
                <div class="form-group">
                    {{Form::label('gender', 'Gender')}}
                    <div class="form-check form-check-inline">
                        {{Form::radio('gender', 'male', ($user->gender == 'male') ? true : '', ['class' => 'form-check-input'])}}
                        {{Form::label('male', 'Male')}}
                    </div>
                    <div class="form-check form-check-inline">
                        {{Form::radio('gender', 'female', ($user->gender == 'female') ? true : '', ['class' => 'form-check-input'])}}
                        {{Form::label('female', 'Female')}}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('city', 'City')}}
                    {{Form::text('city', $user->city, ['class' => 'form-control', 'placeholder' => 'City'])}}
                </div>
                <div class="form-group">
                    {{Form::label('country', 'Country')}}
                    @include('users.countries', ['default' => Auth::user()->country])
                    {{-- {{Form::text('country', $user->country, ['class' => 'form-control', 'placeholder' => 'Country'])}} --}}
                </div>
                <div class="form-group">
                    {{Form::label('about', 'About')}}
                    {{Form::textarea('about', $user->about, ['rows' => '3', 'class' => 'form-control'])}}
                </div>
                <h3>Socials</h3>
                <div class="form-group">
                    {{Form::label('website', 'Website')}}
                    {{Form::text('website', $user->website, ['class' => 'form-control', 'placeholder' => 'Website'])}}
                </div>
                <div class="form-group">
                    {{Form::label('twitter', 'Twitter')}}
                    {{Form::text('twitter', $user->twitter, ['class' => 'form-control', 'placeholder' => 'Twitter'])}}
                </div>
                <div class="form-group">
                    {{Form::label('facebook', 'Facebook')}}
                    {{Form::text('facebook', $user->facebook, ['class' => 'form-control', 'placeholder' => 'Facebook'])}}
                </div>
                <div class="form-group">
                        {{Form::label('google_plus', 'Google Plus')}}
                    {{Form::text('google_plus', $user->google_plus, ['class' => 'form-control', 'placeholder' => 'Google Plus'])}}
                </div>
                <div class="form-group">
                    {{Form::label('linkedin', 'Linkedin')}}
                    {{Form::text('linkedin', $user->linkedin, ['class' => 'form-control', 'placeholder' => 'Linkedin'])}}
                </div>
                <div class="form-group">
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Save Changes', ['class' => 'btn btn-primary'])}}
                </div>
            {!! Form::close() !!}

        </div>
    </div>

</div>

@endsection