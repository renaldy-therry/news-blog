@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Languange') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Edit Languanges') }}</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.languange.update', $languange->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">{{ __('Languange') }}</label>
                        <select name="lang" id="languange-select" class="form-control select2">
                            <option value="">{{ __('Select') }}</option>
                            @foreach (config('languange') as $key => $lang)
                                <option
                                @if($languange->lang === $key)
                                    selected
                                @endif
                                value="{{ $key }}">{{ $lang['name'] }}</option>
                            @endforeach
                        </select>
                        @error('lang')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Name') }}</label>
                        <input readonly name="name" value = "{{ $languange->name }}" type="text" class="form-control" id="name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Slug') }}</label>
                        <input readonly name="slug" value = "{{ $languange->slug }}" type="text" class="form-control" id="slug">
                        @error('slug')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Is It default ?') }}</label>
                        <select name="default" id="" class="form-control">
                            <option {{ $languange->default === 0 ? 'selected' : '' }} value="0">{{ __('No') }}</option>
                            <option {{ $languange->default === 1 ? 'selected' : '' }} value="1">{{ __('Yes') }}</option>
                        </select>
                        @error('default')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Status') }}</label>
                        <select name="status" id="" class="form-control">
                            <option {{ $languange->default === 1 ? 'selected' : '' }} value="1">{{ __('Active') }}</option>
                            <option {{ $languange->default === 0 ? 'selected' : '' }} value="0">{{ __('Inactive') }}</option>
                        </select>
                        @error('status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#languange-select').on('change', function() {
                let value = $(this).val();
                let name = $(this).children(':selected').text();
                $('#slug').val(value);
                $('#name').val(name);
            })
        })
    </script>
@endpush
