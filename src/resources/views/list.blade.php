@extends('web::layouts.grids.12')

@section('title', trans('autoremove::menu.configure'))
@section('page_header', trans('autoremove::menu.configure'))

@section('full')

    <div class="panel panel-default">

        <div class="panel-heading">
            <h3 class="card-title">{{ trans('autoremove::menu.configure') }}</h3>
        </div>
        <div class="panel-body">
            <div class="tab-content">
                <form action="{{ route('autoremove.add') }}" enctype="multipart/form-data"  method="post">
                    {!! csrf_field() !!}
                    <select name="corporation_id">
                        @foreach($list as $corporation)
                            <option value="{{$corporation->corporation_id}}">{{$corporation->name}}</option>
                        @endforeach
                    </select>

                    <input type="submit" value="{{ trans('autoremove::config.add') }}" />
                 </form>
                <table id="rules-table" class="table compact table-condensed table-hover table-responsive">
                    <thead>
                    <tr>
                        <th>{{ trans('autoremove::config.corporation') }}</th>
                        <th>{{ trans('web::seat.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($corporations as $corporation)
                        <tr>
                            <td>
                                @include('web::partials.corporation', ['corporation' => $corporation])
                            </td>
                            <td>@include('autoremove::partials.action', ['corporation' => $corporation])</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@stop

@push('javascript')

@endpush
