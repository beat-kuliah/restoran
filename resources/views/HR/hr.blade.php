@extends('HR/app')
@extends('footer')
@section('content')
    @if ($message = Session::get('info'))
        <div class="alert alert-info alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="wrapper">
        <div class="container">
            <div class="heading">
                <center>
                    <h2>Daftar Karyawan</h2>
                </center>
            </div>
            <br>

            <div class="hr">
                <a class="btn btn-info" href="/createEmployee/create">Buat Data Karyawan Baru</a>
                <br><br>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="col">ID Karyawan</th>
                            <th scope="col">Nama Karyawan</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Jabatan Karyawan</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Hapus</th>
                        </tr>

                        @if (count($employees) == 0)
                            <tr>
                                <td colspan="5" style="text-align: center"> Tidak ada data</td>
                            </tr>
                        @endif
                        @foreach ($employees as $em)
                            <tr>
                                <td>
                                    {{ $em->employeeID }}
                                </td>
                                <td>
                                    {{ $em->name }}
                                </td>
                                <td>
                                    {{ $em->birthdate }}
                                </td>
                                <td>
                                    {{ $em->employeeTypes->employeename }}
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="/editEmployee/{{ $em->employeeID }}"
                                        method="GET">Edit</a>
                                </td>
                                <td>
                                    <form action="/deleteEmployee/{{ $em->employeeID }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button class="btn btn-secondary">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        @endsection
