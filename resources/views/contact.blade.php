@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Contact Us</div>

                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                            <form role="form" action="{{url('contact')}}" method="post">
                                @csrf
                                <div class="controls">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_name">Name *</label>
                                                <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your name" required value="{{old('name')}}">
                                                @error('name') <span class="invalid-feedback">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_email">Email *</label>
                                                <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email" required value="{{old('email')}}">
                                                @error('email') <span class="invalid-feedback">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_content">Message *</label>
                                                <textarea id="form_content" name="content" class="form-control" placeholder="Write your message here." rows="4">{{old('content')}}</textarea>
                                                @error('content') <span class="invalid-feedback">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success pt-2 btn-block " value="Send Message">
                                    </div>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
