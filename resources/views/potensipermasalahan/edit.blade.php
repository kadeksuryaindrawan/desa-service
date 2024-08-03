@extends('layouts.app')

@section('content')

        <div class="content-body">
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
					<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form Edit Potensi Dan Permasalahan</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" action="{{ route('edit-permasalahan-process',$userId) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="permasalahan_id" value="{{ $permasalahan->id }}" id="">
                                        <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Potensi</label>
                                                    <textarea name="potensi" class="form-control" name="potensi" id="" cols="30" rows="10" required>{{ $permasalahan->potensi }}</textarea>
                                                    @error('potensi')
                                                        <p class="text-danger text-sm">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Permasalahan</label>
                                                    <textarea name="permasalahan" class="form-control" name="permasalahan" id="" cols="30" rows="10" required>{{ $permasalahan->permasalahan }}</textarea>
                                                    @error('permasalahan')
                                                        <p class="text-danger text-sm">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                        <button type="submit" class="btn btn-primary">Edit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
                </div>
            </div>
        </div>

@endsection
