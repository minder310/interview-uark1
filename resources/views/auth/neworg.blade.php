@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新建機構名稱</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('neworg.store') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('機構名稱') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- account -->
                        <div class="row mb-3">
                            <label for="org_no" class="col-md-4 col-form-label text-md-end">{{ __('機構編號') }}</label>

                            <div class="col-md-6">
                                <input id="org_no" type="text" class="form-control @error('org_no') is-invalid @enderror" name="org_no" value="{{ old('org_no') }}" required autocomplete="org_no" autofocus>

                                @error('org_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            

                           
                                            

                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
