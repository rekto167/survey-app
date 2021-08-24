<style>
    table, th, td, tr {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
    }
</style>
<h1>Laporan Mingguan</h1>
<h3>Tanggal : {{ $weekStartDate }} s/d {{ $weekEndDate }}</h3>
<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Sangat Puas</th>
        <th>Puas</th>
        <th>Kurang Puas</th>
        <th>Tidak Puas</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($datas as $data)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->sum('emot1') }}</td>
        <td>{{ $data->sum('emot2') }}</td>
        <td>{{ $data->sum('emot3') }}</td>
        <td>{{ $data->sum('emot4') }}</td>
    </tr>
    @endforeach
    </tbody>
</table>