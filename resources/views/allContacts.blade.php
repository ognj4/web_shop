@foreach( $allContacts as $singleContact)
    <p>{{ $singleContact->email }}</p>
@endforeach
