@extends('User.profile.profileMaster')

@section('userContent')
@endsection


@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        console.log('dashboard')
    });
</script>
@endpush