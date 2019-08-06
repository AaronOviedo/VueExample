@extends('layouts.app')

@section('content')
<div class="container">
    <donaciones-component :benefactors={{App\User::where('rol_id', 1)->get()}} :donators={{App\User::where('rol_id', 2)->get()}}></donaciones-component>
</div>
@endsection
