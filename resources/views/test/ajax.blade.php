@extends('layouts.app')
@section('content')
    @include('layouts.navbar')
    <div class="container mt-5">
        <button class="btn btn-primary" type="button" id="btn_ajax"  data-datass="21">Show Data</button>

        {{-- <div id="data-ajax">
        <h1 class="text-center">No Data Found</h1>
    </div> --}}

        <table class="tabel table-bordered table-stiped mt-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                </tr>
            </thead>
            <tbody id="table-post">
                @foreach ($locations as $item)
                    <tr id="index_{{ $item->id }}">
                        <td>
                            {{$item->id}}
                        </td>
                        <td>
                            {{$item->name}}
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>
@endsection

@section('js')
<script type="text/javascript">
var daatss= `
<tr id="index_1">
                        <td>
                            1w
                        </td>
                        <td>
                            ehe
                        </td>
                    </tr>
`
    $(document).ready(function(){
        $('#btn_ajax').on('click', function(){
            $('#table-post').html(daatss)
            // var d = $(this).data('datass')
            var urlPath = 'test/data'
            $.ajax({
                url: urlPath,
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    data.forEach(i => {
                        console.log(i.status);
                    });
                }
            })
        })
    })
</script>
@endsection
