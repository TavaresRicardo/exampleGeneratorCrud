@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('products.index'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">
                        @lang('app.add')...
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="products-table">
                            <thead>
                                <tr>
                                    @foreach($columns as $column)
                                        <th>@lang('products.'.$column['data'])</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
<script id="script">
    $(function () {
        var table = $('#products-table').DataTable({
            serverSide: true,
            processing: true,
            responsive: true,
            order: [ [0, 'desc'] ],
            ajax: {
                url: 'products/data'
            },
            columns: @json($columns),
            pagingType: 'full_numbers'
        });
    });
</script>
@endpush
