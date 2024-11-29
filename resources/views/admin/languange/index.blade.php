@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Languange') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('All Languange') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.languange.create') }}" class="btn btn-primary">
                       <i class="fas fa-plus"></i>  {{ __('Create new') }}
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                      <thead>
                        <tr>
                          <th class="text-center">
                            #
                          </th>
                          <th>{{ __('Languange Name') }}</th>
                          <th>{{ __('Languange Code') }}</th>
                          <th>{{ __('Default') }}</th>
                          <th>{{ __('Status') }}</th>
                          <th>{{ __('Action') }}</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($languanges as $languange)
                        <tr>
                            <td>
                             {{ $languange->id }}
                            </td>
                            <td> {{ $languange->name }}</td>
                            <td> {{ $languange->lang }}</td>

                            <td>
                                @if($languange->default == 1)
                                    <span class="badge badge-primary">{{ __('default') }}</span>
                                @else
                                    <span class="badge badge-warning">{{ __('No') }}</span>
                                @endif

                            </td>
                            <td>
                                @if ($languange->status == 1)
                                    <span class="badge badge-success">{{ __('Active') }}</span>
                                @else
                                    <span class="badge badge-danger">{{ __('Inactive') }}</span>
                                @endif
                            </td>

                            <td>
                              <a href="{{ route('admin.languange.edit', $languange->id) }}" class="btn btn-primary"><i class ="fas fa-edit"></i></a>
                              <a href="{{ route('admin.languange.destroy', $languange->id) }}" class="btn btn-danger delete-item"><i class ="fas fa-trash-alt"></i></a>
                            </td>
                          </tr>
                        @endforeach


                      </tbody>
                    </table>
                  </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
    $("#table-1").dataTable({
        "columnDefs": [
          { "sortable": false, "targets": [2,3] }
        ]
      });
    </script>
@endpush
