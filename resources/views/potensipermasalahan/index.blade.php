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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Permasalahan</h4>
                                @if ($id_desa != null)
                                    <a href="{{ url('/potensipermasalahan/add?id='.$userId) }}"><button class="btn btn-primary btn-sm">Tambah Data</button></a>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Potensi</th>
                                                <th>Permasalahan</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no=1;
                                            @endphp
                                            @if ($permasalahans != null)
                                                @foreach ($permasalahans as $permasalahan)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $permasalahan->potensi }}</td>
                                                        <td>{{ $permasalahan->permasalahan }}</td>
                                                        <td>
                                                                @if ($permasalahan->status == 'sudah dibantu')
                                                                    <span class="badge badge-success">{{ ucwords($permasalahan->status) }}</span>
                                                                @else
                                                                    <span class="badge badge-danger">{{ ucwords($permasalahan->status) }}</span>
                                                                @endif
                                                            </td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button id="toa" class="btn btn-sm btn-primary" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                    <i class="flaticon-043-menu"></i>
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                    <a href="{{ url('/potensipermasalahan/edit?id=' . $userId . '&permasalahan_id=' . $permasalahan->id) }}" class="dropdown-item">Edit</a>
                                                                    <form action="{{ route('delete-process',$userId) }}" method="post" onsubmit="return confirm('Yakin hapus data?')">
                                                                        @csrf
                                                                        <input type="hidden" name="permasalahan_id" value="{{ $permasalahan->id }}" id="">
                                                                        @method('delete')
                                                                        <button class="dropdown-item">Hapus</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
            </div>
        </div>

@endsection
