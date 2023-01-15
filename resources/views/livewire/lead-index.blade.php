<div class="flex flex-col justify-center">
<table>
<tr class="text-left">
    <th class="border px-4 py-2 ">Name</th>
    <th class="border px-4 py-2 ">Email</th>
   <th class="border px-4 py-2 ">Phone</th>
   <th class="border px-4 py-2 ">Registered</th>
   <th class="border px-4 py-2 ">Actions</th>
</tr>
@foreach ($leads as $lead)
<tr>
    <td class="border px-4 py-2">{{ $lead->name }}</td>
    <td class="border px-4 py-2">{{ $lead->email }}</td>
    <td class="border px-4 py-2">{{ $lead->phone }}</td>
    <td class="border px-4 py-2 text-center">{{ date('F j,Y',strtotime($lead->created_at)) }}</td>
    <td class="flex border px-4 py-4">
        <a href="{{ route('lead.edit',$lead->id) }}">Edit</a>
        <a class="ml-2 mr-2" href="{{ route('lead.show',$lead->id) }}">Show</a>
        <form onsubmit="return confirm('are you sure?')" wire:submit.prevent="leadDelete({{ $lead->id }})">
        <button type="submit">Delete</button>
        </form>

    </td>
</tr>
@endforeach
</table>
<div class="mt-4">
    {{ $leads->links() }}
</div>
</div>
