@extends('layouts.app')

@section('content')

        <div class="content-body">
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                            @if(session('success'))
                            <div class="alert alert-success solid" role="alert">
                                {{session('success')}}
                            </div>
                            @endif

                            @if(session('error'))
                            <div class="alert alert-danger solid" role="alert">
                                {{session('error')}}
                            </div>
                            @endif
                        </div>
					<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Desa</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" action="{{ route('update-desa',$userId) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            @if ($desa == null)
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Nama Desa</label>
                                                    <input type="text" class="form-control" name="desa" placeholder="Input Nama Desa" required>
                                                    @error('desa')
                                                        <p class="text-danger text-sm">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Telp</label>
                                                    <input type="text" class="form-control" name="telp" placeholder="Input No Telp" required>
                                                    @error('telp')
                                                        <p class="text-danger text-sm">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Alamat</label>
                                                    <textarea class="form-control" name="alamat" id="" cols="30" rows="10" required></textarea>
                                                    @error('alamat')
                                                        <p class="text-danger text-sm">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            @else
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Nama Desa</label>
                                                    <input type="text" class="form-control" name="desa" value="{{ $desa->desa }}" placeholder="Input Nama Desa" required>
                                                    @error('desa')
                                                        <p class="text-danger text-sm">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Telp</label>
                                                    <input type="text" class="form-control" name="telp" value="{{ $desa->telp }}" placeholder="Input No Telp" required>
                                                    @error('telp')
                                                        <p class="text-danger text-sm">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Alamat</label>
                                                    <textarea class="form-control" name="alamat" id="" cols="30" rows="10" required>{{ $desa->alamat }}</textarea>
                                                    @error('alamat')
                                                        <p class="text-danger text-sm">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            @endif

                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
                </div>
            </div>
        </div>

@endsection
