<x-layout title="Open House 2026 | Cek Tiket" :data="$data" :status="$status">
    <x-slot:metadesc>
        <meta name="description" content="Open House SMAN Unggulan M.H. Thamrin 2026">
        <meta property="og:title" content="Open House SMAN Unggulan M.H. Thamrin 2026">
        <meta property="og:image" content="{{ asset('images/potrait/ospkfull.jpg') }}">
    </x-slot:metadesc>

    @if ($status === 'found')
    @php
        $fotoUrl = $data->foto_diri;

        if (preg_match('/id=([a-zA-Z0-9_-]+)/', $fotoUrl, $match)) {
            $fotoUrl = 'https://lh3.googleusercontent.com/d/' . $match[1];
        } elseif (preg_match('/\/file\/d\/([a-zA-Z0-9_-]+)/', $fotoUrl, $match)) {
            $fotoUrl = 'https://lh3.googleusercontent.com/d/' . $match[1];
        }

        $ticketID = $data->id_tiket;
        $key = [
            "Tiket ANAK + 1 ORANG TUA/WALI" => "OTM1",
            "Tiket ANAK + 2 ORANG TUA/WALI" => "OTM2",
            "Tiket ANAK saja" => "ANAK"
        ];
        $qrText = $key[$data->jenis_tiket] . "_" . $ticketID;
@endphp

    <h1 class="text-2xl font-bold mb-4">Tiket Ditemukan</h1>

    <div class="text-green-600 font-bold mb-2">Data Peserta:</div>

    <pre class="text-sm bg-gray-100 p-2 rounded mb-4">
{{ print_r($data, true) }}
    </pre>

    <img 
        src="{{ $fotoUrl }}"
        alt="Foto Diri"
        class="w-48 h-64 object-cover mb-4 border rounded"
    />

    <img 
    src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data={{ urlencode($qrText) }}"
    alt="QR Code"
    class="w-48 h-48 object-cover mb-4 border rounded"
    />
@else
    <h1 class="text-red-600 font-bold">Tiket Tidak Ditemukan.</h1>
@endif


</x-layout>
