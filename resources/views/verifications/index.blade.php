<x-app-layout>
<x-slot name="header">
    <h2 class="text-xl font-semibold">Verifications</h2>
    <p class="text-sm text-gray-500">
        Check the list of ID cards verification attempts
    </p>
</x-slot>

<div class="p-6">
<table class="w-full border">
<thead>
<tr class="bg-gray-100">
    <th>#</th>
    <th>QR Token</th>
    <th>Card Number</th>
    <th>Staff Name</th>
    <th>File Number</th>
    <th>Attempted To Verify At</th>
    <th>Status</th>
</tr>
</thead>

<tbody>
@foreach($verifications as $v)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $v->qr_token }}</td>
    <td>{{ $v->card_number }}</td>
    <td>{{ $v->staff->full_name ?? '-' }}</td>
    <td>{{ $v->file_no }}</td>
    <td>{{ $v->attempted_at }}</td>
    <td>
        <span class="font-semibold
            {{ $v->status === 'found' ? 'text-green-600' : 'text-red-600' }}">
            {{ ucfirst($v->status) }}
        </span>
    </td>
</tr>
@endforeach
</tbody>
</table>

<div class="mt-4">
    {{ $verifications->links() }}
</div>
</div>
</x-app-layout>
