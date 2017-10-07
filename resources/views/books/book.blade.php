@extends('books.layout.layout')
@section('title'){{$book->title}} - @endsection
@section('content')
        
        <div class="row mx-auto">
            <div class="col-sm-4">
                <img src="../uploads/{{$book->img}}" class="img-fluid" style="margin-top: 1rem;" height="60%" alt="Zdjęcie {{$book->title}}"/>
            </div>
            <div class="col-sm-8 text-center" style="margin-top: 1rem;">
                <h1>{{$book->title}}</h1>
                <h4 class="text-secondary"><i>{{$book->author->name}}</i></h4>
                <hr>
                <div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid aperiam dolore doloremque facere laborum magnam maxime pariatur praesentium quo reiciendis tempore ut, veniam voluptate! Ea est non ratione reprehenderit voluptates.
                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus error illo impedit modi natus necessitatibus neque placeat, quo recusandae sunt! Ex fugiat minus nihil nostrum quis sed sequi vero vitae.</span><span>Accusantium asperiores debitis dolor doloremque est et excepturi fugiat ipsam, ipsum iste minus molestias natus nisi nostrum officia officiis quibusdam quis quisquam rerum sit suscipit ut voluptates! Aliquam, aliquid eos?</span>
                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet at delectus, deleniti dolores dolorum illum impedit <laboriosam></laboriosam></p>
                </div>
            </div>
            <a href="{{ url()->previous() }}" style="margin: 1rem;" class="btn btn-primary btn-lg">Powrót</a>
        </div>

@endsection