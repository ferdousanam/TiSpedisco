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
                        @foreach ($invoices as $invoice)
                            <tr>
                                <td>#{{ $invoice->order->order_code }}</td>
                                <td class="text-ash">{{ $invoice->created_at->diffForHumans() }}</td>
                                <td class="text-right">
                                    <form action="{{ route('user.fatture.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="docId" value="{{ $invoice->docId }}">
                                        <button class="mdi mdi-md mdi-download"></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
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
            data: {},
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
