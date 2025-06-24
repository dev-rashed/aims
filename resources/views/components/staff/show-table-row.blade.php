@props([
    'th', 
    'td',
    'width' => '10%',
])

<tr>
    <th width="{{ $width }}">{{ $th }}</th>
    <td>{{ $enroll->invoice }}</td>
</tr>