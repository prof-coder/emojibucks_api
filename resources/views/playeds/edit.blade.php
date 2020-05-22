@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Played
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($played, ['route' => ['playeds.update', $played->id], 'method' => 'patch']) !!}

                        @include('playeds.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection