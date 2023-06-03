@extends('layouts.navbar')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Karyawan</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Total Jam Kerja</th>
                                <th>Gaji</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->role->name }}</td>
                                    <td>
                                        @php
                                            $totalHours = 0;
                                            $totalMinutes = 0;
                                        @endphp
                                        @foreach ($absensi as $absen)
                                            @if ($absen->nama == $value->name)
                                                @php
                                                    $totalHours += floor($absen->total / 3600);
                                                    $totalMinutes += floor(($absen->total % 3600) / 60);
                                                @endphp
                                            @endif
                                        @endforeach
                                        {{ sprintf('%02d:%02d', $totalHours, $totalMinutes) }}
                                    </td>
                                    <td>
                                        @php
                                            $totalGaji = 0;
                                        @endphp
                                        @foreach ($absensi as $absen)
                                            @if ($absen->nama == $value->name)
                                                @php
                                                    $totalGaji += $absen->gaji;
                                                @endphp
                                            @endif
                                        @endforeach
                                        Rp. {{ number_format($totalGaji, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-primary"><i class="fas fa-fw fa-eye"></i></button>
                                        <button class="btn btn-sm btn-warning"><i class="fas fa-fw fa-pen"></i></button>
                                        <button type="button" class="btn btn-sm btn-danger delete-btn"
                                            data-id="{{ $value->id }}"><i class="fas fa-fw fa-trash"></i></button>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

@push('data-karyawan')
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('bootstrap') }}/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('bootstrap') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('bootstrap') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('bootstrap') }}/js/demo/datatables-demo.js"></script>
@endpush
