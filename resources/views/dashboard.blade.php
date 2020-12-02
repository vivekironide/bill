@extends('master-layout')

@section('css')
    @parent

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.semanticui.min.css">
@endsection

@section('content')
    <h2 class="ui header header-style"><i class="fa fa-home"></i> Dashboard </h2>

    <div id="image">
		<div class="ui grid mt2 mx2">
			<form class="ui form sixteen wide column" action="{{route('calculate')}}">
                <div class="field">
                    <label for="input_no">Input Number</label>
                    <input type="number" placeholder="Input Number" name="input_no" id="input_no">
                </div>
            </form>

            <div class="ui sixteen wide column pt2 pb2">
                <button class="ui button btn-corporate right floated" id="show_ticket">Submit</button>
            </div>
		</div>
	</div>

    <div id="calculate">

    </div>
@endsection

@section('js')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.semanticui.min.js"></script>
    <script>
        $(document).ready(function() {
            $( '#show_ticket' ).click( function( e ) {
                e.preventDefault();

                let $form = $( ".ui.form" );
                let $meta = $( 'meta[name="csrf-token"]' );

                $form
                    .form( {
                        fields: {
                            input_no: 'empty',
                        },
                        inline: true,
                        on    : 'blur'
                    } );

                $form.form( 'validate form' );

                if( !$form.form( 'is valid' ) ) {
                    return false;
                }

                $form.addClass( 'loading' );

                axios( {
                    method : 'GET',
                    url    : $form.attr('action') + '?' + "input_no=" + $('#input_no').val(),
                    headers: {
                        'X-CSRF-TOKEN': $meta.attr( 'content' ),
                        'Content-Type': 'application/json',
                        'Accept'      : 'text/html; charset=utf-8',
                    },
                } ).then( ( response ) => {
                    $('#calculate').html(response.data);
                } ).catch( ( error ) => {
                    if( error.response.status === 500 ) {
                        Toast.fire( {
                            icon : 'error',
                            title: "Something Went Wrong."
                        } );

                        return;
                    }

                    Toast.fire( {
                        icon : 'error',
                        title: error.response.data
                    } );
                } ).finally( () => {
                    $form.removeClass( 'loading' );
                } );

            } )
        });


    </script>
@endsection
