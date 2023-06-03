@extends('layouts.navbar')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Presensi</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Presensi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Checkin</th>
                                <th>Checkout</th>
                                <th>Total</th>
                                <th>Gaji</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totals = [];
                                $gajis = [];
                            @endphp
                            @forelse  ($absensi as $key => $value)
                                @php
                                    $name = $value->nama;
                                    if (!isset($totals[$name])) {
                                        $totals[$name] = 0;
                                        $gajis[$name] = 0;
                                    }
                                    $totals[$name] += $value->total;
                                    $gajis[$name] += $value->gaji;
                                @endphp
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->nama }}</td>
                                    <td>
                                        @foreach ($users as $item)
                                            @if ($item->name == $value->nama)
                                                {{ $item->role->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        {{ $value->hari }},
                                        {{ $value->tanggal }}
                                    </td>
                                    <td>
                                        <strong class="badge badge-sm bg-success text-white">Masuk </strong> -
                                        {{ $value->checkin }}
                                    </td>
                                    <td>
                                        <strong class="badge badge-sm bg-danger text-white">Keluar </strong> -
                                        {{ $value->checkout }}
                                    </td>
                                    <td>
                                        <?php
                                        $hours = floor($value->total / 3600);
                                        $minutes = floor(($value->total % 3600) / 60);
                                        ?>
                                        {{ sprintf('%02d:%02d', $hours, $minutes) }}
                                    </td>
                                    <td>
                                        Rp. {{ number_format($value->gaji, 0, ',', '.') }}
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

@push('data-presensi')
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('bootstrap') }}/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('bootstrap') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('bootstrap') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('bootstrap') }}/js/demo/datatables-demo.js"></script>
@endpush
