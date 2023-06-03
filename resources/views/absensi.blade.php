@extends('layouts.navbar')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2">
                        <div>
                            <h4><Strong>Time Now : </Strong></h4>
                        </div>
                    </div>
                    <div class="col-lg-1 time-circle-center">
                        <div>
                            <h4 id="time" class="text-dark"></h4>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="card py-3 border-left-info">
                            <div class="card-body text-center">
                                <h5>Hari : {{ $now }}</h5>
                                <h5>Tanggal : {{ $date }}</h5>
                                @if ($absensiByAuth)
                                    <h5>Status : <strong class="text-success">Anda Sudah Checkin</strong></h5>
                                    @if ($absensiByAuth->checkout)
                                        <div>
                                            <h5>Anda telah Checkout pada
                                                {{ date('H:i:s', strtotime($absensiByAuth->checkout)) }}</h5>
                                            <h5><b>" Selamat Beristirahat "</b></h5>
                                            <h5>Note : <strong class="text-danger">Absensi Akan Muncul Lagi setiap jam 8,
                                                    Selain Hari Minggu dan Libur Nasional</strong></h5>
                                        </div>
                                    @else
                                        <div>
                                            <form id="checkout-form" action="{{ route('absensi.checkout') }}"
                                                method="POST">
                                                @csrf
                                                <button type="button" class="btn btn-danger"
                                                    onclick="confirmCheckout()">Checkout</button>
                                            </form>
                                        </div>
                                    @endif
                                @else
                                    <h5>Status : <strong class="text-danger">Anda Belum Checkin</strong></h5>
                                    <div>
                                        <form id="checkin-form" action="{{ route('absensi.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="tanggal" value="{{ $date }}">
                                            <button type="button" class="btn btn-info"
                                                onclick="confirmCheckin()">Checkin</button>
                                        </form>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Absensi Karyawan</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Absensi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Hari</th>
                                <th>Tanggal</th>
                                <th>Checkin</th>
                                <th>Checkout</th>
                                <th>Total jam</th>
                                <th>Gaji</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse  ($absensi as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</th>
                                    <td>{{ $value->hari }}</td>
                                    <td>{{ $value->tanggal }}</td>
                                    <td>{{ $value->checkin }}</td>
                                    <td class="{{ $value->checkout == null ? 'text-danger' : '' }}">
                                        {{ $value->checkout == null ? 'Anda Belum Checkout' : $value->checkout }}</td>
                                    <td class="{{ $value->checkout == null ? 'text-danger' : '' }}">
                                        @if ($value->total == null)
                                            Anda Belum Checkout
                                        @else
                                            <?php
                                            $totalSeconds = $value->total;
                                            $hours = floor($totalSeconds / 3600);
                                            $minutes = floor(($totalSeconds % 3600) / 60);
                                            ?>
                                            {{ sprintf('%02d:%02d', $hours, $minutes) }}
                                        @endif
                                    </td>
                                    <td>Rp. {{ number_format($value->gaji, 0, ',', '.') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <style>
        .time-circle {
            border-radius: 25%;
            color: white;
            width: 150px;
            height: 150px;
            background-color: #36b9cc;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .time-circle-center {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
    <!-- /.container-fluid -->
@endsection

@push('data-absensi')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmCheckin() {
            Swal.fire({
                title: 'Anda yakin ingin Checkin?',
                text: "Anda tidak bisa mengubah data setelah Checkin!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("checkin-form").submit();
                }
            });
        }

        function confirmCheckout() {
            Swal.fire({
                title: 'Anda yakin ingin Checkout?',
                text: "Anda tidak bisa mengubah data setelah Checkout!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("checkout-form").submit();
                }
            });
        }
    </script>
    <script type="text/javascript">
        function displayTime() {
            var currentTime = new Date();
            var hours = currentTime.getHours();
            var minutes = currentTime.getMinutes();
            var seconds = currentTime.getSeconds();

            // menambahkan 0 di depan bilangan tunggal
            if (hours < 10) {
                hours = "0" + hours;
            }
            if (minutes < 10) {
                minutes = "0" + minutes;
            }
            if (seconds < 10) {
                seconds = "0" + seconds;
            }

            // menampilkan waktu berjalan
            document.getElementById("time").innerHTML = hours + ":" + minutes + ":" + seconds;
        }

        // memperbarui waktu setiap detik
        setInterval(displayTime, 1000);
    </script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('bootstrap') }}/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('bootstrap') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('bootstrap') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('bootstrap') }}/js/demo/datatables-demo.js"></script>
@endpush
