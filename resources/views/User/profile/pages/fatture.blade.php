@extends('User.profile.profileMaster')

@section('userContent')
<div id="fattureVue">
    <div class="state-order">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-theme">
                    <thead>
                    <tr>
                        <th>Ordine numero</th>
                        <th>Data</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>#12345</td>
                        <td class="text-ash">10 minuti fa</td>
                        <td class="text-right"><i class="mdi mdi-md mdi-download"></i></td>
                    </tr>
                    <tr>
                        <td>#12345</td>
                        <td class="text-ash">10 minuti fa</td>
                        <td class="text-right"><i class="mdi mdi-md mdi-download"></i></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')

<script type="text/javascript">
    new Vue({
        el: '#fattureVue',
        data: {
        },
        methods: {
            clear() {
            }
        },
        mounted() {
            this.clear();
        },
    });
</script>
@endpush